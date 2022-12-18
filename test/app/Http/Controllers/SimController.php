<?php

namespace App\Http\Controllers;

use App\Models\SimModel;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\ContractModel;
use App\Http\Requests\SimRequest;
use Illuminate\Foundation\Auth\User;
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
            $sim = new \Illuminate\Database\Eloquent\Collection;
            foreach (auth()->user()->contracts as $contract) {
                $sim = $sim->merge($contract->sims);
            }
        }

        return View('sim', ['data' => $sim]);
        // return $sim;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SimRequest $request)
    {
        $contract = ContractModel::where('id', $request->contract)->first();
        $sim = new SimModel(['number' => $request->number]);
        $contract->sims()->save($sim);
        return redirect('sim/' . $contract->id);
    }
    public function getForm()
    {
        Gate::authorize('viev-contracts');
        $contracts = ContractModel::all();
        return View('form_sim', ['data' => $contracts]);
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
        $sim = SimModel::where('contract_id', $id)->get();
        if ($sim->isEmpty()) {
            $sim = false;
        }
        return View('sim', ['data' => $sim,'id_contract' => $id]);
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
