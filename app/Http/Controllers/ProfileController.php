<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id_user;
        return view('users.profile.profile')->with([
            'transaksi' => Transaksi::with('product')->where('user_id',$userId)->get(),
            'user' => User::find($userId)
        ]);
    }
}
