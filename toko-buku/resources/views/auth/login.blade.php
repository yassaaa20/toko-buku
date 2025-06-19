{{-- resources/views/auth/login.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - Yukisea</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">

  <div class="w-full max-w-lg bg-white rounded-2xl shadow-2xl p-10">
    <!-- Title -->
    <div class="text-center mb-8">
      <h1 class="text-4xl font-bold text-gray-800">Welcome Back</h1>
      <p class="text-gray-500">Log in to your Yukisea account</p>
    </div>

    <!-- Session Status -->
    @if (session('status'))
      <div class="mb-4 text-green-600 text-sm font-medium">
        {{ session('status') }}
      </div>
    @endif

    <!-- Form -->
    <form method="POST" action="{{ route('login') }}" class="space-y-6">
      @csrf

      <!-- Email -->
      <div>
        <label for="email" class="block text-base font-semibold text-gray-700 mb-1">Email address</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-base shadow-sm">
        @error('email')
          <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-base font-semibold text-gray-700 mb-1">Password</label>
        <input id="password" type="password" name="password" required autocomplete="current-password"
          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-base shadow-sm">
        @error('password')
          <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Remember + Forgot -->
      <div class="flex items-center justify-between">
        <label class="flex items-center text-sm text-gray-600">
          <input type="checkbox" name="remember" class="h-4 w-4 text-blue-600 border-gray-300 rounded">
          <span class="ml-2">Remember me</span>
        </label>
        @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">Forgot password?</a>
        @endif
      </div>

      <!-- Submit -->
      <div>
        <button type="submit"
          class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold text-lg py-3 rounded-lg shadow-md transition">
          Log In
        </button>
      </div>
    </form>

    <!-- Register -->
    <div class="mt-6 text-center text-sm text-gray-600">
      Don't have an account?
      <a href="{{ route('register') }}" class="text-blue-600 hover:underline font-medium">Sign up</a>
    </div>
  </div>

</body>
</html>
