<?php

namespace App\Livewire\Shop\Components;

use Livewire\Component;

class SortBar extends Component
{
    public $open = false;
    public $selected = "Sort";
    public $options = ['Price: High to Low', 'Price: Low to High', 'Name: A to Z', 'Name: Z to A', 'Newest', 'Latest'];

    public function toggleDropdown() {
        $this->open = !$this->open;
    }
    
    public function handleSort($option) {
        $this->selected = $option;
        $this->open = false;
        $this->dispatch('sort', $option);
    }

    public function render() {
        return view('livewire.shop.components.sort-bar');
    }
}
