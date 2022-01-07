<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PelangganController extends Controller
{
    public function index(Request $request)
    {
        $input = $request->all();

        // SELECT * FROM 
        $dataPelanggan = Pelanggan::select(["pelanggan.*", "provinces.province_name"])
            ->leftJoin('provinces', 'pelanggan.province_id', '=', 'provinces.id');

        // where kelamin = ?
        if (isset($input["kelamin"])) {
            $dataPelanggan->where("kelamin", $input["kelamin"]);
        }

        if (isset($input["src"])) {
            $dataPelanggan->where("nama", "like", "%" . $input["src"] . "%");
        }

        return Response::json($dataPelanggan->paginate());
    }

    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'nama' => 'required|min:5|max:100',
        //     'kelamin' => 'required'
        // ]);
        $input = $request->except(["_token"]);

        // INSERT INTO pelanggan(nama,kelamin,alamat) VALUES('');
        $pelanggan = new Pelanggan();
        $pelanggan->nama = $input["nama"] ?? "";
        $pelanggan->phone = $input["phone"] ?? "";
        $pelanggan->kelamin = $input["kelamin"] ?? "L";
        $pelanggan->alamat = $input["alamat"] ?? "";
        $pelanggan->save();

        // $pelanggan = Pelanggan::create($input);

        return Response::json($pelanggan);
    }

    public function show($id)
    {
        $pelanggan = Pelanggan::find($id);

        return Response::json($pelanggan);
    }

    public function update($id)
    {
        $input = request()->except(["_token"]);
        $pelanggan = Pelanggan::find($id);
        $pelanggan->nama = $input["nama"] ?? "";
        $pelanggan->phone = $input["phone"] ?? "";
        $pelanggan->kelamin = $input["kelamin"] ?? "L";
        $pelanggan->alamat = $input["alamat"] ?? "";
        $pelanggan->save();
        
        return Response::json($pelanggan);
    }

    public function destroy($id)
    {
        // SELECT * FROM pelanggan where id=$id
        $pelanggan = Pelanggan::find($id);

        // DELETE pelanggan where id=$id
        $pelanggan->delete();
        return Response::json([
            "message" => "Pelanggan berhasil dihapus"
        ]) ;
    }
}
