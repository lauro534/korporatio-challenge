<div>
    @if ($showModal)
        <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-gray-500/75 opacity-60 " aria-hidden="true">
            </div>
            <div
                class="fixed inset-0 z-10 overflow-y-auto flex items-end justify-center p-4 text-center sm:items-center sm:p-0 z-0">
                <div wire:click.away="hideModal"
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg z-10">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div>
                                <p>{{ $product['name'] }}</p>
                                <img class="sm:w-[200px] w-full" src="./macbook-pro.jpg" />
                                <div class="flex">
                                    @foreach ($product['categories'] as $index => $category)
                                        <span
                                            id="{{$index}}"
                                            class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 mx-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">{{ $category["name"] }}</span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-base font-semibold text-gray-900" id="modal-title">Order</h3>
                                <div class="mt-2">
                                    <div
                                        class="flex items-center rounded-md bg-white pl-3 my-2 outline outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                                        <div class="shrink-0 select-none text-base text-gray-500 sm:text-sm/6">
                                            Price $
                                        </div>
                                        <input type="text" disabled name="price" id="price"
                                            value="{{ $product['price'] }}"
                                            class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6"
                                            placeholder="0.00">
                                    </div>
                                    <div
                                        class="flex items-center rounded-md bg-white pl-3 outline outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                                        <div class="shrink-0 select-none text-base text-gray-500 sm:text-sm/6">
                                            Total
                                            Price $
                                        </div>
                                        <input type="text" disabled name="price" id="total-price"
                                            value="{{ $count * $product['price'] }}"
                                            class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6"
                                            placeholder="0.00">
                                    </div>
                                    <div class="shrink-0 select-none text-base text-gray-500 sm:text-sm/6">Count
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <button type="button" wire:click="minuseOne"
                                            class="px-3 py-1 bg-gray-200 rounded text-gray-700 hover:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed"
                                            :disabled="{{ $count <= 1 }}">
                                            −
                                        </button>
                                        <input type="number" value="{{ $count }}"
                                            class="w-16 text-center border rounded px-2 py-1 text-gray-700 border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                            min="1" />
                                        <button type="button" wire:click="plusOne"
                                            class="px-3 py-1 bg-gray-200 rounded text-gray-700 hover:bg-gray-300">
                                            +
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button type="button"
                            class="mt-3 mx-2 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto cursor-pointer"
                            wire:click="hideModal">Cancel</button>
                        <button type="button" wire:click="makeOrder({{ $count }}, {{ $product['id'] }})"
                            class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto cursor-pointer">Order</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
