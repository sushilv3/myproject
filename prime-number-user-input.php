<?php

function prime($number)
{
    $flag = true;
    for ($i = 2; $i < $number - 1; ++$i) {
        if ($number % $i == 0) {
            echo $number.' is not a prime number'."\n";
            $flag = false;
            break;
        }
    }
    if ($flag == true) {
        echo $number.' is a prime number'."\n";
    }
}
prime(13);
