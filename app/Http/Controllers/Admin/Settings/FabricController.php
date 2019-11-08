<?php 
namespace App\Http\Controllers\Admin\Settings; 
use Illuminate\Http\Request;
use App\Model\Fabric; 
use App\Model\Fabricgroup; 
use Illuminate\Routing\Controller;
use DB;
class FabricController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
              
       // $accounts= Account::orderBy('Ac_Name','asc')->with(['accountsgroups'])->get();
        //return view('accounts.list',compact('accounts')); fabricgroups

       // $fabricgroups = Fabricgroup::getall(); 
       // $fabrics= Fabric::orderBy('name','asc')
       //    ->with(['fabricgroups'])->get();
          // ->paginate(15);
          // ->get();
        // 
       // $fabrics= with(['fabricgroups'], Fabric::orderBy('name', 'asc')->paginate(15)->get());
       //$users = Fabric::orderBy('name','asc')->paginate(15);
       
        
        $fabrics = DB::table('fabrics')
    //   $fabrics= Fabric::orderBy('name','asc')
            ->leftJoin('fabricgroup', 'fabrics.fabricgroup_code', '=', 'fabricgroup.id')
            ->select('fabrics.id','fabrics.name as fabricname', 'fabricgroup.name as fabricgroupname')
            ->orderBy('fabrics.name', 'asc')
            ->paginate(10);          
       //     ->get();
       // return view('user.index', ['users' => $users]);
        return view('fabrics.list',compact(['fabrics']));
    }

    public function create()
    {
        $fabricgroups = Fabricgroup::getall(); 
        return view('fabrics.create',compact(['fabricgroups']));
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
       
        $fabricgroups = Fabricgroup::getall(); 
        return  view('fabrics.edit', compact(['fabricgroups','fabric']));
    }

    public function update(Request $request)
    {
        Fabric::where('id', $request->id)
        ->update(['name'=>$request->name,'fabricgroup_code'=>$request->fabricgroup_code ]);       
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
