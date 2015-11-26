<?php

require 'vendor/autoload.php';

$word = new \xEdelweiss\Word('Испытание');

dump($word->toSyllables());