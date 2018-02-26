<?php

function factorial($num)
{
    $temp = 1;
    for ($i = 1; $i <= $num; ++$i) {
        $temp = $i * $temp;
              }

    return $temp;
}
$fac = factorial(6);
echo $fac."\n";
