<a href="{{route('siswa.create')}}">Tambah Data</a>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($siswa as $d)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$d->nis}}</td>
            <td>{{$d->nama_siswa}}</td>
            <td>{{$d->jenis_kelamin}}</td>
            <td>{{$d->tanggal_lahir}}</td>
            <td>
                <form onsubmit="return confirm('Yakin hapus data?');" method="POST" action="{{ route('siswa.destroy', $d->id) }}">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('siswa.edit', $d->nis) }}">Edit</a>
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
