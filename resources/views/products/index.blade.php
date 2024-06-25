<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gadget List - Gadget Hub</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #1e1e1e;
            color: #e0e0e0;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            background-color: #2e2e2e;
            padding: 30px;
            margin: 20px auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.5);
        }
        h1 {
            text-align: center;
            color: #ffffff;
        }
        .success {
            background-color: #4CAF50;
            color: #ffffff;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #333333;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #333333;
            color: #ffffff;
            font-weight: bold;
        }
        td {
            background-color: #444444;
            color: #e0e0e0;
        }
        a {
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
        .btn-edit {
            background-color: #007bff;
            color: #ffffff;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
        }
        .btn-delete {
            background-color: #dc3545;
            color: #ffffff;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gadget List</h1>
        <div>
            @if(session()->has('success'))
                <div class="success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div style="margin-bottom: 10px;">
            <a href="{{ route('product.create') }}" class="btn-edit">Create a Product</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->qty }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <a href="{{ route('product.edit', ['product' => $product]) }}" class="btn-edit">Edit</a>
                        </td>
                        <td>
                            <form method="post" action="{{ route('product.destroy', ['product' => $product]) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn-delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
