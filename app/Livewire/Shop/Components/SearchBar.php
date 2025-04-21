<?php

namespace App\Livewire\Shop\Components;

use Livewire\Component;

class SearchBar extends Component
{
    public $searchStr = '';
    protected $listeners = ['search-clear'=>'searchClear'];

    public function search(){
        $this->dispatch('search', search: $this->searchStr);
    }
    
    public function searchClear(){
        $this->searchStr = '';
    }

    public function render()
    {
        return view('livewire.shop.components.search-bar');
    }
}
