<?php

require './model/model.php';
require './vendor/rtf/classes/Problem7.php';

echo "teste";
use vendor\rtf\classes as pe;
echo "teste";
$ttime=microtime(false);
$stime=microtime(true);
$nprime = 10001;
$problem = <<<XXX
10001st prime<br><br>
Problem 7<br>
By listing the first six prime numbers: 2, 3, 5, 7, 11, and 13, we can see that the 6th prime is 13.<br>
<br>
What is the 10 001st prime number?<br>
source: https://projecteuler.net/problem=$nproblem <br>
XXX;


//Title
echo $problem ;
echo "<br>";

//Method 1 
start_method();
$problem7 = new pe\Problem7($nprime);
$prime = $problem7->solveProblem();
end_method();

result("My second Class","the {$nprime}st prime number ",$prime,"1",$stime);

echo "Total time of php execution was " . (microtime(true) - $ttime) . 
        " seconds <br>";
