<?php

declare(strict_types = 1);

/*
 * This file is part of the Easyblue YouSign project.
 * (c) Easyblue <dev@easyblue.io>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Easyblue\YouSign\Exception;

use GuzzleHttp\Exception\ClientException;

class YouSignClientException extends \Exception
{
    protected array $violations = [];

    public function __construct(ClientException $clientException)
    {
        parent::__construct($clientException->getMessage(), $clientException->getCode());
        $json = (string) $clientException->getResponse()->getBody();

        $data = json_decode($json, true);
        if (isset($data['violations'])) {
            $violations = [];
            foreach ($data['violations'] as $violation) {
                $violations[$violation['propertyPath']] = $violation['message'];
            }
            $this->violations = $violations;
        }
    }
}
