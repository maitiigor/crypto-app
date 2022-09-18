<?php

namespace App\Http\Controllers;

use App\Models\InvestmentPlan;
use App\Http\Requests\StoreInvestmentPlanRequest;
use App\Http\Requests\UpdateInvestmentPlanRequest;
use App\DataTables\InvestmentPlanDataTable;
use Session;

class InvestmentPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(InvestmentPlanDataTable $investmentPlanDataTable)
    {
        //
        $investmentPlan = investmentPlan::all();

       return $investmentPlanDataTable->render('pages.investment_plans.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.investment_plans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInvestmentPlanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvestmentPlanRequest $request)
    {
        //
        $investmentPlan = InvestmentPlan::create($request->all());
        Session::flash('success','Investment Plan saved successfully');

        return redirect(route('investment_plans.index'));;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InvestmentPlan  $investmentPlan
     * @return \Illuminate\Http\Response
     */
    public function show(InvestmentPlan $investmentPlan)
    {
        //
        return view('pages.investment_plans.show',compact('investmentPlan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InvestmentPlan  $investmentPlan
     * @return \Illuminate\Http\Response
     */
    public function edit(InvestmentPlan $investmentPlan)
    {
        //
        return view('pages.investment_plans.edit',compact('investmentPlan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInvestmentPlanRequest  $request
     * @param  \App\Models\InvestmentPlan  $investmentPlan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInvestmentPlanRequest $request, InvestmentPlan $investmentPlan)
    {
        //
        $investmentPlan->fill($request->all());
        $investmentPlan->save();

        Session::flash('success','Investment plan updated successfully');

        return redirect(route('investment_plans.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InvestmentPlan  $investmentPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvestmentPlan $investmentPlan)
    {
        //
      $investmentPlan->delete();
      Session::flash('success','Investment plan deleted successfully');
      return redirect(route('investment_plans.index'));
    }
}
