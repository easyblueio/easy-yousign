<?php

declare(strict_types = 1);

/*
 * This file is part of the Easyblue YouSign project.
 * (c) Easyblue <dev@easyblue.io>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Easyblue\YouSign\Http;

use Easyblue\YouSign\Exception\YouSignClientException;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;

class Client
{
    const ENV_PROD    = 'prod';
    const ENV_STAGING = 'staging';

    const URL_PROD    = 'https://api.yousign.com';
    const URL_STAGING = 'https://staging-api.yousign.com';

    public string $key;
    public string $baseUrl;

    public GuzzleClient $client;
    protected array     $clientOptions = [];

    public function __construct(string $apiKey, string $env = self::ENV_STAGING, GuzzleClient $client = null, array $clientOptions = [])
    {
        $this->clientOptions = $clientOptions;

        $this->key     = $apiKey;
        $this->baseUrl = self::ENV_PROD === $env ? self::URL_PROD : self::URL_STAGING;

        if (null === $client) {
            $client = new GuzzleClient();
        }

        /* @var GuzzleClient $client */
        $this->client = $client;
    }

    /**
     * @throws YouSignClientException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request(string $method, string $endpoint, array $options = [])
    {
        $headers = ['Authorization' => 'Bearer '.$this->key];

        $options = array_merge($this->clientOptions, $options, ['headers' => $headers]);
        try {
            return $this->client->request($method, sprintf('%s/%s', $this->baseUrl, ltrim($endpoint, '/')), $options);
        } catch (ClientException $exception) {
            throw new YouSignClientException($exception);
        }
    }
}
