<?php

namespace App\Http\Controllers;

use App\Models\WilayahModel;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    public function getProvinsi()
    {
        $provinsi = WilayahModel::whereRaw('LENGTH(kode) = 2')->get();

        if ($provinsi->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data provinsi tidak ditemukan',
                'status_code' => 404,
            ], 404);
        }
        
        return response()->json([
            'status' => 'success',
            'message' => 'Data provinsi berhasil diambil',
            'status_code' => 200,
            'data' => $provinsi,
        ], 200);
    }

    public function getKabupatenKota($kodeProvinsi)
    {
        if (strlen($kodeProvinsi) !== 2) {
            return response()->json([
                'status' => 'error',
                'message' => 'Kode provinsi harus terdiri dari dua karakter',
                'status_code' => 400,
            ], 400);
        }

        $kabupatenKota = WilayahModel::whereRaw('LENGTH(kode) = 5')
            ->where('kode', 'like', $kodeProvinsi . '%')
            ->get();

        if ($kabupatenKota->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data kabupaten atau kota tidak ditemukan',
                'status_code' => 404,
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Data kabupaten atau kota berhasil diambil',
            'status_code' => 200,
            'data' => $kabupatenKota,
        ], 200);
    }

    public function getKecamatan($kodeKabupatenKota)
    {
        if(strlen($kodeKabupatenKota) !== 5) {
            return response()->json([
                'status' => 'error',
                'message' => 'Kode kabupaten atau kota harus terdiri dari lima karakter',
                'status_code' => 400,
            ], 400);
        }

        $kecamatan = WilayahModel::whereRaw('LENGTH(kode) = 8')
            ->where('kode', 'like', $kodeKabupatenKota . '%')
            ->get();
        
        if ($kecamatan->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data kecamatan tidak ditemukan',
                'status_code' => 404,
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Data kecamatan berhasil diambil',
            'status_code' => 200,
            'data' => $kecamatan,
        ], 200);
    }

    public function getDesaKelurahan($kodeKecamatan)
    {
        if(strlen($kodeKecamatan) !== 8) {
            return response()->json([
                'status' => 'error',
                'message' => 'Kode kecamatan harus terdiri dari delapan karakter',
                'status_code' => 400,
            ], 400);
        }

        $desaKelurahan = WilayahModel::whereRaw('LENGTH(kode) = 13')
            ->where('kode', 'like', $kodeKecamatan . '%')
            ->get();

        if ($desaKelurahan->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data desa atau kelurahan tidak ditemukan',
                'status_code' => 404,
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Data desa atau kelurahan berhasil diambil',
            'status_code' => 200,
            'data' => $desaKelurahan,
        ], 200);
    }
}
