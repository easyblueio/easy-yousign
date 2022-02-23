<?php

declare(strict_types = 1);

/*
 * This file is part of the Easyblue YouSign project.
 * (c) Easyblue <dev@easyblue.io>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Easyblue\YouSign\tests\Model;

use Easyblue\YouSign\Model\Procedure;
use Easyblue\YouSign\Model\ProcedureConfigEmail;
use Easyblue\YouSign\Model\ProcedureConfigWebhook;
use Easyblue\YouSign\Serializer\YouSignSerializer;
use PHPUnit\Framework\TestCase;

class ProcedureTest extends TestCase
{
    public function testSerialize(): void
    {
        $json = file_get_contents(__DIR__.'/../Fixtures/procedure.json');

        $serializer = new YouSignSerializer();
        /** @var Procedure $procedure */
        $procedure = $serializer->deserialize($json, Procedure::class);
        $this->assertSame('/procedures/9d1ede2b-5687-4440-bdc8-dd0bc64f668c', $procedure->getId());
        $this->assertSame('string', $procedure->getName());
        $this->assertSame('string', $procedure->getDescription());
        $this->assertSame('2020-10-14T15:45:31+00:00', null !== $procedure->getCreatedAt() ? $procedure->getCreatedAt()->format('c') : null);
        $this->assertSame('2020-10-14T15:45:31+00:00', null !== $procedure->getUpdatedAt() ? $procedure->getUpdatedAt()->format('c') : null);
        $this->assertSame('2020-10-14T15:45:31+00:00', null !== $procedure->getExpiresAt() ? $procedure->getExpiresAt()->format('c') : null);
        $this->assertSame('draft', $procedure->getStatus());
        $this->assertSame('/users/9d1ede2b-5687-4440-bdc8-dd0bc64f668c', $procedure->getCreator());
        $this->assertSame('string', $procedure->getCreatorFirstName());
        $this->assertSame('string', $procedure->getCreatorLastName());
        $this->assertSame('/workspaces/9d1ede2b-5687-4440-bdc8-dd0bc64f668c', $procedure->getWorkspace());
        $this->assertTrue($procedure->IsTemplate());
        $this->assertTrue($procedure->IsOrdered());
        $this->assertSame('/procedures/9d1ede2b-5687-4440-bdc8-dd0bc64f668c', $procedure->getParent());
        $this->assertTrue($procedure->isRelatedFilesEnable());
        $this->assertFalse($procedure->isArchive());

        $procedureConfig      = $procedure->getConfig();
        $procedureConfigEmail = $procedureConfig->getEmail();
        $emailConfig          = $procedureConfigEmail->getProcedureStartedEmails()[0];
        $this->assertSame('string', $emailConfig->getMessage());
        $this->assertSame('string', $emailConfig->getFromName());
        $this->assertSame('string', $emailConfig->getSubject());
        $this->assertSame(['@members'], $emailConfig->getTo());

        $procedureConfigWebhook = $procedureConfig->getWebhook();
        $webhookConfig          = $procedureConfigWebhook->getProcedureStartedWebhooks()[0];
        $this->assertSame('string', $webhookConfig->getUrl());
        $this->assertSame('GET', $webhookConfig->getMethod());
        $this->assertSame(['X-Yousign-Custom-Header' => 'Test value'], $webhookConfig->getHeaders());

        $json = $serializer->serialize($procedure);
        $this->assertJson($json);

        $array = json_decode($json, true, 512, \JSON_THROW_ON_ERROR);
        $this->assertSame('string', $array['config']['email'][ProcedureConfigEmail::PROCEDURE_STARTED][0]['subject']);
        $this->assertSame(['@members'], $array['config']['email'][ProcedureConfigEmail::PROCEDURE_STARTED][0]['to']);
        $this->assertSame('string', $array['config']['webhook'][ProcedureConfigWebhook::PROCEDURE_FINISHED][0]['url']);
        $this->assertSame(['X-Yousign-Custom-Header' => 'Test value'], $array['config']['webhook'][ProcedureConfigWebhook::PROCEDURE_FINISHED][0]['headers']);
    }
}
