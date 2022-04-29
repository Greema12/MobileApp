@extends('Layout.master')
   
@section('content')              
  <!-- Main Content -->

  <div class="card">
    <div class="card-header">
      <h4>Edit Purchase Form</h4>
    </div>
    <div class="card-body">
 {{-- error report --}}
      @if (count($errors) > 0)
      <div class="alert alert-primary">
      <strong>Whoops!</strong> There were some problems with your input.
      <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }} </li>
       
      @endforeach
      </ul>
      </div>
  @endif 
   {{-- end of error report --}}
    @foreach($data as $key)
  <form action="{{URL::to('/')}}/Purchase/purchasedatastore" method="post"   enctype="multipart/form-data">
    {{ csrf_field() }}    
    <input type="hidden" name="id" value="{{ $key->id }}"  class="form-control" >  
      <div class="form-row">
        <div class="form-group col-md-6">
          <label >Date</label>
          <input type="date" class="form-control"  name="date" value="{{$key->date}}" placeholder="date"  >
        </div>
        <div class="form-group col-md-6">
        <label >Price</label>
        <input type="text" class="form-control" value="{{$key->price}}" name="price" placeholder="Price">
      </div>
      <div class="form-group col-md-6">
        <label>Sale Action</label>
        <select name="sale_action" class="form-control" >
          <option value="Purchase">Purchase</option>
        <!--<option  value="sale" > Sale</option>-->
        <!--<option  value="saleout">SaleOut</option>-->
        
        </select>
      </div>
        <div class="form-group col-md-6">
          <label >Party Name</label>
          <input type="text" class="form-control" name="party_name" value="{{$key->party_name }}" placeholder="Party Name" >
        </div>
        <div class="form-group col-md-6">
          <label>Party Mobile No.</label>
          <input type="text" class="form-control" name="party_mob_no" value="{{$key->party_mob_no }}" placeholder="Party Mobile No." >
        </div>
        <div class="form-group col-md-6">
          <label >City</label>
          <input type="text" class="form-control" name="city" value="{{ $key->city }}"  >
        </div>
        
         <div class="form-group col-md-6">
        <label>Invoice Number</label>
        <select name="invoice_number" id="IN" class="form-control" >
        <option readonly value="NO" @if($key->invoice_number == 'NO') selected='selected' @endif >NO</option>
        <option readonly value="YES" @if($key->invoice_number == 'YES') selected='selected' @endif >YES</option>
        
        </select>
      </div>
    
     @if ($key->invoice_number == 'YES')
     
      <div  id="invoice_date"  class="form-group col-md-6">
        <label>Invoice Date</label>
        <input type="date" class="form-control" value="{{$key->invoice_date }}" name="invoice_date" >
      </div>
       <div  id="invoice_num"  class="form-group col-md-6">
        <label>Invoice Number</label>
        <input type="text" class="form-control" value="{{$key->invoice_num }}" name="invoice_num" >
      </div>

     
     @else
    
      <div style="display: none;" id="invoice_date"  class="form-group col-md-6">
        <label>Invoice Date</label>
        <input type="date" class="form-control" value="{{$key->invoice_date }}" name="invoice_date" >
      </div>
       <div style="display: none;" id="invoice_num"  class="form-group col-md-6">
        <label>Invoice Number</label>
        <input type="text" class="form-control" value="{{$key->invoice_num }}" name="invoice_num" >
      </div>
 
    @endif
   
        <div class="form-group col-md-6">
          <label>Brand</label>
          <input type="text" class="form-control" name="brand" value="{{$key->brand }}" placeholder="Brand" >
        </div>
        <div class="form-group col-md-6">
          <label>Model Number</label>
          <input type="text" class="form-control" name="model_number" value="{{$key->model_number }}" placeholder="Model Number" >
        </div>
        <div class="form-group col-md-6">
          <label>RAM/GB</label>
          <input type="text" class="form-control" name="RAM_GB" value="{{$key->RAM_GB }}" placeholder="RAM/GB" >
        </div>
        <div class="form-group col-md-6">
          <label>Colour</label>
          <input type="text" class="form-control" name="colour" value="{{$key->colour }}" placeholder="Colour" >
        </div>
        
        <div class="form-group col-md-6">
          <label>IMEI Number</label>
          <input type="text" class="form-control" name="IMEI_Number" value="{{$key->IMEI_Number }}" placeholder="IMEI Number" >
        </div>
        <div class="form-group col-md-6">
        <label>Warranty</label>
        <select name="warranty" id="war" class="form-control" required="">
          <option value="NO"  @if($key->warranty == 'NO') selected='selected' @endif >NO</option>
        <option value="YES"  @if($key->warranty == 'YES') selected='selected' @endif >YES</option>
       
        </select>
      </div>
      @if($key->warranty=='YES')
      <div  id="warranty_date" class="form-group col-md-6">
        <label>Warranty Date</label>
        <input type="date" class="form-control" name="warranty_date" value="{{$key->warranty_date}}">
      </div>
      @else 
      <div style="display: none;" id="warranty_date" class="form-group col-md-6">
        <label>Warranty Date</label>
        <input type="date" class="form-control" name="warranty_date"  >
      </div>
   @endif  
    </div>
      
      
       
    
      
      
      
      
    </div>
    <div class="card-footer">
      <button class="btn btn-info">Submit</button>
       <a href="{{URL::to('/')}}/Purchase/purchase" class="btn btn-warning" >Cancle</a>
    </div>
  </div>
</Form>
  @endforeach



@endsection


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script type="text/javascript">

 $(function () {
        $("#war").change(function () {
            if ($(this).val() == "NO") {
              $("#warranty_date").hide();

               
            } else {
              $("#warranty_date").show();
            }
        });
    });

</script>
<script type="text/javascript">
 $(function () {
        $("#IN").change(function () {
            if ($(this).val() == "NO") {
                 $("#invoice_date").hide();
                $("#invoice_num").hide();
               
            } else {
                 $("#invoice_date").show();
                $("#invoice_num").show();
               
            }
        });
    });

</script>