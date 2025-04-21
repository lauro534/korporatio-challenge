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
