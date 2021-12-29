<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index(Request $request)
    {
       
        $input = $request->all();

        $dataPelanggan = Pelanggan::select("*");

        if(isset($input["kelamin"])) {
            $dataPelanggan->where("kelamin", $input["kelamin"]);
        }

        if (isset($input["src"])) {
            $dataPelanggan->where("nama", "like", "%".$input["src"]."%");
        }

        $data = [
            "kelamin" => $input["kelamin"] ?? "",
            "daftarPelanggan" => $dataPelanggan->get()
        ];
        return view('pelanggan.index', $data);
    }

    public function create()
    {
        return view('pelanggan.create');
    }

    public function store(Request $request)
    {
        $input = $request->except(["_token"]);
        
        // INSERT INTO pelanggan(nama,kelamin,alamat) VALUES('');
        $pelanggan = new Pelanggan();
        $pelanggan->nama = $input["nama"] ?? "";
        $pelanggan->phone = $input["phone"] ?? "";
        $pelanggan->kelamin = $input["kelamin"] ?? "L";
        $pelanggan->alamat = $input["alamat"] ?? "";
        $pelanggan->save();

        // $pelanggan = Pelanggan::create($input);
        
        return 'Pelanggan dengan nama '. $pelanggan->nama .', berhasil ditambahkan';
    }

    public function show($id)
    {
        $data = [
            // SELECT * FROM pelanggan where id=$id
            "pelanggan" => Pelanggan::find($id)
        ];
        return view('pelanggan.show', $data);
    }

    public function edit($id)
    {
        $data = [
            // SELECT * FROM pelanggan where id=$id
            "pelanggan" => Pelanggan::find($id)
        ];
        return view('pelanggan.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $pelanggan = Pelanggan::find($id);
        $pelanggan->nama = $input["nama"] ?? "";
        $pelanggan->phone = $input["phone"] ?? "";
        $pelanggan->kelamin = $input["kelamin"] ?? "L";
        $pelanggan->alamat = $input["alamat"] ?? "";
        // UPDATE pelanggan SET ... WHERE id = $id
        $pelanggan->save();
        
        return 'Pelanggan berhasil diubah';
    }

    public function destroy($id)
    {
        // SELECT * FROM pelanggan where id=$id
        $pelanggan = Pelanggan::find($id);
        // DELETE pelanggan where id=$id
        $pelanggan->delete();
        return 'Pelanggan berhasil dihapus';
    }
}
