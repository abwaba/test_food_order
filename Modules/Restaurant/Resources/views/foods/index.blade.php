@extends('restaurant::layouts.master')

@section('content')
<div class="card">
    <h5 class="card-header">{{ $title ?? 'Title'}}</h5>
    <div class="card-body">
    <a href="{{ url('restaurant/foods/create') }}" class="btn btn-sm btn-primary">Input</a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Staus</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($foods as $index => $value)
                <tr>
                <td scope="row">{{ $index+1 }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->price }}</td>
                <td>{{ $value->status == 'Y' ? 'Ready' : 'Tidak' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

       
    </div>
</div>
@endsection
