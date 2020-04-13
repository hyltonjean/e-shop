@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <h5 class="card-header text-center"><b>Create a product</b></h5>

        <div class="card-body">
          <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="name"><b>Name</b></label>
              <input type="text" name="name" id="name" value="{{ old('name') }}"
                class="form-control @error('name') is-invalid @enderror">
              @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="price"><b>Price</b></label>
              <input type="text" name="price" id="price" value="{{ old('price') }}"
                class="form-control @error('price') is-invalid @enderror">
              @error('price')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="image"><b>Image</b></label>
              <input type="file" name="image" id="image"
                class="form-control h-auto @error('image') is-invalid @enderror">
              @error('image')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="description"><b>Description</b></label>
              <textarea name="description" id="description" cols="10" rows="10"
                class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
              @error('description')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group text-center">
              <button type="submit" class="btn btn-success w-100">Create product</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endsection