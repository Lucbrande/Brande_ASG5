<?php
    
    $investment = filter_input(INPUT_POST, 'investment', 
            FILTER_VALIDATE_FLOAT);
    $interest_rate = filter_input(INPUT_POST, 'interest_rate', 
            FILTER_VALIDATE_FLOAT);
    $years = filter_input(INPUT_POST, 'years', 
            FILTER_VALIDATE_INT);
    $compound_interest_monthly = filter_input(INPUT_POST, 'compound_interest_monthly');

    
    if (isset($compound_interest_monthly) && $compound_interest_monthly == 'yes') {
        
        $monthly_interest_rate = $interest_rate / 12;
        $months = $years * 12;
        $future_value = $investment;
        for ($i = 1; $i <= $months; $i++) {
            $future_value += $future_value * $monthly_interest_rate *.01;
        }
        $compounding_frequency = 'monthly';
        $time_period = $months . ' months';
    } else {
        
        $future_value = $investment;
        for ($i = 1; $i <= $years; $i++) {
            $future_value += $future_value * $interest_rate *.01;
        }
        $compounding_frequency = 'yearly';
        $time_period = $years . ' years';
    }

    
    $investment_f = '$'.number_format($investment, 2);
    $yearly_rate_f = $interest_rate.'%';
    $future_value_f = '$'.number_format($future_value, 2);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
    <main>
        <h1>Future Value Calculator</h1>

        <label>Investment Amount:</label>
        <span><?php echo $investment_f; ?></span><br>

        <label>Yearly Interest Rate:</label>
        <span><?php echo $yearly_rate_f; ?></span><br>

        <label>Time Period:</label>
        <span><?php echo $time_period; ?></span><br>

        <label>Compounding Frequency:</label>
        <span><?php echo $compounding_frequency; ?></span><br>

        <label>Future Value:</label>
        <span><?php echo $future_value_f; ?></span><br>
    </main>
</body>
</html>