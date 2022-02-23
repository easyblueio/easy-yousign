<?php

declare(strict_types = 1);

/*
 * This file is part of the Easyblue YouSign project.
 * (c) Easyblue <dev@easyblue.io>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Easyblue\YouSign\Resources;

use Easyblue\YouSign\Model\File;

class FileResource extends AbstractResource
{
    final public const ENDPOINT = '/files';

    /**
     * @return File[]
     */
    public function all(): array
    {
        $response =  $this->client->request('GET', self::ENDPOINT);
        $json     = (string) $response->getBody();

        return $this->serializer->deserialize($json, 'Easyblue\YouSign\Model\File[]');
    }

    public function create(File $file): File
    {
        $json = $this->serializer->normalize($file);

        $response =  $this->client->request(
            'POST',
            self::ENDPOINT,
            ['json' => $json],
        );

        $json = (string) $response->getBody();

        return $this->serializer->deserialize($json, File::class);
    }

    public function get(string $id): File
    {
        $response =  $this->client->request('GET', $id);
        $json     = (string) $response->getBody();

        return $this->serializer->deserialize($json, File::class);
    }

    public function download(string $id, bool $asBinary = true): string
    {
        $id       = str_replace('/files/', '', $id);
        $endPoint =  sprintf('/files/%s/download', $id);
        if ($asBinary) {
            $endPoint .= '?alt=media';
        }

        $response =  $this->client->request('GET', $endPoint);

        return (string) $response->getBody();
    }
}
