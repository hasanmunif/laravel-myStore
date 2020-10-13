@extends('layouts.app')

@section('content')
  <div class="row align-items-center justify-content-center h-100">
    <div class="col-8">
      <div class="card mt-md-3">
        <div class="card-header">
          <div class="row">
            <div class="col text-left">Update Product</div>
            <div class="col text-right">
            <a href="{{ url('/product') }}" class="btn btn-xs btn-dark">
              <i class="fa fa-arrow-circle-left"></i> Back  
            </a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <form action="/product/update" method="post">
          @csrf
          @method('patch')
          <input type="hidden" name="id" value="{{ $data->id }}">
          <div class="form-group">
            <label for="#">Product</label>
            <input type="text" name="product_title" class="form-control" placeholder="Nama Product" value="{{ $data->product_title }}" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="#">Image</label>
            <input type="text" name="product_image" class="form-control" placeholder="Image" value="{{ $data->product_image }}" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="#">Price</label>
            <input type="text" name="product_price" class="form-control" placeholder="Price" value="{{ number_format($data->product_price,2,',','.') }}" autocomplete="off">
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