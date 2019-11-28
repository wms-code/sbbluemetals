<?php
namespace App\Http\Controllers\Admin\Settings; 
use Illuminate\Http\Request;
use App\Model\Style; 
use App\Model\Styledetail;
use App\Model\Size; 
use App\Model\Fabric;
use App\Model\Colour;
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
        $fabric=Fabric::getall();
        $colour=Colour::getall();
        return view('style.create',compact(['size','fabric','colour']));
    }
    public function store(Request $request)
    {
          
        
         $user =Style::create([
            'name'=>$request->name,
            'size_code'=>$request->size_code,
            'fabric_code1'=>$request->fabric_code1,
            'fabric_code2'=>$request->fabric_code2,
            'fabric_code3'=>$request->fabric_code3,
            'fabric_code4'=>$request->fabric_code4,
            'fabric_code5'=>$request->fabric_code5,
            'colour_code1'=>$request->colour_code1,
            'colour_code2'=>$request->colour_code2,
            'colour_code3'=>$request->colour_code3,
            'colour_code4'=>$request->colour_code4,
            'colour_code5'=>$request->colour_code5
                        ]); 

          $styleid= $user->id;     
        Styledetail::create([
                    'styleid'=>$styleid,  
                    'size_code'=>$request->size_code,
                    'size1'=>$request->size1,
                    'size2'=>$request->size2,
                    'size3'=>$request->size3,
                    'size4'=>$request->size4,
                    'size5'=>$request->size5,
                    'size6'=>$request->size6,
                    'size7'=>$request->size7,
                    'size8'=>$request->size8,
                     'indx'=>1
                     ]);
        Styledetail::create([
                        'styleid'=>$styleid,  
                        'size_code'=>$request->size_code,
                        'size1'=>$request->weight_0,
                        'size2'=>$request->weight_1,
                        'size3'=>$request->weight_2,
                        'size4'=>$request->weight_3,
                        'size5'=>$request->weight_4,
                        'size6'=>$request->weight_5,
                        'size7'=>$request->weight_6,
                        'size8'=>$request->weight_7,
                         'indx'=>2
                         ]);
           
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
