@extends('layouts.app')

@section('main')
    <div class="container">
        <div class="text-right">
            <a href="products/create" class="btn btn-dark mt-2">New Products</a>
        </div>
        <table class="table table-hover mt-2">
            <thead>
                <tr>
                    <th>Sno.</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>
                        <a href="products/{{$product->id}}/show" class="text-dark">{{ $product->name }}</a>
                    </td>
                    <td>
                        <img src="products/{{$product->image}}" alt="" class="rounded-circle" width="50" height="50">
                    </td>
                    <td>
                        <a href="product/{{$product->id}}/edit" class="btn btn-dark btn-sm">Edit</a>
                        <!-- <a href="product/{{$product->id}}/delete" class="btn btn-danger btn-sm">Delete</a> -->
                         <form action="product/{{$product->id}}/delete" class="d-inline" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                         </form>
                    </td>
                </tr>
                @endforeach
       </table>
       {{$products->links()}}
    </div>
@endsection