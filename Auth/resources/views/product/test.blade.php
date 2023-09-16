<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>User Details</title>
</head>
<body>
    <h1>User Details</h1>
    
    <p>Name: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>

 

    ****
      
    
    <h2>User Address</h2>
    <p>Address Line 1: {{ $user->address->address_line_1 }}</p>
    <p>City: {{ $user->address->city }}</p>
    <p>Post Code: {{ $user->address->post_code }}</p>
    <p>State: {{ $user->address->state }}</p>
    
    <h2>User Products</h2>
    <ul>
        @foreach ($user->products as $product)
            <li>
                {{ $product->product_name }} - {{ $product->brand }}
            </li>
        @endforeach
    </ul>

    <hr>


    <h5>Orders</h5>
    <table class=" table">
        <thead>
            <tr>
                <td>OrderId:</td>
                <td>Price</td>
                <td>Statud:</td>
                <td>Placed at</td>
              
            </tr>
        </thead>
        
         <tbody>
         @foreach($user->orders as $order)
            <tr>
                <td>{{$order->product_id}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->status_text}}</td>
                <td>{{$order->created_at}}</td>

            </tr>
            @endforeach
         </tbody>
    </table>













 
    
</body>

</html>
