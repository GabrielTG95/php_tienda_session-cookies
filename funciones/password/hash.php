<?php
function getHashCost(String $password): int{
  $mSec = 100;

  $password = 'pas5@W0rD14h1$L0w';
  $cost = 3;
  do {
    $cost++;
    echo "\nTesting cost value of $cost: ";
    $time = benchmark($password, $cost);
    echo "... took $time";
  } while ($time < ($mSec/1000));

  function benchmark($password, $cost=4)
  {
    $start = microtime(true);
    password_hash($password, PASSWORD_BCRYPT, ['cost'=>$cost]);
    return microtime(true) - $start;
  }
  return $cost;
}

/*
echo '<pre>';
$mSec = 100;

$password = 'pas5@W0rD14h1$L0w';

echo "\nPassword Hash Cost Calculator\n\n";
echo "Testing BCRYPT hashing the password '$password'\n\n";
echo "We're going to run until the time to generate the hash takes longer than {$mSec}ms\n";

$cost = 3;
do {
  $cost++;
  echo "\nTesting cost value of $cost: ";
  $time = benchmark($password, $cost);
  echo "... took $time";
} while ($time < ($mSec/1000));

echo "\n\nIdeal cost is $cost\n";
echo "\nRunning 100 times to check the average:\n";

$start = microtime(true);
$times = [];
for ($i=1;$i<=100;$i++) {
  echo "\r$i/100";
  $times[] = benchmark($password, $cost);
}

echo "\n\ndone benchmarking in ".(microtime(true)-$start)."\n";

echo "\nSlowest time: ".max($times);
echo "\nFastest time: ".min($times);
echo "\nAverage time: ".(array_sum($times)/count($times));

echo "\n\nFinished\n";


function benchmark($password, $cost=4)
{
  $start = microtime(true);
  password_hash($password, PASSWORD_BCRYPT, ['cost'=>$cost]);
  return microtime(true) - $start;
}
echo '</pre>';
*/