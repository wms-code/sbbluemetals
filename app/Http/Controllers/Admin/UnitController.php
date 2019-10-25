<?php

 
namespace App\Http\Controllers\Admin;
 
use Illuminate\Http\Request;
use App\Model\Unit; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule; 
class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units= Unit::orderBy('name','asc')->paginate(5);
        return view('units.list',compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('units.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Unit::add($request->all());
        $msg = [
          'message' => 'Unit created successfully!' ];
        return  redirect('admin/unit')->with($msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fabric  $fabric
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fabric  $fabric
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        return  view('units.edit',compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fabric  $fabric
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Unit::where('id', $request->id)
        ->update(['name'=>$request->name ]);       
        $msg =['message' => 'Unit Updated successfully!'];
         return  redirect('admin/unit')->with($msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fabric  $fabric
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
       // $fabric->delete();
       // $msg =['message' => 'Fabric Deleted successfully!',
       //'type' => 'warning'];

       $msg =['message' => 'Unable to Delete!',
       'type' => 'warning'];
        return  redirect('admin/unit')->with($msg);
    }
}
