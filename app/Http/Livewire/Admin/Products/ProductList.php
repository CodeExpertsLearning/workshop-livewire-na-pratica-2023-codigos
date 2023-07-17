<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

//    protected $listeners = ['productDeleted' => '$refresh'];
    protected $listeners = ['productDeleted' => 'reactList'];

    public function reactList()
    {
        session()->flash('success', 'Produto removido com sucesso!');
    }

    public function render()
    {
        return view('livewire.admin.products.product-list',
            [
                'products' => Product::paginate(15)
            ]);
    }
}
