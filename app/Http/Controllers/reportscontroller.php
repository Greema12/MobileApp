<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sales;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class reportscontroller extends Controller
{
    //
    public function purchasereports()
    {
      
     return view('Reports.purchasereport');
    }


    public function purchasesearch(Request $request)
    {
       
       
        $validated = $request->validate([

            'start_date' => 'required|date',
          'end_date' => 'required|date',
        ]);
       
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();;
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();;
            $data1 =Purchase::whereBetween('date',[$start_date,$end_date])->sum('purchase_bill.price');
            $data = Purchase::whereBetween('date',[$start_date,$end_date])->get();
       
        
        } 
    return view('Reports.reports',compact('data','data1'));
   
    }

    public function salessearch(Request $request)
    {
       
       
        $validated = $request->validate([

            'start_date' => 'required|date',
          'end_date' => 'required|date',
        ]);
       
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();;
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();;
            $data1 = Sales::whereBetween('date',[$start_date,$end_date])->where('sale_action','=','saleout')->sum('sales_bill.price');
            $data =Sales::whereBetween('date',[$start_date,$end_date])->where('sale_action','=','saleout')->get();
        
        } 
    return view('Reports.reports',compact('data','data1'));
   
    }

    public function storesales(Request $request)
    {
        if ($request->hasFile('image1')) {
            $img = $request->file('image1');
            $name1 ='IMAGE1'. time().$img->getClientOriginalExtension();
            $destinationPath = public_path('/picture');
            $img->move($destinationPath, $name1);
        }
        if ($request->hasFile('image2')) {
            $img2 = $request->file('image2');
            $name2 = 'IMAGE2'.time().$img2->getClientOriginalExtension();
            $destinationPath2 = public_path('/picture');
            $img2->move($destinationPath2, $name2);
     }
     if ($request->hasFile('image3')) {
        $img3 = $request->file('image3');
        $name3 = 'IMAGE3'.time().$img3->getClientOriginalExtension();
        $destinationPath3 = public_path('/picture');
        $img3->move($destinationPath3, $name3);
 }

 $this->validate($request,[
    // 'date' => 'required',
    // 'party_name' => 'required',
    // 'party_mob_no' => 'required',
    // 'brand' => 'required',
    // 'model_number' => 'required',
    // 'colour'=>'required',
    // 'condition1' => 'required',
    // 'IMEI_Number' =>'required',
     'warranty'=>'required',
    // 'warranty_date'=>'required',
    // 'image1'=>'required',
    // 'image2'=>'required',
    // 'image3'=>'required',
    // 'invoice_number'=>'required',
    // 'invoice_date'=>'required',
    // 'sale_action'=>'required',
    // 'price'=>'required',
    // 'RAM_GB'=>'required'
   
   
    ]);

        $data = Sales::updateOrCreate([
       
             'id'   => $request->get('id'),
        ],[
        'date'          =>  $request->get('date'),
        'price'         =>  $request->get('price'),
        'party_name'    =>  $request->get("party_name"),
        'party_mob_no'  =>  $request->get('party_mob_no'),
        'brand '        =>  $request->get('brand'),
        'model_number'  =>  $request->get('model_number'),
        'invoice_number'=> $request->get('invoice_number'),
        'invoice_date'  => $request->get('invoice_date'),
        'colour'        =>  $request->get('colour'),
        'condition1'    => $request->get('condition1'),
        'IMEI_Number' => $request->get('IMEI_Number'),
        
        'image1' => $name1,
        'image2' => $name2,
        'image3' => $name3,

       ' warranty' => $request->get('warranty'),
       'warranty_date' => $request->get('warranty_date'),
       'sale_action' => $request->get('sale_action'),
       'RAM_GB' => $request->get('RAM_GB'),


       
      
       
        
            
        
    ]);

    $data->save();
    return redirect('Sales/sales');
}


}

