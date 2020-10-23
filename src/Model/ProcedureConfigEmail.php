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

class ProcedureConfigEmail
{
    const PROCEDURE_STARTED  = 'procedure.started';
    const PROCEDURE_FINISHED = 'procedure.finished';
    const PROCEDURE_REFUSED  = 'procedure.refused';
    const PROCEDURE_EXPIRED  = 'procedure.expired';
    const PROCEDURE_DELETED  = 'procedure.deleted';
    const MEMBER_STARTED     = 'member.started';
    const MEMBER_FINISHED    = 'member.finished';
    const COMMENT_CREATED    = 'comment.created';

    /**
     * @Groups({"read", "write"})
     * @SerializedName("procedure.started")
     */
    protected array $procedureStartedEmails = [];

    /**
     * @Groups({"read", "write"})
     * @SerializedName("procedure.finished")
     */
    protected array $procedureFinishedEmails = [];

    /**
     * @Groups({"read", "write"})
     * @SerializedName("procedure.refused")
     */
    protected array $procedureRefusedEmails = [];

    /**
     * @Groups({"read", "write"})
     * @SerializedName("procedure.expired")
     */
    protected array $procedureExpiredEmails = [];

    /**
     * @Groups({"read", "write"})
     * @SerializedName("procedure.deleted")
     */
    protected array $procedureDeletedEmails = [];

    /**
     * @Groups({"read", "write"})
     * @SerializedName("member.finished")
     */
    protected array $memberFinishedEmails = [];

    /**
     * @Groups({"read", "write"})
     * @SerializedName("comment.created")
     */
    protected array $commentCreatedEmails = [];

    /**
     * @return Email[]|null
     */
    public function getProcedureStartedEmails(): ?array
    {
        return $this->procedureStartedEmails;
    }

    /**
     * @param Email[]|null $procedureStartedEmails
     *
     * @return ProcedureConfigEmail
     */
    public function setProcedureStartedEmails(?array $procedureStartedEmails): self
    {
        $this->procedureStartedEmails = $procedureStartedEmails;

        return $this;
    }

    /**
     * @return ProcedureConfigEmail
     */
    public function addProcedureStartedEmail(Email $procedureStartedEmail): self
    {
        $this->procedureStartedEmails[] = $procedureStartedEmail;

        return $this;
    }

    /**
     * @return Email[]|null
     */
    public function getProcedureFinishedEmails(): ?array
    {
        return $this->procedureFinishedEmails;
    }

    /**
     * @param Email[]|null $procedureFinishedEmails
     *
     * @return ProcedureConfigEmail
     */
    public function setProcedureFinishedEmails(?array $procedureFinishedEmails): self
    {
        $this->procedureFinishedEmails = $procedureFinishedEmails;

        return $this;
    }

    /**
     * @return ProcedureConfigEmail
     */
    public function addProcedureFinishedEmails(Email $procedureFinishedEmail): self
    {
        $this->procedureFinishedEmails[] = $procedureFinishedEmail;

        return $this;
    }

    /**
     * @return Email[]|null
     */
    public function getProcedureRefusedEmails(): ?array
    {
        return $this->procedureRefusedEmails;
    }

    /**
     * @param Email[]|null $procedureRefusedEmails
     *
     * @return ProcedureConfigEmail
     */
    public function setProcedureRefusedEmails(?array $procedureRefusedEmails): self
    {
        $this->procedureRefusedEmails = $procedureRefusedEmails;

        return $this;
    }

    /**
     * @return ProcedureConfigEmail
     */
    public function addProcedureRefusedEmails(Email $procedureRefusedEmail): self
    {
        $this->procedureRefusedEmails[] = $procedureRefusedEmail;

        return $this;
    }

    /**
     * @return Email[]|null
     */
    public function getProcedureExpiredEmails(): ?array
    {
        return $this->procedureExpiredEmails;
    }

    /**
     * @param Email[]|null $procedureExpiredEmails
     *
     * @return ProcedureConfigEmail
     */
    public function setProcedureExpiredEmails(?array $procedureExpiredEmails): self
    {
        $this->procedureExpiredEmails = $procedureExpiredEmails;

        return $this;
    }

    /**
     * @return ProcedureConfigEmail
     */
    public function addProcedureExpiredEmails(Email $procedureExpiredEmail): self
    {
        $this->procedureExpiredEmails[] = $procedureExpiredEmail;

        return $this;
    }

    /**
     * @return Email[]|null
     */
    public function getProcedureDeletedEmails(): ?array
    {
        return $this->procedureDeletedEmails;
    }

    /**
     * @param Email[]|null $procedureDeletedEmails
     *
     * @return ProcedureConfigEmail
     */
    public function setProcedureDeletedEmails(?array $procedureDeletedEmails): self
    {
        $this->procedureDeletedEmails = $procedureDeletedEmails;

        return $this;
    }

    /**
     * @return ProcedureConfigEmail
     */
    public function addProcedureDeletedEmails(Email $procedureDeletedEmail): self
    {
        $this->procedureDeletedEmails[] = $procedureDeletedEmail;

        return $this;
    }

    /**
     * @return Email[]|null
     */
    public function getMemberFinishedEmails(): ?array
    {
        return $this->memberFinishedEmails;
    }

    /**
     * @param Email[]|null $memberFinishedEmails
     *
     * @return ProcedureConfigEmail
     */
    public function setMemberFinishedEmails(?array $memberFinishedEmails): self
    {
        $this->memberFinishedEmails = $memberFinishedEmails;

        return $this;
    }

    /**
     * @return ProcedureConfigEmail
     */
    public function addMemberFinishedEmails(Email $memberFinishedEmail): self
    {
        $this->memberFinishedEmails[] = $memberFinishedEmail;

        return $this;
    }

    /**
     * @return Email[]|null
     */
    public function getCommentCreatedEmails(): ?array
    {
        return $this->commentCreatedEmails;
    }

    /**
     * @param Email[]|null $commentCreatedEmails
     *
     * @return ProcedureConfigEmail
     */
    public function setCommentCreatedEmails(?array $commentCreatedEmails): self
    {
        $this->commentCreatedEmails = $commentCreatedEmails;

        return $this;
    }

    /**
     * @return ProcedureConfigEmail
     */
    public function addCommentCreatedEmails(Email $commentCreatedEmail): self
    {
        $this->commentCreatedEmails[] = $commentCreatedEmail;

        return $this;
    }
}
