<?php

namespace App\Helpers;
class Helper{
    public static function convertDateToJSON($data)
    {
        if($data == null || $data == "")
        {
            return null;
        }

        $dateTime = \DateTime::createFromFormat('Y-m-d H:i:s.u', $data);

        if(!$dateTime)
        {
            $dateTime = \DateTime::createFromFormat('Y-m-d H:i:s', $data);
            if(!$dateTime){
                $dateTime = \DateTime::createFromFormat('Y-m-d', $data);
                if(!$dateTime) return null;
            }
        }

        $requiredJsonFormat = sprintf(
            '/Date(%s%s)/',
            $dateTime->format('U') * 1000,
            $dateTime->format('O')
        );

        return $requiredJsonFormat;
    }

    public static function convertJSONToDate($data)
    {
        if($data == null || $data == "")
        {
            return null;
        }
        $match = preg_match('/\/Date\((\d+)([-+])(\d+)\)\//', $data, $date);
        if(!$match)
        {
            $match = preg_match('/\/Date\((\d+)\)\//', $data, $date);
            if(!$match) return null;
            $timestamp = $date[1]/1000;
            $datetime = new \DateTime();
            $datetime->setTimestamp($timestamp);
            return $datetime->format('Y-m-d H:i:s');
        }


        $timestamp = $date[1]/1000;
        $operator = $date[2];
        $hours = $date[3]*36;

        $datetime = new \DateTime();

        $datetime->setTimestamp($timestamp);
        $datetime->modify($operator . $hours . ' seconds');

        return $datetime->format('Y-m-d H:i:s');
    }

    public static function has_string_keys(array $array) {
        return count(array_filter(array_keys($array), 'is_string')) > 0;
    }

    public static function createCode($s) {
        return strtoupper(preg_replace('~\b(\w)|.~', '$1', $s));
    }

    /**
     *
     * Generate v4 UUID
     *
     * Version 4 UUIDs are pseudo-random.
     */
    public static function UUID()
    {
        //Helper::UUID()
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            // 32 bits for "time_low"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),
            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,
            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,
            // 48 bits for "node"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

    public static function isValidUUID($uuid) {
        return preg_match('/^\{?[0-9a-f]{8}\-?[0-9a-f]{4}\-?[0-9a-f]{4}\-?'.
            '[0-9a-f]{4}\-?[0-9a-f]{12}\}?$/i', $uuid) === 1;
    }
    
    public static function getBase64Image($path)
    {

        return asset('images/wafula.png');

    }
}
