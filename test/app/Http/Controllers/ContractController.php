<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContractModel;
use Illuminate\Support\Facades\Gate;
use App\Models\SimModel;
use App\Models\User;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('viev-contracts');
        $contracts = ContractModel::get();
        // dd($contracts);
        return View('contract', ['data' => $contracts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contract = new ContractModel();
        // $user = User::where('id', $request->user)->first();
        $user = User::where('is_admin', '0')->inRandomOrder()->first();
        dd($user);
        $contract = $user->contracts()->Save($contract);
        return redirect('sim/' . $contract->id);
    }
    
    public function getForm()
    {
        Gate::authorize('viev-contracts');
        $users = User::all();
        return View('form_contract', ['data' => $users]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
