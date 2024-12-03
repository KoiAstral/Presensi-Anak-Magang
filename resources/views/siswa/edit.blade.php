<form method="POST" action="{{route('siswa.update', $siswa->id)}}">
    @csrf
    @method('PUT')
    NIS :
    <input type="text" name="nis" readonly value="{{ old('nis', $siswa->nis) }}">
    @error('nis') {{ $message }} @enderror
    <br />
    Nama Siswa :
    <input type="text" name="nama" required value="{{ old('nama_siswa', $siswa->nama_siswa) }}">
    <br />
    Jenis Kelamin :
    <select name="jenis_kelamin" required>
        <option value="">~Pilih~</option>
        <option value="Laki-laki" {{ $siswa->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
        <option value="Perempuan" {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
    </select>
    <br />
    Tanggal Lahir :
    <input type="date" name="tanggal_lahir" required value="{{ old('tanggal_lahir', $siswa->tanggal_lahir) }}">
    <br /><br />
    <button type="submit">Simpan</button>
    <a href="{{ route('siswa.index') }}">Kembali</a>
</form>

