<?php

namespace xEdelweiss\Wordful\Languages;

/**
 * Class Ukrainian
 * @package xEdelweiss\Wordful\Languages
 *
 * @author Michael Sverdlikovsky <xedelweiss@gmail.com>
 */
class Ukrainian extends AbstractLanguage
{
    /**
     * @return array
     */
    public function getVowels()
    {
        return ['а', 'е', 'є', 'и', 'і', 'ї', 'о', 'у', 'ю', 'я'];
    }
}