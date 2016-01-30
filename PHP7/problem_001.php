<?php
$ttime=microtime(true);
$env = []; //range of numbers to test
$i = 0; //counter
$sum = 0; //sum of numbers that match with the problem
$num1 = 3;
$num2 = 5;
$below = 1000000000000;

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
for($i = 1; $i < $below; $i++)  {
    if($i%$num1==0 or $i%$num2==0) {
        $sum = $sum +$i;
    }
};

$stime = microtime(true) - $stime;
echo "<br>Method 1 - Bruteforce <br>";
echo "<b>The sum of the multiples is: $sum </b><br>";
echo "Total time to find solution method 1 was $stime seconds <br>";

//Method 2 - Regression
$stime = microtime(true);
$sum = $num1/2*(int)(($below-1)/$num1)*(int)(($below-1+$num1)/$num1) + $num2/2*(int)(($below-1)/$num2)*(int)(($below-1+$num2)/$num2) - ($num1*$num2)/2*(int)(($below-1)/($num1*$num2))*(int)(($below-1+$num1*$num2)/($num1*$num2));
$stime = microtime(true) - $stime;
echo "<br>Method 2 - Regression <br>";
echo "<b>The sum of the multiples is: $sum </b><br>";
echo "Total time to find solution method 2 was $stime seconds <br>";

//Method 3 - array_filter and array_reduce
function mult35($num) {
    return ($num%3==0 or $num%5==0);
}

function soma($v, $w) {
    $v += $w;
    return $v;
}

$stime = microtime(true);
$sum = array_reduce(array_filter(range(1,$below - 1),"mult35"),"soma") . "<br>";
$stime = microtime(true) - $stime;
echo "<br>Method 3 - array_filter and array_reduce <br>";
echo "<b>The sum of the multiples is: $sum </b><br>";
echo "Total time to find solution method 2 was $stime seconds <br>";
echo "Total time of php execution was " . (microtime(true) - $ttime) . " seconds <br>";

//Arrays are slow and use a lot of memory
