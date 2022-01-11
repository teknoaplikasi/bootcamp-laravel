@extends("template.index")

@section("content")
<form method="POST" action="{{ route('pelanggan.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Pelanggan</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukan Nama Pelanggan">
                @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="kelamin">Jenis Kelamin</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="kelamin" value="L">
                    <label class="form-check-label">Laki laki</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="kelamin" value="P" checked="">
                    <label class="form-check-label">Wanita</label>
                </div>
            </div>
            <div class="form-group">
                <label for="province_id">Provinsi</label>
                <select class="form-control" name="province_id">
                    @foreach($provinces as $province)
                    <option value="{{ $province->id }}">{{ $province->province_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="phone">No Telepon</label>
                <input type="text" name="phone" class="form-control" id="phone" placeholder="Masukan No Telepon Pelanggan">
            </div>
            <div class="form-group">
                <label for="phone">Alamat</label>
                <textarea name="alamat" class="form-control" id="alamat" placeholder="Masukan Alamat Pelanggan">

                </textarea>
            </div>

            <div class="form-group">
                <label for="image">Profile</label>
                <input type="file" name="image_profile" class="form-control">
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection
