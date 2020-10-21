<?php

declare(strict_types = 1);

/*
 * This file is part of the Easyblue API project.
 * (c) Easyblue <support@easyblue.io>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Easyblue\YouSign\Resources;

use Easyblue\YouSign\Model\Procedure;

class ProcedureResource extends AbstractResource
{
    const ENDPOINT = '/procedures';

    public function all()
    {
        $response =  $this->client->request('GET', self::ENDPOINT);
        $json     = (string) $response->getBody();

        return $this->serializer->deserialize($json, 'Easyblue\YouSign\Model\Procedure[]');
    }

    public function create(Procedure $file): Procedure
    {
        $json = $this->serializer->normalize($file);

        $response =  $this->client->request(
            'POST',
            self::ENDPOINT,
            ['json' => $json],
        );

        $json = (string) $response->getBody();

        return $this->serializer->deserialize($json, Procedure::class);
    }

    public function get(string $id)
    {
        $response =  $this->client->request('GET', $id);

        $json = (string) $response->getBody();

        return $this->serializer->deserialize($json, Procedure::class);
    }
}
