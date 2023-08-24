<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReserveController extends Controller
{
    public function reserve($id)
    {
        // 予約ロジックをここに追加

        return view('apply.reserve');
    }
}
