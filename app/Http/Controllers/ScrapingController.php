<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\CategorySubcategory;
use App\Models\Product;
use App\Models\Subcategory;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\RedirectResponse;

class ScrapingController extends Controller
{
    /**
     * @throws GuzzleException
     */
    public function __invoke(): void
    {
        self::scrapeMercadona();
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    private function scrapeMercadona(): RedirectResponse
    {
        try {
            $url = 'https://tienda.mercadona.es/api/categories/';

            $httpClient = new Client();
            $response = $httpClient->get($url);
            $content = $response->getBody()->getContents();
            $data = json_decode($content, true);
            $brand = Brand::firstOrCreate([
                'name' => 'Mercadona',
                'slug' => self::nameToSlug('Mercadona'),
            ]);

            if (empty($data)) {
                throw new Exception('No data found for Mercadona');
            }

            $families = $data['results'];
            foreach ($families as $family) {
                $categories = $family['categories'];
                foreach ($categories as $category) {
                    // Register category on BBDD
                    $categoryId = $category['id'];
                    $category = json_decode($httpClient->get($url.$categoryId)->getBody()->getContents(), true);
                    $categoryName = $category['name'];
                    $subcategories = $category['categories'];

                    $category = Category::firstOrCreate([
                        'name' => $categoryName,
                        'slug' => self::nameToSlug($categoryName),
                    ]);

                    // Register subcategory on BBDD and relate with category
                    foreach ($subcategories as $subcategory) {
                        $subcategoryName = $subcategory['name'];
                        $products = $subcategory['products'];

                        $subcategory = Subcategory::firstOrCreate([
                            'name' => $subcategoryName,
                            'slug' => self::nameToSlug($subcategoryName),
                        ]);

                        CategorySubcategory::firstOrCreate([
                            'category_id' => $category->id,
                            'subcategory_id' => $subcategory->id,
                        ]);

                        foreach ($products as $product) {
                            $product = Product::updateOrCreate([
                                'name' => trim($product['display_name']),
                                'slug' => trim($product['slug']),
                            ], [
                                'packaging' => trim($product['packaging']),
                                'thumbnail' => trim($product['thumbnail']),
                                'unit_price' => floatval($product['price_instructions']['unit_price']),
                                'bulk_price' => floatval($product['price_instructions']['bulk_price']),
                                'tax_percentage' => floatval($product['price_instructions']['tax_percentage']),
                                'previous_unit_price' => floatval($product['price_instructions']['previous_unit_price']),
                                'reference_format' => trim($product['price_instructions']['reference_format']),
                            ]);

                            // Relacionar el producto con la categoría
                            $product->categories()->attach($category->id);
                            $product->save();
                        }
                    }
                }
            }

            return redirect()->route('dashboard');
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    private function nameToSlug($name)
    {
        // Remover caracteres especiales
        $name = preg_replace('/[^A-Za-z0-9\- ]/', '', $name);
        return str_replace(' ', '-', strtolower($name));
    }
}
