@extends('Layout.master')
   
@section('content')              
  <!-- Main Content -->

  <div class="card">
    <div class="card-header">
      <h4>Add Purchase Form</h4>
    </div>
    <div class="card-body">
 {{-- error report --}}
      @if (count($errors) > 0)
      <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.
      <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }} </li>
       
      @endforeach
      </ul>
      </div>
  @endif 
   {{-- end of error report --}}
 
  <form class="needs-validation" action="{{URL::to('/')}}/Purchase/storepurchase" method="post"   enctype="multipart/form-data">
    {{ csrf_field() }}      
      <div class="form-row">
        <div class="form-group col-md-6">
          <label >Date</label>
          <input type="date" class="form-control" name="date" required="">
        </div>
        <div class="form-group col-md-6">
          <label >Party Name</label>
          <input type="text" class="form-control" name="party_name" placeholder="Party Name" required="">
        </div>
        <div class="form-group col-md-6">
          <label>Party Mobile No.</label>
          <input type="text" class="form-control" name="party_mob_no" placeholder="Party Mobile No." required="">
        </div>
         <div class="form-group col-md-6">
          <label >City</label>
          <input type="text" class="form-control" name="city" placeholder="City" required="">
        </div>
       
        <div  class="form-group col-md-6">
        <label>Invoice Number</label>
        <select name="invoice_number" id="IN" class="form-control" >
            <option value="NO">NO</option>
            <option value="YES" >YES</option>
       
        </select>
      </div>
      
       <div style="display: none;" id="invoice_num" class="form-group col-md-6">
        <label>Invoice Number</label>
        <input type="text" class="form-control" name="invoice_num" >
      </div>
      <div style="display: none;" id="invoice_date" class="form-group col-md-6">
        <label>Invoice Date</label>
        <input type="date" class="form-control" name="invoice_date" >
      </div>
      
        
        <div class="form-group col-md-6">
          <label>Brand</label>
          <input type="text" class="form-control" name="brand" placeholder="Brand" required="" >
        </div>
        <div class="form-group col-md-6">
          <label>Model Number</label>
          <input type="text" class="form-control" name="model_number" placeholder="Model Number" required="">
        </div>
        <div class="form-group col-md-6">
          <label>RAM/GB</label>
          <input type="text" class="form-control" name="RAM_GB" placeholder="RAM/GB" required="">
        </div>
        <div class="form-group col-md-6">
          <label>Colour</label>
          <input type="text" class="form-control" name="colour" placeholder="Colour" required="">
        </div>
        <!--<div class="form-group col-md-6">-->
        <!--  <label>Condition</label>-->
        <!--  <input type="text" class="form-control" name="condition1" placeholder="Condition" required="">-->
        <!--</div>-->
        <div class="form-group col-md-6">
          <label>IMEI Number</label>
          <input type="text" class="form-control" name="IMEI_Number" placeholder="IMEI Number" required="">
        </div>
        <div class="form-group col-md-6">
          <label>Image1</label>
          <input type="file" class="form-control" name="image1" placeholder="Image1" required="">
        </div>
        <div class="form-group col-md-6">
          <label>Image2</label>
          <input type="file" class="form-control" name="image2" placeholder="Image2">
        </div>
        <!--<div class="form-group col-md-6">-->
        <!--  <label>Image3</label>-->
        <!--  <input type="file" class="form-control" name="image3" placeholder="Image3">-->
        <!--</div>-->
      
     
      <div class="form-group col-md-6">
        <label >Price</label>
        <input type="text" class="form-control" name="price" placeholder="Price" required="">
      </div>
      <div class="form-group col-md-6">
        <label>Sale Action</label>
        <select name="sale_action" class="form-control" >
         <option value="Purchase">Purchase</option>
        <!--<option value="Sale">Sale</option>-->
        
        </select>
      </div>
      
      <div class="form-group col-md-6">
        <label>Warranty</label>
        <select name="warranty" id="war" class="form-control" required="">
          <option value="NO">NO</option>
        <option value="YES" >YES</option>
       
        </select>
      </div>
      <div style="display: none;" id="warranty_date" class="form-group col-md-6">
        <label>Warranty Date</label>
        <input type="date" class="form-control" name="warranty_date" >
      </div>
      </div>
      
      
      </div>
      
    <div class="card-footer">
      <button class="btn btn-info">Submit</button>
       <a href="{{URL::to('/')}}/Purchase/purchase" class="btn btn-warning" >Cancle</a>
      
    </div>
    
   
  </div>




@endsection

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script type="text/javascript">
 $(function () {
        $("#war").change(function () {
            if ($(this).val() == "YES") {
                $("#warranty_date").show();
            } else {
                $("#warranty_date").hide();
            }
        });
    });

</script>
<script type="text/javascript">
 $(function () {
        $("#IN").change(function () {
            if ($(this).val() == "YES") {
                $("#invoice_date").show();
                $("#invoice_num").show();
            } else {
                $("#invoice_date").hide();
                $("#invoice_num").hide();
            }
        });
    });

</script>