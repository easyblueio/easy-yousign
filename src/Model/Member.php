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

class Member
{
    use TimestampsTrait;

    /**
     * @Groups({"read"})
     */
    protected ?string $id = null;

    /**
     * @Groups({"read"})
     */
    protected ?string $user = null;

    /**
     * @Groups({"read", "write"})
     */
    protected ?string $type = null;

    /**
     * @Groups({"read", "write"})
     */
    protected ?string $firstname = null;

    /**
     * @Groups({"read", "write"})
     */
    protected ?string $lastname = null;

    /**
     * @Groups({"read", "write"})
     */
    protected ?string $email = null;

    /**
     * @Groups({"read", "write"})
     */
    protected ?string $phone = null;

    /**
     * @Groups({"read", "write"})
     */
    protected ?int $position = null;

    /**
     * @Groups({"read"})
     */
    protected ?string $status = null;

    /**
     * @Groups({"read", "write"})
     */
    protected array $fileObjects = [];

    /**
     * @Groups({"read"})
     */
    protected ?string $comment = null;

    /**
     * @Groups({"read", "write"})
     */
    protected ?string $procedure = null;

    /**
     * @Groups({"read", "write"})
     */
    protected ?string $operationLevel = null;

    /**
     * @Groups({"read", "write"})
     */
    protected array $operationCustomModes = [];

    /**
     * @Groups({"read", "write"})
     */
    protected ?ModeSmsConfiguration $modeSmsConfiguration = null;

    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return Member
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    /**
     * @return Member
     */
    public function setUser(?string $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @return Member
     */
    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @return Member
     */
    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @return Member
     */
    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return Member
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @return Member
     */
    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    /**
     * @return Member
     */
    public function setPosition(?int $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @return Member
     */
    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getFileObjects(): array
    {
        return $this->fileObjects;
    }

    /**
     * @return Member
     */
    public function setFileObjects(array $fileObjects): self
    {
        $this->fileObjects = $fileObjects;

        return $this;
    }

    /**
     * @return Member
     */
    public function addFileObject(FileObject $fileObject): self
    {
        $this->fileObjects[] = $fileObject;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @return Member
     */
    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getProcedure(): ?string
    {
        return $this->procedure;
    }

    /**
     * @return Member
     */
    public function setProcedure(?string $procedure): self
    {
        $this->procedure = $procedure;

        return $this;
    }

    public function getOperationLevel(): ?string
    {
        return $this->operationLevel;
    }

    /**
     * @return Member
     */
    public function setOperationLevel(?string $operationLevel): self
    {
        $this->operationLevel = $operationLevel;

        return $this;
    }

    public function getOperationCustomModes(): array
    {
        return $this->operationCustomModes;
    }

    /**
     * @return Member
     */
    public function setOperationCustomModes(array $operationCustomModes): self
    {
        $this->operationCustomModes = $operationCustomModes;

        return $this;
    }

    public function getModeSmsConfiguration(): ?ModeSmsConfiguration
    {
        return $this->modeSmsConfiguration;
    }

    /**
     * @return Member
     */
    public function setModeSmsConfiguration(?ModeSmsConfiguration $modeSmsConfiguration): self
    {
        $this->modeSmsConfiguration = $modeSmsConfiguration;

        return $this;
    }
}
