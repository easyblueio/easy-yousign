<?php

declare(strict_types = 1);

/*
 * This file is part of the Easyblue YouSign project.
 * (c) Easyblue <dev@easyblue.io>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Easyblue\YouSign\tests\Model;

use Easyblue\YouSign\Model\File;
use Easyblue\YouSign\Serializer\YouSignSerializer;
use PHPUnit\Framework\TestCase;

class FileTest extends TestCase
{
    public function testSerialize(): void
    {
        $json = file_get_contents(__DIR__.'/../Fixtures/file.json');

        $serializer = new YouSignSerializer();
        /** @var File $file */
        $file = $serializer->deserialize($json, File::class);
        $this->assertSame('/files/9d1ede2b-5687-4440-bdc8-dd0bc64f668c', $file->getId());
        $this->assertSame('string', $file->getName());
        $this->assertSame('signable', $file->getType());
        $this->assertSame('application/pdf', $file->getContentType());
        $this->assertSame('string', $file->getDescription());
        $this->assertSame('2020-04-23T18:25:43+00:00', $file->getCreatedAt()->format('c'));
        $this->assertSame('2020-04-23T18:25:43+00:00', $file->getUpdatedAt()->format('c'));
        $this->assertNull($file->getMetadata());
        $this->assertSame('/workspaces/9d1ede2b-5687-4440-bdc8-dd0bc64f668c', $file->getWorkspace());
        $this->assertSame('/users/9d1ede2b-5687-4440-bdc8-dd0bc64f668c', $file->getCreator());
        $this->assertSame('23203f9264161714cdb8d2f474b9b641e6a735f8cea4098c40a3cab8743bd749', $file->getHash());
        $this->assertSame(0, $file->getPosition());

        $file->setContent('content');
        $file->setPassword('password');
        $file->setType('signable');
        $file->setDescription('description');
        $file->setProcedure('/procedures/9d1ede2b-5687-4440-bdc8-dd0bc64f668c');
        $json = $serializer->serialize($file);
        $this->assertJson($json);

        $array = json_decode($json, true);
        $this->assertArrayNotHasKey('id', $array);
        $this->assertSame('string', $array['name']);
        $this->assertSame('signable', $array['type']);
        $this->assertSame('password', $array['password']);
        $this->assertSame('description', $array['description']);
        $this->assertSame('Y29udGVudA==', $array['content']);
        $this->assertSame('/procedures/9d1ede2b-5687-4440-bdc8-dd0bc64f668c', $array['procedure']);
        $this->assertSame(0, $array['position']);
    }
}
