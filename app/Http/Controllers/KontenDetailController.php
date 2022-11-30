<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKontenDetailRequest;
use App\Http\Requests\UpdateKontenDetailRequest;
use App\Models\KontenDetail;

class KontenDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKontenDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKontenDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KontenDetail  $kontenDetail
     * @return \Illuminate\Http\Response
     */
    public function show(KontenDetail $kontenDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KontenDetail  $kontenDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(KontenDetail $kontenDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKontenDetailRequest  $request
     * @param  \App\Models\KontenDetail  $kontenDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKontenDetailRequest $request, KontenDetail $kontenDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KontenDetail  $kontenDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(KontenDetail $kontenDetail)
    {
        //
    }
}
