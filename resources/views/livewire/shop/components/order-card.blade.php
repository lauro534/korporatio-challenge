<div x-data="{ hovered: false }" @mouseenter="hovered=true" @mouseleave="hovered=false"
    class="hover:border-gray-300 relative border dark:border-gray-700 dark:hover:border-gray-500 hover:-translate-y-2 rounded-[15px] rounded col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-3 hover:shadow-[0_15px_20px_rgba(0,0,0,0.3)] dark:hover:shadow-[0_10px_20px_rgba(255,255,255,0.2)] duration-150">
    @php
        $num = ($order->product->id * 2) % 3;
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
        <img src="{{ '/images/image' . $order->product->id%10 . '.jpg' }}" class="w-full aspect-[16/9] object-cover" />
        <div class="p-4">
            <div class="flex flex-wrap w-full gap-y-2">
                @foreach ($order->product->categories as $category)
                    <span
                        class="inline-flex items-center rounded-full bg-green-50 bg-transparent px-3 py-1 mx-1 text-xs font-medium text-green-500 ring-1">
                        {{ $category->name }}
                    </span>
                @endforeach
            </div>
            <p :class="hovered ? 'text-blue-700 dark:text-blue-500' : ''" class="text-[25px] font-bold mt-2">{{ $order->product->name }}</p>
            <p class="text-gray-600 dark:text-gray-300">High-performance laptop for professionals with stunning display and powerful
                processor.</p>
            <div class="flex justify-between mt-2">
                @php
                    $rating = ($order->product->id * 2)%5 + 1;
                @endphp
                <p class="text-[20px] font-bold">${{ $order->product->price }}</p>
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
            <div class="flex justify-center">
                <p><b>${{ number_format($count * $order->product->price, 2) }}</b></p>
            </div>

            <div class="flex justify-center space-x-2">
                <button type="button" wire:click="minuseOne"
                    class="px-3 py-1 bg-gray-200 rounded text-gray-700 hover:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed"
                    @disabled($count <= 1)>
                    −
                </button>

                <input type="number" value="{{ $count }}"
                    class="w-16 text-center border rounded px-2 py-1 text-gray-700 dark:text-gray-300 border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    min="1" />
                <button type="button" wire:click="pluseOne"
                    class="px-3 py-1 bg-gray-200 rounded text-gray-700 hover:bg-gray-300">
                    +
                </button>
            </div>

            <div class="flex justify-between">
                <button wire:click="updateOrder"
                    class="bg-red-500 text-white px-3 py-1 mt-2 rounded-lg disabled:bg-red-200 dark:disabled:bg-red-300 disabled:cursor-not-allowed cursor-pointer"
                    @disabled($count == $order->quantity)>
                    Save
                </button>

                <button wire:click="showConfirmModal"
                    class="bg-gray-500 text-white px-3 py-1 mt-2 rounded-lg hover:bg-gray-700 cursor-pointer">
                    Withdraw
                </button>
            </div>
        </div>
    </div>
</div>
