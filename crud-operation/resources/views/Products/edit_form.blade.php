<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- resources/edit_form.blade.php -->
<form action="/resource/update/{{ $record->id }}" method="POST">
    @csrf
    @method('PATCH')

    <!-- Input field for updating 'name' -->
    <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" id="name" name="name" value="{{ $record->name }}" class="form-control" required>
    </div>

    <!-- Input field for updating 'address' -->
    <div class="mb-3">
        <label for="address" class="form-label">Address:</label>
        <input type="text" id="address" name="address" value="{{ $record->address }}" class="form-control" required>
    </div>

    <!-- Your other form fields for updating -->

    <button type="submit" class="btn btn-primary">Update</button>
</form>

</body>
</html>