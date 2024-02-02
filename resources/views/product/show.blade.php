@extends('layout.app')

@section("content")
<div class="container mt-4">
    <div class="card ">
        <img src="storage/{{ $product['image'] }}" class="card-img-top"  style="max-width: 200px;" alt="Product Image">
        <div class="card-body">
            <p class="card-text"><strong>ID:</strong> {{ $product['id'] }}</p>
            <h1 class="card-title">{{ $product['name'] }}</h1>
            <p class="card-text"><strong>Description:</strong> {{ $product['description'] }}</p>
        </div>
    </div>
</div>
@endsection
