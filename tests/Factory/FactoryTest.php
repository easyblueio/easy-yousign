<?php

declare(strict_types = 1);

/*
 * This file is part of the Easyblue API project.
 * (c) Easyblue <support@easyblue.io>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Easyblue\YouSign\tests\Factory;

use Easyblue\YouSign\Factory\Factory;
use Easyblue\YouSign\Http\Client;
use Easyblue\YouSign\Resources\ProcedureResource;
use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{
    private $factory;

    public function setUp(): void
    {
        $this->factory = Factory::create();
    }

    public function testGetClient(): void
    {
        $client = $this->factory->getClient();
        $this->assertInstanceOf(Client::class, $client);
        $procedureResource = $this->factory->procedure();
        $this->assertInstanceOf(ProcedureResource::class, $procedureResource);
    }
}
