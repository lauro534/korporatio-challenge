<x-layouts.app :title="__('Orders')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl ">
        <h1>My Orders</h1>
                @livewire('shop.orders')
    </div>
</x-layouts.app>
