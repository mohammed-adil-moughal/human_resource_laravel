<?php


class Flash
{
    public static $ERROR = 'danger';
    public static $INFO = 'info';
    public static $WARNING = 'warning';
    public static $SUCCESS = 'success';

    public static  function create($type, $message)
    {
        $flash = array();
        $flash['type'] = '';
        $flash['message'] = '';

        if($type != null)
        {
            $flash['type'] = $type;
        }

        if($message != null)
        {
            $flash['message'] = $message;
        }

        return $flash;
    }
}

