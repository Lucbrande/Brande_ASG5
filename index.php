<?php 
   
    if (!isset($investment)) { $investment = '10000'; } 
    if (!isset($interest_rate)) { $interest_rate = '5'; } 
    if (!isset($years)) { $years = '5'; } 
    if (!isset($compound_interest_monthly)) { $compound_interest_monthly = ''; } 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>
    <main>
    <h1>Future Value Calculator Lucian Brande</h1>
    <?php if (!empty($error_message)) { ?>
        <p class="error"><?php echo $error_message; ?></p>
    <?php } // end if ?>
    <form action="display_results.php" method="post">

        <div id="data">
            <label>Investment Amount:</label>
            <select name="investment">
                <?php for ($investment_value = 10000; $investment_value <= 50000; $investment_value += 5000) { ?>
                    <option value="<?php echo $investment_value; ?>"
                    <?php if ($investment == $investment_value) echo 'selected'; ?>>
                     <?php echo $investment_value; ?></option>
                <?php } ?>
            </select><br>

            <label>Yearly Interest Rate:</label>
            <select name="interest_rate">
                <?php for ($interest_rate_value = 4; $interest_rate_value <= 12; $interest_rate_value += 0.5) { ?>
                    <option value="<?php echo $interest_rate_value; ?>"
                    <?php if ($interest_rate == $interest_rate_value) echo 'selected'; ?>>
                     <?php echo $interest_rate_value; ?>%</option>
                <?php } ?>
            </select><br>

            <label>Number of Years:</label>
            <select name="years">
                <?php for ($years_value = 1; $years_value <= 20; $years_value++) { ?>
                    <option value="<?php echo $years_value; ?>"
                     <?php if ($years == $years_value) echo 'selected'; ?>>
                         <?php echo $years_value; ?> years</option>
                <?php } ?>
            </select><br>
        </div>
        <div>
        <label>Compound Interest Monthly:</label>
            <input type="checkbox" name="compound_interest_monthly" value="yes" 
                <?php if ($compound_interest_monthly == 'yes') echo 'checked'; ?>>
        </div>

        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Calculate"/><br>
        </div>

    </form>
    </main>
</body>
</html>