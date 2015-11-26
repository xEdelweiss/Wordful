<?php

namespace xEdelweiss\Wordful\Languages;

/**
 * Class AbstractLanguage
 * @package xEdelweiss\Wordful\Languages
 *
 * @author Michael Sverdlikovsky <xedelweiss@gmail.com>
 */
abstract class AbstractLanguage
{
    /**
     * @var string
     */
    protected $encoding;

    /**
     * @return array
     */
    abstract public function getVowels();

    /**
     * AbstractLanguage constructor.
     *
     * @param string $encoding
     */
    public function __construct($encoding = 'UTF-8')
    {
        $this->encoding = $encoding;
    }

    /**
     * @param $word
     * @return array
     */
    public function toSyllables($word)
    {
        $result = [];

        $currentSyllable = '';
        for ($i = 0; $i < $this->getLettersCount($word); $i++) {
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
     * @param string $letter
     * @return bool
     */
    public function isVowel($letter)
    {
        return in_array($letter, $this->getVowels());
    }

    /**
     * @param string $word
     * @return bool
     */
    public function isVowelContained($word)
    {
        $vowels = implode('|', $this->getVowels());

        return (bool)preg_match("/({$vowels})/u", $word);
    }

    /**
     * @param string $word
     * @return int
     */
    public function getLettersCount($word)
    {
        return mb_strlen($word, $this->encoding);
    }

    /**
     * @param string $word
     * @return string
     */
    public function normalizeWord($word)
    {
        $result = mb_strtolower($word, $this->encoding);

        return $result;
    }
}