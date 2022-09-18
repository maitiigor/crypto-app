<?php

namespace App\Http\Controllers;

use App\Models\Earning;
use App\Http\Requests\StoreEarningRequest;
use App\Http\Requests\UpdateEarningRequest;
use App\DataTables\EarningDataTable;

class EarningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EarningDataTable $earningDataTable)
    {
        //
        $earning = Earning::all();

       return $earningDataTable->render('pages.earnings.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('pages.earnings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEarningRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEarningRequest $request)
    {
        //
        Session::flash('success','Earnings saved successfully');

        return redirect(route('earnings.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Earning  $earning
     * @return \Illuminate\Http\Response
     */
    public function show(Earning $earning)
    {
        //
        return view('pages.earnings.show',compact('earning'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Earning  $earning
     * @return \Illuminate\Http\Response
     */
    public function edit(Earning $earning)
    {
        //
        return view('pages.earnings.edit',compact('earning'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEarningRequest  $request
     * @param  \App\Models\Earning  $earning
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEarningRequest $request, Earning $earning)
    {
        //
        $earning->fill($request->all());
        $earning->save();
        Session::flash('success','Earnings updated successfully');
        
        return redirect(route('earnings.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Earning  $earning
     * @return \Illuminate\Http\Response
     */
    public function destroy(Earning $earning)
    {
        //
        $earning->delete();

        Session::flash('success','Earnings deleted successfully');
        
        return redirect(route('earnings.index'));
    }
}
