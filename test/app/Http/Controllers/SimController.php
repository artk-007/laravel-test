<?php

namespace App\Http\Controllers;

use App\Models\SimModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::check('viev-contracts')) {
            $sim = SimModel::get();
        } else {
            $sim = SimModel::leftjoin('contract_models', 'sim_models.id_contract', '=', 'contract_models.id')
            ->where('contract_models.id_user', auth()->id())->get();
        }
        return $sim;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sim = SimModel::create($request->all());
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Gate::authorize('viev-contracts');
        $sim = SimModel::leftjoin('contract_models', 'sim_models.id_contract', '=', 'contract_models.id')
        ->where('contract_models.id', $id)->get();
        if (is_null($sim)) {
            return 'Not found';
        }
        return $sim;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
