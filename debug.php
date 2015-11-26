<?php

use xEdelweiss\Wordful\Languages\Russian;
use xEdelweiss\Wordful\Languages\Ukrainian;
use xEdelweiss\Wordful\Word;

require 'vendor/autoload.php';

$word = new Word('Российским', new Russian());
dump($word->toSyllables()); // ро - ссий - ским

$word = new Word('Українською', new Ukrainian());
dump($word->toSyllables());