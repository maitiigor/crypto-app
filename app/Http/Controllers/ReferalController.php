<?php

namespace App\Http\Controllers;

use App\Models\Referal;
use App\Http\Requests\StoreReferalRequest;
use App\Http\Requests\UpdateReferalRequest;
use App\DataTables\ReferalDataTable;

class ReferalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ReferalDataTable $referalDataTable)
    {
        //
        $referals = Referal::all();

        return $referalDataTable->render('pages.referals.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.referals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReferalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReferalRequest $request)
    {
        //
        Referal::save($request->all());
        Session::flash('success', 'Referal dated saved successflly');
       
        return redirect(route('referals.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Referal  $referal
     * @return \Illuminate\Http\Response
     */
    public function show(Referal $referal)
    {
        //
        return view('pages.referals.show',compact('referal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Referal  $referal
     * @return \Illuminate\Http\Response
     */
    public function edit(Referal $referal)
    {
        //
        return view('pages.referals.edit',compact('referal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReferalRequest  $request
     * @param  \App\Models\Referal  $referal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReferalRequest $request, Referal $referal)
    {
        //
        $referal->fill($request->all());
        $referal->save();
        Session::flash('success',"Referal data updated successfully");

        return redirect(route('referals.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Referal  $referal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Referal $referal)
    {
        //
        $referal->delete();
        Session::flash('success',"Referal data deleted successfully");

        return redirect(route('referals.index'));
    }
}
