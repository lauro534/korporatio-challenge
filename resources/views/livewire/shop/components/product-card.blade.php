<div
    class="p-4 border rounded shadow col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-3 hover:shadow-xl duration-150">
    <h2 class="text-lg font-bold">{{ $product->name }}</h2>
    <img src="./macbook-pro.jpg" />
    <div class="flex">
        @foreach ($product->categories as $category)
            <span
                class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 mx-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">{{ $category->name }}</span>
        @endforeach
    </div>
    <div class="flex justify-between">
        <p>${{ $product->price }}</p>
        <p>{{ $product->created_at->format('F j, Y') }}</p>
    </div>
    <div class="flex justify-end">
        <button wire:click="addToCart({{ $product->id }})"
            class="bg-blue-500 hover:bg-blue-700 cursor-pointer text-white px-3 py-1 mt-2 rounded mr-0">
            Add to Cart
        </button>
    </div>
</div>
