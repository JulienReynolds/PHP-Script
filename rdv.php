
<?php

require "reserver.php";
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=reservations.csv');

$all = $_RSV->getDay();

if (count($all) == 0) {
  echo "Pas de réservations";
} else {


  foreach ($all as $r) {
    foreach ($r as $k => $v) {
      echo "$k.$v\r\n";
    }
    echo "\r\n";
  }
}
