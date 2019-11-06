<?php

namespace App\Http\Controllers\Master;

use App\Traits\AddAccount;
use Illuminate\Http\Request;
use App\Model\Master\Accounts;
use App\Model\Master\AccountsGroup;
use App\Http\Controllers\Controller;
class AccountsController extends Controller
{
    use AddAccount;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts= Accounts::orderBy('Ac_Name','asc')->with(['accountsgroups','subgroup'])->get();
        return view('accounts.list',compact('accounts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $reportgroup = Accounts::report();
        $subgroup = AccountsGroup::subgroup();
        $accountsgroups = AccountsGroup::getall();
        return view('accounts.create',compact('accountsgroups','subgroup','reportgroup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->submit($request->all());
        $msg = [
          'message' => 'Ac Name  created successfully!' ];
        return  redirect('accounts')->with($msg);
    }

    /**
     * Display the specified res
     * 
     * ource.
     *
     * @param  \App\Model\Accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function show(Accounts $accounts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function edit($ac_code)
    {
        $accgroup = AccountsGroup::getall();
        $subgroup = AccountsGroup::subgroup();
        $reportgroup = Accounts::report();
        $accounts = Accounts::where('Ac_Code',  '=', $ac_code)->first();
        return view('accounts.edit', compact('accounts','accgroup','subgroup','reportgroup'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $accounts)
    {
        
        Accounts::where('Ac_Code', $accounts)
        ->update($request->except(['_token','_method','opnbal']));       
        $msg =['message' => 'Accounts Name  Updated successfully ...'.$request['opnbal']];

        $opnbal=$request->Opn_Bal;
        if ( $opnbal<=0)
        {
            $opnbal=$opnbal*-1;
            Accounts::where('Ac_Code', $accounts)
           ->update(['Opn_Bal'=> $opnbal]);  
        }
        else
        {
            Accounts::where('Ac_Code', $accounts)
            ->update(['Opn_Bal'=>$request->Opn_Bal]); 
        }
          

        return  redirect('accounts')->with($msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accounts $accounts)
    {
        //
    }
}