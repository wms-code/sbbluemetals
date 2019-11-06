<?php
namespace App\Http\Controllers\Admin\Settings; 
use App\Model\Company;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $company= Company::orderBy('name','asc')->paginate(5);
        return view('companies.list',compact('company'));
    }

    public function create()
    {
        return view('companies.create');   
    }

    public function store(Request $request)
    {        
       // $request->validate([
        //    'name' => 'required|name|max:255|unique:colours' ]);        
        Company::create($request->all());
        $msg = [ 'message' => 'Company created successfully!' ];
        return  redirect('admin/companies')->with($msg);
    }

    public function edit(Company $company)
    {
       return  view('companies.edit',compact('company'));
    }

    public function update(Request $request)
    {
        Company::where('id', $request->id)->update(['name'=>$request->name ]);       
        $msg =['message' => 'Company Updated successfully!'];
        return  redirect('admin/companies')->with($msg);
    }

    public function destroy(Company $colour)
    {
       // Company::where('id', $colour->id)->delete();
       //  $colour->delete();
        $msg =['message' => 'Unable to Delete!',
        'type' => 'warning'];
        return  redirect('admin/companies')->with($msg);
    }
}
