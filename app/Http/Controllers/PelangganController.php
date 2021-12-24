<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $data = [
            "daftarPelanggan" => [
                [
                    "nama" => "Agung",
                    "phone" => "081xxxx",
                    "kelamin" => "P",
                    "alamat" => "Demak"
                ],
                [
                    "nama" => "Jono",
                    "phone" => "081xxxx",
                    "kelamin" => "W",
                    "alamat" => "Semarang"
                ],
                [
                    "nama" => "Yono",
                    "phone" => "081xxxx",
                    "kelamin" => "P",
                    "alamat" => "Boyolali"
                ]
            ]
        ];
        return view('pelanggan.index', $data);
    }

    public function create()
    {
        return view('pelanggan.create');
    }

    public function store()
    {
        return 'Pelanggan berhasil ditambahkan';
    }

    public function show($id)
    {
        return view('pelanggan.show');
    }

    public function edit($id)
    {
        $data = [
            "id" => $id
        ];
        return view('pelanggan.edit', $data);
    }

    public function update()
    {
        return 'Pelanggan berhasil diubah';
    }

    public function destroy()
    {
        return 'Pelanggan berhasil dihapus';
    }
}
