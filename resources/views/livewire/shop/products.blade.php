<div>
    <div class="md:flex">
        {{-- SearchBar --}}
        <livewire:shop.components.search-bar />
        <livewire:shop.components.category-filter-bar />
        <livewire:shop.components.sort-bar />
    </div>
    <br />
    <div class="grid grid-cols-12 gap-4">
        @foreach ($products as $product)
            {{-- Product Card --}}
            <livewire:shop.components.product-card :product="$product" :wire:key="$product->id" />
        @endforeach
        {{-- Order Input Modal --}}
        <livewire:shop.components.order-modal />
        {{-- Notification --}}
        <livewire:shop.components.notification />
    </div>
</div>
