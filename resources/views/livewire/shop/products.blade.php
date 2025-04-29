<div>
    <div class="grid grid-cols-12 gap-4 flex flex-row items-start">
        {{-- SearchBar --}}
        <div class="col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-2">
            <livewire:shop.components.search-bar />
        </div>
        <div class="col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-2">
            <livewire:shop.components.category-filter-bar />
        </div>
        <div class="col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-2">
            <livewire:shop.components.sort-bar />
        </div>        
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
