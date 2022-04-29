<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class purchasecontroller extends Controller
{
    
    //bulk edit data display in modal
    public function getBulkPurchaseData(Request $request)
    {
    
         if(!empty($request->id))
        {
            
            $purchaseData = Purchase::whereIn('id', $request->id)->where('sale_action','Purchase')->get();

        }
      
      return response()->json($purchaseData);


    }


    //bulk edit data store in sales table
     public function store(Request $request )
    {  
 
       
 
        foreach($request->row as $value) {
        $purchase   =   Sales::updateOrCreate(
            [
                'purchase_id' => $value['id']
            ],
            [
            'date'        =>$value['date'],
            'purchase_id' => $value['id'],
            'sale_action' => $value['sale_action'], 
            'price' => $value['price']
            
            ]);

          
        }
        foreach($request->row as $value) {
             Purchase::updateOrCreate(
                [
                    'id' => $value['id']
                ],
                [
              
                'sale_action' => $value['sale_action']
              
                
                ]);
    
              
            }
       
               
        return Response()->json($purchase);
     }
    
    //
    
     public function storesales(Request $request)
    {
        
        
        
         $data = new Sales();
        //  $data = Sales::find( $request->get('id') );
        $data->purchase_id = $request->get('id');
        $data->date = $request->get('date');
        $data->price = $request->get('price');
        $data->brand = $request->get('brand');
        $data->model_number = $request->get('model_number');
         $data->warranty_date = $request->get('warranty_date');
         $data->invoice_num = $request->get('invoice_num');
         $data->invoice_date = $request->get('invoice_date');
         $data->colour = $request->get('colour');
         $data->IMEI_Number = $request->get('IMEI_Number');

       
        $data->sale_action = $request->get('sale_action');
        $data->save();
        
        $data1 =  Purchase::find($request->get('id'));
        $data1->sale_action = $request->get('sale_action');
        $data1->save();
        return redirect('Sales/forsales');
 

    }
    
      public function purchasedatastore(Request $request)
    {
     
         $data = Purchase::find($request->get('id'));
       
       $data->party_name =$request->get('party_name');
        $data->party_mob_no =$request->get('party_mob_no');
        $data->city = $request->get('city');
       $data->RAM_GB = $request->get('RAM_GB');
        $data->date = $request->get('date');
        $data->price = $request->get('price');
        $data->brand = $request->get('brand');
        $data->model_number = $request->get('model_number');
        $data->warranty = $request->get('warranty');
         $data->warranty_date = $request->get('warranty_date');
         $data->invoice_num = $request->get('invoice_num');
         
         $data->invoice_number = $request->get('invoice_number');
         $data->invoice_date = $request->get('invoice_date');
         $data->colour = $request->get('colour');
         $data->IMEI_Number = $request->get('IMEI_Number');
        $data->sale_action = $request->get('sale_action');
        $data->save();
        
         return redirect('Purchase/purchase');
        // $data1 =  Purchase::find($request->get('id'));
        // $data1->sale_action = $request->get('sale_action');
        // $data1->save();
       
// dd ( $data->invoice_num = $request->get('invoice_num') ,
         
//          $data->invoice_number = $request->get('invoice_number') ,
//          $data->invoice_date = $request->get('invoice_date'));
// die();

    }
    
    
    
    public function purchase()
    {
        $data = Purchase::orderBy('id','DESC')->get();    
    return view('Purchase.purchase',compact('data'));
    }

    public function addpurchase()
    {
          
    return view('Purchase.addpurchase');
    }

    public function editPurchase($id)
    {
    
    //   dd (DB::table('purchase_bill') ->where('id',$id)->value('date'));
    //   die();
   $data = DB::table('purchase_bill') ->where('id',$id)->where('sale_action', '=' ,'Purchase')->get();
      

    return view('Purchase.editPurchase',compact('data'));
    

    }
    
    public function editSale($id)
    {

    $data = DB::table('purchase_bill') ->where('id',$id)->get();
      

    return view('Purchase.editSale',compact('data'));

    }
    
    

    public function storepurchase(Request $request)
    {
    
      
    
    $data = new Purchase();
    
    

        if(!empty($request->date))
        {
        $data->date = $request->get('date');

        }
        if(!empty($request->party_name))
        {
        $data->party_name = $request->get('party_name');

        }
        if(!empty($request->party_mob_no))
        {
        $data->party_mob_no = $request->get('party_mob_no');

        }
        
        if(!empty($request->city))
        {
        $data->city = $request->get('city');

        }
        if(!empty($request->brand))
        {
        $data->brand = $request->get('brand');

        }
        if(!empty($request->model_number))
        {
        $data->model_number = $request->get('model_number');

        }
        if(!empty($request->invoice_number))
        {
        $data->invoice_number = $request->get('invoice_number');

        }
        if(!empty($request->invoice_num))
        {
        $data->invoice_num = $request->get('invoice_num');

        }
        if(!empty($request->invoice_date))
        {
        $data->invoice_date = $request->get('invoice_date');

        }
        if(!empty($request->colour))
        {
        $data->colour = $request->get('colour');

        }
        // if(!empty($request->condition1))
        // {
        // $data->condition1 = $request->get('condition1');

        // }
        if(!empty($request->IMEI_Number))
        {
        $data->IMEI_Number = $request->get('IMEI_Number');

        }

        if ($request->hasFile('image1')) {
            $img = $request->file('image1');
            $name1 ='IMAGE1'. time().$img->getClientOriginalExtension();
            $destinationPath = public_path('/picture');
            $img->move($destinationPath, $name1);
        }
        if(!empty($request->image1))
        {
        $data->image1 = $name1;

        }

        if ($request->hasFile('image2')) {
            $img2 = $request->file('image2');
            $name2 = 'IMAGE2'.time().$img2->getClientOriginalExtension();
            $destinationPath2 = public_path('/picture');
            $img2->move($destinationPath2, $name2);
     }
    
    
        if(!empty($request->image2))
        {
        $data->image2 = $name2;

        }
   
        if(!empty($request->warranty))
        {
        $data->warranty = $request->get('warranty');

        }
        if(!empty($request->warranty_date))
        {
        $data->warranty_date = $request->get('warranty_date');

        }
        if(!empty($request->price))
        {
        $data->price = $request->get('price');

        }
        if(!empty($request->sale_action))
        {
        $data->sale_action = $request->get('sale_action');

        }
        if(!empty($request->RAM_GB))
        {
        $data->RAM_GB = $request->get('RAM_GB');

        }


        $data->save();
       
        return redirect('Purchase/purchase');

    }

    public function deletePurchase($id)
    {
       
        $data =DB::table('purchase_bill')
        ->leftJoin('sales_bill','purchase_bill.id', '=','sales_bill.purchase_id')
        ->where('purchase_bill.id', $id); 
            DB::table('sales_bill')->where('purchase_id', $id)->delete();                           
            $data->delete();
        return redirect('Purchase/purchase');
       
     
        
        return redirect('Purchase/purchase');
                      
    }
    

}