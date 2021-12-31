<!DOCTYPE html>
<html>

<head>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <h2>Daftar Pelanggan</h2>
    <form method="GET" action="/pelanggan">

    <input type="text" name="src" /> <br/>
    <input type="submit" value="Cari">

    </form>
    Kelamin : {{ $kelamin }}<br />
    <div><a href="{{ route('pelanggan.create') }}">Tambah Pelanggan</a></div>

    <table>
        <tr>
            <th>Aksi</th>
            <th>Nama</th>
            <th>Kelamin</th>
            <th>No Telepon</th>
            <th>Provinsi</th>
            <th>ALamat</th>
        </tr>
        @foreach($daftarPelanggan as $pelanggan)
        <tr>
            <td>
                <a href="/pelanggan/{{ $pelanggan["id"] }}">Lihat<a /> | <a href="/pelanggan/{{ $pelanggan["id"] }}/edit">Ubah<a /> |
                        <form method="POST" action="/pelanggan/{{ $pelanggan["id"] }}">
                            @csrf
                            @method('DELETE')<button type="submit">Hapus<button />
                        </form>
            </td>
            <td>{{ $pelanggan["nama"] }}</td>
            <td>
                {{ $pelanggan["kelamin"] == "L" ? "Laki-laki" : "Wanita" }}
            </td>
            <td>{{ $pelanggan["phone"] }}</td>
            <td>{{ $pelanggan["province_name"] }}</td>
            <td>{{ $pelanggan["alamat"] }}</td>
        </tr>
        @endforeach
        @if(count($daftarPelanggan) == 0)
        <tr>
            <td colspan="5">
                Tidak data pelanggan
            </td>
        </tr>
        @endif

    </table>

    {{ $daftarPelanggan->links() }}


</body>

</html>