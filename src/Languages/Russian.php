<?php

namespace xEdelweiss\Wordful\Languages;

/**
 * Class Russian
 * @package xEdelweiss\Wordful\Languages
 *
 * @author Michael Sverdlikovsky <xedelweiss@gmail.com>
 */
class Russian extends AbstractLanguage
{
    /**
     * @return array
     */
    public function getVowels()
    {
        return ['а', 'у', 'о', 'ы', 'и', 'э', 'я', 'ю', 'ё', 'е'];
    }
}