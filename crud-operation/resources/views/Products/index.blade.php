<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LARAVEL</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        nav a:hover {
            background-color: #555;
        }
        .container {
            display: flex;
            justify-content: space-between;
       margin-top: 1rem;
        }

        .add-product-btn {
            background-color: #333;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            align-items: flex-end;
            text-decoration: none;
            margin: 1rem;
        }


        .add-product-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<nav>
    <a href="/">Products</a>
  
</nav>
<div class="container">
<a href="product/creates" class="add-product-btn">Add Product</a>

</div>

<div>
    <h1>Student List</h1>
 
        @if(count($vivekRecords) > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vivekRecords as $record)
                <tr>
                    <td>{{ $record->id }}</td>
                    <td>{{ $record->name }}</td>
                    <td>{{ $record->address }}</td>
                    <td>{{ $record->created_at }}</td>
                    <td>{{ $record->updated_at }}</td>
                    <td>
                        <!-- Edit and Delete buttons -->
                        <button class="btn btn-danger delete-product" data-id="{{ $record->id }}">
                            Edit
                        </button>
                        <button class="btn btn-danger delete-product" data-id="{{ $record->id }}">
                            Delete
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p>No data available.</p>
        @endif
        </tbody>
    </table>
</div>

</body>


<!-- ... -->
<script>
    $(document).ready(function () {
        // Attach click event handler to all elements with class 'delete-product'
        $(document).on("click", ".delete-product", function (event) {
            event.preventDefault();

            // Get the product ID from the data attribute
            var productId = $(this).data("id");

            // Get the CSRF token from the meta tag
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Save a reference to the clicked button for later use
            var deleteButton = $(this);

            // Make an AJAX request to delete the product
            $.ajax({
                // Correctly form the delete URL based on your Laravel route
                url: "/product/" + productId + "/destroy",
                method: "DELETE",
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Include the CSRF token in headers
                },
                dataType: "json",
                success: function (data) {
                    // Assuming your API response includes a success message
                    console.log(data.message);

                    // Remove the table row from the UI without refreshing
                    deleteButton.closest('tr').fadeOut('slow', function () {
                        $(this).remove();
                    });
                },
                error: function (error) {
                    console.error("Error deleting product: ", error);
                }
            });
        });
    });
</script>




</html>



