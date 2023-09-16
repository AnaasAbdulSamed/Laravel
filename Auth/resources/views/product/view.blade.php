<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>

<thead>
                <tr>
                    <td>Product Name</td>
                    <td>.Product Code.</td>
                    <td>Product Detail</td>
                   
<!-- 
                    <th>Action</th> -->
                </td>
            </thead>
            </table>
            <tbody>
                @foreach($user->products as $pro)
                <tr>
                    <td>  {{$pro->product_code}}  </td>
                </tr>
                @endforeach
            </tbody>

    



</body>
</html>