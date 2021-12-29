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
    <h2>Ubah Pelanggan</h2>
    <form method="POST" action="/pelanggan/{{ $pelanggan->id }}">
        @csrf
        @method('PUT')

        ID: {{ $pelanggan->id }} </br>
        Nama :<input type="text" name="nama" value="{{ $pelanggan->nama }}" /><br />
        Jenis Kelamin: <br />
        <input type="radio" id="l" name="kelamin" value="L" {{ $pelanggan->kelamin == "L" ? "checked" : "" }}>
        <label for="l">Laki-laki</label><br>
        <input type="radio" id="p" name="kelamin" value="P" {{ $pelanggan->kelamin == "P" ? "checked" : "" }}>
        <label for="p">Perempuan</label><br>
        No Telepon :<input type="text" name="phone" value="{{ $pelanggan->phone }}"/><br />
        Alamat :<textarea name="alamat">{{ $pelanggan->alamat }}</textarea><br />
        <input type="submit" name="Submit">

    </form>

</body>

</html>