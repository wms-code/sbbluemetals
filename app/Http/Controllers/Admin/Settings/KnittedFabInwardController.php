<?php

namespace App\Http\Controllers\Admin\Settings;

use Illuminate\Http\Request;  
use App\Model\KnittedFabInward;
use App\Model\Fabric;
use App\Model\Colour;
use App\Model\Stockpoint;
use App\Model\Knittedfabdetails;
use App\Http\Controllers\Controller;
use DB;
class KnittedFabInwardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
   
    
    public function editfrn($id)
    {
         
    }

    public function savefrn(Request $request)
    {
        $i=0;$output='';
           
       foreach($request->sno as $arrcolour)
           { 
            Knittedfabdetails::where(
                    ['inwardnumber'=>$request->id,'indx'=>$i+1])->update(
                    ['delivery_weight'=>$request->recdweight[$i]]); 
                    $i=$i+1;
           }             
     
        echo 'Knitted Fabric Entry Updated successfully!';
         
    }

    public function fetchfrn(Request $request)
    {      
        
        $data = DB::table('knitted_fab_details')        
        ->join('colours', 'colours.id', '=', 'knitted_fab_details.colour_id')
        ->join('fabrics', 'fabrics.id', '=', 'knitted_fab_details.fabric_id')
        ->select( 'colours.name as coloursname','colours.id as coloursid','fabrics.id as fabricsid',
                  'fabrics.name as fabricsname','hsn','delivery_weight',
                   'indx','particulars','rolls','weight','rate',
                   'amount','perrateamount','taxper','taxamt','roundoff',
                   'inwardnumber','inward_number')
         ->orderBy('indx', 'asc')  
         ->where('inwardnumber',$request->id)
         ->get();  
         
            
        return $data;      
    }
    public function edit(KnittedFabInward $knittedFabInward,$id)
    {
         
        $rsdepartmentData['data'] = KnittedFabInward::getsupplier();

        $rsdepartmentData['rsdetails'] = DB::table('knitted_fab_details')        
              ->join('colours', 'colours.id', '=', 'knitted_fab_details.colour_id')
              ->join('fabrics', 'fabrics.id', '=', 'knitted_fab_details.fabric_id')
              ->select( 'colours.name as coloursname','colours.id as coloursid','fabrics.id as fabricsid',
                        'fabrics.name as fabricsname','hsn',
                         'indx','particulars','rolls','weight','rate',
                         'amount','perrateamount','taxper','taxamt','roundoff',
                         'inwardnumber','inward_number')
               ->orderBy('indx', 'asc')              
               ->where('inwardnumber',$id)
               ->get(); 

       $rsdepartmentData['rsfabrics'] = DB::table('knitted_fab_inwards')        
               ->join('accounts', 'accounts.id', '=', 'knitted_fab_inwards.party_code')
               ->select('accounts.name as acname','inward_number',
                          'reference','remarks','sub_total','net_value','total_weight',
                         'round_off','inward_date','inwarddate','party_code','tax_amount',
                          'inwardnumber')
                ->orderBy('knitted_fab_inwards.inward_date', 'asc')              
                ->where('inwardnumber',$id)
                ->get();       
       
      
       return view('knitted.edit',compact(['rsdepartmentData']));
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
        
        $i=0;
        foreach($request->selcolour as $arrcolour)
            {
                Knittedfabdetails::create(['knitted_fab_inward_number'=>$request->inward_number,
                                        'inward_date'=>$request->inward_date,
                                        'inwardnumber'=>$request->inwardnumber,
                                        'party_code'=>$request->pty_code,
                                        'indx'=>$i+1,
                                        'colour_id'=>$arrcolour,
                                        'fabric_id'=>$request->selfabric[$i],
                                        'particulars'=>$request->particulars[$i],
                                        'hsn'=>$request->hsn[$i],
                                        'rolls'=>$request->rolls[$i],
                                        'weight'=>$request->qty[$i],
                                        'rate'=>$request->rate[$i],
                                        'amount'=>$request->amount[$i],
                                        'perrateamount'=>$request->perrateamount[$i],
                                        'taxper'=>$request->taxper[$i],
                                        'taxamt'=>$request->taxamt[$i],
                                        'roundoff'=>$request->roundoff[$i] ]);
            $i=$i+1;
            }                            
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

     
   
    
    public function update(Request $request, KnittedFabInward $knittedFabInward)
    {  
        KnittedFabInward::where('inwardnumber',$request->inwardnumber)->update([ 
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
    
        
        $i=0;
        foreach($request->selcolour as $arrcolour)
            {
 Knittedfabdetails::where(
     ['inwardnumber'=>$request->inwardnumber,'indx'=>$i+1])->update(
         ['inward_date'=>$request->inward_date,
                           'party_code'=>$request->pty_code,
                                        'colour_id'=>$arrcolour,
                                        'fabric_id'=>$request->selfabric[$i],
                                        'particulars'=>$request->particulars[$i],
                                        'hsn'=>$request->hsn[$i],
                                        'rolls'=>$request->rolls[$i],
                                        'weight'=>$request->qty[$i],
                                        'rate'=>$request->rate[$i],
                                        'amount'=>$request->amount[$i],
                                        'perrateamount'=>$request->perrateamount[$i],
                                        'taxper'=>$request->taxper[$i],
                                        'taxamt'=>$request->taxamt[$i],
                                        'roundoff'=>$request->roundoff[$i] ]);
            $i=$i+1;
            }             

        $msg = [
            'message' => 'Knitted Fabric Entry Updated successfully!' ];
        return  redirect('admin/knittedfabric')->with($msg);
    }

  
    public function destroy($id)
    {
       
       DB::table('knitted_fab_inwards')->where('inwardnumber',$id)->delete();
       DB::table('knitted_fab_details')->where('inwardnumber',$id)->delete();
       
        $msg =['message' => 'Inward Fabric Deleted successfully!',
       'type' => 'warning'];

      
        return  redirect('admin/knittedfabric')->with($msg); 
    }
    
}
