<?php

require_once './model/model.php';

$ttime=microtime(true);
$stime=microtime(true);
$nproblem = 5;
$nabove = 1;
$nbelow = 20;
$problem = <<<'XXX'
Smallest multiple<br><br>
Problem 5<br>
2520 is the smallest number that can be divided by each of the numbers from 1 to 10 without any remainder.<br>
<br>
What is the smallest positive number that is evenly divisible by all of the numbers from 1 to 20?<br>
source: https://projecteuler.net/problem=5 <br>
XXX;


//Title
echo $problem ;
echo "<br>";

//Method 1 
start_method();
$number = 1;
foreach(dif_factors($nabove, $nbelow) as $key => $value)
{
    $number *= $key**$value;
}
end_method();

result("","smallest positive number that is evenly divisible by all of the"
        . " numbers from $nabove to $nbelow",$number,"1",$stime);

echo "Total time of php execution was " . (microtime(true) - $ttime) . 
        " seconds <br>";
