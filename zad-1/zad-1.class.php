<?php

class CodeCracker
{

    const DISCRET_KEYS  = '!)"(£*%&><@abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRSTUVW';
    const DISCRET_CHARS = 'abcdefghijklmnopqrstuvwxyząćęńóśźżABCDEFGHIJKLMNOPRSTUVWXYZ';

    //const DISCRET_KEYS = '!)"(£*%&><@abcdefghijklmno';
    //const DISCRET_CHARS = 'abcdefghijklmnopqrstuvwxyz';

    private static $keys;

    private static function setKeys()
    {
        self::$keys = array_combine(mb_str_split(self::DISCRET_KEYS), mb_str_split(self::DISCRET_CHARS));
    }

    private static function getArrayMessage($message)
    {
        self::setKeys();
        return mb_str_split($message);
    }

    private static function getEncodedChar($char)
    {
        $key = array_search($char, self::$keys);
        if ($key !== false)
            return $key;
        else
            return $char;
    }

    private function getDecodedChar($char)
    {
        if (array_key_exists($char, self::$keys))
            return self::$keys[$char];
        else
            return $char;
    }

    private function message($message, $decode = true)
    {
        $message_mb_array = self::getArrayMessage($message);

        $result = [];
        foreach ($message_mb_array as $char) {
            if ($decode)
                $result[] = self::getDecodedChar($char);
            else
                $result[] = self::getEncodedChar($char);
        }
        return implode('', $result);
    }

    public static function decode($message)
    {
        return self::message($message);
    }

    public static function encode($message)
    {
        return self::message($message, false);
    }
}
//brawo, udalo ci sie rozwiazac zadanie

echo CodeCracker::decode(')g!ld, j(!ad "> h>£ gdol>!o!" o!(!c>£');

$za = CodeCracker::encode('Brawo, udalo Ci się rozwiązać zadanie.');
echo "\r\n";
echo CodeCracker::decode($za);
echo "\r\n";

$za = CodeCracker::encode('Zażółć, gęślą jaźń.');

echo $za;
echo "\r\n";
echo CodeCracker::decode($za);
