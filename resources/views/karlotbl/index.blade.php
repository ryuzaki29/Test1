<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karlotbl Records</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 style="text-align: center;">KARLO RECORDS</h1>

        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Search Form -->
        <form action="{{ route('karlotbl.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by id, name, email, or motto" value="{{ request('search') }}">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>

        <div class="mt-3 text-center">
            <a href="{{ route('karlotbl.create') }}" class="btn btn-secondary">Add Records</a>
        </div>

        @if ($records->isEmpty())
            <p>No records found!</p>
        @else
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Emplid</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Email</th>
                        <th>Motto</th>
                        <th>Actions</th> <!-- Added Actions Column -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($records as $record)
                        <tr>
                            <td>{{ $record->id }}</td>
                            <td>{{ $record->name }}</td>
                            <td>{{ $record->age }}</td>
                            <td>{{ $record->email }}</td>
                            <td>{{ $record->motto }}</td>
                            <td>
                                <!-- Edit Button -->
                                <a href="{{ route('karlotbl.edit', $record->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <!-- Delete Button -->
                                <form action="{{ route('karlotbl.destroy', $record->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this record?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    
</body>
</html>
