<!DOCTYPE html>
<html>
<head>
    <title>Product Back in Stock</title>
    <style>
        .card {
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .card img {
            width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        .card h1 {
            font-size: 18px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Product {{ $details['name'] }} is back in stock</h1>
        <img src="{{ $message->embed(public_path('images/' . $details['file_path'])) }}" alt="Product Image">
    </div>
</body>
</html>
