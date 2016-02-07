<?php

require_once './model/model.php';

$ttime=microtime(true);
$stime=microtime(true);
$ndigit=3;
$problem = <<<'XXX'
Largest palindrome product<br><br>
Problem 4<br>
A palindromic number reads the same both ways. The largest palindrome made from<br>
the product of two 2-digit numbers is 9009 = 91 × 99.<br>
<br>
Find the largest palindrome made from the product of two 3-digit numbers.<br>
source: https://projecteuler.net/problem=4 <br>
XXX;


//Title
echo $problem ;
echo "<br>";

//Method 1 - Recursion
start_method();
$lpf=max_palindrome_ndig($ndigit);
end_method();

result("","largest palindrome made from
the product of two $ndigit-digit number",$lpf,"1",$stime);

echo "Total time of php execution was " . (microtime(true) - $ttime) . " seconds <br>";
