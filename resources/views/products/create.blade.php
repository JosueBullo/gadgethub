<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Gadget - Gadget Hub</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #1e1e1e;
            color: #e0e0e0;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
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
        label {
            font-weight: bold;
            color: #ffffff;
        }
        input[type="text"], input[type="number"], textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #333333;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: #333333;
            color: #e0e0e0;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .error {
            color: #ff7f7f;
            list-style-type: none;
            padding: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add New Gadget</h1>
        <div>
            @if($errors->any())
            <ul class="error">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <form method="post" action="{{ route('product.store') }}">
            @csrf
            @method('post')
            <div>
                <label for="name">Gadget Name</label>
                <input type="text" id="name" name="name" placeholder="Enter gadget name" required />
            </div>
            <div>
                <label for="qty">Quantity</label>
                <input type="number" id="qty" name="qty" placeholder="Enter quantity" required />
            </div>
            <div>
                <label for="price">Price</label>
                <input type="text" id="price" name="price" placeholder="Enter price" required />
            </div>
            <div>
                <label for="description">Description</label>
                <textarea id="description" name="description" placeholder="Enter description" required></textarea>
            </div>
            <div>
                <input type="submit" value="Add Gadget" />
            </div>
        </form>
    </div>
</body>
</html>
