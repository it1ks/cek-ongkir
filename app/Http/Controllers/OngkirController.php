<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class OngkirController extends Controller
{
    private $apiKey = '7d3d12a05a6015b751a7d7db79271981';

    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            return $this->cekOngkir($request);
        }

        $response = Http::withHeaders([
            'key' => $this->apiKey,
        ])->get('https://api.rajaongkir.com/starter/city');

        if ($response->successful()) {
            $cities = $response->json('rajaongkir.results');
            return Inertia::render('Welcome', ['cities' => $cities, 'results' => []]);
        } else {
            return Inertia::render('Welcome', ['error' => 'Gagal mendapatkan data kota.', 'cities' => []]);
        }
    }

    public function cekOngkir(Request $request)
    {
        $response = Http::withHeaders([
            'key' => $this->apiKey,
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => $request->origin,
            'destination' => $request->destination,
            'weight' => $request->weight * 1000,
            'courier' => $request->courier,
        ]);

        if ($response->successful()) {
            $results = $response->json('rajaongkir.results');
            return response()->json(['results' => $results]);
        } else {
            return response()->json(['error' => 'Gagal mendapatkan biaya pengiriman.']);
        }
    }
}