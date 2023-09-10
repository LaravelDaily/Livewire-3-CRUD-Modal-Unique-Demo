<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;

class ProductModal extends ModalComponent
{
    public ?Product $product = null;
    public Forms\ProductForm $form;

    public function mount(Product $product = null): void
    {
        if ($product->exists) {
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
        return view('livewire.product-modal');
    }
}
