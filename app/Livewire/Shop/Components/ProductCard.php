<?php

namespace App\Livewire\Shop\Components;

use Livewire\Component;
use function Livewire\dispatch;

class ProductCard extends Component
{
    public $product;

    public function addToCart($product) {
        $this->dispatch('addToCart', product: $this->product);
    }

    public function mount($product) {
        $this->product = $product;
    }

    public function render() {
        return view('livewire.shop.components.product-card');
    }
}
