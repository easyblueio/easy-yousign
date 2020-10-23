<?php

declare(strict_types = 1);

/*
 * This file is part of the Easyblue YouSign project.
 * (c) Easyblue <dev@easyblue.io>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Easyblue\YouSign\Test\Resource;

use Easyblue\YouSign\Http\Client;
use Easyblue\YouSign\Model\File;
use Easyblue\YouSign\Resources\FileResource;
use Easyblue\YouSign\Serializer\YouSignSerializer;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\MessageInterface;

class FileTest extends TestCase
{
    private $serializer;
    private $client;

    public function setUp(): void
    {
        $this->client     = $this->createMock(Client::class);
        $this->serializer = new YouSignSerializer();
    }

    public function testAll()
    {
        $response = $this->createMock(MessageInterface::class);
        $response->method('getBody')
           ->willReturn(file_get_contents(__DIR__.'/../Fixtures/files.json'));

        $this->client->method('request')
           ->willReturn($response);

        /** @var File[] $files */
        $files = (new FileResource($this->client, $this->serializer))->all();

        $this->assertSame('string', $files[0]->getName());
    }

    public function testCreate()
    {
        $response = $this->createMock(MessageInterface::class);
        $response->method('getBody')
            ->willReturn(file_get_contents(__DIR__.'/../Fixtures/file.json'));

        $this->client->method('request')
            ->willReturn($response);

        /** @var File $file */
        $file = (new FileResource($this->client, $this->serializer))->create(new File());
        $this->assertSame('string', $file->getName());
    }

    public function testGet()
    {
        $response = $this->createMock(MessageInterface::class);
        $response->method('getBody')
            ->willReturn(file_get_contents(__DIR__.'/../Fixtures/file.json'));

        $this->client->method('request')
            ->willReturn($response);

        /** @var File $file */
        $file = (new FileResource($this->client, $this->serializer))->get('/files/9d1ede2b-5687-4440-bdc8-dd0bc64f668c');
        $this->assertSame('/files/9d1ede2b-5687-4440-bdc8-dd0bc64f668c', $file->getId());
    }

    public function testDownloadAsBinary()
    {
        $response = $this->createMock(MessageInterface::class);
        $response->method('getBody')
            ->willReturn('content');

        $this->client->method('request')
            ->with('GET', '/files/9d1ede2b-5687-4440-bdc8-dd0bc64f668c/download?alt=media')
            ->willReturn($response);

        $content = (new FileResource($this->client, $this->serializer))->download('/files/9d1ede2b-5687-4440-bdc8-dd0bc64f668c');
        $this->assertSame('content', $content);
    }

    public function testDownloadAsBase64()
    {
        $response = $this->createMock(MessageInterface::class);
        $response->method('getBody')
                 ->willReturn('content');

        $this->client->method('request')
                     ->with('GET', '/files/9d1ede2b-5687-4440-bdc8-dd0bc64f668c/download')
                     ->willReturn($response);

        $content = (new FileResource($this->client, $this->serializer))->download('/files/9d1ede2b-5687-4440-bdc8-dd0bc64f668c', false);
        $this->assertSame('content', $content);
    }
}
