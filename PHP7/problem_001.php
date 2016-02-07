<?php

require_once './model/model.php';

$ttime=microtime(true);
$env = []; //range of numbers to test
$i = 0; //counter
$sum = 0; //sum of numbers that match with the problem
$num1 = 3;
$num2 = 5;
$below = 1000;
$problem = <<<'XXX'
 Multiples of 3 and 5 <br><br>
 <b>Problem 1</b><br>
 If we list all the natural numbers below 10 that are multiples of 3 or 5, <br>
 we get 3, 5, 6 and 9. The sum of these multiples is 23. <br>
 <br>
 Find the sum of all the multiples of 3 or 5 below 1000. <br>
 source: https://projecteuler.net/problem=1 <br>
XXX;

//Title
echo $problem ;
echo "<br>";

//Method 1 - Bruteforce
$stime = microtime(true);
for($i = 1; $i < $below; $i++)  
{
    if($i%$num1==0 or $i%$num2==0) 
    {
        $sum += +$i;
    }
}
$stime = microtime(true) - $stime;

result("Bruteforce","sum of the multiples",$sum,"1",$stime);

//Method 2 - Regression
$stime = microtime(true);
$sum = $num1/2*(int)(($below-1)/$num1)*(int)(($below-1+$num1)/$num1) + $num2/2*(int)(($below-1)/$num2)*(int)(($below-1+$num2)/$num2) - ($num1*$num2)/2*(int)(($below-1)/($num1*$num2))*(int)(($below-1+$num1*$num2)/($num1*$num2));
$stime = microtime(true) - $stime;

result("Regression","sum of the multiples",$sum,"2",$stime);

//Method 3 - array_filter and array_sum
$stime = microtime(true);
$sum = array_sum(array_filter(range(1,$below - 1),"mult35")) . "<br>";
$stime = microtime(true) - $stime;

result("array_filter and array_sum","sum of the multiples",$sum,"3",$stime);

echo "Total time of php execution was " . (microtime(true) - $ttime) . " seconds <br>";

//Arrays are slow and use a lot of memory
