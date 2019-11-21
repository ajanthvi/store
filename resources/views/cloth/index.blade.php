@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row clearfix ">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createModal">Add clothes</button>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12" id="clothesTable">
            @component('cloth.table')
                @slot('clothes', $clothes)
            @endcomponent
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Add Clothes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="createClothesForm">
                    {{ csrf_field()}}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                    </div>

                    <div class="form-group">
                        <label for="name">Short Description</label>
                        <input type="text" class="form-control" id="shortDescription" name="short_description" placeholder="Short Description">
                    </div>
                    <div class="form-group">
                        <label for="product_code">Product Code</label>
                        <input type="text" class="form-control" id="productCode" name="product_code" placeholder="Product code">
                    </div>

                    <div class="form-group">
                        <label for="cost">Cost</label>
                        <input type="text" class="form-control" id="cost" name="cost" placeholder="Cost">
                    </div>

                    <div class="form-group">
                        <label for="brand">Brand</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="brand_id">
                            @foreach($brands as $brand)
                                <option value="{{$brand->brandId}}">{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="color">Color</label>
                        <input type="text" class="form-control" id="color" name="color" placeholder="Color">
                    </div>

                    <div class="form-group">
                        <label for="size">Size</label>
                        <input type="text" class="form-control" id="size" name="size" placeholder="Size">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="createClothButton">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-js')
    <script src="{{asset('js/clothes.js')}}"></script>
@endsection
