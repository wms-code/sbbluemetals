<?php
namespace App\Http\Controllers\Admin\Settings; 
use Illuminate\Http\Request;
use App\Model\Style; 
use App\Model\Size; 
use Illuminate\Routing\Controller;
class StyleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $style= Style::orderBy('name','asc')->paginate(5);
        return view('style.list',compact('style'));
    }

    public function create()
    {
        $size = Size::getall(); 
        return view('style.create',compact(['size']));
       // return view('style.create');
    }


    public function store(Request $request)
    {
        Style::create($request->all());
        $msg = [ 'message' => 'Style created successfully!' ];
        return  redirect('admin/style')->with($msg);
    }

  
    public function edit(Style $style)
    {
        return  view('style.edit',compact('style'));
    }

   
    public function update(Request $request)
    {
        Style::where('id', $request->id) ->update(['name'=>$request->name ]);       
        $msg =['message' => 'Style Updated successfully!'];
        return  redirect('admin/style')->with($msg);
    }

   
    public function destroy(Style $style)
    {
       // $fabric->delete();
       // $msg =['message' => 'Fabric Deleted successfully!',
       //'type' => 'warning'];

       $msg =['message' => 'Unable to Delete!',
       'type' => 'warning'];
        return  redirect('admin/style')->with($msg);
    }
}
