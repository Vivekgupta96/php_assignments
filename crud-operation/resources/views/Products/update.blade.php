<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LARAVEL</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f4f4f4;
        }

        form {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
        nav {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            margin: 0 5px;
            display: inline-block;
        }

        nav a:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

<nav>
    <a href="/">Products</a>
  
</nav>
<div class="container">
    
  <h1>Products</h1> 
  <!-- resources/views/Products/edit.blade.php -->

<form action="{{ route('ravi.update', ['id' => $raviRecord->id]) }}" method="post">
    @csrf
    @method('PUT') <!-- This is important for Laravel to recognize it as a PUT request -->
    <!-- Your form fields for editing -->
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="{{ $raviRecord->name }}" required>

    <label for="address">Address:</label>
    <input type="text" id="address" name="address" value="{{ $raviRecord->address }}" required>

    <button type="submit">Update Data</button>
</form>

</div>

</body>
</html>
