<!DOCTYPE html>
<html>
<head>
    <title>Edit Exercise - FitTrack</title>
</head>
<body>

    <h1>Edit Exercise</h1>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('exercises.update', $exercise->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Exercise Name</label>
        <input type="text" name="name" value="{{ $exercise->name }}">

        <br><br>

        <label>Description</label>
        <textarea name="description">{{ $exercise->description }}</textarea>

        <br><br>

        <label>Muscle Group</label>
        <input type="text" name="muscle_group" value="{{ $exercise->muscle_group }}">

        <br><br>

        <label>Difficulty</label>
        <select name="difficulty">
            <option value="Beginner" {{ $exercise->difficulty == 'Beginner' ? 'selected' : '' }}>
                Beginner
            </option>

            <option value="Intermediate" {{ $exercise->difficulty == 'Intermediate' ? 'selected' : '' }}>
                Intermediate
            </option>

            <option value="Advanced" {{ $exercise->difficulty == 'Advanced' ? 'selected' : '' }}>
                Advanced
            </option>
        </select>

        <br><br>

        <button type="submit">Update Exercise</button>
    </form>

</body>
</html>
