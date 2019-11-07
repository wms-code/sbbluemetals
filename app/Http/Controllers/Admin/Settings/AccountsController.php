<?php

namespace App\Http\Controllers\Admin\Settings;
 
  
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Account;
use App\Model\Reportgroup;
use App\Model\AccountsGroup;
use App\Model\Stategst;
use App\Http\Controllers\Controller;
class AccountsController extends Controller
{
   // use AddAccount;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accountsgroups = AccountsGroup::getall();        
        $accounts= Account::orderBy('Ac_Name','asc')->with(['accountsgroups'])->get();
        return view('accounts.list',compact('accounts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $stategst = Stategst::gststate();
        $subgroup = AccountsGroup::subgroup();
        $accountsgroups = AccountsGroup::getall();
        $reportgroup = Reportgroup::gstreportgroup();
        return view('accounts.create',compact('accountsgroups','subgroup','reportgroup','stategst'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        //$input = $request->except(['credit_card']); $input = $request->only('username', 'password');
        //DB::table('users')->insert(
    //['email' => 'john@example.com', 'votes' => 0]
//); 
        
        $opn_bal=$request->opn_bal;
        if ( $opn_bal<=0)
        {
            $opn_bal=$opn_bal*-1;
        }
         
        Account::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'group_code'=>$request->group_code,
                'subgroup_code'=>$request->name,
                'reportgroup_code'=>$request->reportgroup_code,
                'stategst_code'=>$request->stategst_code,
                'gst_no'=>$request->gst_no,
                'address1'=>$request->address1,
                'address2'=>$request->address2,
                'address3'=>$request->address3,
                'opn_bal'=>$opn_bal,
                'active'=>$request->active,
            ]);
        $msg = [
          'message' => 'Ac Name  created successfully!' ];
        return  redirect('admin/accounts')->with($msg);
    }
     
    /**
     * Display the specified res
     * 
     * ource.
     *
     * @param  \App\Model\Accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function show(Account $accounts)
    {
        //
    }
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return $id;
        $accgroup = AccountsGroup::getall();
        $subgroup = AccountsGroup::subgroup();        
        $accounts = Account::find($id);     // Account::where('id',  '=', $id)->first();
        $stategst = Stategst::gststate();
        $reportgroup = Reportgroup::gstreportgroup();
        return view('accounts.edit', compact('accounts','accgroup','subgroup','reportgroup','stategst'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        Account::where('id', $request->id)
        ->update($request->except(['_token','_method','opn_bal','opnbal']));       
        $msg =['message' => 'Accounts Name  Updated successfully ...'];

        $opnbal=$request->opn_bal;
        if ( $opnbal<=0)
        {
            $opnbal=$opnbal*-1;
            Account::where('id', $request->id)
           ->update(['opn_bal'=> $opnbal]);  
        }
        else
        {
            Account::where('id', $request->id)
            ->update(['opn_bal'=>$request->opn_bal]); 
        }
          

        return  redirect('admin/accounts')->with($msg);
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