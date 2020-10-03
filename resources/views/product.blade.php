@extends('layouts.app')

@section('content')
  <div class="card bg-info">
    <div class="card-header border-0">
      <h3 class="card-title">
        <i class="fas fa-th mr-1"></i>
        Laptop 
      </h3>
      <div class="card-tools">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
          <i class="fas fa-plus-circle"></i>
          Create new Data
        </button>
        <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <table class="table table-hover table-bordered">
        <tr class="bg-light">
          <th class="text-md-center">NO</th>
          <th class="text-md-center">Product</th>
          <th class="text-md-center">Slug</th>
          <th class="text-md-center">Image Name</th>
          <th width="280px" class="text-md-center">Action</th>
        </tr>
        @forelse ($product as $pr)
        <tr>
            <td class="text-md-center">{{ $loop->iteration }}</td>
            <td class="text-md-center">{{ $pr->product_title }}</td>
            <td class="text-md-center">{{ $pr->product_slug }}</td> 
            <td class="text-md-center">{{ $pr->product_image }}</td>
            <td class="text-md-center">
              <form action="{{ route('product.destroy', $pr->id) }}" method="post">
                @csrf
                @method('DELETE')
                <a href="{{ route('product.show', $pr->id) }}" class="btn btn-info">
                <i class="fas fa-info"></i></a>
                <a href="{{ route('product.edit', $pr->id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i></a>
                <button type="submit" class="btn btn-danger">
                <i class="fas fa-trash"></i></button>
              </form>
            </td>
        </tr>    
        @empty
          <tr>
            <td colspan="8" class="text-center">No Data</td>
          </tr>
        @endforelse
      </table>
    </div>
  </div>

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
