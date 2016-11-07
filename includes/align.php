<?php


$dob=date_create("1994-08-06");
$m1=date_format($dob,"m");
$Y1=date_format($dob,"Y");
$m2=date("m");
$Y2=date("Y");
$d1=date_format($dob,"d");
$d2=date("d");

if($m2>$m1)
{
$age=$Y2-$Y1;
}
elseif ($m2<$m1)
{
$age=$Y2-$Y1-1;
}
else
{
  if($d2>=$d1)
    $age=$Y2-$Y1;
}
   echo $age.'Years';
?>