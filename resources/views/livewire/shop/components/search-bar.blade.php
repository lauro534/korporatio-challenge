<div class="w-[50%]">
    <label class="block text-sm font-medium text-gray-700 mb-1">Search <span class="text-red-500">*</span></label>
    <div class="flex">
        <input type="text" wire:model.lazy="searchStr"
            class="px-2 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-lg"
            placeholder="Search...">
        <button class="bg-blue-500 hover:bg-blue-700 cursor-pointer text-white px-3 py-1 rounded mx-5"
            wire:click="search()">Search</button>
    </div>
</div>