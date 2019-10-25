<?php

 
namespace App\Http\Controllers\Admin;
 
use Illuminate\Http\Request;
use App\Model\Fabric; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule; 
class FabricController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fabrics= Fabric::orderBy('name','asc')->paginate(5);
        return view('fabrics.list',compact('fabrics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fabrics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Fabric::add($request->all());
        $msg = [
          'message' => 'Fabric created successfully!' ];
        return  redirect('admin/fabric')->with($msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fabric  $fabric
     * @return \Illuminate\Http\Response
     */
    public function show(Fabric $fabric)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fabric  $fabric
     * @return \Illuminate\Http\Response
     */
    public function edit(Fabric $fabric)
    {
        return  view('fabrics.edit',compact('fabric'));
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
        Fabric::where('id', $request->id)
        ->update(['name'=>$request->name ]);       
        $msg =['message' => 'Fabric Updated successfully!'];
         return  redirect('admin/fabric')->with($msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fabric  $fabric
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fabric $fabric)
    {
       // $fabric->delete();
       // $msg =['message' => 'Fabric Deleted successfully!',
       //'type' => 'warning'];

       $msg =['message' => 'Unable to Delete!',
       'type' => 'warning'];
        return  redirect('admin/fabric')->with($msg);
    }
}
