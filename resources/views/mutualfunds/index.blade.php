@extends('layouts.app')

@section('content')
    <h1>Mutual Fund</h1>
    <a href="{{url('/mutualfunds/create')}}" class="btn btn-success">Create Mutual Fund</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Cust No</th>
            <th>Cust Name</th>
            <th>Name</th>
            <th>Units Purchased</th>
            <th>Purchase Price</th>
            <th>Purchase Date</th>
            <th>Recent Value</th>
            <th>Recent Date</th>
            <th colspan="3">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($mutualfunds as $mutualfund)
            <tr>
                <td>{{ $mutualfund->customer->cust_number }}</td>
                <td>{{ $mutualfund->customer->name }}</td>
                <td>{{ $mutualfund->name }}</td>
                <td>{{ $mutualfund->units_purchased }}</td>
                <td>{{ $mutualfund->purchase_price }}</td>
                <td>{{ $mutualfund->purchase_date }}</td>
                <td>{{ $mutualfund->recent_value }}</td>
                <td>{{ $mutualfund->recent_date }}</td>
                <td><a href="{{url('mutualfunds',$mutualfund->id)}}" class="btn btn-primary">Read</a></td>
                <td><a href="{{route('mutualfunds.edit',$mutualfund->id)}}" class="btn btn-warning">Update</a></td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['mutualfunds.destroy', $mutualfund->id]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection
