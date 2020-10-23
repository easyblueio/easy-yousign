<?php

declare(strict_types = 1);

/*
 * This file is part of the Easyblue YouSign project.
 * (c) Easyblue <dev@easyblue.io>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Easyblue\YouSign\Resources;

use Easyblue\YouSign\Http\Client;
use Easyblue\YouSign\Serializer\YouSignSerializer;

abstract class AbstractResource
{
    protected Client $client;
    protected YouSignSerializer $serializer;

    public function __construct(Client $client, YouSignSerializer $serializer)
    {
        $this->client     = $client;
        $this->serializer = $serializer;
    }
}
