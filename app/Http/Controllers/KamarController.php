<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\TypeKamar;
use App\Helpers\ResponseHelper;


class KamarController extends Controller
{
    public function getListKamar(Request $request)
    {
        $checkin_date = $request->checkin_date;
        $checkout_date = $request->checkout_date;
        $kamar = Kamar::with('typeKamar')->where('status_kamar', 'available')->get();
        return ResponseHelper::generateResponse($kamar);
    }

    public function getDetailKamar($id)
    {
        $kamar = Kamar::with('typeKamar')->where('id_kamar', $id)->first();
        return ResponseHelper::generateResponse($kamar);   
    }
}
