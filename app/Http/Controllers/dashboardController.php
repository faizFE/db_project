<?php

namespace App\Http\Controllers;

use App\Models\approveModel;
use App\Models\barangModel;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
       {
        $stokMenipis = barangModel::where('stok', '<', 5)->orderBy('stok', 'asc')->get();

        $approvals = approveModel::with('user')->where('status', 'pending')->latest()->get();

        return view('dashboard', compact('stokMenipis', 'approvals'));
    }
}