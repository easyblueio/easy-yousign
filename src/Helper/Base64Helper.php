<?php

declare(strict_types = 1);

/*
 * This file is part of the Easyblue API project.
 * (c) Easyblue <support@easyblue.io>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Easyblue\YouSign\Helper;

class Base64Helper
{
    public static function isBase64Encoded($data)
    {
        return preg_match('%^[a-zA-Z0-9/+]*={0,2}$%', $data);
    }

    public static function base64Encode($data)
    {
        return base64_encode($data);
    }
}
