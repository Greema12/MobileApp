@extends('Layout.master')
   
@section('content') 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Purchase List</h4>
       
        </div>
        <br/>
        <div >
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
                  
            <form action="/purchasesearch" method="get">
               
                <div class="input-group mb-3">
                    <input type="date" style="width: 150px;"   name="start_date"> &nbsp; &nbsp;
                    <input type="date" style="width: 150px;" name="end_date">
                    <button class="btn btn-primary" name="submit" value="Save" type="submit">GET</button>
                </div>
            </form>
        </div> 
        
     
    </div>
  </div>

@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>