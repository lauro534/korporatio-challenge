<!-- resources/views/shop/index.blade.php -->
<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
            <h1>Our Products</h1>

            <div class="grid grid-cols-3 gap-4">
                @foreach($products as $product)
                    <div class="border p-4">
                        <h2>{{ $product->name }}</h2>
                        <p>${{ $product->price }}</p>
                        <a href="{{ route('product.show', $product->slug) }}">View</a>
                    </div>
                @endforeach
            </div>
    </div>
</x-layouts.app>
