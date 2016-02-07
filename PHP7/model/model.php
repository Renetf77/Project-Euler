<?php


//General
function result($desc_method,$desc_solution,$sum,$method,$stime) 
{ 
    echo "<br>Method $method - $desc_method <br>";
    if(is_array($sum))
    {
        echo "<b>The $desc_solution is: <br>";
        print_r($sum); 
        echo "</b><br>";
    }
    else
    {
    echo "<b>The $desc_solution is: $sum </b><br>";
    }
    echo "Total time to find solution method $method was $stime seconds <br>";
}

//Problem 1
function mult35($num) 
{
    return ($num%3==0 or $num%5==0);
}
function soma($v, $w) 
{
    $v += $w;
    return $v;
}

//Problem 2
function fibonacci_rec($n) 
{
    if($n == 1 or $n == 2)
    {    
        $term = 1;
    }    
    else if($n > 0)
    {    
        $term  = fibonacci_rec($n-1) + fibonacci_rec($n-2);
    }    
    else
    {
        $term = fibonacci_rec($n+2) - fibonacci_rec($n+1);
    }
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
function start_method() 
{
    $GLOBALS["stime"] = microtime(true);
}
function end_method() 
{
    $GLOBALS["stime"] = microtime(true) - $GLOBALS["stime"];
}

//Problem 3
function prime_haskell($num)
{
    $c=1;
    if($num==2 or $num==3 or $num==5)
    {
        return $c;
    }
    if(($num%2 == 0 and $num != 2) or ($num%3 == 0 and $num != 3) or ($num%5 == 0 and $num != 5))
    {
        $c = 0;
        return $c;
    }
    for($b = 1;$b <= (int)((sqrt($num)+1)/6+1);$b++)
    {
        if($num%(6*$b - 1) == 0)
        {
            $c = 0;
            return $c;
        }
        if($num%(6*$b + 1) == 0)
        {
            $c = 0;
            return $c;
        }
    return $c;
    }
}
function prime($num)
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
function prime_factors($num)
{
    $rest = $num;
    $factors = $num;
    for($i = 2;$i <= (int)($num/2); $i++)
    {
        if($rest == 1)
        {
            break;
        }
        if(prime($i))
        {
            while($rest%$i == 0)
            {
                $factors = $i;
                $rest /= $i;
            }
        }
    }
    return $factors;
}
function prime_factors_haskell($num)
{
    $rest = $num;
    $factors = $num;
    for($i = 2;$i <= (int)($num/2); $i++)
    {
        if($rest == 1)
        {
            break;
        }
        if(prime_haskell($i))
        {
            while($rest%$i == 0)
            {
                $factors = $i;
                $rest /= $i;
            }
        }
    }
    return $factors;
}
function prime_factors_rev($num)
{
    for($i = (int)($num/2); $i >= 2; $i--)
    {
        if(prime($i))
        {
            if($num % $i == 0)
            {
                return $i;
            }
        }
    }
    return $num;
}
//Problem 4
function max_palindrome_ndig($d)
{
    $maxnumber = 10**$d - 1;
    for($palpart = $maxnumber;$palpart >= 1;$palpart--)
    {     
        $palindrome = monta_palindrome($palpart);
        for($t1 = $maxnumber;$t1 >= 1;$t1--)
        {
            $t2=$palindrome/$t1;
            if($palindrome%$t1 == 0 and $t2 <= $maxnumber)
            {
                $conj = ['palindrome' => $palindrome,
                         'termo1'     => $t1,
                         'termo2'     => $t2];
                return $conj;
            }
        }
    }
}
function monta_palindrome($num)
{
    $pal_cand = (string)$num;
    $d = strlen($pal_cand);
        $palindrome = '';
        for($i = 1;$i <= $d;$i++)
        {
            $palindrome .= $pal_cand[$i - 1];       
        }
        for($i = $d;$i >= 1;$i--)
        {
            $palindrome .= $pal_cand[$i - 1];
        }  
    return $palindrome;
}
function palindrome($num)
{
    $text = (string)$num;
    if(strlen($text)%2 != 0)
    {
        return false;
    }
    for($i = 1;$i <= strlen($text)/2;$i++)
    {
        if($text[$i-1]!=$text[strlen($text)-$i])
        {
            return false;
        }
    }
    return true;        
}
//Problem 5
function factors_array_haskell($num)
{
    $rest = $num;
    $factors = [];
    for($i = 2;$i <= (int)($num/2); $i++)
    {
        if($rest == 1)
        {
            break;
        }
        if(prime_haskell($i))
        {
            while($rest%$i == 0)
            {
                $factors[] = $i;
                $rest /= $i;
            }
        }
    }
    if(count($factors)==0)
    {
        $factors[] = $num;
    }
    return $factors;
}
function dif_factors(int $s,int $e)
{
    $dif_factors = [];
    for($i = $e;$i >= $s;$i--)
    {
        $itemf = 0;
        $factors = array_to_associative(factors_array_haskell($i));
        foreach($factors as $key => $itemf)
        {
            if(array_key_exists($key, $dif_factors))
            {
                if($itemf > $dif_factors[$key])
                {
                    $dif_factors[$key] = $itemf;
                }
            } else {
                $dif_factors[$key] = $itemf;
            }
        }
    }
    return $dif_factors;
}
function array_union(array $a,array $b)
{
    $c = $a;
    if(count($b)>0)
    {
        foreach($b as $i)
        {
            $c[] = $i;
        }
    }
    return $c;
}
function array_dif(array $a,array $b)
{
    if(count($a) == 0 or count($b) == 0)
    {
        return array_union($a, $b);
    }
    $c = array_diff($a,$b);
    $d = array_diff($b,$a);
    $e = array_union($c,$d);
    return $e;
}
function array_to_associative(array $n)
{
    $array_associative = [];
    foreach($n as $item)
    {
        if(array_key_exists($item, $array_associative))
        {
            $array_associative[$item]++;
        } else {
            $array_associative[$item] = 1;
        }
    }
    return $array_associative;
}