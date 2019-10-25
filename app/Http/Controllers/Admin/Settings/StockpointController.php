<?php
namespace App\Http\Controllers\Admin\Settings;
 
use Illuminate\Http\Request;
use App\Model\Stockpoint; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule; 

class StockpointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stockpoints= Stockpoint::orderBy('name','asc')->paginate(5);
        return view('stockpoints.list',compact('stockpoints'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stockpoints.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Stockpoint::add($request->all());
        $msg = [
          'message' => 'Stock point created successfully!' ];
        return  redirect('admin/stockpoint')->with($msg);
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
    public function edit(Stockpoint $stockpoint)
    {
        return  view('stockpoints.edit',compact('stockpoint'));
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
        Stockpoint::where('id', $request->id)
        ->update(['name'=>$request->name ]);       
        $msg =['message' => 'Stock point  Updated successfully!'];
         return  redirect('admin/stockpoint')->with($msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fabric  $fabric
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stockpoint $stockpoint)
    {
       // $fabric->delete();
       // $msg =['message' => 'Fabric Deleted successfully!',
       //'type' => 'warning'];

       $msg =['message' => 'Unable to Delete!',
       'type' => 'warning'];
        return  redirect('admin/stockpoint')->with($msg);
    }
}
