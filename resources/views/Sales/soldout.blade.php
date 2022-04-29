@extends('Layout.master')
   
@section('content')              
  <!-- Main Content -->

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>SoldOut List</h4> &nbsp;&nbsp;&nbsp;
         {{-- date range filter start --}}
          <form action="{{URL::to('/')}}/salessearch" method="get">
               
            <div class="input-group mb-3">
                <input type="date" style="width: 150px;"   name="start_date"> &nbsp; &nbsp;
                <input type="date" style="width: 150px;" name="end_date">&nbsp;&nbsp;
                <button class="btn btn-warning" name="submit" value="Save" type="submit">GET</button>
            </div>
          </form>
          {{-- end of date range --}}
        </div>
        <br/>
   
        <!--<div class="buttons" style="text-align: right; " >-->
        <!--  <a  href="{{URL::to('/')}}/Sales/addsales" class="btn btn-icon icon-left btn-info" style=" width: 110px !important; "><i class="fa fa-edit"></i> New Sales</a>-->
        <!--  </div> <br/>-->
          
        
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped" id="table-1">
              <thead>
                <tr>
                  <th class="text-center">
                   id
                  </th>
                  <th style=" min-width:80px;">Date</th>
                  <th>Sale Action</th>
                  <th>Party Name</th>
                  <th>Mobile No.</th>
                  <th>City</th>
                  <th>Price</th>
                  <th>Brand</th>
                  <th>Model No</th>
                  <th>RAM/GB</th>
                  <th>Colour</th>
                  <th>Warranty</th>
                  <th style=" min-width:80px;">Warranty Date</th>
                  <th>IMEI Number</th>
                  <th>Image1</th>
                  <th>Image2</th>
                  <th>Invoice Number</th>
                  <th style=" min-width:80px;">Invoice Date</th>
                  <th style=" min-width:80px;">Invoice Number</th>
                 
               
                  
                </tr>
              </thead>
              <tbody>
                <?php $count = 1; ?>
                @foreach($data as $key )
                <tr>
                  <td><?php echo $count; ?></td>
                  <td>{{ date('d-m-Y', strtotime($key->date)) }}</td>
                  <td >@if ($key->sale_action=='sale') <button class="btn btn-success" style=" width: 90px !important; " >Sale</button>  @else <button class="btn btn-danger" style=" width: 90px !important;" >Soldout</button>   @endif</td>
                  <td>{{$key->party_name }}</td>
                  <td>{{$key->party_mob_no }}</td>
                  <td>{{$key->city }}</td>
                  <td>{{$key->price }}</td>
                  <td >{{$key->brand }}</td>
                  <td>{{$key->model_number }}</td>
                  <td>{{$key->RAM_GB }}</td>
                  <td>{{$key->colour }}</td>
                  <td>{{$key->warranty }}</td>
                  <td>@if ($key->warranty=='YES' ){{ date('d-m-Y', strtotime($key->warranty_date)) }}  @else   @endif</td>
                  <td>{{$key->IMEI_Number }}</td>
                  <td><img alt="image" class="avatar mr-2" src="{{ URL::to('/') }}/public/picture/{{ $key->image1 }}"></td>
                  <td><img alt="image" class="avatar mr-2" src="{{ URL::to('/') }}/public/picture/{{ $key->image2 }}"></td>
                  <td>{{$key->invoice_number }}</td>
                  <td>@if ($key->invoice_number=='YES' ){{$key->invoice_num }} @else   @endif</td>
                  <td>@if ($key->invoice_number=='YES' ){{ date('d-m-Y', strtotime($key->invoice_date)) }}  @else   @endif</td>
                  
                  
                </tr>
               
                <?php $count++; ?> 
                @endforeach
              
                
               
               
               
               
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection