<?php

declare(strict_types = 1);

/*
 * This file is part of the Easyblue YouSign project.
 * (c) Easyblue <dev@easyblue.io>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Easyblue\YouSign\Test\Resource;

use Easyblue\YouSign\Exception\YouSignClientException;
use Easyblue\YouSign\Http\Client;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ClientTest extends TestCase
{
    private $client;

    public function setUp(): void
    {
        $this->client = $this->createMock(GuzzleClient::class);
    }

    public function testRequest()
    {
        $response = $this->createMock(ResponseInterface::class);
        $response->method('getBody')
            ->willReturn('content');

        $this->client->method('request')
            ->willReturn($response);

        $client = new Client('test', Client::ENV_STAGING, $this->client);
        $this->assertSame('content', $client->request('GET', '/test')->getBody());
    }

    public function testRequestWithClientException()
    {
        $request  = $this->createMock(RequestInterface::class);
        $response = $this->createMock(ResponseInterface::class);
        $response->method('getBody')
            ->willReturn(json_encode(['violations' => [['propertyPath' => 'name', 'message' => 'An error occurred']]]));

        $this->client->method('request')
            ->will($this->throwException(new ClientException('An error', $request, $response)));

        $this->expectException(YouSignClientException::class);
        $client = new Client('test', Client::ENV_STAGING, $this->client);
        $client->request('GET', '/test');
    }
}
