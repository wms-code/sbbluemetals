<?php
namespace App\Http\Controllers\Admin\Settings;
use Illuminate\Http\Request;
use App\Model\Account;
use App\Model\AccountsGroup;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
   
    public function index()
    {
        $accounts= Account::orderBy('name','asc')->with(['accountsgroups'])->get();
        return view('accounts.list',compact('accounts'));
    }

    public function create()
    {
        $accounts = Account::select('id','name')->orderBy('name')->get();
        $accountsgroups = AccountsGroup::select('id','name')->orderBy('name')->get();
        $accountscategory = AccountsGroup::accountscategory();
        return view('accounts.create',compact('accountsgroups','accountscategory','accounts'));
    }

  
    public function store(Request $request)
    {
        Account::create($request->all());
        $msg = [ 'message' => 'Ac Name  created successfully!' ];
        return  redirect('admin/accounts')->with($msg);
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        
    }
}
