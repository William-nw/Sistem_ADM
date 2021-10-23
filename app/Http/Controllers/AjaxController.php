<?php

namespace App\Http\Controllers;

use App\Models\MasterBaju;
use App\Models\MasterBuku;
use Illuminate\Http\Request;

class AjaxController extends Controller
{

    // ajax req
    public function getBuku($id)
    {
        
        $buku = MasterBuku::with('masterKelas', 'masterTahunAjaran')->where('id_buku', $id)->first();
        
        return response()->json(['data' => $buku]);
        
    }
    public function getBaju($id)
    {
    
        $baju = MasterBaju::with('masterKelas')->where('id_baju', $id)->first();

        return response()->json(['data' => $baju]);
        
    }
}
