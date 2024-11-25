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

    /**
     * Filters and returns array of data
     * @param array $fields
     * @return array
     */
    public static function getPostData(array $fields): array
    {
        $postData = [];

        foreach ($fields as $field) {
            $value = filter_input(INPUT_POST, $field, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $value !== null && $value !== false ? $postData[$field] = $value : $postData[$field] = null;
        }

        return $postData;
    }
}
