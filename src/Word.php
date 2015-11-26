<?php

namespace xEdelweiss\Wordful;

use xEdelweiss\Wordful\Languages\AbstractLanguage;

class Word
{
    /**
     * @var string
     */
    protected $word;

    /**
     * @var AbstractLanguage
     */
    protected $language;

    /**
     * Word constructor.
     *
     * @param string $word
     * @param AbstractLanguage $language
     */
    public function __construct($word, AbstractLanguage $language)
    {
        $this->language = $language;
        $this->word = $this->getLanguageAdapter()->normalizeWord($word);
    }

    /**
     * @return string
     */
    public function toString()
    {
        return $this->word;
    }

    public function getLettersCount()
    {
        return $this->getLanguageAdapter()->getLettersCount($this->word);
    }

    /**
     * @return array
     */
    public function toSyllables()
    {
        return $this->getLanguageAdapter()->toSyllables($this->word);
    }

    /**
     * @return AbstractLanguage
     */
    protected function getLanguageAdapter()
    {
        return $this->language;
    }
}