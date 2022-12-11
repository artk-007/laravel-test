<?php

namespace App\Http\Controllers;

use App\Models\ContractModel;
use App\Models\SimModel;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

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
            $contract = ContractModel::whereBelongsTo(auth()->user())->get();
            $sim = $contract[0]->sim;
            // $sim = SimModel::where('user_id', auth()->user()->id)->get();
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
        $sim = SimModel::where('contract_id', $id)->get();
        if (is_null($sim)) {
            return 'Not found';
        }
        return View('sim', ['data' => $sim]);
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
