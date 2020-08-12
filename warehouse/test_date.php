<?php

$old_date= "24 October, 2018";
$new_date = "27 October, 2018";
$from = new DateTime(date('Y-m-d H:i:s',strtotime($old_date)));
$to = new DateTime(date('Y-m-d H:i:s',strtotime($new_date)));
$diff=$from->diff($to)->format("%a");
echo $diff;
/*
$date1=date_create("2013-03-15");
$date2=date_create("2013-12-12");
$dif=date_diff($date1,$date2);
echo $dif;
*/
?>