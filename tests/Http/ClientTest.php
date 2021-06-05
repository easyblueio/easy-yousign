<?php

declare(strict_types = 1);

/*
 * This file is part of the Easyblue YouSign project.
 * (c) Easyblue <dev@easyblue.io>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Easyblue\YouSign\Test\Http;

use Easyblue\YouSign\Exception\YouSignClientException;
use Easyblue\YouSign\Http\Client;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ClientTest extends TestCase
{
    /** @var GuzzleClient|MockObject */
    private MockObject $guzzleClient;

    private Client $client;

    protected function setUp(): void
    {
        $this->guzzleClient = $this->createMock(GuzzleClient::class);
        $this->client       = new Client('test', Client::ENV_STAGING, $this->guzzleClient);
    }

    public function testRequest(): void
    {
        $response = $this->createMock(ResponseInterface::class);
        $response->method('getBody')
            ->willReturn('content');

        $this->guzzleClient->method('request')
            ->willReturn($response);

        $this->assertSame('content', $this->client->request('GET', '/test')->getBody());
    }

    public function testRequestWithClientException(): void
    {
        $request  = $this->createMock(RequestInterface::class);
        $response = $this->createMock(ResponseInterface::class);
        $response->method('getBody')
            ->willReturn(json_encode(['violations' => [['propertyPath' => 'name', 'message' => 'An error occurred']]]));

        $this->guzzleClient->method('request')
            ->will($this->throwException(new ClientException('An error', $request, $response)));

        $this->expectException(YouSignClientException::class);
        $this->client->request('GET', '/test');
    }
}
