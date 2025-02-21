<?php

echo __FILE__ . "\n";
echo __LINE__ . "\n";

$text = <<<ART
h
 e
  l
   l
    0
     world
\n
ART;
echo $text;

$a = 'Рыба';
$b = 'человек';
echo "'$a рыбою сыта, а $b человеком'";
