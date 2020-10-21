<?php

declare(strict_types = 1);

/*
 * This file is part of the Easyblue API project.
 * (c) Easyblue <support@easyblue.io>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Easyblue\YouSign\Model;

use Symfony\Component\Serializer\Annotation\Groups;

class ProcedureConfig
{
    /**
     * @Groups({"read", "write"})
     */
    protected ?ProcedureConfigEmail $email = null;

    /**
     * @Groups({"read", "write"})
     */
    protected ?ProcedureConfigWebhook $webhook = null;

    public function __construct(ProcedureConfigEmail $email = null, ProcedureConfigWebhook $webhook = null)
    {
        $this->email   = $email;
        $this->webhook = $webhook;
    }

    public function getEmail(): ?ProcedureConfigEmail
    {
        return $this->email;
    }

    /**
     * @return ProcedureConfig
     */
    public function setEmail(ProcedureConfigEmail $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getWebhook(): ?ProcedureConfigWebhook
    {
        return $this->webhook;
    }

    /**
     * @return ProcedureConfig
     */
    public function setWebhook(ProcedureConfigWebhook $webhook): self
    {
        $this->webhook = $webhook;

        return $this;
    }
}
