<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function all(Mahasiswa $mahasiswa)
    {
        return response()->json([
            'status' => true,
            'message' => 'Success',
            'data' => $mahasiswa->all()
        ], 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mahasiswa = Mahasiswa::create([
            "nim" => $request->nim,
            "nama" => $request->nama,
            "alamat" => $request->alamat,
            "email" => $request->email,
            "tempat_lahir" => $request->tempat_lahir,
            "tgl_lahir" => $request->tgl_lahir,
            "jenis_kel" => $request->jenis_kel,
            "agama" => $request->agama
        ]);

        if ($mahasiswa) {
            return response()->json([
                'status' => true,
                'message' => 'created',
                'data' => $mahasiswa
            ], 201);
        }

        return response()->json([
            'status' => false,
            'message' => 'error',
            'data' => ''
        ], 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if ($mahasiswa) {
            return response()->json([
                'status' => true,
                'message' => 'Success',
                'data' => $mahasiswa
            ], 201);
        }

        return response()->json([
            'status' => false,
            'message' => 'error, not found',
            'data' => ''
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $mahasiswa)
    {
        $this->validate($request, [
            'nim' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kel' => 'required',
            'agama' => 'required'
        ]);

        $mhs = Mahasiswa::find($mahasiswa);
        if ($mhs) {
            $mhs->nim = $request->nim ? $request->nim : $mhs->nim;
            $mhs->nama = $request->nama ? $request->nama : $mhs->nama;
            $mhs->alamat = $request->alamat ? $request->alamat : $mhs->alamat;
            $mhs->email = $request->email ? $request->email : $mhs->email;
            $mhs->tempat_lahir = $request->tempat_lahir ? $request->tempat_lahir : $mhs->tempat_lahir;
            $mhs->tgl_lahir = $request->tgl_lahir ? $request->tgl_lahir : $mhs->tgl_lahir;
            $mhs->jenis_kel = $request->jenis_kel ? $request->jenis_kel : $mhs->jenis_kel;
            $mhs->agama = $request->agama ? $request->agama : $mhs->agama;
            $mhs->save();

            return response()->json([
                'status' => true,
                'Message' => 'Profil berhasil diubah!',
                'data' => $mhs
            ], 200);
        }
        return response()->json([
            'status' => false,
            "message" => "Error!",
            "data" => ''
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($mahasiswa)
    {
        $mhs = Mahasiswa::find($mahasiswa);

        if ($mhs) {
            $mhs->delete();
            return response()->json([
                'status' => true,
                "message" => "Mahasiswa berhasil dihapus!",
            ], 200);
        }
        return response()->json([
            'status' => false,
            "message" => "Error!",
            "data" => ''
        ], 404);
    }

    // method search

    public function search($keyword)
    {
        $mahasiswa = Mahasiswa::where('nim', 'like', '%' . $keyword . '%')->orWhere('nama', 'like', '%' . $keyword . '%')->first();
        if ($mahasiswa) {
            return response()->json([
                'status' => true,
                'message' => 'Success',
                'data' => $mahasiswa
            ], 200);
        }
        return response()->json([
            'status' => false,
            'message' => 'Not Found',
            'data' => ''
        ], 404);
    }
}
