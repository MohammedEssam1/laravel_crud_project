<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>availablity</th>
                <th>price</th>
                <th>category id</th>
                <th>admin id</th>
                <th>picture</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->product_availability }}</td>
                <td>{{ $product->product_price }}</td>
                <td>{{ $product->category_id }}</td>
                <td>{{ $product->admin_id }}</td>
                <td><img src="{{ asset('images/' . $product->product_picture) }}" alt="{{ $product->product_picture }}">
                </td>
            </tr>
        </tbody>
    </table>

</body>

</html>
