<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\Pengunjung;
use App\Models\Transaksi;
use App\Helpers\ResponseHelper;
use DB;
class OrderController extends Controller
{
    public function pemesanan(Request $request)
    {
        $checkin_date = $request->checkin_date;
        $checkout_date = $request->checkout_date;
        $kamar = Kamar::with('typeKamar')->where('id_kamar', $request->id_kamar)->first();
        return ResponseHelper::generateResponse($kamar);
    }

    public function getPengunjung($no_ktp)
    {
        if(empty($no_ktp)) return ResponseHelper::generateResponse([], "Data Pengujung Tidak ditemukan", 404);
        $pengunjung = Pengunjung::where('no_ktp', $no_ktp)->first();
        return ResponseHelper::generateResponse($pengunjung);
    }

    public function order(Request $request)
    {
        DB::beginTransaction();
        try {

            $kamar = Kamar::with('typeKamar')->where('id_kamar', $request->id_kamar)->firstOrFail();
            if(!empty($request->id_pengunjung)){
                $pengunjung = Pengunjung::where('id_pengunjung', $request->id_pengunjung)->firstOrFail();
            }else{
                $pengunjung = new Pengunjung();
            }
    
            $pengunjung->no_ktp = $request->no_ktp;
            $pengunjung->nama = $request->nama;
            $pengunjung->alamat = $request->alamat;
            $pengunjung->kota = $request->kota;
            $pengunjung->provinsi = $request->provinsi;
            $pengunjung->kode_pos = $request->kode_pos;
            $pengunjung->email = $request->email;
            $pengunjung->nomor_telepon = $request->nomor_telepon;
            $pengunjung->save();
    
            $transaksi = new Transaksi();
            $transaksi->id_pengunjung = $pengunjung->id_pengunjung;
    
            $kamar = Kamar::with('typeKamar')->where('id_kamar', $request->id_kamar)->firstOrFail();
            if(empty($kamar->typeKamar)) return ResponseHelper::generateResponse([], "Maaf, proses pendaftaran gagal.", 404);
    
            $transaksi->id_kamar = $kamar->id_kamar;
            $transaksi->checkin_date = $request->checkin_date;
            $transaksi->checkout_date = $request->checkout_date;
            $earlier = new \DateTime($request->checkin_date);
            $later = new \DateTime($request->checkout_date);
    
            $abs_diff = $later->diff($earlier)->format("%a");
    
            $transaksi->total_harga = $abs_diff * $kamar->typeKamar->harga;
            $transaksi->save();
    
            return ResponseHelper::generateResponse(['id_transaksi' => $transaksi->id_transaksi]);
        } catch (\Exception $e) {
            DB::rollBack();
            return ResponseHelper::generateResponse([], "Maaf, proses pendaftaran gagal.", 404);
        }
       
        
    }

    public function getPemesanan($id_transaksi)
    {
        if(empty($id_transaksi)) return ResponseHelper::generateResponse([], "Data Tidak ditemukan", 404);
        $transaksi = Transaksi::with('kamar', 'pengunjung')->where('id_transaksi', $id_transaksi)->first();
        return ResponseHelper::generateResponse($transaksi);
    }
}
