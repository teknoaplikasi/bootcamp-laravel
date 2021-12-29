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
    <h2>Detail Pelanggan</h2>
    <p>Nama : {{ $pelanggan->nama }}</p><br />
    <p>Kelamin : {{ $pelanggan->kelamin == "L" ? "Laki-laki" : "Perempuan" }}</p><br />
    <p>No Telepon : {{ $pelanggan->phone }}</p><br />
    <p>Alamat : {{ $pelanggan->alamat }}</p><br />

</body>

</html>