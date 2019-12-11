<?php

namespace App\Http\Controllers\Admin\Settings;

use Illuminate\Http\Request;  
use App\Model\Cuttingproduction;
use App\Model\Fabric;
use App\Model\Colour;
use App\Model\Stockpoint;
use App\Model\Style;
use App\Model\Knittedfabdetails;
use App\Http\Controllers\Controller;
use DB;
class CuttingproductionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $rsdepartmentData['data'] = Cuttingproduction::getall();
        return view('cuttingproduction.list',compact(['rsdepartmentData']));
    }
    private  function getmax()
    {
        $str='000000';$stringlen=0;
        $retvalue=Cuttingproduction::max('productionnumber');
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
        $retvalue=Cuttingproduction::max('productionnumber');
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
  
    public function create()
    {
       $rsdepartmentData['production_number'] = $this->getmax(); 
       $rsdepartmentData['productionnumber'] = $this->getmaxinwardno();        
       $rsdepartmentData['staff'] = Cuttingproduction::getstaff();
       $rsdepartmentData['fabrics'] = Fabric::getall();      
       $rsdepartmentData['style'] = Style::getall();     
       $rsdepartmentData['colour'] = Colour::getall();      
       $rsdepartmentData['frn'] = Cuttingproduction::getfrn();           
       return view('cuttingproduction.create',compact(['rsdepartmentData']));
       
    }
    public function editfrn($id)
    {
         
    }

    public function savefrn(Request $request)
    {
        $i=0;$output='';
        //return   $request->frnnumber;
        foreach($request->sno as $arrcolour)
           { 
            Knittedfabdetails::where(
                    ['inwardnumber'=>$request->id,'indx'=>$i+1])->update(
                    ['delivery_weight'=>$request->recdweight[$i],
                     'frnnumber'=>$request->frnnumber[$i]
                    ]); 
                    $i=$i+1;
           }             
     
        echo 'Knitted Fabric Entry Updated successfully!';
         
    }

  
    public function edit(KnittedFabInward $knittedFabInward,$id)
    {
         
        $rsdepartmentData['data'] = KnittedFabInward::getsupplier();

        $rsdepartmentData['rsdetails'] = DB::table('knitted_fab_details')  
              ->select( 'fabric_id as fabricsid','colour_id as coloursid',
                         'hsn',
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
                          'packingtaxamount','packingtaxper','totalpackingamount','packingamount',
                         'round_off','inward_date','inwarddate','party_code','tax_amount',
                          'inwardnumber')
                ->orderBy('knitted_fab_inwards.inward_date', 'asc')              
                ->where('inwardnumber',$id)
                ->get();       
       
        $rsfabrics = DB::table('fabrics')        
                ->leftJoin('fabricgroup', 'fabrics.fabricgroup_code', '=', 'fabricgroup.id')
                ->select('fabrics.id','remarks','fabrics.name as fabricname', 'fabricgroup.name as fabricgroupname')
                ->orderBy('fabricgroup.name', 'asc')
                ->orderBy('fabrics.name', 'asc')
                ->get(); 
        
        $rscolour = Colour::getall(); 
       return view('knitted.edit',compact(['rsdepartmentData','rsfabrics','rscolour']));
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
                                    'packingamount'=>$request->packingamount,
                                    'packingtaxamount'=>$request->packingtaxamount,
                                    'packingtaxper'=>$request->packingtaxper,
                                    'totalpackingamount'=>$request->totalpackingamount,
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
                                        'delivery_weight'=>$request->qty[$i],
                                        'rate'=>$request->rate[$i],
                                        'amount'=>$request->amount[$i],
                                        'perrateamount'=>$request->perrateamount[$i],
                                        'taxper'=>$request->taxper[$i],
                                        'taxamt'=>$request->taxamt[$i] ]);
            $i=$i+1;
            }                            
        $msg = [
          'message' => 'Knitted Fabric Entry created successfully!' ];
        return  redirect('admin/knittedfabric')->with($msg);
    }

   public function fetchsize(Request $request)
   {
       $styleid= $request->get('styleid');
       if($request->get('styleid'))
       { 
         $rsdepartmentData = DB::table('styledetail')      
          ->select('size1','size2','size3','size4','size5','size6','size7','size8')
          ->where('styleid',$styleid)
          ->where('indx',1)
          ->get(); 
        }
        return $rsdepartmentData;
   }

   public function fetchfrnloop($colour_id,$fabric_id)
   {      
         $rsdepartmentData = DB::table('knitted_fab_details')      
          ->select('frnnumber')
          ->where('fabric_id',$fabric_id)
          ->where('colour_id',$colour_id)
          ->get();         
        return $rsdepartmentData;
   }

   public function fetchfrn(Request $request)
   {
        $colour_code1=0; $colour_code2=0; $colour_code3=0; $colour_code4=0; $colour_code5=0;
        $fabric_code1=0; $fabric_code2=0; $fabric_code3=0; $fabric_code4=0; $fabric_code5=0;

         $styleid= $request->get('styleid');
        if($request->get('styleid'))
         { 
           $rsdepartmentData = DB::table('style')      
            ->select('fabric_code1','colour_code1','fabric_code2','colour_code2',
                     'fabric_code3','colour_code3', 'fabric_code4','colour_code4',
                     'fabric_code5','colour_code5',
                     )
            ->where('id',$styleid)
            ->get(); 

            foreach( $rsdepartmentData->all() as $category ) {
                $colour_code1= $category->colour_code1;
                $colour_code2= $category->colour_code2;
                $colour_code3= $category->colour_code3;
                $colour_code4= $category->colour_code4;
                $colour_code5= $category->colour_code5;
                $fabric_code1= $category->fabric_code1;
                $fabric_code2= $category->fabric_code2;
                $fabric_code3= $category->fabric_code3;
                $fabric_code4= $category->fabric_code4;
                $fabric_code5= $category->fabric_code5;
            }
          
         }

         //
         if ($colour_code1 > 0)
             {
                  $rsfrn=$this->fetchfrnloop($colour_code1,$fabric_code1);
                  foreach( $rsfrn->all() as $category ) {
                    $colour_code1= $category->frnnumber;
                  }
              
              }
          
         // 


         return  $colour_code1;
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
        'packingamount'=>$request->packingamount,
        'packingtaxamount'=>$request->packingtaxamount,
        'packingtaxper'=>$request->packingtaxper,
        'totalpackingamount'=>$request->totalpackingamount,
        'round_off'=>$request->round_off,
        'net_value'=>$request->net_value,
        'remarks'=>$request->remarks ]);
       
        DB::table('knitted_fab_details')->where('inwardnumber',$request->inwardnumber)->delete();

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
                                        'delivery_weight'=>$request->qty[$i],
                                        'rate'=>$request->rate[$i],
                                        'amount'=>$request->amount[$i],
                                        'perrateamount'=>$request->perrateamount[$i],
                                        'taxper'=>$request->taxper[$i],
                                        'taxamt'=>$request->taxamt[$i]  ]);
            $i=$i+1;
            }               
//         $i=0;
//         foreach($request->selcolour as $arrcolour)
//             {
//  Knittedfabdetails::where(
//      ['inwardnumber'=>$request->inwardnumber,'indx'=>$i+1])->update(
//          ['inward_date'=>$request->inward_date,
//                            'party_code'=>$request->pty_code,
//                                         'colour_id'=>$arrcolour,
//                                         'fabric_id'=>$request->selfabric[$i],
//                                         'particulars'=>$request->particulars[$i],
//                                         'hsn'=>$request->hsn[$i],
//                                         'rolls'=>$request->rolls[$i],
//                                         'weight'=>$request->qty[$i],
//                                         'rate'=>$request->rate[$i],
//                                         'amount'=>$request->amount[$i],
//                                         'perrateamount'=>$request->perrateamount[$i],
//                                         'taxper'=>$request->taxper[$i],
//                                         'taxamt'=>$request->taxamt[$i],
//                                         'roundoff'=>$request->roundoff[$i] ]);
//             $i=$i+1;
//             }             

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
