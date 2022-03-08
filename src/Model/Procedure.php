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

class Procedure
{
    use TimestampsTrait;
    public const STATE_DRAFT    = 'draft';
    public const STATE_ACTIVE   = 'active';
    public const STATE_FINISHED = 'finished';
    public const STATE_EXPIRED  = 'expired';
    public const STATE_REFUSED  = 'refused';

    #[Groups(['read'])]
    protected ?string $id = null;

    #[Groups(['read', 'write'])]
    protected ?string $name = null;

    /**
     * @var \DateTime|\DateTimeImmutable|null
     */
    #[Groups(['read', 'write'])]
    protected ?\DateTimeInterface $expiresAt = null;

    /**
     * @var \DateTime|\DateTimeImmutable|null
     */
    #[Groups(['read', 'write'])]
    protected ?\DateTimeInterface $finishedAt = null;

    #[Groups(['read'])]
    protected ?string $status = self::STATE_ACTIVE;

    #[Groups(['read'])]
    protected ?string $creator = null;

    #[Groups(['read'])]
    #[SerializedName('creatorFirstName')]
    protected ?string $creatorFirstname = null;

    #[Groups(['read'])]
    #[SerializedName('creatorLastName')]
    protected ?string $creatorLastname = null;

    #[Groups(['read'])]
    protected ?string $workspace = null;

    #[Groups(['read'])]
    protected ?string $parent = null;

    #[Groups(['read', 'write'])]
    protected bool $template = false;

    #[Groups(['read', 'write'])]
    protected ?string $description = null;

    #[Groups(['read', 'write'])]
    protected bool $ordered = false;

    #[Groups(['read', 'write'])]
    protected bool $relatedFilesEnable = false;

    #[Groups(['read', 'write'])]
    protected bool $archive = false;

    /**
     * @var Member[]
     */
    #[Groups(['read', 'write'])]
    protected array $members = [];

    #[Groups(['read', 'write'])]
    protected array $metadatas = [];

    #[Groups(['read', 'write'])]
    protected ?ProcedureConfig $config = null;

    #[Groups(['read'])]
    protected array $files = [];

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return \DateTime|\DateTimeImmutable|null
     */
    public function getExpiresAt(): ?\DateTimeInterface
    {
        return $this->expiresAt;
    }

    /**
     * @param \DateTime|\DateTimeImmutable|null $expiresAt
     */
    public function setExpiresAt(?\DateTimeInterface $expiresAt): self
    {
        $this->expiresAt = $expiresAt;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getCreator(): ?string
    {
        return $this->creator;
    }

    public function setCreator(?string $creator): self
    {
        $this->creator = $creator;

        return $this;
    }

    public function getCreatorFirstname(): ?string
    {
        return $this->creatorFirstname;
    }

    public function setCreatorFirstname(?string $creatorFirstname): self
    {
        $this->creatorFirstname = $creatorFirstname;

        return $this;
    }

    public function getCreatorLastname(): ?string
    {
        return $this->creatorLastname;
    }

    public function setCreatorLastname(?string $creatorLastname): self
    {
        $this->creatorLastname = $creatorLastname;

        return $this;
    }

    public function getWorkspace(): ?string
    {
        return $this->workspace;
    }

    public function setWorkspace(?string $workspace): self
    {
        $this->workspace = $workspace;

        return $this;
    }

    public function getParent(): ?string
    {
        return $this->parent;
    }

    public function setParent(?string $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    public function isTemplate(): bool
    {
        return $this->template;
    }

    public function setTemplate(bool $template): self
    {
        $this->template = $template;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function isOrdered(): bool
    {
        return $this->ordered;
    }

    public function setOrdered(bool $ordered): self
    {
        $this->ordered = $ordered;

        return $this;
    }

    public function isRelatedFilesEnable(): bool
    {
        return $this->relatedFilesEnable;
    }

    public function setRelatedFilesEnable(bool $relatedFilesEnable): self
    {
        $this->relatedFilesEnable = $relatedFilesEnable;

        return $this;
    }

    public function isArchive(): bool
    {
        return $this->archive;
    }

    public function setArchive(bool $archive): self
    {
        $this->archive = $archive;

        return $this;
    }

    /**
     * @return Member[]
     */
    public function getMembers(): array
    {
        return $this->members;
    }

    /**
     * @param Member[] $members
     */
    public function setMembers(array $members): self
    {
        $this->members = $members;

        return $this;
    }

    public function addMember(Member $member): self
    {
        $this->members[] = $member;

        return $this;
    }

    public function getMetadatas(): array
    {
        return $this->metadatas;
    }

    public function setMetadatas(array $metadatas): self
    {
        $this->metadatas = $metadatas;

        return $this;
    }

    public function getConfig(): ?ProcedureConfig
    {
        return $this->config;
    }

    public function setConfig(?ProcedureConfig $config): self
    {
        $this->config = $config;

        return $this;
    }

    public function getFiles(): array
    {
        return $this->files;
    }

    public function setFiles(array $files): self
    {
        $this->files = $files;

        return $this;
    }

    public function addFile(File $file): self
    {
        $this->files[] = $file;

        return $this;
    }

    /**
     * @return \DateTime|\DateTimeImmutable|null
     */
    public function getFinishedAt(): ?\DateTimeInterface
    {
        return $this->finishedAt;
    }

    /**
     * @param \DateTime|\DateTimeImmutable|null $finishedAt
     */
    public function setFinishedAt(?\DateTimeInterface $finishedAt): self
    {
        $this->finishedAt = $finishedAt;

        return $this;
    }
}
