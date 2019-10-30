<?php
namespace App\Http\Controllers\Admin\Settings; 
use Illuminate\Http\Request;
use App\Model\Unit; 
use Illuminate\Routing\Controller;
class UnitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $units= Unit::orderBy('name','asc')->paginate(5);
        return view('units.list',compact('units'));
    }

    public function create()
    {
        return view('units.create');
    }


    public function store(Request $request)
    {
        Unit::create($request->all());
        $msg = [ 'message' => 'Unit created successfully!' ];
        return  redirect('admin/unit')->with($msg);
    }

  
    public function edit(Unit $unit)
    {
        return  view('units.edit',compact('unit'));
    }

   
    public function update(Request $request)
    {
        Unit::where('id', $request->id) ->update(['name'=>$request->name ]);       
        $msg =['message' => 'Unit Updated successfully!'];
        return  redirect('admin/unit')->with($msg);
    }

   
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
