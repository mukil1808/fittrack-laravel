<!DOCTYPE html>
<html>

<head>
    <title>Exercises - FitTrack</title>
</head>

<body>

    <h1>Exercises</h1>

    <a href="{{ route('exercises.create') }}">Add New Exercise</a>

    <br><br>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Muscle Group</th>
                <th>Difficulty</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($exercises as $exercise)
                <tr>
                    <td>{{ $exercise->id }}</td>
                    <td>{{ $exercise->name }}</td>
                    <td>{{ $exercise->description }}</td>
                    <td>{{ $exercise->muscle_group }}</td>
                    <td>{{ $exercise->difficulty }}</td>

                    <td>
                        <a href="{{ route('exercises.edit', $exercise->id) }}">
                            Edit
                        </a>

                        <form action="{{ route('exercises.destroy', $exercise->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                onclick="return confirm('Are you sure you want to delete this exercise?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
