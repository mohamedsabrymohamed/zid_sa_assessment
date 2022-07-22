<?php


namespace App\Enums;


class UserTypeEnum
{

    const CLIENT    = 1;
    const MERCHANT  = 2;

    /**
     * @param $type
     * @return int|null
     */
    public static function getIdByType($type)
    {

        if('client' == $type)
            return self::CLIENT;

        if('merchant' == $type)
            return self::MERCHANT;

        return null;
    }

    /**
     * @param $typeId
     * @return string|null
     */
    public static function getTypeConst($typeId)
    {

        if(1 == $typeId)
            return 'CLIENT';

        if(2 == $typeId)
            return 'MERCHANT';

        return null;
    }
}
