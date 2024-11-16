<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportanceController extends Controller
{
    public function index()
    {
        $respoonse = \App\Helpers\KNNHelper::importance();
        $features = $respoonse['features'] ?? [];

        return response()->json($features);
    }
}
