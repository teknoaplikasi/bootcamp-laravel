<!DOCTYPE html>
<html>

<head>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
        .alert-danger {
            color:red;
        }
    </style>
</head>

<body>
    <h2>Tambah Pelanggan</h2>
    @if($errors->any())
    @endif
    <form method="POST" action="{{ route('pelanggan.store') }}">
        @csrf
        Nama :<input type="text" name="nama" /><br />
        @error('nama')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        Jenis Kelamin: <br/>
        <input type="radio" id="l" name="kelamin" value="L">
        <label for="l">Laki-laki</label><br>
        <input type="radio" id="p" name="kelamin" value="P">
        <label for="p">Perempuan</label><br>
        @error('kelamin')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        No Telepon :<input type="text" name="phone" /><br />
        @error('phone')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        Provinsi :<select name="province_id">
            @foreach($provinces as $province)
            <option value="{{ $province->id }}">{{ $province->province_name }}</option>
            @endforeach
        <select><br/>

        Alamat :<textarea name="alamat"></textarea><br />
        <input type="submit" name="Submit">
        @error('alamat')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror


    </form>

</body>

</html>