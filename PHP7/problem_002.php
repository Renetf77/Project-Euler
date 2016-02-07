<?php

require_once './model/model.php';

$ttime=microtime(true);
$stime=microtime(true);
$below=4000000;
$problem = <<<'XXX'
Even Fibonacci numbers<br><br>
Problem 2<br>
Each new term in the Fibonacci sequence is generated by adding the previous two<br> 
terms. By starting with 1 and 2, the first 10 terms will be:<br>
<br>
1, 2, 3, 5, 8, 13, 21, 34, 55, 89, ...<br>
<br>
By considering the terms in the Fibonacci sequence whose values do not exceed<br>
four million, find the sum of the even-valued terms.<br>
 source: https://projecteuler.net/problem=2 <br>
XXX;


//Title
echo $problem ;
echo "<br>";
//Method 1 - Recursion
start_method();
$n=1;
$sum = 0;
$fibn=fibonacci_rec($n);
do {
    if(is_even($fibn))
    {
        $sum += $fibn;
    }
    $n++;
    $fibn = fibonacci_rec($n);
} while($fibn<$below);
end_method();

result("recursive fibonaccy function","sum of fibonaccy even terms",$sum,"1",$stime);

//Method 2 - Calc n fibonacci
start_method();
$n=1;
$sum = 0;
$fibn=  fibonacci_calc($n);
do 
{
    if(is_even($fibn))
    {
        $sum += $fibn;
    }
    $n++;
    $fibn = fibonacci_calc($n);
} while($fibn<$below);
end_method();

result("calculated fibonaccy function","sum of fibonaccy even terms",$sum,"2",$stime);

//Method 3 - Calc n fibonaccy
start_method();
$n=3;
$sum = 0;
$fibn=  fibonacci_calc($n);
do 
{
    $sum += $fibn;
    $n+=3;
    $fibn = fibonacci_calc($n);
} while($fibn<$below);
end_method();

result("calculated fibonaccy function pass odd numbers","sum of fibonaccy even terms",$sum,"3",$stime);

echo "Total time of php execution was " . (microtime(true) - $ttime) . " seconds <br>";