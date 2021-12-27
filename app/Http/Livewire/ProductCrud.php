<?php

namespace App\Http\Livewire;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductCrud extends Component
{
    use WithFileUploads;
    public $products, $name_product, $price, $phone, $images, $new_images, $product_id;
    public $isModalOpen = 0;

    public function render()
    {
        $this->products = Product::all();
        return view('livewire.product-crud');
    }

    public function create()
    {
        $this->product_id = null;
        $this->resetCreateForm();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    private function resetCreateForm(){
        $this->name_product = '';
        $this->price = '';
        $this->phone = '';
        $this->images = '';
        $this->new_images = '';
    }
    
    public function store()
    {
        $this->validate([
            'name_product' => 'required',
            'price' => 'required',
            'phone' => 'required',
            'images' => 'required',
        ]);
        
        $filename = "";

        if ($this->product_id) {
            $images =Product::findOrFail($this->product_id);
            if ($images->images != $this->new_images && $this->new_images != null) {
                $destination=public_path('storage\\'.$images->images);
                if(File::exists($destination)){
                    File::delete($destination);
                }
                $filename = $this->new_images->store('posts', 'public');
            } else {
                $filename = $this->images;
            }
        } else {
            $filename = $this->images->store('posts', 'public');
        }
        
        Product::updateOrCreate(['id' => $this->product_id], [
            'name_product' => $this->name_product,
            'price' => $this->price,
            'phone' => $this->phone,
            'images' => $filename,
        ]);

        session()->flash('message', $this->product_id ? 'Data updated successfully.' : 'Data added successfully.');

        $this->closeModal();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->product_id = $id;
        $this->name_product = $product->name_product;
        $this->price = $product->price;
        $this->phone = $product->phone;
        $this->images = $product->images;
    
        $this->openModal();
    }
    
    public function delete($id)
    {
        $images=Product::findOrFail($id);
        $destination=public_path('storage\\'.$images->images);
        if(File::exists($destination)){
            File::delete($destination);
        }

        $images->delete();
        session()->flash('message', 'Data deleted successfully.');
    }
} 
