<?php

namespace App\Livewire\Shop\Components;

use Livewire\Component;
use App\Models\Category;

class CategoryFilterBar extends Component
{
    public $open = false;
    public $search = '';
    public $selected = [];
    public $categories = [];

    public function toggleDropdown() {
        $this->open = !$this->open;
    }

    public function toggleSelection($id) {
        if (in_array($id, $this->selected)) {
            $this->selected = array_values(array_filter($this->selected, function ($item) use ($id) {
                return $item !== $id;
            }));
        } else {
            $this->selected[] = $id;
        }
        $this->dispatch('filterByCategories', selected: $this->selected);
    }

    public function filtered() {
        return $this->categories->filter(function($c){
            return str_contains(strtolower($c->name), strtolower($this->search));
        });
    }
    
    public function filterByCategories() {
        $this->open = false;
        $this->dispatch('filterByCategories', selected: $this->selected);
    }

    public function isSelected($id) {
        return in_array($id, $this->selected);
    }

    public function mount() {
        $this->categories = Category::all();
    }
    
    public function render() {
        return view('livewire.shop.components.category-filter-bar');
    }
}
