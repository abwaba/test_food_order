@extends('restaurant::layouts.master')

@section('content')
<div class="container">
<div class="card">
  <h5 class="card-header">{{ $title ?? 'Title'}}</h5>
  <div class="card-body">
  <form url="{{ url('create') }}" method="POST">
  @csrf
  <div class="form-group">
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <label for="exampleInputEmail1">Nama</label>
    <input type="text" name="name" value="{{ old('name') ?? '' }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Harga</label>
    <input type="number" name="price" value="{{ old('price') ?? '' }}" class="form-control" id="exampleInputPassword1">
  </div> 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
</div>
</div>
  
@endsection