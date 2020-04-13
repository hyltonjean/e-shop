@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header"><b>Products</b>
          <span><a href="{{ route('products.create') }}" class="btn btn-sm btn-success float-right">Create a
              product</a></span>
        </div>

        <div class="card-body">
          <table class="table">
            <thead>
              <th>Name</th>
              <th>Price</th>
              <th>Edit</th>
              <th>Delete</th>
            </thead>
            <tbody>
              @foreach ($products as $product)
              <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>
                  <a href="{{ route('products.edit', $product->slug) }}" class="btn btn-sm btn-info text-white">Edit</a>
                </td>
                <td>
                  <form action="{{ route('products.destroy', $product->slug) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection