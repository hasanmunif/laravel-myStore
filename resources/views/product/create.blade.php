@extends('layouts.app')

@section('modal')
  <!-- modal -->
  <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('product.store') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="#">Product</label>
              <input type="text" name="product_title" class="form-control" placeholder="Product Name" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="#">Slug</label>
              <input type="text" name="product_slug" class="form-control" placeholder="Merk" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="#">Image</label>
              <input type="text" name="product_image" class="form-control" placeholder="Image" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="#">Price</label>
              <input type="text" name="product_price" class="form-control" placeholder="Price" autocomplete="off">
            </div>
              <button type="submit" class="btn btn-primary">Save</button>
          </form>     
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
  </div>
@endsection