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
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }
}
