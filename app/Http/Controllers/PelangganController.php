<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Province;
use Illuminate\Http\Request;

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


        $data = [
            "kelamin" => $input["kelamin"] ?? "",
            "daftarPelanggan" => $dataPelanggan->paginate(10)
        ];
        return view('pelanggan.index', $data);
    }

    public function create()
    {
        $data = [
            "provinces" => Province::all()
        ];
        return view('pelanggan.create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|min:5|max:100',
            'kelamin' => 'required'
        ]);
        $input = $request->except(["_token"]);

        $pelanggan = new Pelanggan();
        if ($request->hasFile('image_profile')) {

            $pelanggan->image_profile = $request->file("image_profile")->store("profile");
        }


        // INSERT INTO pelanggan(nama,kelamin,alamat) VALUES('');

        $pelanggan->nama = $input["nama"] ?? "";
        $pelanggan->phone = $input["phone"] ?? "";
        $pelanggan->kelamin = $input["kelamin"] ?? "L";
        $pelanggan->alamat = $input["alamat"] ?? "";
        $pelanggan->save();

        // $pelanggan = Pelanggan::create($input);

        return redirect("/pelanggan");
    }

    public function show($id)
    {
        $data = [
            "provinces" => Province::all(),
            "pelanggan" => Pelanggan::find($id)
        ];
        return view('pelanggan.show', $data);
    }

    public function edit($id)
    {
        $data = [
            "provinces" => Province::all(),
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
        $pelanggan->province_id = $input["province_id"] ?? null;
        // UPDATE pelanggan SET ... WHERE id = $id
        $pelanggan->save();

        return redirect('/pelanggan');
    }

    public function destroy($id)
    {
        // SELECT * FROM pelanggan where id=$id
        $pelanggan = Pelanggan::find($id);

        if (is_null($pelanggan)) {
            return 'Pelanggan tidak terdaftar dalam database';
        }
        // DELETE pelanggan where id=$id
        $pelanggan->delete();
        return 'Pelanggan berhasil dihapus';
    }
}
