<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Karlotbl Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Edit Record</h1>

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('karlotbl.update', $record->id) }}" method="POST">
            @csrf <!-- Laravel CSRF protection -->
            @method('PUT') <!-- Specify that this is a PUT request -->
            <div class="form-group">
                <label for="id">Emplid</label>
                <input type="text" name="id" id="id" class="form-control" value="{{ old('id', $record->id) }}" required>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $record->name) }}" required>
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" name="age" id="age" class="form-control" value="{{ old('age', $record->age) }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $record->email) }}" required>
            </div>
            <div class="form-group">
                <label for="motto">Motto</label>
                <textarea name="motto" id="motto" class="form-control" required>{{ old('motto', $record->motto) }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Record</button>
        </form>

        <div class="mt-3 text-center">
            <a href="{{ route('karlotbl.index') }}" class="btn btn-secondary">Back to Records</a>
        </div>
    </div>
</body>
</html>
