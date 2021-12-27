<div class="fixed inset-0 transition-opacity">
    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
</div>
<div class="modal fade show" id="staticBackdropLive" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" aria-modal="true" role="dialog" style="display: block;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">PRODUCTS</h5>
        <button class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="closeModal()"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
    		  <label for="name_product" class="form-label">Name Product</label>
    		  <x-jet-input type="text" class="form-control" id="name_product" wire:model="name_product" />
    		  @error('name_product') <span class="text-red-500">{{ $message }}</span>@enderror
    		</div>
    		<div class="mb-3">
    		  <label for="price" class="form-label">Price</label>
    		  <x-jet-input type="number" class="form-control" id="price" wire:model="price" />
    		  @error('price') <span class="text-red-500">{{ $message }}</span>@enderror
    		</div>
    		<div class="mb-3">
    		  <label for="phone" class="form-label">No Whatsapp</label>
    		  <x-jet-input type="number" class="form-control" id="phone" wire:model="phone"/>
    		  @error('phone') <span class="text-red-500">{{ $message }}</span>@enderror
    		</div>
        <div class="mb-3">
          <label for="images" class="form-label">Images</label>
          @if (!$product_id)
          <x-jet-input type="file" class="form-control mb-2" id="images" wire:model="images"/>
            @if ($images)
            <div class="d-flex">
              <img src="{{$images->temporaryUrl()}}" style="width: 100px;" alt="">
              <span class="text-primary ml-2 my-auto">Data telah diunggah.</span>
            </div>
            @endif
          @else
          <x-jet-input type="file" class="form-control mb-2" id="new_images" wire:model="new_images"/>
          <x-jet-input type="hidden" class="form-control" id="images" wire:model="images"/>
          <div class="d-flex">
            @if ($new_images)
            <img src="{{$new_images->temporaryUrl()}}" style="width: 100px;" alt="">
            @else
            <img src="{{ asset('storage') }}/{{$images}}" style="width: 100px;" alt="">
            @endif
            <span class="text-primary  ml-2 my-auto">Data telah diunggah.</span>
          </div>
          @endif
          @error('images') <span class="text-red-500">{{ $message }}</span>@enderror
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" wire:click="closeModal()" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-primary" wire:click.prevent="store()">Save changes</button>
      </div>
    </div>
  </div>
</div>