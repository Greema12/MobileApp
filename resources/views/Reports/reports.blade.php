@extends('Layout.master')
   
@section('content') 


<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Report List</h4> &nbsp;&nbsp;&nbsp;
      
      </div>
      <br/>

      <div class="buttons" style="margin-left: 1100px; ">
       
      </div>
      
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped" id="tableExport">
            <thead>
              <tr>
               
                <th class="text-center">Date</th>
                <th class="text-center">Party Name	</th>
                 <th>Mobile No.</th> 
                <th class="text-center">Brand</th>
                <th class="text-center">Model No</th>
               
                <th class="text-center">Invoice Number</th>
                <th class="text-center">Invoice Date</th>
                <th class="text-center">Price</th>
                
                
                
              </tr>
            </thead>
            <tbody>
             
              <?php $count = 1; ?>
              @foreach($data as $key )
              <tr>
               
                <td class="text-center" >{{ date('d-m-Y', strtotime($key->date)) }}</td>
                <td class="text-center">{{$key->party_name }}</td>
                <td>{{$key->party_mob_no }}</td>
                <td class="text-center" >{{$key->brand }}</td>
                <td class="text-center">{{$key->model_number }}</td>
               
                <td class="text-center">{{$key->invoice_num }}</td>
                <td class="text-center">{{$key->invoice_date }}</td>
  
                <td class="text-right"> {{$key->price }}
                 
                </td>
               
              
              </tr>
             
              <?php $count++; ?> 
              @endforeach
            
               <td class="text-center">
                     Total 
                
                    </td>
                {{-- <td></td> --}}
                 <td></td> 
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="text-center" style=" font-weight: bold;">Total</td>
                <td class="text-right" style=" font-weight: bold;">{{$data1}}</td>
             
             
             
             
             
             
             
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>




@endsection