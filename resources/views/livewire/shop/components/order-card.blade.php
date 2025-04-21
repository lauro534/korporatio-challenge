<div
    class="p-4 border rounded shadow col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-3 hover:shadow-xl duration-150">
    <h2 class="text-lg font-bold">{{ $order->product->name }}</h2>

    <img src="./macbook-pro.jpg" alt="Product Image" />

    <div class="flex">
        @foreach ($order->product->categories as $category)
            <span
                class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 mx-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">
                {{ $category->name }}
            </span>
        @endforeach
    </div>

    <div class="flex justify-between">
        <p>Each: <b>${{ number_format($order->product->price, 2) }}</b></p>
        <p>Total: <b>${{ number_format($count * $order->product->price, 2) }}</b></p>
    </div>

    <div class="flex justify-center space-x-2">
        <button type="button" wire:click="minuseOne"
            class="px-3 py-1 bg-gray-200 rounded text-gray-700 hover:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed"
            @disabled( $count <= 1)>
            −
        </button>

        <input type="number" value="{{ $count }}"
            class="w-16 text-center border rounded px-2 py-1 text-gray-700 border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500"
            min="1" readonly />

        <button type="button" wire:click="pluseOne"
            class="px-3 py-1 bg-gray-200 rounded text-gray-700 hover:bg-gray-300">
            +
        </button>
    </div>

    <div class="flex justify-between">
        <button wire:click="updateOrder"
            class="bg-red-500 text-white px-3 py-1 mt-2 rounded disabled:bg-red-200 disabled:cursor-not-allowed cursor-pointer"
            @disabled($count == $order->quantity)>
            Save
        </button>

        <button wire:click="showConfirmModal"
            class="bg-gray-500 text-white px-3 py-1 mt-2 rounded hover:bg-gray-700 cursor-pointer">
            Withdraw
        </button>
    </div>
</div>
