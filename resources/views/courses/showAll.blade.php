<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Courses</title>
</head>
<body>
    <h1>All Courses</h1>
    <ul>
        @foreach ($courses as $course)
            <li>
                <a href="{{ route('courses.show', $course->id) }}">
                    {{ $course->course_name }}
                </a> - {{ $course->description }}
            </li>
        @endforeach
    </ul>
</body>
</html>
