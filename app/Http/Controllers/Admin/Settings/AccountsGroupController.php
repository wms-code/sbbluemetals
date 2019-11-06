<?php

namespace App\Http\Controllers\Master;

use App\Model\Master\AccountsGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountsGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $accountsGroup= AccountsGroup::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\AccountsGroup  $accountsGroup
     * @return \Illuminate\Http\Response
     */
    public function show(AccountsGroup $accountsGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\AccountsGroup  $accountsGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(AccountsGroup $accountsGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\AccountsGroup  $accountsGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccountsGroup $accountsGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\AccountsGroup  $accountsGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccountsGroup $accountsGroup)
    {
        //
    }
}
