<?php

namespace App\Http\Controllers\Admin\Settings;

use Illuminate\Http\Request;  
use App\Model\KnittedFabInward;
use App\Model\Fabric;
use App\Model\Colour;
use App\Model\Stockpoint;
use App\Http\Controllers\Controller;
use DB;
class KnittedFabInwardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function store(Request $request)
    {
        KnittedFabInward::create(['inward_number'=>$request->inward_number,
                                    'inwardnumber'=>$request->inwardnumber,
                                    'party_code'=>$request->pty_code,
                                    'inward_date'=>$request->inward_date,
                                    'inwarddate'=>$request->inwarddate,
                                    'reference'=>$request->reference,
                                    'sub_total'=>$request->sub_total,
                                    'total_weight'=>$request->total_weight,
                                    'tax_amount'=>$request->tax_amount,
                                    'round_off'=>$request->round_off,
                                    'net_value'=>$request->net_value,
                                    'remarks'=>$request->remarks ]);
                                    
        $msg = [
          'message' => 'Knitted Fabric Entry created successfully!' ];
        return  redirect('admin/knittedfabric')->with($msg);
    }

    private  function getmax()
    {
        $str='000000';$stringlen=0;
        $retvalue=KnittedFabInward::max('inwardnumber');
        if ($retvalue === null)
        {
            $retvalue=1;
            $stringlen=1;
        }
        elseif ($retvalue >=1)
        {
            $stringlen=$retvalue;
            $retvalue=$retvalue+1;
        }
         $stringlen=strlen($retvalue);
        switch ($stringlen) {
            case 1:
            $str='00000';
                break;
            case 2:
            $str='0000';
                break;
            case 3:
            $str='000';
                break;
            case 4:
                $str='00';
                break;
            case 5:
                $str='0';
                break;  
            case 6:
                $str='';
                break;               
            default:
            $str='0';
        }
        $retvalue=$str.$retvalue.'/19-20';
        return $retvalue;
    }
    private  function getmaxinwardno()
    {
        $retvalue=KnittedFabInward::max('inwardnumber');
        if ($retvalue === null)
        {
            $retvalue=1;
        }
        elseif ($retvalue >=1)
        {
            $retvalue=$retvalue+1;
        }
        return $retvalue;
    }
    public function index()
    {
        $rsdepartmentData['data'] = KnittedFabInward::getall();
        return view('knitted.list',compact(['rsdepartmentData']));
    }
    public function create()
    {
        $rsdepartmentData['data'] = KnittedFabInward::getsupplier();
        
        $rsfabrics = DB::table('fabrics')        
               ->leftJoin('fabricgroup', 'fabrics.fabricgroup_code', '=', 'fabricgroup.id')
               ->select('fabrics.id','fabrics.name as fabricname', 'fabricgroup.name as fabricgroupname')
               ->orderBy('fabricgroup.name', 'asc')
               ->orderBy('fabrics.name', 'asc')
               ->get(); 
       
       $rsdepartmentData['colour'] = Colour::getall(); 
       $rsdepartmentData['rsstockpoint'] = Stockpoint::getall(); 
       $rsdepartmentData['inward_number'] = $this->getmax(); 
       $rsdepartmentData['inwardnumber'] = $this->getmaxinwardno();           
       return view('knitted.create',compact(['rsdepartmentData','rsfabrics']));
       
    }

    public function fetcssh(Request $request)
    {
     if($request->get('query'))
     {
      $query = $request->get('query');
      $data = DB::table('apps_countries')
        ->where('country_name', 'LIKE', "%{$query}%")
        ->get();
      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
      foreach($data as $row)
      {
       $output .= '
       <li><a href="#">'.$row->country_name.'</a></li>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }
    }

    public function fetchrack(Request $request)
    {      
        $data = DB::table('stockpoints')->get();
        $output ='';
        foreach($data as $row)
        {
            $output .='<option value='.$row->id.'>'.$row->name.'</option>';
        }         
         echo $output;      
    }
    public function fetchcolour()
    {    
        echo 's';  
        $data = DB::table('colours')->get();
        $output ='';
        foreach($data as $row)
        {
            $output .='<option value='.$row->id.'>'.$row->name.'</option>';
        }         
         echo $output;      
    }
    public function fetchfabric(Request $request){
     
        $rsfabrics = DB::table('fabrics')        
        ->leftJoin('fabricgroup', 'fabrics.fabricgroup_code', '=', 'fabricgroup.id')
        ->select('fabrics.id','fabrics.name as fabricname', 'fabricgroup.name as fabricgroupname')
        ->orderBy('fabricgroup.name', 'asc')
        ->orderBy('fabrics.name', 'asc')
        ->get(); 

        $output ='';
        $previousCountry = null; 
        foreach($rsfabrics  as $courseCategory) 
        {
            if ($previousCountry != $courseCategory->fabricgroupname) 
              {
                $output .= "<optgroup label='$courseCategory->fabricgroupname'>";
              } 
        
            $output .="<option value='$courseCategory->id'>$courseCategory->fabricname</option>";
            $previousCountry = $courseCategory->fabricgroupname;            
            if ($previousCountry != $courseCategory->fabricgroupname) 
            {
                $output .= "</optgroup>";
            }                                             
        } 
       echo $output;      
    }
    public function fetch1(Request $request){
        $query = $request->get('term','');
        $countries=\DB::table('apps_countries');
       // if($request->type=='country_name'){
            $countries->where('country_name','LIKE','%'.$query.'%');
       // }
       // if($request->type=='country_code'){
       //     $countries->where('country_name','LIKE','%'.$query.'%');
       // }
           $countries=$countries->get();        
        $data=array();
        foreach ($countries as $country) {
                $data[]=array('name'=>$country->country_name,'sortname'=>$country->country_name);
        }
        return redirect()->back() ->with('alert',$data);
        if(count($data))
             return $data;
        else
            return ['name'=>'','sortname'=>''];
    }
    
    

    
   

    
    public function show(KnittedFabInward $knittedFabInward)
    {
        
    }

     
    public function edit(KnittedFabInward $knittedFabInward)
    {
         
    }
 
    public function update(Request $request, KnittedFabInward $knittedFabInward)
    {
       
    }

  
    public function destroy(KnittedFabInward $knittedFabInward)
    {
         
    }
    
}
