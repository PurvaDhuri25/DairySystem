<?php
if(isset($_POST['Submit']))
{
$hours = $_POST['hours'];
$payrate = $_POST['RPay'];
$name = $_POST['name'];

function taxcalc() {

if ($hours > 40) 
{
$gross = $payrate * 40;
$ot = ($hours - 40) * ($payrate * 1.5);
$TotGross = $gross + $ot;
}
else 
$gross = $payrate * $hours;

if ($gross <= 850) {
$tax = $gross * .15;
}
else if ($gross > 850 && $gross <=2060) {
$tax = $gross * .28;
}
else if ($gross > 2060 && $gross <= 3900) {
$tax = $gross * .32;
}
else {
$tax = $gross * .40;
}

$net = $gross - $tax;

echo "<p>";
echo $name, " worked ", $hours, " hours, and earned $", $TotGross, ". <br />";
echo $name, " was taxed $", $tax, " for a net pay total of $", $net, ".";
echo "</p>";
}
}
?>