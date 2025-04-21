<x-layouts.app :title="__('Products')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl ">
        <h1>Our Products</h1>
                @livewire('shop.products')
    </div>
</x-layouts.app>
