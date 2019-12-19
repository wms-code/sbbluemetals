<?php
namespace App\Http\Controllers\Admin\Settings; 
use Illuminate\Http\Request;
use App\Model\Place; 
use Illuminate\Routing\Controller;

class PlaceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $place= Place::orderBy('name','asc')->paginate(20);
        return view('place.list',compact('place'));
    }

    public function create()
    {
        return view('place.create');
    }

    public function store(Request $request)
    {
        Place::create($request->all());
        $msg = [ 'message' => 'Place created successfully!' ];
        return  redirect('admin/place')->with($msg);
    }
 
    public function edit(Place $place)
    {
        return  view('place.edit',compact('place'));
    }

    public function update(Request $request)
    {
        Place::where('id', $request->id) ->update(['name'=>$request->name ]);       
        $msg =['message' => 'Place Updated successfully!'];
         return  redirect('admin/place')->with($msg);
    }

    public function destroy(Place $place)
    {
       // $fabric->delete();
       // $msg =['message' => 'Fabric Deleted successfully!',
       //'type' => 'warning'];

       $msg =['message' => 'Unable to Delete!','type' => 'warning'];
       return  redirect('admin/place')->with($msg);
    }
}
