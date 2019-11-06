<?php 
namespace App\Http\Controllers\Admin\Settings; 
use Illuminate\Http\Request;
use App\Model\Fabric; 
use Illuminate\Routing\Controller;
class FabricController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $fabrics= Fabric::orderBy('name','asc')->paginate(15);
        return view('fabrics.list',compact('fabrics'));
    }

    public function create()
    {
        return view('fabrics.create');
    }

    public function store(Request $request)
    {
        Fabric::create($request->all());
        $msg = [
          'message' => 'Fabric created successfully!' ];
        return  redirect('admin/fabric')->with($msg);
    }

    public function edit(Fabric $fabric)
    {
        return  view('fabrics.edit',compact('fabric'));
    }

    public function update(Request $request)
    {
        Fabric::where('id', $request->id)
        ->update(['name'=>$request->name ]);       
        $msg =['message' => 'Fabric Updated successfully!'];
         return  redirect('admin/fabric')->with($msg);
    }
    
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
