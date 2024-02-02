@extends('layout.app')

@section('content')
<div class="container mt-4">
    <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control">
        </div>
        @error('name')
            <p>{{$message}}</p>
        @enderror
        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea name="description" class="form-control" rows="5">{{ $product->description }}</textarea>
        </div>
        @error('description')
            <p>{{$message}}</p>
        @enderror
        <div class="mb-3">
            <label for="image" class="form-label">Image:</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>
@endsection
