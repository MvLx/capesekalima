<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-md w-full relative">
        <h1 class="text-xl font-bold mb-4 text-center">Edit User</h1>
        <a href="{{ route('users.index') }}" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </a>

        <!-- Alert for success message -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
                <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M14.348 5.652a.5.5 0 00-.707 0L10 9.293 6.36 5.653a.5.5 0 00-.708.707l3.647 3.647-3.647 3.647a.5.5 0 00.707.707L10 10.707l3.64 3.64a.5.5 0 00.708-.707L10.707 10l3.641-3.641a.5.5 0 000-.707z"/>
                    </svg>
                </button>
            </div>
        @endif

        <form action="{{ route('users.update', $user) }}" method="POST" class="space-y-4">
            @csrf
            @method('PATCH')

            <div>
                <label for="username" class="block text-gray-700">Username:</label>
                <input type="text" id="username" name="username" class="w-full border border-gray-300 rounded-lg p-2" value="{{ old('username', $user->username) }}" required>
            </div>

            <div>
                <label for="email" class="block text-gray-700">Email:</label>
                <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded-lg p-2" value="{{ old('email', $user->email) }}" required>
            </div>

            <div>
                <label for="role" class="block text-gray-700">Role:</label>
                <select id="role" name="role" class="w-full border border-gray-300 rounded-lg p-2" required>
                    <option value="student" {{ $user->role == 'student' ? 'selected' : '' }}>Student</option>
                    <option value="teacher" {{ $user->role == 'teacher' ? 'selected' : '' }}>Teacher</option>
                </select>
            </div>

            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white rounded-lg p-2">Update User</button>
        </form>
    </div>
</body>
</html>
