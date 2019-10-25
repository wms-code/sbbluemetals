<?php
namespace App\Http\Controllers\Admin\Settings;
 
use Illuminate\Http\Request;
use App\Model\Stockpoint; 
use Illuminate\Routing\Controller;

class StockpointController extends Controller
{

    public function index()
    {
        $stockpoints= Stockpoint::orderBy('name','asc')->paginate(5);
        return view('stockpoints.list',compact('stockpoints'));
    }


    public function create()
    {
        return view('stockpoints.create');
    }


    public function store(Request $request)
    {
        Stockpoint::create($request->all());
        $msg = [ 'message' => 'Stock point created successfully!' ];
        return  redirect('admin/stockpoint')->with($msg);
    }


 
    public function edit(Stockpoint $stockpoint)
    {
        return  view('stockpoints.edit',compact('stockpoint'));
    }

  
    public function update(Request $request)
    {
        Stockpoint::where('id', $request->id) ->update(['name'=>$request->name ]);       
        $msg =['message' => 'Stock point  Updated successfully!'];
         return  redirect('admin/stockpoint')->with($msg);
    }


    public function destroy(Stockpoint $stockpoint)
    {
       // $fabric->delete();
       // $msg =['message' => 'Fabric Deleted successfully!',
       //'type' => 'warning'];

       $msg =['message' => 'Unable to Delete!','type' => 'warning'];
       return  redirect('admin/stockpoint')->with($msg);
    }
}
