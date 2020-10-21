<?php

declare(strict_types = 1);

/*
 * This file is part of the Easyblue API project.
 * (c) Easyblue <support@easyblue.io>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Easyblue\YouSign\Http;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;

class Client
{
    public string $key;
    public string $baseUrl = 'https://staging-api.yousign.com';

    public GuzzleClient $client;
    protected array $clientOptions = [];

    public function __construct(array $config = [], GuzzleClient $client = null, array $clientOptions = [])
    {
        $this->clientOptions = $clientOptions;

        $this->key     = $config['api_key'];
        $this->baseUrl = $config['base_url'];

        if (null === $client) {
            $client = new GuzzleClient();
        }

        $this->client = $client;
    }

    public function request(string $method, string $endpoint, array $options = [])
    {
        $headers = ['Authorization' => 'Bearer '.$this->key];

        $options = array_merge($this->clientOptions, $options, ['headers' => $headers]);
        try {
            return $this->client->request($method, sprintf('%s/%s', $this->baseUrl, ltrim($endpoint, '/')), $options);
        } catch (ClientException $exception) {
            // TODO: menage exception
            throw $exception;
        }
    }
}
