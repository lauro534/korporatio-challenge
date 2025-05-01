<div>
    <div class="rounded-lg shadow-[0_0_20px_rgba(0,0,0,0.2)] dark:shadow-[0_0_20px_rgba(255,255,255,0.2)] p-4 my-6 w-[350px]">
        <div class="grid grid-cols-3 gap-2">
            <div class="text-center">
                <p class="text-sm mb-1">Products</p>
                <p class="text-gray-800 dark:text-gray-200 font-semibold text-2xl">{{count($orders)}}</p>
            </div>
            <div class="text-center border-x border-gray-100">
                <p class="text-sm mb-1">Items</p>
                <p class="text-gray-800 dark:text-gray-200 font-semibold text-2xl">{{$orders->sum('quantity')}}</p>
            </div>
            <div class="text-center">
                <p class="text-sm mb-1">Total</p>
                <p class="text-gray-800 dark:text-gray-200 font-semibold text-2xl">${{$orders->sum(fn($order) => $order->product->price * $order->quantity)}}</p>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-12 gap-4">
        @foreach ($orders as $order)
            {{-- Order Card --}}
            <livewire:shop.components.order-card :order="$order" :wire:key="$order->id" />
        @endforeach
        {{-- Modal --}}
        <livewire:shop.components.confirm-modal />
        {{-- Notification --}}
        <livewire:shop.components.notification />
    </div>
</div>
