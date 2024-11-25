<?php

class Helpers
{
    /**
     * Convert date in UTC before adding to DB
     * @param string $date
     * @return string
     */
    public static function convertToUTC(string $date): string
    {
        $dateTime = new DateTime($date);
        $dateTime->setTimezone(new DateTimeZone('UTC'));
        return $dateTime->format('Y-m-d H:i:s');
    }

    /**
     * Convert date from UTC to user's timezone for displaying in system
     * @param string $date
     * @return string
     */
    public static function convertFromUTC(string $date): string
    {
        $dateTime = new DateTime($date, new DateTimeZone('UTC'));
        $dateTime->setTimezone(new DateTimeZone(date_default_timezone_get()));
        return $dateTime->format('Y-m-d H:i:s');
    }
}
