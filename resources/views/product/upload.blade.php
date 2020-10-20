@extends('layouts.app')

@section('content')
<div class="row align-items-center justify-content-center h-100">
  <div class="col-12 bg-white"></div>
  <div class="col-8 bg-white">
    <div class="card">
      <div class="card-header bg-primary">
        <div class="row">
          <div class="col text-left">
            <h4>Upload Product</h4>
          </div>
          <div class="col text-right">
            <a href="/product" class="btn btn-outline-dark">
            <i class="fa fa-arrow-circle-left"></i> Back
            </a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <form method="post" action="product/upload/data" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Upload File</label>
            <input type="file" class="form-control" name="file" id="file">
          </div>
          <input type="submit" value="Simpan Data" class="btn btn-primary float-right">
        </form>
      </div>
    </div>
  </div>
</div>
@endsection