@extends('layouts.app')

@section('content')
<div class="row align-items-center justify-content-center h-100">
    <div class="col-8">
      <div class="card mt-md-3">
        <div class="card-header">
          <div class="row">
            <div class="col text-left">Create New Product</div>
            <div class="col text-right">
            <a href="/product" class="btn btn-xs btn-dark">
              <i class="fa fa-arrow-circle-left"></i> Back  
            </a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <form action="/product/simpan" method="post">
        @csrf
          <div class="form-group">
            <label for="#">Product</label>
            <input type="text" name="product_title" class="form-control" placeholder="Product Name" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="#">Image</label>
            <input type="text" name="product_image" class="form-control" placeholder="image" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="#">Price</label>
            <input type="text" name="product_price" class="form-control" placeholder="Price" autocomplete="off" required>
          </div>
          <button type="submit" class="btn btn-primary btn-block">
            <i class="fas fa-save"></i>
            Save
          </button>
        </form>                    
        </div>
      </div>
    </div>
  </div>
@endsection