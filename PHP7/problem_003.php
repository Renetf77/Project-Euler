<?php

require_once './model/model.php';

$ttime=microtime(true);
$stime=microtime(true);
$below=600851475143;
$problem = <<<'XXX'
Largest prime factor<br><br>
Problem 3<br>
The prime factors of 13195 are 5, 7, 13 and 29.<br>
<br>
What is the largest prime factor of the number 600851475143 ?<br>
source: https://projecteuler.net/problem=3 <br>
XXX;


//Title
echo $problem ;
echo "<br>";
//Method 1 - Recursion
start_method();
$lpf=(prime_factors($below));
end_method();

result("recursive","largest prime factor of the number $below",$lpf,"1",$stime);

//Method 2 - Haskell
start_method();
$lpf=(prime_factors_haskell($below));
end_method();

result("recursive haskell","largest prime factor of the number $below",$lpf,"2",$stime);

echo "Total time of php execution was " . (microtime(true) - $ttime) . " seconds <br>";
