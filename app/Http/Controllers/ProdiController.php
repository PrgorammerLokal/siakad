<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProdiController extends Controller
{
    // method all prodi
    public function all(Prodi $prodi)
    {
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $prodi->all()
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
        $validator = Validator::make($request->all(), [
            'kode_prodi' => 'required|unique:prodi',
            'nama' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()
            ], 401);
        }

        $prodi = Prodi::create([
            'kode_prodi' => $request->kode_prodi,
            'nama' => $request->nama
        ]);

        if ($prodi) {
            return response()->json([
                'status' => true,
                'message' => 'cretaed',
                'data' => $prodi
            ], 201);
        }
        return response()->json([
            'status' => false,
            'message' => 'error',
            'data' => ''
        ], 401);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function show(Prodi $prodi)
    {
        return $prodi;
        return response()->json([
            'status' => true,
            'message' => 'found',
            'data' => $prodi
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prodi $prodi)
    {
        $prodi->update([
            'kode_prodi' => $request->kode_prodi,
            'nama' => $request->nama
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Success',
            'data' => $prodi
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prodi $prodi)
    {
        return $prodi;
        $prodi->delete();
        return response()->json([
            'status' => true,
            'message' => 'Success',
        ], 200);
    }
}
