<?php


namespace Svea\Checkout\Exception;


class ExceptionCodeList
{
    const CLIENT_API_ERROR = 1000;

    const MISSING_MERCHANT_ID = 2001;
    const MISSING_SHARED_SECRET = 2002;
    const MISSING_BASE_URL = 2003;

    public static function getErrorMessage($exceptionCode)
    {
        $exceptionCode = intval($exceptionCode);

        $exceptionMessageList = array(

            1000 => "Api Client Error",

            2001 => "Missing Merchant Id",
            2002 => 'Missing Shared Secret',
            2003 => "Missing API URL",

        );

        if (in_array($exceptionCode, $exceptionMessageList))
            return $exceptionMessageList[$exceptionCode];

        return "Unknown code error";
    }
}