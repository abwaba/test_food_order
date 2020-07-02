@extends('restaurant::layouts.master')

@section('content')
<div class="card">
    <h5 class="card-header">{{ $title ?? 'Title'}}</h5>
    <div class="card-body">
    <a href="{{ url('restaurant/orders/create') }}" class="btn btn-sm btn-primary">Input</a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Invoice</th>
                    <th scope="col">No Meja</th>
                    <th scope="col">Staus</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($orders as $index => $value)
                <tr>
                <td scope="row">{{ $index+1 }}</td>
                <td>{{ $value->no }}</td>
                <td>{{ $value->desk_no }}</td>
                <td>{{ $value->status == 'Y' ? 'Ready' : 'Tidak' }}</td>
                <td><a class="btn btn-info btn-sm text-white" href="{{ url('restaurant/orders/'.$value->no.'/edit') }}">Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

       
    </div>
</div>
@endsection
