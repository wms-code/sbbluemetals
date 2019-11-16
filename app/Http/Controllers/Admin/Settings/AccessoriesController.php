<?php
namespace App\Http\Controllers\Admin\Settings; 
use Illuminate\Http\Request;
use App\Model\Accessories; 
use Illuminate\Routing\Controller;
class AccessoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $accessories= Accessories::orderBy('name','asc')->paginate(5);
        return view('accessories.list',compact('accessories'));
    }

    public function create()
    {
        return view('accessories.create');
    }


    public function store(Request $request)
    {
        Accessories::create($request->all());
        $msg = [ 'message' => 'Accessories created successfully!' ];
        return  redirect('admin/accessories')->with($msg);
    }

  
    public function edit(Accessories $accessories)
    {
        return  view('accessories.edit',compact('accessories'));
    }

   
    public function update(Request $request)
    {
        Accessories::where('id', $request->id) ->update(
            [
                'name'=>$request->name             
                 ]
        );       
        $msg =['message' => 'Accessories Updated successfully!'];
        return  redirect('admin/accessories')->with($msg);
    }

   
    public function destroy(Accessories $size)
    {
       // $fabric->delete();
       // $msg =['message' => 'Fabric Deleted successfully!',
       //'type' => 'warning'];

       $msg =['message' => 'Unable to Delete!',
       'type' => 'warning'];
        return  redirect('admin/accessories')->with($msg);
    }
}
