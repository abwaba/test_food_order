@extends('restaurant::layouts.master')

@section('content')
<div class="container">
<div class="card">
  <h5 class="card-header">{{ $title ?? 'Title'}}</h5>
  <div class="card-body">
  <input-food prefill-order="{{ json_encode($order) }}"></input-food>
  </div>
</div>
</div>
  
@endsection