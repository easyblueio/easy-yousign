<?php

declare(strict_types = 1);

/*
 * This file is part of the Easyblue API project.
 * (c) Easyblue <support@easyblue.io>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Easyblue\YouSign\Factory;

use Easyblue\YouSign\Http\Client;
use Easyblue\YouSign\Serializer\YouSignSerializer;

/**
 * @method \Easyblue\YouSign\Resources\FileResource      file()
 * @method \Easyblue\YouSign\Resources\ProcedureResource procedure()
 */
final class Factory
{
    protected Client $client;
    protected YouSignSerializer $serializer;

    public function __construct(string $apiKey, string $baseUrl, Client $client = null, array $clientOptions = [])
    {
        if (null === $client) {
            $client = new Client(['base_url' => $baseUrl, 'api_key' => $apiKey], null, $clientOptions);
        }
        $this->client     = $client;
        $this->serializer = new YouSignSerializer();
    }

    public function __call(string $name, $args)
    {
        $resource = $this->getResourcesClass($name);

        return new $resource($this->client, $this->serializer, ...$args);
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    public static function create(string $apiKey = '', string $baseUrl = 'https://staging-api.yousign.com', Client $client = null, array $clientOptions = []): self
    {
        return new static($apiKey, $baseUrl, $client, $clientOptions);
    }

    private function getResourcesClass(string $name): string
    {
        return sprintf('Easyblue\YouSign\\Resources\\%sResource', ucfirst($name));
    }
}
