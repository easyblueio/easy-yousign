<?php

declare(strict_types = 1);

/*
 * This file is part of the Easyblue API project.
 * (c) Easyblue <support@easyblue.io>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Easyblue\YouSign\tests\Resource;

use Easyblue\YouSign\Http\Client;
use Easyblue\YouSign\Model\File;
use Easyblue\YouSign\Model\Procedure;
use Easyblue\YouSign\Resources\ProcedureResource;
use Easyblue\YouSign\Serializer\YouSignSerializer;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\MessageInterface;

class ProcedureTest extends TestCase
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
           ->willReturn(file_get_contents(__DIR__.'/../Fixtures/procedures.json'));

        $this->client->method('request')
           ->willReturn($response);

        /** @var File[] $files */
        $files = (new ProcedureResource($this->client, $this->serializer))->all();

        $this->assertSame('string', $files[0]->getName());
    }

    public function testCreate()
    {
        $response = $this->createMock(MessageInterface::class);
        $response->method('getBody')
            ->willReturn(file_get_contents(__DIR__.'/../Fixtures/procedure.json'));

        $this->client->method('request')
            ->willReturn($response);

        /** @var Procedure $procedure */
        $procedure = (new ProcedureResource($this->client, $this->serializer))->create(new Procedure());
        $this->assertSame('string', $procedure->getName());
    }

    public function testGet()
    {
        $response = $this->createMock(MessageInterface::class);
        $response->method('getBody')
            ->willReturn(file_get_contents(__DIR__.'/../Fixtures/procedure.json'));

        $this->client->method('request')
            ->willReturn($response);

        /** @var Procedure $procedure */
        $procedure = (new ProcedureResource($this->client, $this->serializer))->get('/procedures/9d1ede2b-5687-4440-bdc8-dd0bc64f668c');
        $this->assertSame('/procedures/9d1ede2b-5687-4440-bdc8-dd0bc64f668c', $procedure->getId());
    }
}
