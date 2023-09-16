<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />

    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>


    <!-- Ajax -->

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js" integrity="sha512-bztGAvCE/3+a1Oh0gUro7BHukf6v7zpzrAb3ReWAVrt+bVNNphcl2tDTKCBr5zk7iEDmQ2Bv401fX3jeVXGIcA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->





    @extends('product.layout')
    @include('sweetalert::alert')

    @section('content')
 


    <li class="navbar navbar-inverse navbar-fixed-top">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>

    <!-- (name ) -->


   
    <br><br><br>
    <div class="row">
        <div class="col-lg-12 margin-tab">

            <div class="card-body">
            <div class="row justify-content-center">

                <div class="">
                <!-- class="row justify-content-center" -->
                    <h2>Laravel Product List</h2>
                    <a class="btn btn-danger" href="{{route('export') }}" >export</a>
                        <a class="btn btn-success"  href="{{route('import') }}"  >import</a>
                        <a class="btn btn-success"  href="{{route('view') }}"  >view</a>
                        <!-- $productId = 123;
$url = route('product.view', ['id' => $productId]); -->
                        <a class="btn btn-success" href="{{route('create.product') }}">Create new Products </a>
                        

</button>
                   

                </div>
                <!-- <div class="pull-right">
            <a class="btn btn-success" href="{{route('create.product') }}">Create new Products </a>

        </div> -->

            </div>

        </div>

        @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }} </p>
        </div>
        @endif


        <!-- @if(Session::has('error'))
<div class="alert alert-danger">
  {{ Session::get('error')}}
</div>
@endif -->





        <!-- <div class="pull-right">
            <a class="btn btn-success" href="{{route('create.product') }}">Create new Products </a>

        </div> -->

        <table class="table table-bordered " " id="dataTable">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>.Product Code.</th>
                    <th>.Product Detail</th>
                    <th width="100px">Product Logo</th>

                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($product as $pro)
                <tr>
                    <td>{{ $pro->product_name }}</td>
                    <td> {{ $pro->product_code }}</td>
                    <td> {{ $pro->details }}</td>
                    <td><img src="{{URL::to($pro->logo) }}" height="70px" width="70px"> </td>
                    <td>
                        <a class="btn btn-danger" onclick="openSwal('{{$pro->id}}')">Delete</a>
                        <a class="btn btn-primary" onclick="editProduct('{{$pro->id}}')">Edit</a>
                        <!-- <a class="btn btn-success" href="{{route('create.product') }}">Create new Products </a> -->
          
                        <!-- <a class="btn btn-danger" href="{{route('export') }}" >export</a>
                        <a class="btn btn-danger"  href="{{route('import') }}"  >import</a> -->
                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModalCenter">
 Add Products
</button>
                        
        </button>
                        
                        

                    </td>


                    <!-- <td>...</td> -->
                </tr>
                @endforeach
              
            </tbody>
        </table>

        </div>

        @endsection




 



        <!-- edit -->




        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade mt-5" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('product.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Product Name:</strong>
                                        <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Product Name">

                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Product Code:</strong>
                                        <input type="text" name="product_code" id="product_code" class="form-control" placeholder="Product Code">

                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Details:</strong>
                                        <textarea class="form-control" name="details" id="details" style="height: 150px;" placeholder="Details">Details</textarea>

                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Product Images:</strong>
                                        <input type="file" name="logo">

                                    </div>
                                </div>


                                <input type="hidden" name="id" id="id">





                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-primary" onclick="updateProduct()">Submit</button>

                                </div>




                            </div>



                            </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    </div>
                </div>
            </div>
        </div>




        

<!-- Button trigger modal -->
<!-- <button type="button" class="btn col text-center" data-toggle="modal" data-target="#exampleModalCenter">
 Add Products
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Product Name:</strong>
                    <input type="text" name="product_name" class="form-control" placeholder="Product Name">

                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Product Code:</strong>
                    <input type="text" name="product_code" class="form-control" placeholder="Product Code">
                    
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Details:</strong>
                    <textarea class="form-control" name="details" style="height: 150px;" placeholder="Details">Details</textarea>
                    
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
       


      

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" >Save changes</button>
      </div>
    </div>
  </div>
</div>





        <!-- zzzzzzzzzzzzzz -->


        <!-- swal({
        title: title,
        text: message,
        type: 'warning',
        showCancelButton: true
    }).then((confirmed) => {
        callback(confirmed && confirmed.value == true);
    }); -->






        <script>

            // Delete SweetAlert
            function openSwal(id) {
                swal({
                    title: "Delete!",
                    text: "are you sure",
                    type: "warning",
                    showCancelButton: true,
                    showConfirmButton: true
                }).then(function(e) {
                    
                    console.log(e)
                    if (e) {
                       
                        console.log(e)
                        // zzz ajax
                        $.ajax({
                            url: "/delete/product/" +id,
                            type: "get",
                            success: function(result) {
                                location.reload();
                            },
                    error: function() {
                        alert("something went wrong")
                    }
                        });

                    }
                })
            }

            // DataTable
            $(document).ready(function() {
                $('#dataTable').DataTable();
            });

            // Modal Edit

            let table = new DataTable('#myTable');

            function editProduct(id) {
                $.ajax({
                    url: "/edit/product/" + id,
                    type: "get",
                    success: function(result) {
                        $.each(result, function(i, j) {
                            $('#' + i).val(j)
                            console.log(i, j)
                        })
                        $('#editProductModal').modal('show');
                    },
                    error: function() {
                        alert("something went wrong")
                    }
                })


            }
        </script>

<!-- <td><img src="{{URL::to($pro->logo) }}" height="70px" width="70px"> </td>
@foreach($product as $pro)
<h1>Image Grid</h1>
    
    <div class="image-grid">
    
            <img class="image" src="{{URL::to($pro->logo) }}" alt="Image">
       
    </div>

    @endforeach -->


<!-- 
    <div class="row">
    @foreach($product as $pro)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="{{URL::to($pro->logo) }}" alt="Image">
                        <div class="card-body">
                            <p class="card-text">Image description</p>
                            <td> {{ $pro->details }}</td>
                           
                            </div>
                    </div>
                </div>
            @endforeach
        </div>  -->




</body>

</html>