<?php
namespace App\Http\Controllers\Admin\Settings; 
use Illuminate\Http\Request;
use App\Model\Size; 

use Illuminate\Routing\Controller;
use DB;
class SizeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $size= Size::orderBy('name','asc')->paginate(5);
        return view('size.list',compact('size'));
    }
    public function fetchtable(Request $request)
    {
       $size_code= $request->get('size_code');
       if($request->get('size_code'))
        { 
          $rsdepartmentData = DB::table('size')      
           ->select('size1','size2','size3','size4','size5','size6','size7','size8')
           ->where('id',$size_code)
           ->get(); 
        }
        return $rsdepartmentData;
    }
    public function create()
    {
        return view('size.create');
    }


    public function store(Request $request)
    {
        Size::create($request->all());
        $msg = [ 'message' => 'Size created successfully!' ];
        return  redirect('admin/size')->with($msg);
    }

  
    public function edit(Size $size)
    {
        return  view('size.edit',compact('size'));
    }

   
    public function update(Request $request)
    {
        Size::where('id', $request->id) ->update(
            [
                'name'=>$request->name,
                'size1'=>$request->size1,
                'size2'=>$request->size2,
                'size3'=>$request->size3,
                'size4'=>$request->size4,
                'size5'=>$request->size5,
                'size6'=>$request->size6,
                'size7'=>$request->size7,
                'size8'=>$request->size8
                 ]
        );       
        $msg =['message' => 'Size Updated successfully!'];
        return  redirect('admin/size')->with($msg);
    }

   
    public function destroy(Size $size)
    {
       // $fabric->delete();
       // $msg =['message' => 'Fabric Deleted successfully!',
       //'type' => 'warning'];

       $msg =['message' => 'Unable to Delete!',
       'type' => 'warning'];
        return  redirect('admin/size')->with($msg);
    }
}
