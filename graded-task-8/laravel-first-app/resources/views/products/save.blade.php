@extends('layout')
@section('title', 'create product')

@section('content')
<div class="save-product">
    <h1>Create Product</h1>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control simulated" type="text" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input class="form-control simulated" type="text" name="price" id="price">
                    </div>
                    <div class="form-group">
                        <label for="description">Info</label>
                        <textarea class="form-control simulated" name="info" id="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="images">Iamges</label>
                        <input class="form-control" type="file" multiple name="images[]" id="images">
                    </div>
                    <button class="my-2 btn btn-primary" type="submit">Save</button>
                </form>
            </div>

            <div class="col-lg-6">
                <div class="simulation rounded-5">
                    <div class="images">
                    </div>
                    <div class="name">
                        <p>
                            <span>Name: </span>
                            <span related_to="name"></span>
                        </p>
                    </div>
                    <div class="price">
                        <p>
                            <span>Price: </span>
                            <span related_to="price"></span>
                        </p>
                    </div>
                    <div class="info">
                        <p>
                            <span>Info: </span>
                            <span related_to="info"></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
