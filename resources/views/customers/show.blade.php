@extends('app')
@section('content')
    <h1>Customer </h1>

    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">
            <tr>
                <td>Name</td>
                <td><?php echo ($customer['name']); ?></td>
            </tr>
            <tr>
                <td>Cust Number</td>
                <td><?php echo ($customer['cust_number']); ?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><?php echo ($customer['address']); ?></td>
            </tr>
            <tr>
                <td>City </td>
                <td><?php echo ($customer['city']); ?></td>
            </tr>
            <tr>
                <td>State</td>
                <td><?php echo ($customer['state']); ?></td>
            </tr>
            <tr>
                <td>Zip </td>
                <td><?php echo ($customer['zip']); ?></td>
            </tr>
            <tr>
                <td>Home Phone</td>
                <td><?php echo ($customer['home_phone']); ?></td>
            </tr>
            <tr>
                <td>Cell Phone</td>
                <td><?php echo ($customer['cell_phone']); ?></td>
            </tr>
            </tbody>
        </table>
    </div>
    <?php
    $stockInitialTotal = 0;
    $stockCurrentTotal = 0;
    $investmentInitialTotal = 0;
    $investmentCurrentTotal = 0;
    $mutualfundInitialTotal = 0;
    $mutualfundCurrentTotal = 0;
    $initialTotal = 0;
    $currentTotal = 0; ?>
    <h2>Stocks</h2>
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr class="bg-info">
                <th>Symbol</th>
                <th>Stock Name</th>
                <th>No. of Shares</th>
                <th>Purchase Price</th>
                <th>Purchase Date</th>
                <th>Original Value</th>
                <th>Current Price</th>
                <th>Current Value</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customer->stocks as $stock)
                <tr>
                    <td>{{ $stock->symbol }}</td>
                    <td>{{ $stock->name }}</td>
                    <td>{{ $stock->shares }}</td>
                    <td>{{ $stock->purchase_price }}</td>
                    <td>{{ $stock->purchased }}</td>
                    <td><?php $stockoriginalvalue = 0;
                            $stockoriginalvalue = ($stock->shares) * ($stock->purchase_price);
                            echo '$ ',$stockoriginalvalue; ?></td>
                    <td><?php $URL="http://finance.google.com/finance/info?client=ig&q=" . $stock->symbol;
                        $file = fopen("$URL", "r");
                        $r = "";
                        $currentStockPrice = 0;
                        do {
                            $data = fread($file, 500);
                            $r .= $data;
                        } while (strlen($data) != 0);
                        $json = str_replace("\n", "", $r);
                        $data = substr($json, 4, strlen($json) - 5);
                        $json_output = json_decode($data, true);
                        $currentStockPrice = "\n" . $json_output['l'];
                        echo '$ ', $currentStockPrice; ?></td>
                    <td><?php $currentStockValue = 0;
                        $currentStockValue = ($stock->shares) * $currentStockPrice;
                        echo '$ ', $currentStockValue; ?></td>
                    <?php $stockInitialTotal += $stockoriginalvalue;
                    $stockCurrentTotal += $currentStockValue; ?>
                </tr>
            @endforeach
            </tbody>
        </table>
            <h3>Total of Initial Stock Portfolio ${{number_format($stockInitialTotal,2)}}</h3>
            <h3>Total of Current Stock Portfolio ${{number_format($stockCurrentTotal,2)}}</h3>
    </div>
    <h2>Investments</h2>
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr class="bg-info">
                <th>Category</th>
                <th>Description</th>
                <th>Acquired Value</th>
                <th>Acquired Date</th>
                <th>Recent Value</th>
                <th>Recent Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customer->investments as $investment)
                <tr>
                    <td>{{ $investment->category }}</td>
                    <td>{{ $investment->description }}</td>
                    <td>{{ $investment->acquired_value }}</td>
                    <td>{{ $investment->acquired_date }}</td>
                    <td>{{ $investment->recent_value }}</td>
                    <td>{{ $investment->recent_date }}</td>
                    <?php $investmentInitialTotal += ($investment->acquired_value);
                    $investmentCurrentTotal += ($investment->recent_value); ?>
                </tr>
            @endforeach
            </tbody>
        </table>
        <h3>Total of Initial Investment Portfolio ${{number_format($investmentInitialTotal,2)}}</h3>
        <h3>Total of Current Investment Portfolio ${{number_format($investmentCurrentTotal,2)}}</h3>
    </div>
    <h2>Mutual Funds</h2>
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr class="bg-info">
                <th>Name</th>
                <th>Units Purchased</th>
                <th>Purchase Price</th>
                <th>Purchase Date</th>
                <th>Recent Value</th>
                <th>Recent Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customer->mutualfunds as $mutualfund)
                <tr>
                    <td>{{ $mutualfund->name }}</td>
                    <td>{{ $mutualfund->units_purchased }}</td>
                    <td>{{ $mutualfund->purchase_price }}</td>
                    <td>{{ $mutualfund->purchase_date }}</td>
                    <td>{{ $mutualfund->recent_value }}</td>
                    <td>{{ $mutualfund->recent_date }}</td>
                    <?php $mutualfundInitialTotal += ($mutualfund->purchase_price);
                    $mutualfundCurrentTotal += ($mutualfund->recent_value); ?>
                </tr>
            @endforeach
            </tbody>
        </table>
        <h3>Total of Initial Mutual Fund Portfolio ${{number_format($mutualfundInitialTotal,2)}}</h3>
        <h3>Total of Current Mutual Fund Portfolio ${{number_format($mutualfundCurrentTotal,2)}}</h3>
    </div>
    <?php $initialTotal = $stockInitialTotal + $investmentInitialTotal + $mutualfundInitialTotal;
    $currentTotal = $stockCurrentTotal + $investmentCurrentTotal + $mutualfundCurrentTotal; ?>
    <h2>Summary of Portfolio</h2>
    <h3>Total of Initial Portfolio Value ${{number_format($initialTotal,2)}}</h3>
    <h3>Total of Current Portfolio Value ${{number_format($currentTotal,2)}}</h3>
@stop

