<?php

declare(strict_types = 1);

/*
 * This file is part of the Easyblue API project.
 * (c) Easyblue <support@easyblue.io>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Easyblue\YouSign\Test\Resource;

use Easyblue\YouSign\Http\Client;
use GuzzleHttp\Client as GuzzleClient;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

class ClientTest extends TestCase
{
    private $client;

    public function setUp(): void
    {
        $this->client     = $this->createMock(GuzzleClient::class);
    }

    public function testRequest()
    {
        $response = $this->createMock(ResponseInterface::class);
        $response->method('getBody')
           ->willReturn('content');

        $this->client->method('request')
           ->willReturn($response);


        $client = new Client(['api_key' => 'test', 'base_url' => 'http://api.dev/'], $this->client);

        $this->assertSame('content', $client->request('GET', '/test')->getBody());
    }
}
