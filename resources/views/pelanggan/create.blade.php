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
    <h2>Tambah Pelanggan</h2>
    <form method="POST" action="{{ route('pelanggan.store') }}">
        @csrf
        Nama :<input type="text" name="nama" /><br />
        Jenis Kelamin: <br/>
        <input type="radio" id="l" name="kelamin" value="L">
        <label for="l">Laki-laki</label><br>
        <input type="radio" id="p" name="kelamin" value="P">
        <label for="p">Perempuan</label><br>
        No Telepon :<input type="text" name="phone" /><br />
        Alamat :<textarea name="alamat"></textarea><br />
        <input type="submit" name="Submit">

    </form>

</body>

</html>