@extends("template.index")

@section("content")

<script>
    function hapusPelanggan(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/pelanggan/" + id,
                    // headers: {
                    //     'X-XSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    // },
                    method: "DELETE", // use "GET" if server does not handle DELETE
                    data: {
                        "_token": "{{csrf_token()}}"
                    },
                    dataType: "html"
                }).done(function(msg) {
                    window.location.href = "/pelanggan"
                }).fail(function(jqXHR, textStatus) {
                    Swal.fire('Terjadi kesalahan')

                });

            }
        })
    }
</script>

<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Pelanggan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="">
                    <a class="btn btn-primary" href="{{ route("pelanggan.create") }}">Tambah Pelanggan</a>
                </div>
                <br />
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Aksi</th>
                            <th>Nama</th>
                            <th>Kelamin</th>
                            <th>No Telepon</th>
                            <th>Provinsi</th>
                            <th>ALamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($daftarPelanggan as $pelanggan)
                        <tr>
                            <td>
                                <a href="/pelanggan/{{ $pelanggan["id"] }}" class="btn btn-info">Lihat<a />
                                    <a href="/pelanggan/{{ $pelanggan["id"] }}/edit" class="btn btn-success">Ubah<a />
                                        <button onclick="hapusPelanggan('{{ $pelanggan->id }}')" class="btn btn-danger">Hapus</button>

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
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                {{ $daftarPelanggan->links() }}
            </div>

        </div>
        <!-- /.card -->

    </div>
</div>

@endsection