<?php

declare(strict_types = 1);

/*
 * This file is part of the Easyblue API project.
 * (c) Easyblue <support@easyblue.io>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Easyblue\YouSign\tests\Factory;

use Easyblue\YouSign\Helper\Base64Helper;
use PHPUnit\Framework\TestCase;

class Base64HelperTest extends TestCase
{

    public function testIsBase64Encoded(): void
    {
        $content = 'content@';
        $this->assertFalse(Base64Helper::isBase64Encoded($content));
        $encodedContent = Base64Helper::base64Encode($content);
        $this->assertSame('Y29udGVudEA=', $encodedContent);
        $this->assertFalse(Base64Helper::isBase64Encoded(Base64Helper::base64Decode($encodedContent)));
    }
}
