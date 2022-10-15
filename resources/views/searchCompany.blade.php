@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Identify Your Company') }}</div>
                <div class="card-body">
                    <form method="GET" action="{{route('search')}}">
                        <div class="flex justify-center">
  <div class="mb-3 xl:w-96">
    <div class="input-group relative flex flex-wrap items-stretch w-full mb-4">
      <input type="search" name="name" class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Search" aria-label="Search" aria-describedby="button-addon3">
      <button class="btn inline-block px-6 py-2 border-2 border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out" type="submit" id="button-addon3">Search</button>
    </div>
  </div>
</div>

                    </form>
                </div>
            </div>
        </div>
    </div>
<div>
@foreach($collection as $data)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
<div class="card">
  <div class="card-body">
    <div class="d-flex justify-content-between  bg-{{($data['inDB'] == true)?'primary text-white':''}}">
    <h5 class="card-title">{{$data['company_name']}}</h5> 
     <h5>Siret: {{$data['siret']}}</h5>
    </div>
    <p class="card-text">{{$data['naf']}}</p>
  </div>
</div>
</div>
</div>
</div>
@endforeach
</div>
@endsection