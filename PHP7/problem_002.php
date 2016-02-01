<?php
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

function fibonacci_rec($n) 
{
    if($n == 1 or $n == 2)
        $term = 1;
    else if($n > 0)
        $term  = fibonacci_rec($n-1) + fibonacci_rec($n-2);
    else
        $term = fibonacci_rec($n+2) - fibonacci_rec($n+1);
    return $term;
}

function fibonacci_calc($n) 
{
    return (((1+sqrt(5))/2)**$n-((1-sqrt(5))/2)**$n)/sqrt(5);
}

function is_even($n)
{
    return $n%2==0;
} 

function result($desc_method,$desc_solution,$sum,$method,$stime) 
{ 
    echo "<br>Method $method - $desc_method <br>";
    echo "<b>The sum of $desc_solution is: $sum </b><br>";
    echo "Total time to find solution method $method was $stime seconds <br>";
}

function start_method() 
{
    $GLOBALS["stime"] = microtime(true);
}

function end_method() 
{
    $GLOBALS["stime"] = microtime(true) - $GLOBALS["stime"];
}

//Title
echo $problem ;

//Method 1 - Recursion
start_method();
$n=1;
$sum = 0;
$fibn=fibonacci_rec($n);
do {
    if(is_even($fibn))
        $sum += $fibn;
    $n++;
    $fibn = fibonacci_rec($n);
} while($fibn<$below);
end_method();

result("recursive fibonaccy function","fibonaccy even terms",$sum,"1",$stime);

//Method 2 - Calc n fibonacci

start_method();
$n=1;
$sum = 0;
$fibn=  fibonacci_calc($n);
do {
    if(is_even($fibn))
        $sum += $fibn;
    $n++;
    $fibn = fibonacci_calc($n);
} while($fibn<$below);
end_method();

result("calculated fibonaccy function","fibonaccy even terms",$sum,"2",$stime);

//Method 3 - Calc n fibonaccy

start_method();
$n=3;
$sum = 0;
$fibn=  fibonacci_calc($n);
do {
    $sum += $fibn;
    $n+=3;
    $fibn = fibonacci_calc($n);
} while($fibn<$below);
end_method();

result("calculated fibonaccy function pass odd numbers","fibonaccy even terms",$sum,"3",$stime);

echo "Total time of php execution was " . (microtime(true) - $ttime) . " seconds <br>";
