<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
@extends('product.layout')
@include('sweetalert::alert')

@section('content')
<br><br><br>

<div class="row">
    <div class="col-lg-12 margin-tab">
        <div class="pull-left">
            <h2>Add New Product </h2>

        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{route('demo') }}">Back Button </a>

        </div>
        </div>

        <div>
       
        </div>

        <form action="{{route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Product Name:</strong>
                    <input type="text" name="product_name" class="form-control" placeholder="Product Name" value="{{ old('product_name') }}">
                    @error('product_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Product Code:</strong>
                   
                    <input type="text" name="product_code" class="form-control" placeholder="Product Code" value="{{ old('product_code') }}">
                    @error('product_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Details:</strong>
                    
                    <textarea class="form-control" name="details" style="height: 150px;" placeholder="Details" value="{{ old('details') }}"></textarea>
                    @error('product_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Brand:</strong>
                    <textarea class="form-control" name="brand" style="height: 150px;" placeholder="Brand" value="{{ old('brand') }}"></textarea>
                    
                    @error('product_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Images:</strong>
                    <input type="file" name="logo">

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
               <button type="submit" class="btn btn-primary">Submit</button>
                
            </div>




        </div>


     


@endsection

    
</body>
</html>