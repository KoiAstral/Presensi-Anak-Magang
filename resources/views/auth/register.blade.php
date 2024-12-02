<form method="POST" action="{{ route('register.proses') }}">
    @csrf
    <div>
        <label for="name">Nama</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}">
        @error('name')
            <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}">
        @error('email')
            <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="role">Role</label>
        <select id="role" name="role">
            <option value="admin">Admin</option>
            <option value="anak_magang">Anak Magang</option>
        </select>
        @error('role')
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
    <div>
        <label for="password_confirmation">Konfirmasi Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation">
    </div>
    <button type="submit">Register</button>
</form>
