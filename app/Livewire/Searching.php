<?php

// app/Http/Livewire/Searching.php
namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Piece;

class Searching extends Component
{use WithPagination;

    public $search = '';
    public $queryString = ['search'];

    public function render()
    {
        $pieces = Piece::when($this->search, function ($query) {
            $query->where('reference', 'like', '%'.$this->search.'%');
        })->paginate(10);

        return view('livewire.searching', [
            'pieces' => $pieces
        ]);
    }
    

    public function doSearch()
    {
        // The search is explicitly performed when this method is called.
        // This function could be empty if all logic is handled via rendering conditionally as above.
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}