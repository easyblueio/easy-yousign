<?php

declare(strict_types = 1);

/*
 * This file is part of the Easyblue YouSign project.
 * (c) Easyblue <dev@easyblue.io>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Easyblue\YouSign\tests\Serializer;

use Easyblue\YouSign\Model\File;
use Easyblue\YouSign\Serializer\YouSignSerializer;
use PHPUnit\Framework\TestCase;

class YouSignSerializerTest extends TestCase
{
    public function testSerialize(): void
    {
        $file = new File();
        $file->setName('test.pdf');

        $serializer = new YouSignSerializer();
        $json       = $serializer->serialize($file);
        $this->assertJson($json);

        $array = json_decode($json, true);
        $this->assertSame('test.pdf', $array['name']);
    }
}
