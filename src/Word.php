<?php

namespace xEdelweiss;

class Word
{
    const VOWELS = ['а', 'у', 'о', 'ы', 'и', 'э', 'я', 'ю', 'ё', 'е'];
    /**
     * @var string
     */
    protected $word;

    /**
     * @var string
     */
    protected $encoding;

    /**
     * Word constructor.
     *
     * @param string $word
     * @param string $encoding
     */
    public function __construct($word, $encoding = 'UTF-8')
    {
        // specify language
        $this->originalWord = $word;
        $this->encoding = $encoding;

        $this->word = $this->initWord($word);
    }

    /**
     * @return int
     */
    public function getLettersCount()
    {
        return mb_strlen($this->word, $this->encoding);
    }

    /**
     * @return int
     */
    public function getAccentPosition()
    {
        return 0;
    }

    /**
     * @return array
     */
    public function toSyllables()
    {
        $word = $this->word;
        $result = [];

        $currentSyllable = '';
        for ($i = 0; $i < $this->getLettersCount(); $i++) {
            $letter = mb_substr($word, $i, 1, $this->encoding);
            $currentSyllable .= $letter;

            if (!$this->isVowel($letter)) {
                continue;
            }

            $restPart = mb_substr($word, $i + 1, null, $this->encoding);

            if (!$this->isVowelContained($restPart)) {
                $currentSyllable .= $restPart;
                $result[] = $currentSyllable;
                break;
            }

            $result[] = $currentSyllable;
            $currentSyllable = '';
        }

        return $result;
    }

    /**
     * @param string $word
     * @return bool
     */
    protected function isVowelContained($word)
    {
        $vowels = implode('|', static::VOWELS);
        return (bool)preg_match("/({$vowels})/u", $word);
    }

    /**
     * @param string $letter
     * @return bool
     */
    protected function isVowel($letter)
    {
        return in_array($letter, static::VOWELS);
    }

    /**
     * @param string $word
     * @return string
     */
    protected function initWord($word)
    {
        $result = mb_strtolower($word, $this->encoding);

        return $result;
    }
}