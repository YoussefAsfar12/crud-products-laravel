@extends('layout.app')

@section('content')
<div class="container mt-4">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{$product['id']}}</td>
                    <td>{{$product['name']}}</td>
                    <td><img src="storage/{{$product['image']}}" width="50" alt="image" class="img-thumbnail"></td>
                    <td>{{$product['description']}}</td>
                    <td>
                        <a href="{{route('product.show', $product['id'])}}" class="btn btn-primary btn-sm">Details</a>
                        <a href="{{route('product.edit', $product['id'])}}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{route('product.destroy', $product['id'])}}" method="post" style="display: inline-block;">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
