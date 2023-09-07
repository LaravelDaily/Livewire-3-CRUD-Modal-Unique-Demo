<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use Livewire\Form;
use Illuminate\Validation\Rule;

class ProductForm extends Form
{
    public ?Product $product = null;

    public string $name = '';
    public string $description = '';

    public function setProduct(?Product $product = null): void
    {
        $this->product = $product;
        $this->name = $product->name;
        $this->description = $product->description;
    }

    public function save(): void
    {
        $this->validate();

        Product::updateOrCreate(['name' => $this->name], [
            'description' => $this->description,
        ]);

        $this->reset();
    }

    public function update(): void {}

    public function rules(): array
    {
        return [
            'name'        => [
                'required',
                Rule::unique('products', 'name')->ignore($this->component->product)
            ],
            'description' => ['required']
        ];
    }

    public function validationAttributes(): array
    {
        return [
            'name' => 'name',
            'description' => 'description',
        ];
    }
}
