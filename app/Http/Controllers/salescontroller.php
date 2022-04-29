<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class salescontroller extends Controller
{
   
    public function forsales()
    {
        // $data = Purchase::get()->where('sale_action','=','sale'); 
        
         $data =DB::table('purchase_bill')->join('sales_bill','sales_bill.purchase_id' , '=', 'purchase_bill.id')
                                       ->select('purchase_bill.*', 'sales_bill.date' ,'sales_bill.price' )
                                      ->where('purchase_bill.sale_action', 'sale')
                                      ->orderBy('id','DESC')
                                     ->get();
                                     
    return view('Sales.forsales',compact('data'));
    }

     public function editSales($id)
    {
       
    $data= DB::table('sales_bill')->where('purchase_id',$id)->orderByDesc('id')->take(1)->get(); 
    
    return view('Sales.editSales',compact('data'));

    }


   public function storesalessingle(Request $request)
    {
       
        $data = Sales::find($request->get('id'));     
            $data->date = $request->get('date');
            $data->price = $request->get('price');
            $data->save();
            return redirect('Sales/forsales');

    }
    public function editSold($id)
    {
       
    $data= DB::table('sales_bill')->where('purchase_id',$id)->orderByDesc('id')->take(1)->get(); 
    
    return view('Sales.editSold',compact('data'));

    }

  
 public function storesoldout(Request $request)
    {
        $data = Sales::find( $request->get('id') );
    
        $data->date = $request->get('date');
        $data->price = $request->get('price');
         $data->sale_action = $request->get('sale_action');
         $data->party_name = $request->get('party_name');
         $data->party_mob_no = $request->get('party_mob_no');
         $data->city = $request->get('city');
         $data->save();
         
        
        $data2 = Purchase::find($request->get('purchase_id'));
        $data2->sale_action =$request->get('sale_action');
        $data2->save();
        return redirect('Sales/soldout');


    }
    
    public function soldout()
    {
      
        
        $data =DB::table('purchase_bill')->join('sales_bill', 'purchase_bill.id', '=', 'sales_bill.purchase_id') 
                                      ->select('purchase_bill.*', 'sales_bill.date' ,'sales_bill.price','sales_bill.party_name' ,'sales_bill.party_mob_no','sales_bill.city')
                                      ->where('purchase_bill.sale_action', 'saleout')
                                      ->orderBy('id','DESC')
                                     ->get();
                                     
        
    return view('Sales.soldout',compact('data'));
    }
    public function storesales(Request $request)
    {
       
        if(($request->filled('id')))
        {
            
            
            $data = Sales::find($request->get('purchase_id'));     
        }      
    else
        {
            
            $data = new Sales();
   
        }
   

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
        if(!empty($request->invoice_date))
        {
        $data->invoice_date = $request->get('invoice_date');

        }
        if(!empty($request->colour))
        {
        $data->colour = $request->get('colour');

        }
        if(!empty($request->condition1))
        {
        $data->condition1 = $request->get('condition1');

        }
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
        if ($request->hasFile('image3')) {
            $img3 = $request->file('image3');
            $name3 = 'IMAGE3'.time().$img3->getClientOriginalExtension();
            $destinationPath3 = public_path('/picture');
            $img3->move($destinationPath3, $name3);
     }
        if(!empty($request->image3))
        {
        $data->image3 = $name3;

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
        return redirect('Sales/sales');

    }

    public function deleteSales($id)
    {
       
        $data = Sales::find($id);
        $data->delete();
        return redirect('Sales/sales');
                      
    }

}
