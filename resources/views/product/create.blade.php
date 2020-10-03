@extends('layouts.app')

@section('content')
  <div class="row align-items-center justify-content-center h-100">
    <div class="col-12">
      <div class="card mt-md-3">
        <div class="card-header">
          <div class="row">
            <div class="col text-left">Create Product</div>
            <div class="col text-right">
            <a href="/product" class="btn btn-xs btn-dark">
              <i class="fa fa-backspace"></i> Back  
            </a>
          </div>
        </div>
      </div>
        <div class="card-body">
          <form action="{{ route('product.store') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="#">Product</label>
              <input type="text" name="product_title" class="form-control" placeholder="Nama Product" value="{{ $product->product_title }}" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="#">Slug</label>
              <input type="text" name="product_slug" class="form-control" placeholder="Nama Merk" value="{{ $product->product_slug }}" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="#">Image</label>
              <input type="text" name="product_image" class="form-control" placeholder="Gambar" value="{{ $product->product_image }}" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="#">Price</label>
              <input type="text" name="product_price" class="form-control" placeholder="Harga" value="{{ $product->product_price }}" autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
          </form>                    
        </div>
      </div>
    </div>
  </div>
@endsection