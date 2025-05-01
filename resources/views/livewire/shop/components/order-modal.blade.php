<div>
    @if ($showModal)
        <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-gray-500/75 dark:bg-zinc-900 opacity-80 transition-opacity duration-300"
                aria-hidden="true">
            </div>
            <div
                class="fixed inset-0 z-10 overflow-y-auto flex items-end justify-center p-4 text-center sm:items-center sm:p-0 z-0">
                <div wire:click.away="hideModal"
                    class="shadow-[0_15px_35px_rgba(0,0,0,0.6)] relative transform overflow-hidden rounded-lg bg-white dark:bg-zinc-600 text-left transition-all sm:my-8 sm:w-full sm:max-w-lg z-10">
                    <div class="px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div>
                                <p>{{ $product['name'] }}</p>
                                <img class="w-full aspect-[16/9] object-cover"
                                    src="{{ '/images/image' . $product['id'] % 10 . '.jpg' }}" />
                                <div class="block w-[220px] mt-2">
                                    @foreach (array_slice($product['categories'], 0, 2) as $item)
                                        <span
                                            class="inline-flex items-center rounded-full bg-green-50 bg-transparent px-2 py-1 mx-1 text-xs font-medium text-green-500 ring-1 ring-inset ring-green-500/20">
                                            {{ $item['name'] }}
                                        </span>
                                    @endforeach

                                    @if (count($product['categories']) > 2)
                                        <span
                                            class="text-xs text-gray-400 dark:text-gray-300">+{{ count($product['categories']) - 2 }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-base font-semibold" id="modal-title">Order</h3>
                                <div class="mt-2">
                                    <div
                                        class="flex items-center rounded-md pl-3 my-2 outline outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                                        <div class="shrink-0 select-none text-base sm:text-sm/6">
                                            Price $
                                        </div>
                                        <input type="text" disabled name="price" id="price"
                                            value="{{ $product['price'] }}"
                                            class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 dark:text-gray-400 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6"
                                            placeholder="0.00">
                                    </div>
                                    <div
                                        class="flex items-center rounded-md pl-3 outline outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                                        <div class="shrink-0 select-none text-base sm:text-sm/6">
                                            Total
                                            Price $
                                        </div>
                                        <input type="text" disabled name="price" id="total-price"
                                            value="{{ $count * $product['price'] }}"
                                            class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 dark:text-gray-400 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6"
                                            placeholder="0.00">
                                    </div>
                                    <div class="shrink-0 select-none text-base font-bold sm:text-sm/6 mt-2">Count
                                    </div>
                                    <div class="justify-items-center sm:justify-items-start">
                                        <div class="flex items-center space-x-2">
                                            <button type="button" wire:click="minuseOne"
                                                class="px-3 py-1 bg-gray-200 rounded text-gray-700 hover:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed"
                                                :disabled="{{ $count <= 1 }}">
                                                −
                                            </button>
                                            <input type="number" value="{{ $count }}"
                                                class="w-16 text-center border rounded px-2 py-1 text-gray-700 dark:text-gray-400 border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500"
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
                    </div>
                    <div class="bg-gray-50 dark:bg-zinc-500 px-4 py-3 sm:flex sm:px-6 sm:justify-end">
                        <button type="button" wire:click="makeOrder({{ $count }}, {{ $product['id'] }})"
                            class="mx-0 sm:mx-2 inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto cursor-pointer">Order</button>
                        <button type="button"
                            class="mt-2 sm:mt-0 inline-flex w-full justify-center rounded-md px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto cursor-pointer"
                            wire:click="hideModal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
