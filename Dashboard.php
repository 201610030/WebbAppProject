<?php

session_start();

if (isset($_SESSION['login']) == FALSE) {
    header("Location: login.php");
}


$title = "Monthly Statistics";
require "dbconnection.php";
require "header.php";


// $values = json_encode(array(25, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 40000));
// $values2 = json_encode(array (1000, 5312, 6251, 7841, 9821, 14984));

$labels_income = json_encode(array( "Allowance","Salary", "Petty Cash", "Bonus", "Other"));
$labels_expense = json_encode(array("Food", "Social Life", "Self-Development", "Transportation", "Culture", "Household", "Apparel", "Beauty", "Health", "Education", "Gift", "Other"));
$labels2 = json_encode(array("Income", "Expenses"));


//expenses
// $expense_data_food_query= $db->query("SELECT SUM(amount) as expense_data_food from transactions where accounts_id = ".$accounts_id." and transaction_type = 'Expense' and category = 'Food'");
// $expense_data_allowance_query = $db->query("SELECT SUM(amount) as expense_data_allowance from transactions where accounts_id =  ".$accounts_id."  and transaction_type = 'Expense' and category = 'Allowance'");
// $expense_data_pettycash_query= $db->query("SELECT SUM(amount) as expense_data_pettycash from transactions where accounts_id = ".$accounts_id."  and transaction_type = 'Expense' and category = 'Petty cash'");
// $expense_data_bonus_query= $db->query("SELECT SUM(amount) as expense_data_bonus from transactions where accounts_id = ".$accounts_id."  and transaction_type = 'Expense' and category = 'Bonus'");
// $expense_data_other_query= $db->query("SELECT SUM(amount) as expense_data_other from transactions where accounts_id = ".$accounts_id."  and transaction_type = 'Expense' and category = 'Other'");
$expense_data_food_query= $db->query("SELECT SUM(amount) as expense_data_food from transactions where accounts_id = ".$accounts_id." and transaction_type = 'Expense' and category = 'Food'");
$expense_data_social_life_query = $db->query("SELECT SUM(amount) as expense_data_social_life from transactions where accounts_id =  ".$accounts_id."  and transaction_type = 'Expense' and category = 'Social Life'");
$expense_data_self_development_query= $db->query("SELECT SUM(amount) as expense_data_self_development from transactions where accounts_id = ".$accounts_id."  and transaction_type = 'Expense' and category = 'Self Development'");
$expense_data_transportation_query= $db->query("SELECT SUM(amount) as expense_data_transportation from transactions where accounts_id = ".$accounts_id."  and transaction_type = 'Expense' and category = 'Transportation'");
$expense_data_culture_query= $db->query("SELECT SUM(amount) as expense_data_culture from transactions where accounts_id = ".$accounts_id."  and transaction_type = 'Expense' and category = 'Culture'");
$expense_data_household_query= $db->query("SELECT SUM(amount) as expense_data_household from transactions where accounts_id = ".$accounts_id." and transaction_type = 'Expense' and category = 'household'");
$expense_data_apparel_query = $db->query("SELECT SUM(amount) as expense_data_apparel from transactions where accounts_id =  ".$accounts_id."  and transaction_type = 'Expense' and category = 'Apparel'");
$expense_data_beauty_query= $db->query("SELECT SUM(amount) as expense_data_beauty from transactions where accounts_id = ".$accounts_id."  and transaction_type = 'Expense' and category = 'Beauty'");
$expense_data_health_query= $db->query("SELECT SUM(amount) as expense_data_health from transactions where accounts_id = ".$accounts_id."  and transaction_type = 'Expense' and category = 'Health'");
$expense_data_education_query= $db->query("SELECT SUM(amount) as expense_data_education from transactions where accounts_id = ".$accounts_id."  and transaction_type = 'Expense' and category = 'Education'");
$expense_data_gift_query= $db->query("SELECT SUM(amount) as expense_data_gift from transactions where accounts_id = ".$accounts_id." and transaction_type = 'Expense' and category = 'Gift'");
$expense_data_other_query = $db->query("SELECT SUM(amount) as expense_data_other from transactions where accounts_id =  ".$accounts_id."  and transaction_type = 'Expense' and category = 'Other'");

$slice1_expense = $expense_data_food_query->fetch_assoc();
$slice2_expense = $expense_data_social_life_query->fetch_assoc();
$slice3_expense = $expense_data_self_development_query->fetch_assoc();
$slice4_expense = $expense_data_transportation_query->fetch_assoc();
$slice5_expense = $expense_data_culture_query->fetch_assoc();
$slice6_expense = $expense_data_household_query->fetch_assoc();
$slice7_expense = $expense_data_apparel_query->fetch_assoc();
$slice8_expense = $expense_data_beauty_query->fetch_assoc();
$slice9_expense = $expense_data_health_query->fetch_assoc();
$slice10_expense = $expense_data_education_query->fetch_assoc();
$slice11_expense = $expense_data_gift_query->fetch_assoc();
$slice12_expense = $expense_data_other_query->fetch_assoc();



$expense_data_food = $slice1_expense['expense_data_food'];  
$expense_data_social_life = $slice2_expense['expense_data_social_life'];
$expense_data_self_development = $slice3_expense['expense_data_self_development'];  
$expense_data_transportation = $slice4_expense['expense_data_transportation'];
$expense_data_culture = $slice5_expense['expense_data_culture'];  
$expense_data_household = $slice6_expense['expense_data_household'];  
$expense_data_apparel = $slice7_expense['expense_data_apparel'];
$expense_data_beauty = $slice8_expense['expense_data_beauty'];  
$expense_data_health = $slice9_expense['expense_data_health'];
$expense_data_education = $slice10_expense['expense_data_education'];  
$expense_data_gift = $slice11_expense['expense_data_gift'];  
$expense_data_other = $slice12_expense['expense_data_other'];
 

$expense_list = array($expense_data_food,$expense_data_social_life, $expense_data_self_development, $expense_data_transportation, $expense_data_culture, 
$expense_data_household, $expense_data_apparel, $expense_data_beauty, $expense_data_health, $expense_data_education,
$expense_data_gift, $expense_data_other);
$slices_expense = json_encode($expense_list);





//income
$income_data_food_query= $db->query("SELECT SUM(amount) as income_data_food from transactions where accounts_id = ".$accounts_id." and transaction_type = 'Income' and category = 'Food'");
$income_data_allowance_query = $db->query("SELECT SUM(amount) as income_data_allowance from transactions where accounts_id =  ".$accounts_id."  and transaction_type = 'Income' and category = 'Allowance'");
$income_data_pettycash_query= $db->query("SELECT SUM(amount) as income_data_pettycash from transactions where accounts_id = ".$accounts_id."  and transaction_type = 'Income' and category = 'Petty cash'");
$income_data_bonus_query= $db->query("SELECT SUM(amount) as income_data_bonus from transactions where accounts_id = ".$accounts_id."  and transaction_type = 'Income' and category = 'Bonus'");
$income_data_other_query= $db->query("SELECT SUM(amount) as income_data_other from transactions where accounts_id = ".$accounts_id."  and transaction_type = 'Income' and category = 'Other'");

$slice1_income = $income_data_food_query->fetch_assoc();
$slice2_income = $income_data_allowance_query->fetch_assoc();
$slice3_income = $income_data_pettycash_query->fetch_assoc();
$slice4_income = $income_data_bonus_query->fetch_assoc();
$slice5_income = $income_data_other_query->fetch_assoc();

$income_data_food = $slice1_income['income_data_food'];  
$income_data_allowance = $slice2_income['income_data_allowance'];
$income_data_pettycash = $slice3_income['income_data_pettycash'];  
$income_data_bonus = $slice4_income['income_data_bonus'];
$income_data_other = $slice5_income['income_data_other'];  


$income_list = array($income_data_food,$income_data_allowance, $income_data_pettycash, $income_data_bonus, $income_data_other);
$slices_income = json_encode($income_list);


// expense and income 
$income_data= $db->query("SELECT SUM(amount) as income_data from transactions where accounts_id = ".$accounts_id." and transaction_type = 'Income'");
$expense_data = $db->query("SELECT SUM(amount) as expense_data from transactions where accounts_id =  ".$accounts_id."  and transaction_type = 'Expense'");

$slice_income = $income_data->fetch_assoc();
$slice_expense = $expense_data->fetch_assoc();

$income = $slice_income['income_data'];  
$expense = $slice_expense['expense_data'];


$total = $income + $expense; 
$curr_total_bal = $income - $expense; 
$percentage_income = ($income / $total) * 100; 
$percentage_expense = ($expense / $total) * 100;

$float_inc =  number_format((float)$percentage_income, 2, '.', '');
$float_exp =  number_format((float)$percentage_expense, 2, '.', '');


$income_expense_list = array($float_inc, $float_exp);  
$slices_income_expenses = json_encode($income_expense_list);




////////////////////////////////////////
// area chart monthly EXPENSE
//January
$expense_jan_query= $db->query("SELECT SUM(amount) as expense_january from transactions where accounts_id = ".$accounts_id." and transaction_type = 'Expense' and month = 1");
$jan = $expense_jan_query->fetch_assoc();
$january_expense = $jan['expense_january'];
//February
$expense_feb_query= $db->query("SELECT SUM(amount) as expense_feb from transactions where accounts_id = ".$accounts_id." and transaction_type = 'Expense' and month = 2");
$feb = $expense_feb_query->fetch_assoc();
$feb_expense = $feb['expense_feb'];
//March
$expense_march_query= $db->query("SELECT SUM(amount) as expense_march from transactions where accounts_id = ".$accounts_id." and transaction_type = 'Expense' and month = 3");
$march = $expense_march_query->fetch_assoc();
$march_expense = $march['expense_march'];
//April
$expense_april_query= $db->query("SELECT SUM(amount) as expense_april from transactions where accounts_id = ".$accounts_id." and transaction_type = 'Expense' and month = 4");
$april = $expense_april_query->fetch_assoc();
$april_expense = $april['expense_april'];
//May
$expense_may_query= $db->query("SELECT SUM(amount) as expense_may from transactions where accounts_id = ".$accounts_id." and transaction_type = 'Expense' and month = 5");
$may = $expense_may_query->fetch_assoc();
$may_expense = $may['expense_may'];
//June
$expense_june_query= $db->query("SELECT SUM(amount) as expense_june from transactions where accounts_id = ".$accounts_id." and transaction_type = 'Expense' and month = 6");
$june = $expense_june_query->fetch_assoc();
$june_expense = $june['expense_june'];
//July
$expense_july_query= $db->query("SELECT SUM(amount) as expense_july from transactions where accounts_id = ".$accounts_id." and transaction_type = 'Expense' and month = 7");
$july = $expense_july_query->fetch_assoc();
$july_expense = $july['expense_july'];
//August
$expense_august_query= $db->query("SELECT SUM(amount) as expense_august from transactions where accounts_id = ".$accounts_id." and transaction_type = 'Expense' and month = 8");
$august = $expense_august_query->fetch_assoc();
$august_expense = $august['expense_august'];
//September
$expense_september_query= $db->query("SELECT SUM(amount) as expense_september from transactions where accounts_id = ".$accounts_id." and transaction_type = 'Expense' and month = 9");
$september = $expense_september_query->fetch_assoc();
$september_expense = $september['expense_september'];
//October
$expense_october_query= $db->query("SELECT SUM(amount) as expense_october from transactions where accounts_id = ".$accounts_id." and transaction_type = 'Expense' and month = 10");
$october = $expense_october_query->fetch_assoc();
$october_expense = $october['expense_october'];
//November
$expense_november_query= $db->query("SELECT SUM(amount) as expense_november from transactions where accounts_id = ".$accounts_id." and transaction_type = 'Expense' and month = 11");
$november = $expense_november_query->fetch_assoc();
$november_expense = $november['expense_november'];
//December
$expense_december_query= $db->query("SELECT SUM(amount) as expense_december from transactions where accounts_id = ".$accounts_id." and transaction_type = 'Expense' and month = 12");
$december = $expense_december_query->fetch_assoc();
$december_expense = $december['expense_december'];

$monthly_expense_list = json_encode(array($january_expense, $feb_expense, $march_expense, $april_expense, $may_expense,
$june_expense, $july_expense,$august_expense, $september_expense, $october_expense, $november_expense, $december_expense));


///////////////////////////////////////////
// area chart monthly Income

//January
$income_jan_query= $db->query("SELECT SUM(amount) as income_january from transactions where accounts_id = ".$accounts_id." and transaction_type = 'income' and month = 1");
$jan = $income_jan_query->fetch_assoc();
$january_income = $jan['income_january'];
//February
$income_feb_query= $db->query("SELECT SUM(amount) as income_feb from transactions where accounts_id = ".$accounts_id." and transaction_type = 'income' and month = 2");
$feb = $income_feb_query->fetch_assoc();
$feb_income = $feb['income_feb'];
//March
$income_march_query= $db->query("SELECT SUM(amount) as income_march from transactions where accounts_id = ".$accounts_id." and transaction_type = 'income' and month = 3");
$march = $income_march_query->fetch_assoc();
$march_income = $march['income_march'];
//April
$income_april_query= $db->query("SELECT SUM(amount) as income_april from transactions where accounts_id = ".$accounts_id." and transaction_type = 'income' and month = 4");
$april = $income_april_query->fetch_assoc();
$april_income = $april['income_april'];
//May
$income_may_query= $db->query("SELECT SUM(amount) as income_may from transactions where accounts_id = ".$accounts_id." and transaction_type = 'income' and month = 5");
$may = $income_may_query->fetch_assoc();
$may_income = $may['income_may'];
//June
$income_june_query= $db->query("SELECT SUM(amount) as income_june from transactions where accounts_id = ".$accounts_id." and transaction_type = 'income' and month = 6");
$june = $income_june_query->fetch_assoc();
$june_income = $june['income_june'];
//July
$income_july_query= $db->query("SELECT SUM(amount) as income_july from transactions where accounts_id = ".$accounts_id." and transaction_type = 'income' and month = 7");
$july = $income_july_query->fetch_assoc();
$july_income = $july['income_july'];
//August
$income_august_query= $db->query("SELECT SUM(amount) as income_august from transactions where accounts_id = ".$accounts_id." and transaction_type = 'income' and month = 8");
$august = $income_august_query->fetch_assoc();
$august_income = $august['income_august'];
//September
$income_september_query= $db->query("SELECT SUM(amount) as income_september from transactions where accounts_id = ".$accounts_id." and transaction_type = 'income' and month = 9");
$september = $income_september_query->fetch_assoc();
$september_income = $september['income_september'];
//October
$income_october_query= $db->query("SELECT SUM(amount) as income_october from transactions where accounts_id = ".$accounts_id." and transaction_type = 'income' and month = 10");
$october = $income_october_query->fetch_assoc();
$october_income = $october['income_october'];
//November
$income_november_query= $db->query("SELECT SUM(amount) as income_november from transactions where accounts_id = ".$accounts_id." and transaction_type = 'income' and month = 11");
$november = $income_november_query->fetch_assoc();
$november_income = $november['income_november'];
//December
$income_december_query= $db->query("SELECT SUM(amount) as income_december from transactions where accounts_id = ".$accounts_id." and transaction_type = 'income' and month = 12");
$december = $income_december_query->fetch_assoc();
$december_income = $december['income_december'];

$monthly_income_list = json_encode(array($january_income, $feb_income, $march_income, $april_income, $may_income,
$june_income, $july_income,$august_income, $september_income, $october_income, $november_income, $december_income));

?>

<?php 


?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
       <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Expense</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">₱<?php echo $expense ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Income</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">₱<?php echo $income ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Current Balance</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">₱<?php echo $curr_total_bal?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chart-line fa-2x text-gray-300"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>


<div class = "row">
<div class="col-xl-4 col-lg-5">
  <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Expense Chart</h6>
        </div>
        <div class="card-body">
            <div class="chart-area">
                <canvas id="PieChart_Expense"></canvas>
            </div>
              <div class="mt-4 text-center small">
                     <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Food
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Social Life
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Self Development
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-danger"></i> Transportation
                    </span>
                     <span class="mr-2">
                      <i class="fas fa-circle text-warning"></i> Culture
                    </span>
                        <span class="mr-2">
                      <i class="fas fa-circle purple"></i> Household
                    </span>
                    <style>
                    .purple {
                      color:purple;
                    }
                    </style>
                    <span class="mr-2">
                      <i class="fas fa-circle orange"></i> Apparel
                    </span>
                    <style>.orange {
                      color:orange;
                    }
                    </style>
                    <span class="mr-2">
                      <i class="fas fa-circle pink"></i> Beauty
                    </span>
                    <style>.pink {
                      color:pink;
                    }
                    </style>
                    <span class="mr-2">
                      <i class="fas fa-circle navy"></i> Health
                    </span>
                    <style>.navy {
                      color:DarkSlateGrey	;
                    }
                    </style>
                     <span class="mr-2">
                      <i class="fas fa-circle MediumSlateBlue"></i> Education
                    </span>
                    <style>.MediumSlateBlue {
                      color:MediumSlateBlue;
                    }
                    </style>
                        <span class="mr-2">
                      <i class="fas fa-circle maroon"></i> Gift
                    </span>
                    <style>.maroon {
                      color:maroon;
                    }
                    </style>
                    <span class="mr-2">
                      <i class="fas fa-circle black"></i> Other
                    </span>
                    <style>.black {
                      color:cyan;
                    }
                    </style>
                  </div>
        </div>
    </div>
  </div>
    <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Monthly Expense Overview</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
      <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Monthly Income Overview</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart2"></canvas>
                  </div>
                </div>
              </div>
            </div>

<div class="col-xl-4 col-lg-5">
     <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Income Chart</h6>
        </div>
        <div class="card-body">
            <div class="chart-area">
                <canvas id="PieChart_Income"></canvas>
            </div>
             <div class="mt-4 text-center small">
                      <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Allowance
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Salary
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i>Petty Cash
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-danger"></i> Bonus
                    </span>
                     <span class="mr-2">
                      <i class="fas fa-circle text-warning"></i> Other
                    </span>
                    
                  </div>
        </div>
        
    </div>
    
</div>
<div class="col-xl-4 col-lg-5">
  <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Income and Expenses Chart</h6>
        </div>
        <div class="card-body">
            <div class="chart-area">
                <canvas id="PieChart_Income_Expenses"></canvas>
            </div>
              <div class="mt-4 text-center small">
                   <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Income
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Expenses
                    </span>
                 
                  </div>
        </div>
    </div>
  </div>
 
</div> 
</div>     
<!-- /.container-fluid -->


  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>
   <script src="js/demo/chart-bar-demo.js"></script>
  <!-- Page level custom scripts -->
 

<!--AREA CHART JS-->
<script type = "text/javascript">
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}


</script>




<script type = "text/javascript">
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';
//Pie chart Expense

var ctx = document.getElementById("PieChart_Expense");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: <?php echo $labels_expense ?> ,
    datasets: [{
      data: <?php echo $slices_expense ?>,
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#FF0000', '#FFFF00' ,'#800080' , '#FFA500', '#FFC0CB',
      '#2F4F4F', '#7B68EE', "#800000","#00FFFF"],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 0,
  },
});

</script>


<script type = "text/javascript">
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';
//Pie chart Income

var ctx = document.getElementById("PieChart_Income");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: <?php echo $labels_income ?> ,
    datasets: [{
      data: <?php echo $slices_income  ?>,
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#FF0000', '#FFFF00'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 0,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 0,
  },
});

</script>


<script type = "text/javascript">
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';
//Pie chart Income

var ctx = document.getElementById("PieChart_Income_Expenses");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: <?php echo $labels2 ?> ,
    datasets: [{
      data: <?php echo $slices_income_expenses ?>,
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#FF0000', '#FFFF00'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 0,
  },
});

</script>

<script type = "text/javascript">
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
      label: "Earnings",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: <?php echo $monthly_expense_list?>,
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '₱' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ₱' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});


</script>

<script type = "text/javascript">
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Area Chart Example
var ctx = document.getElementById("myAreaChart2");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
      label: "Earnings",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: <?php echo $monthly_income_list?>,
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '₱' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ₱' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});


</script>

<script type = "text/javascript">
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: <?php  ?>,
    datasets: [{
      label: "Revenue",
      backgroundColor: "#4e73df",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: [4215, 5312, 6251, 7841, 9821, 14984],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 6
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 15000,
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '₱' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ₱' + number_format(tooltipItem.yLabel);
        }
      }
    },
  }
});

</script>
<?php
require "footer.php";
?>