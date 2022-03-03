<?php

class Counter
{
    private static int $count = 0;

    /**
     * @return int
     */
    public static function getCount(): int
    {
        return self::$count;
    }

    /**
     * @param mixed $count
     */
    public static function setCount($count): void
    {
        self::$count = $count;
    }

    public static function increment()
    {
        $file = file("counter.txt");
        $count = explode("=", $file[0])[1];
        self::setCount((int)$count + 1);
    }
}