<!-- login.blade.php -->
<form method="POST" action="{{ route('login.proses') }}">
    @csrf
    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}">
        @error('email')
            <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
        @error('password')
            <p>{{ $message }}</p>
        @enderror
    </div>
    <button type="submit">Login</button>

    <!-- Link to Register Page -->
    <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
</form>
