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
    final public const PROCEDURE_STARTED  = 'procedure.started';
    final public const PROCEDURE_FINISHED = 'procedure.finished';
    final public const PROCEDURE_REFUSED  = 'procedure.refused';
    final public const PROCEDURE_EXPIRED  = 'procedure.expired';
    final public const PROCEDURE_DELETED  = 'procedure.deleted';
    final public const MEMBER_STARTED     = 'member.started';
    final public const MEMBER_FINISHED    = 'member.finished';
    final public const COMMENT_CREATED    = 'comment.created';

    /**
     * @var Webhook[]
     */
    #[Groups(['read', 'write'])]
    #[SerializedName('procedure.started')]
    protected array $procedureStartedWebhooks = [];

    /**
     * @var Webhook[]
     */
    #[Groups(['read', 'write'])]
    #[SerializedName('procedure.finished')]
    protected array $procedureFinishedWebhooks = [];

    /**
     * @var Webhook[]
     */
    #[Groups(['read', 'write'])]
    #[SerializedName('procedure.refused')]
    protected array $procedureRefusedWebhooks = [];

    /**
     * @var Webhook[]
     */
    #[Groups(['read', 'write'])]
    #[SerializedName('procedure.expired')]
    protected array $procedureExpiredWebhooks = [];

    /**
     * @var Webhook[]
     */
    #[Groups(['read', 'write'])]
    #[SerializedName('procedure.deleted')]
    protected array $procedureDeletedWebhooks = [];

    /**
     * @var Webhook[]
     */
    #[Groups(['read', 'write'])]
    #[SerializedName('member.finished')]
    protected array $memberFinishedWebhooks = [];

    /**
     * @var Webhook[]
     */
    #[Groups(['read', 'write'])]
    #[SerializedName('comment.created')]
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
