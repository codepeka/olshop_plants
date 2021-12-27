<x-slot name="header">
    <h2 class="text-center">Tutorial CRUD Laravel dengan Jetstream Livewire</h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
            @endif
            <button wire:click="create()" class="btn btn-primary text-white font-bold py-2 px-4 rounded my-3">Create Products</button>
            @if($isModalOpen)
            @include('livewire.productModal')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">Kode</th>
                        <th class="px-4 py-2">Name Product</th>
                        <th class="px-4 py-2">Price</th>
                        <th class="px-4 py-2">Images</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td class="border px-4 py-2">{{ $product->id }}</td>
                        <td class="border px-4 py-2">{{ $product->name_product }}</td>
                        <td class="border px-4 py-2">{{ $product->price}}</td>
                        <td class="border px-4 py-2">
                            <img src="{{ asset('storage') }}/{{$product->images}}" style="width: 40px;height:40px;" alt="">
                        </td>
                        <td class="border px-4 py-2 text-center" width="250px">
                            <button wire:click="edit({{ $product->id }})"
                                class="btn btn-warning  text-white font-bold py-2 px-4 rounded">Edit</button>
                            <button wire:click="delete({{ $product->id }})"
                                class="btn btn-danger hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>