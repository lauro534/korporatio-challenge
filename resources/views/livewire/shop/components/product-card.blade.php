<div x-data="{ hovered: false }" @mouseenter="hovered=true" @mouseleave="hovered=false"
    class="hover:border-gray-300 relative border dark:border-gray-700 dark:hover:border-gray-500 hover:-translate-y-2 rounded-[15px] rounded col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-3 hover:shadow-[0_15px_20px_rgba(0,0,0,0.3)] dark:hover:shadow-[0_10px_20px_rgba(255,255,255,0.2)] duration-150">
    @php
        $num = ($product->id * 2)%3;
    @endphp
    @if ($num == 1)
        <span
        class="absolute inline-flex items-center rounded-r-full bg-green-500 px-3 py-1 mt-4 text-sm font-medium text-white ring-1 ring-inset ring-green-600/20">Best
            Seller</span>
    @endif
    @if ($num == 2)
        <span
            class="absolute inline-flex items-center rounded-r-full bg-red-500 px-3 py-1 mt-4 text-sm font-medium text-white ring-1 ring-inset ring-red-600/20">New</span>
    @endif

    <div class="bg-gray-100 dark:bg-zinc-700 rounded-[15px] overflow-hidden">
        <img src="{{ '/images/image' . $product->id%10 . '.jpg' }}" class="w-full max-w-[600px] aspect-[16/9] object-cover">
        <div class="p-4">
            <div class="flex flex-wrap w-full gap-y-2">
                @foreach ($product->categories as $category)
                    <span
                        class="inline-flex items-center rounded-full bg-green-50 bg-transparent px-3 py-1 mx-1 text-xs font-medium text-green-500 ring-1">{{ $category->name }}</span>
                @endforeach
            </div>
            <p :class="hovered ? 'text-blue-700 dark:text-blue-500' : ''" class="text-[25px] font-bold mt-2">{{ $product->name }}</p>
            <p class="text-gray-600 dark:text-gray-300">High-performance laptop for professionals with stunning display and powerful
                processor.</p>
            <div class="flex justify-between mt-2">
                @php
                    $rating = ($product->id * 2)%5 + 1;
                @endphp
                <p class="text-[20px] font-bold">${{ $product->price }}</p>
                <div class="text-yellow-400 text-xl">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $rating)
                            ★
                        @else
                            ☆
                        @endif
                    @endfor
                </div>
            </div>
            <div class="flex justify-end">
                <button wire:click="addToCart({{ $product->id }})"
                    class="bg-blue-500 w-full hover:bg-blue-700 cursor-pointer text-white p-2 mt-2 rounded-lg mr-0">
                    Add to Cart
                </button>
            </div>
        </div>
    </div>
</div>
