@extends('index')
@section('main')
<div>

@foreach($collection as $data)
<div class="card">
  <div class="card-body">
    <div class="d-flex justify-content-between  bg-{{($data['inDB'] == true)?'primary text-white':''}}">
    <h5 class="card-title">{{$data['company_name']}}</h5> 
     <h5>Siret: {{$data['siret']}}</h5>
    
    </div>
    <p class="card-text">{{$data['naf']}}</p>
    
  </div>
</div>
@endforeach
</div>
@endsection