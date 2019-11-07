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
        $strstategst_code=$request->txtstategst_code;
        $strreportgroup_code=$request->txtreportgroup_code;
        $last2=0;$last3=0;

        $user = Stategst::where('name', '=', $strstategst_code)->first();
        if ($user === null) {
            Stategst::create([
                'name'=>$strstategst_code,
            ]);
            $last2 = Stategst::orderBy('id', 'DESC')->first();
            $last2 = $last2->id;
        }
        else
        {
            $last2=Stategst::where('name', $strstategst_code)->pluck('id');
            $last2=$last2[0];
        }

        $user = Reportgroup::where('name', '=', $strreportgroup_code)->first();
        if ($user === null) {
            Reportgroup::create([
                'name'=>$strreportgroup_code,
            ]);
            $last3 = Reportgroup::orderBy('id', 'DESC')->first();
            $last3 = $last3->id;
        }
        else
        {
            $last3=Reportgroup::where('name', $strreportgroup_code)->pluck('id');
            $last3=$last3[0];
        }
         
        $opnbalno=$request->opn_bal;
        $opnbalstring=$request->opnbal;
        if ( $opnbalstring="1")
        {
         $opnbalno=$opnbalno*-1; 
        }
 
        Account::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'group_code'=>$request->group_code,
                'subgroup_code'=>$request->subgroup_code,
                'reportgroup_code'=>$last3,
                'stategst_code'=>$last2,
                'gst_no'=>$request->gst_no,
                'address1'=>$request->address1,
                'address2'=>$request->address2,
                'address3'=>$request->address3,
                'opn_bal'=>$opnbalno,
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
        ->update($request->except(['_token','_method','opn_bal','opnbal','stategst_code','reportgroup_code','txtreportgroup_code','txtstategst_code']));       
        $msg =['message' => 'Accounts Name  Updated successfully ...'];
        

        $strstategst_code=$request->txtstategst_code;
        $strreportgroup_code=$request->txtreportgroup_code;
        $last2=0;$last3=0;

        $user = Stategst::where('name', '=', $strstategst_code)->first();
        if ($user === null) {
            Stategst::create([
                'name'=>$strstategst_code,
            ]);
              $last2 = Stategst::orderBy('id', 'DESC')->first();
              $strstategst_code=$last2->id;
        }
        else
        {
            $last2=Stategst::where('name', $strstategst_code)->pluck('id');
            $strstategst_code=$last2[0];
        }
        Account::where('id', $request->id)
           ->update(['stategst_code'=> $strstategst_code]);


        $user = Reportgroup::where('name', '=', $strreportgroup_code)->first();
        if ($user === null) {
            Reportgroup::create([
                'name'=>$strreportgroup_code,
            ]);
            $last3 = Reportgroup::orderBy('id', 'DESC')->first();           
            $strreportgroup_code=$last3->id;
        }
        else
        {
            $last3=Reportgroup::where('name', $strreportgroup_code)->pluck('id');
            $strreportgroup_code=$last3[0];
        }

        Account::where('id', $request->id)
        ->update(['reportgroup_code'=> $strreportgroup_code]); 





        $opnbalno=$request->opn_bal;
        $opnbalstring=$request->opnbal;
        if ( $opnbalstring="1")
        {
            $opnbalno=$opnbalno*-1;
            Account::where('id', $request->id)
           ->update(['opn_bal'=> $opnbalno]);  
        }
        else if ( $opnbalstring="2")
        {
            Account::where('id', $request->id)
            ->update(['opn_bal'=>$request->opn_bal
            ]); 
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