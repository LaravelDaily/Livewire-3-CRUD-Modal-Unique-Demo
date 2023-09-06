<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;

class ProductForm extends ModalComponent
{
    public Forms\ProductForm $form;

    public function mount(Product $product = null): void
    {
        if (collect($product)->isNotEmpty()) {
            $this->form->setProduct($product);
        }
    }

    public function save(): void
    {
        $this->form->save();

        $this->closeModal();

        $this->dispatch('refresh-list');
    }

    public function render(): View
    {
        return view('livewire.product-form');
    }
}
