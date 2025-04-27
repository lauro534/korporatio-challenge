<?php

namespace App\Livewire\Shop\Components;

use Livewire\Component;
use function Livewire\dispatch;

class OrderModal extends Component
{
    public $showModal = false;
    public $product;
    public $count = 1;

    protected $listeners = ['showAddToCartModal' => 'showModal'];

    public function open($title, $content) {
        $this->modalTitle = $title;
        $this->modalContent = $content;
        $this->isOpen = true;
    }

    public function showModal($product) {
        $this->showModal = true;
        $this->product = $product;
        $this->count = 1;
    }

    public function makeOrder($count, $productId) {
        $this->dispatch('makeOrder', count: $count, productId: $productId);
        $this->hideModal();
    }
    
    public function hideModal() {
        $this->showModal = false;
    }
    
    public function minuseOne() {
        $this->count = max(1, $this->count - 1);
    }

    public function plusOne() {
        $this->count += 1;
    }
    
    public function close() {

    }

    public function render() {
        return view('livewire.shop.components.order-modal');
    }
}
