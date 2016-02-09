<?php

require './model/model.php';
require './vendor/rtf/classes/Problem6.php';

use vendor\rtf\classes as pe;

$ttime=microtime(true);
$stime=microtime(true);
$nproblem = 6;
$nabove = 1;
$nbelow = 100;
$problem = <<<'XXX'
Sum square difference<br><br>
Problem 6<br>
The sum of the squares of the first ten natural numbers is,<br>
<br>
1² + 2² + ... + 10² = 385<br>
The square of the sum of the first ten natural numbers is,<br>
<br>
(1 + 2 + ... + 10)² = 552 = 3025<br>
Hence the difference between the sum of the squares of the first ten natural numbers and the square of the sum is 3025 − 385 = 2640.<br>
<br>
Find the difference between the sum of the squares of the first one hundred natural numbers and the square of the sum.<br>
source: https://projecteuler.net/problem=$nproblem <br>
XXX;


//Title
echo $problem ;
echo "<br>";

//Method 1 
start_method();
$solveproblem6 = new pe\Problem6($nabove,$nbelow);
$dif = $solveproblem6->solveProblem();
end_method();

result("My first Class","smallest positive number that is evenly divisible by all of the"
        . " numbers from $nabove to $nbelow",$dif,"1",$stime);

echo "Total time of php execution was " . (microtime(true) - $ttime) . 
        " seconds <br>";
