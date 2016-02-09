<?php

namespace vendor\rtf\classes;
/**
 * This class solve the problem 6 of Project Euler
 * @copyright (c) 2016, Rene T Francisco 
 */
class Problem6 {
    private $start_num;
    private $end_num;
    /**
     * 
     * @param int $start_num First number of interaction
     * @param int $end_num Last number of interaction
     */
    function __construct($start_num, $end_num)
    {
        $this->start_num = $start_num;
        $this->end_num = $end_num;
    }
    /**
     * Method solve problem 6
     * @return int
     */
    public function solveProblem()
    {
        $sum_sqr = 0;
        $sqr_sum = 0;
        for($i = $this->start_num; $i <= $this->end_num; $i++)
        {
            $sum_sqr += $i**2;
            $sqr_sum += $i;
        }
        $answer = $sqr_sum**2 - $sum_sqr;
        return $answer;
    }
}

