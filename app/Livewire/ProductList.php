<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\On;
use Illuminate\Contracts\View\View;

class ProductList extends Component
{
    public function render(): View
    {
        return view('livewire.product-list', [
            'products' => Product::all(),
        ]);
    }

    #[On('refresh-list')]
    public function refresh() {}
}
