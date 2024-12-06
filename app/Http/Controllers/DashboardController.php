<?php

namespace App\Http\Controllers;

use App\Models\Category;

class DashboardController extends BaseController
{
    public function __invoke(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $categories = Category::all()->sortBy('name');

        return view('dashboard', compact('categories'));
    }
}
