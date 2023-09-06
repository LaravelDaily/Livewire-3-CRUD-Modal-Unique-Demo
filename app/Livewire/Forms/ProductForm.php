<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use Livewire\Attributes\Rule;
use Livewire\Form;

class ProductForm extends Form
{
    public ?Product $product;

    #[Rule('required')]
    public string $name = '';
    #[Rule('required')]
    public string $description = '';

    public function setProduct(Product $product): void
    {
        $this->product = $product;
        $this->name = $product->name;
        $this->description = $product->description;
    }

    public function save(): void
    {
        $this->validate();

        if (empty($this->product)) {
            Product::create($this->only(['name', 'description']));
        } else {
            $this->product->update($this->only(['name', 'description']));
        }

        $this->reset();
    }

    public function update(): void
    {
    }
}
