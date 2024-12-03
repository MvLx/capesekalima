<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Discussions</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="container mx-auto bg-white p-6 rounded-lg shadow-lg max-w-3xl">
        <h1 class="text-3xl font-bold text-violet-700 mb-6">{{ $forum->topic }}</h1>

        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Discussions</h2>
        <ul class="space-y-4">
            @foreach ($forum->discussions as $discussion)
                <li class="p-4 bg-gray-50 rounded-lg shadow-md">
                    <div class="flex justify-between items-center">
                        <strong class="text-violet-500">{{ $discussion->user->username }}</strong>
                        <form action="{{ route('discussions.destroy', $discussion->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 text-sm">Delete</button>
                        </form>
                    </div>
                    <p class="text-gray-700 mt-2">{{ $discussion->message }}</p>
                </li>
            @endforeach
        </ul>

        <h3 class="text-xl font-semibold text-gray-800 mt-8">Add a Discussion</h3>
        <form action="{{ route('discussions.store', $forum->id) }}" method="POST" class="mt-4">
            @csrf
            <div>
                <textarea name="message" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-violet-500" placeholder="Write your message..." required></textarea>
            </div>
            <button type="submit" class="mt-4 bg-violet-500 hover:bg-violet-600 text-white font-medium py-2 px-4 rounded-lg">
                Post Discussion
            </button>
        </form>

        <a href="{{ route('courses.show', $forum->course_id) }}" class="mt-6 inline-block bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded-lg">
            Back to Course
        </a>
    </div>
</body>
</html>
