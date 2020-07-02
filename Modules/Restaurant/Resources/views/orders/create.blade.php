@extends('restaurant::layouts.master')

@section('content')
<div class="container">
<div class="card">
  <h5 class="card-header">{{ $title ?? 'Title'}}</h5>
  <div class="card-body">
  <input-food></input-food>
  </div>
</div>
</div>
  
@endsection