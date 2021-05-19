<?php

declare(strict_types = 1);

/*
 * This file is part of the Easyblue YouSign project.
 * (c) Easyblue <dev@easyblue.io>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Easyblue\YouSign\Model;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;

class ProcedureConfigWebhook
{
    public const PROCEDURE_STARTED  = 'procedure.started';
    public const PROCEDURE_FINISHED = 'procedure.finished';
    public const PROCEDURE_REFUSED  = 'procedure.refused';
    public const PROCEDURE_EXPIRED  = 'procedure.expired';
    public const PROCEDURE_DELETED  = 'procedure.deleted';
    public const MEMBER_STARTED     = 'member.started';
    public const MEMBER_FINISHED    = 'member.finished';
    public const COMMENT_CREATED    = 'comment.created';

    /**
     * @Groups({"read", "write"})
     * @SerializedName("procedure.started")
     *
     * @var Webhook[]
     */
    protected array $procedureStartedWebhooks = [];

    /**
     * @Groups({"read", "write"})
     * @SerializedName("procedure.finished")
     *
     * @var Webhook[]
     */
    protected array $procedureFinishedWebhooks = [];

    /**
     * @Groups({"read", "write"})
     * @SerializedName("procedure.refused")
     *
     * @var Webhook[]
     */
    protected array $procedureRefusedWebhooks = [];

    /**
     * @Groups({"read", "write"})
     * @SerializedName("procedure.expired")
     *
     * @var Webhook[]
     */
    protected array $procedureExpiredWebhooks = [];

    /**
     * @Groups({"read", "write"})
     * @SerializedName("procedure.deleted")
     *
     * @var Webhook[]
     */
    protected array $procedureDeletedWebhooks = [];

    /**
     * @Groups({"read", "write"})
     * @SerializedName("member.finished")
     *
     * @var Webhook[]
     */
    protected array $memberFinishedWebhooks = [];

    /**
     * @Groups({"read", "write"})
     * @SerializedName("comment.created")
     *
     * @var Webhook[]
     */
    protected array $commentCreatedWebhooks = [];

    /**
     * @return Webhook[]
     */
    public function getProcedureStartedWebhooks(): array
    {
        return $this->procedureStartedWebhooks;
    }

    /**
     * @param Webhook[]|null $procedureStartedWebhooks
     *
     * @return ProcedureConfigWebhook
     */
    public function setProcedureStartedWebhooks(?array $procedureStartedWebhooks): self
    {
        $this->procedureStartedWebhooks = $procedureStartedWebhooks ?? [];

        return $this;
    }

    public function addProcedureStartedWebhook(Webhook $procedureStartedWebhook): self
    {
        $this->procedureStartedWebhooks[] = $procedureStartedWebhook;

        return $this;
    }

    /**
     * @return Webhook[]
     */
    public function getProcedureFinishedWebhooks(): array
    {
        return $this->procedureFinishedWebhooks;
    }

    /**
     * @param Webhook[]|null $procedureFinishedWebhooks
     *
     * @return ProcedureConfigWebhook
     */
    public function setProcedureFinishedWebhooks(?array $procedureFinishedWebhooks): self
    {
        $this->procedureFinishedWebhooks = $procedureFinishedWebhooks ?? [];

        return $this;
    }

    public function addProcedureFinishedWebhooks(Webhook $procedureFinishedWebhook): self
    {
        $this->procedureFinishedWebhooks[] = $procedureFinishedWebhook;

        return $this;
    }

    /**
     * @return Webhook[]
     */
    public function getProcedureRefusedWebhooks(): array
    {
        return $this->procedureRefusedWebhooks;
    }

    /**
     * @param Webhook[]|null $procedureRefusedWebhooks
     *
     * @return ProcedureConfigWebhook
     */
    public function setProcedureRefusedWebhooks(?array $procedureRefusedWebhooks): self
    {
        $this->procedureRefusedWebhooks = $procedureRefusedWebhooks ?? [];

        return $this;
    }

    public function addProcedureRefusedWebhooks(Webhook $procedureRefusedWebhook): self
    {
        $this->procedureRefusedWebhooks[] = $procedureRefusedWebhook;

        return $this;
    }

    /**
     * @return Webhook[]
     */
    public function getProcedureExpiredWebhooks(): array
    {
        return $this->procedureExpiredWebhooks;
    }

    /**
     * @param Webhook[]|null $procedureExpiredWebhooks
     *
     * @return ProcedureConfigWebhook
     */
    public function setProcedureExpiredWebhooks(?array $procedureExpiredWebhooks): self
    {
        $this->procedureExpiredWebhooks = $procedureExpiredWebhooks ?? [];

        return $this;
    }

    public function addProcedureExpiredWebhooks(Webhook $procedureExpiredWebhook): self
    {
        $this->procedureExpiredWebhooks[] = $procedureExpiredWebhook;

        return $this;
    }

    /**
     * @return Webhook[]
     */
    public function getProcedureDeletedWebhooks(): array
    {
        return $this->procedureDeletedWebhooks;
    }

    /**
     * @param Webhook[]|null $procedureDeletedWebhooks
     *
     * @return ProcedureConfigWebhook
     */
    public function setProcedureDeletedWebhooks(?array $procedureDeletedWebhooks): self
    {
        $this->procedureDeletedWebhooks = $procedureDeletedWebhooks ?? [];

        return $this;
    }

    public function addProcedureDeletedWebhooks(Webhook $procedureDeletedWebhook): self
    {
        $this->procedureDeletedWebhooks[] = $procedureDeletedWebhook;

        return $this;
    }

    /**
     * @return Webhook[]
     */
    public function getMemberFinishedWebhooks(): array
    {
        return $this->memberFinishedWebhooks;
    }

    /**
     * @param Webhook[]|null $memberFinishedWebhooks
     *
     * @return ProcedureConfigWebhook
     */
    public function setMemberFinishedWebhooks(?array $memberFinishedWebhooks): self
    {
        $this->memberFinishedWebhooks = $memberFinishedWebhooks ?? [];

        return $this;
    }

    public function addMemberFinishedWebhooks(Webhook $memberFinishedWebhook): self
    {
        $this->memberFinishedWebhooks[] = $memberFinishedWebhook;

        return $this;
    }

    /**
     * @return Webhook[]
     */
    public function getCommentCreatedWebhooks(): array
    {
        return $this->commentCreatedWebhooks;
    }

    /**
     * @param Webhook[]|null $commentCreatedWebhooks
     *
     * @return ProcedureConfigWebhook
     */
    public function setCommentCreatedWebhooks(?array $commentCreatedWebhooks): self
    {
        $this->commentCreatedWebhooks = $commentCreatedWebhooks ?? [];

        return $this;
    }

    public function addCommentCreatedWebhooks(Webhook $commentCreatedWebhook): self
    {
        $this->commentCreatedWebhooks[] = $commentCreatedWebhook;

        return $this;
    }
}
