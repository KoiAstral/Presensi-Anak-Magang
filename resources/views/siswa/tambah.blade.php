<form method="POST" action="{{route('siswa.store')}}">
    @csrf
    NIS : <input type="text" name="nis" required>
    @error('nis') {{ $message }} @enderror
    <br />
    Nama Siswa : <input type="text" name="nama" required>
    <br />
    Jenis Kelamin :
    <select name="jenis_kelamin" required>
        <option value="">~Pilih~</option>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
    </select>
    <br />
    Tanggal Lahir : <input type="date" name="tanggal_lahir" required>
    <br /><br />
    <button type="submit">Simpan</button>
    <a href="{{ route('siswa.index') }}">Kembali</a>
</form>

