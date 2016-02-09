<?php

namespace vendor\rtf\classes;
/**
 * This class solve the problem 7 of Project Euler
 * @copyright (c) 2016, Rene T Francisco 
 */
class Problem7 {

    private $nprime;

    function __construct($nprime)
    {
        $this->nprime = $nprime;
    }

    /**
     * Method solve problem 7
     * @return int Nst prime number
     */
    public function solveProblem()
    {
        $num = 1;
        for($i = 1; $i <= $this->nprime;$i++)
        {
            $num++;
            while($this->isPrime($num) != 1)
            {
                $num++;
            }
        }
        return $num;
    }
    
    /**
     * Verify if a number is prime
     * @param int $num Prime candidate
     * @return int 1 if $num is prime else 0
     */
    private function isPrime(int $num)
    {
    $cond = 1;
    if($num == 1)
    {
        $cond = 0;
    } 
    else 
    {
        for($i = 2;$i <= (int)sqrt($num);$i++)
        {
            if($num%$i == 0)
            {
                $cond = 0;
                break;
            }
        }
    }
    return $cond;
}
}

