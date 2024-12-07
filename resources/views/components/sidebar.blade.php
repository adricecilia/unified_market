<div class="w-80" style="height: calc(-76px + 100vh);">
    <ul class="text-left bg-dark">
        @foreach($categories as $category)
            <li class="outline-none">
                <button class="w-full p-0">
                    <span class="px-4 items-center flex">
                        <i class="fa-solid fa-caret-down text-white mr-1 -rotate-90"></i>
                        <label class="py-4 text-sm font-normal text-white border-b">{{ $category->name }}</label>
                    </span>
                </button>
                <ul class="hidden">
                    @foreach($category->subcategories as $subcategory)
                        <li class="pl-16 pr-4 text-sm font-normal text-white">
                            <button class="py-2 border-b border-white">{{ $subcategory->name }}</button>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</div>

<script>
    document.querySelectorAll('.outline-none').forEach(element => {
        element.addEventListener('click', () => {
            element.classList.toggle('open')
            element.querySelector('ul').classList.toggle('hidden')
            element.querySelector('i').classList.toggle('-rotate-90')
        })
    })
</script>
