<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ongkirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        // Mengirimkan parameter kek API
        $responseCITY = Http::withHeaders([
            'key' => '39dede19ea7eec1743e387dff154883b'
        ])->get('https://api.rajaongkir.com/starter/city');

        $cities = $responseCITY['rajaongkir']['results'];

        return view('cek-ongkir',['cities' => $cities,'ongkir' => '']);
    }

    public function cekOngkir(Request $request)
    {
        $responseCITY = Http::withHeaders([
            'key' => '39dede19ea7eec1743e387dff154883b'
        ])->get('https://api.rajaongkir.com/starter/city');

        $responseCOST = Http::withHeaders([
            'key' => '39dede19ea7eec1743e387dff154883b'
        ])->post('https://api.rajaongkir.com/starter/cost',[
            'origin' => $request->origin,
            'destination' => $request->destination,
            'weight' => $request->weight,
            'courier' => $request->courier
        ]);

        $cities = $responseCITY['rajaongkir']['results'];
        $ongkir = $responseCOST['rajaongkir']['results'];
        // dd($ongkir);
        return view('cek-ongkir',[
            'cities' => $cities,
            'ongkir' => $ongkir
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
