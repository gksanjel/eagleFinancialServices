@extends('layouts.app')
@section('content')
    <h1>Mutual Fund</h1>
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">
            <tr>
                <td>Name</td>
                <td><?php echo ($mutualfund['name']); ?></td>
            </tr>
            <tr>
                <td>Units Purchased</td>
                <td><?php echo ($mutualfund['units_purchased']); ?></td>
            </tr>
            <tr>
                <td>Purchase Price</td>
                <td><?php echo ($mutualfund['purchase_price']); ?></td>
            </tr>
            <tr>
                <td>Purchase Date </td>
                <td><?php echo ($mutualfund['purchase_date']); ?></td>
            </tr>
            <tr>
                <td>Recent Value</td>
                <td><?php echo ($mutualfund['recent_value']); ?></td>
            </tr>
            <tr>
                <td>Recent Date</td>
                <td><?php echo ($mutualfund['recent_date']); ?></td>
            </tr>
            </tbody>
        </table>
    </div>
@stop
