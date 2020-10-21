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
use Symfony\Component\Serializer\Annotation\SerializedName;

class FileObject
{
    /**
     * @Groups({"read"})
     */
    protected ?string $id = null;

    /**
     * @Groups({"write"})
     * @SerializedName("file")
     */
    protected ?string $fileId = null;

    /**
     * @Groups({"read"})
     * @SerializedName("file")
     */
    protected ?File $file = null;

    /**
     * @Groups({"read", "write"})
     */
    protected int $page = 0;

    /**
     * @Groups({"read", "write"})
     */
    protected ?string $position = null;

    /**
     * @Groups({"read", "write"})
     */
    protected ?string $fieldName = null;

    /**
     * @Groups({"read", "write"})
     */
    protected ?string $mention = null;

    /**
     * @Groups({"read", "write"})
     */
    protected ?string $mention2 = null;

    /**
     * @Groups({"read"})
     */
    protected ?\DateTime $executedAt = null;

    /**
     * @Groups({"read", "write"})
     */
    protected ?string $reason = null;

    /**
     * @Groups({"read", "write"})
     */
    protected ?string $type = null;

    /**
     * @Groups({"read", "write"})
     */
    protected bool $contentRequired = false;

    /**
     * @Groups({"read", "write"})
     */
    protected ?string $content = null;

    /**
     * @Groups({"read", "write"})
     */
    protected ?string $fontFamily = null;

    /**
     * @Groups({"read", "write"})
     */
    protected ?int $fontSize = 0;

    /**
     * @Groups({"read", "write"})
     */
    protected ?string $fontColor = null;

    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return FileObject
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @return FileObject
     */
    public function setPage(int $page): self
    {
        $this->page = $page;

        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    /**
     * @return FileObject
     */
    public function setPosition(?string $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getFieldName(): ?string
    {
        return $this->fieldName;
    }

    /**
     * @return FileObject
     */
    public function setFieldName(?string $fieldName): self
    {
        $this->fieldName = $fieldName;

        return $this;
    }

    public function getMention(): ?string
    {
        return $this->mention;
    }

    /**
     * @return FileObject
     */
    public function setMention(?string $mention): self
    {
        $this->mention = $mention;

        return $this;
    }

    public function getMention2(): ?string
    {
        return $this->mention2;
    }

    /**
     * @return FileObject
     */
    public function setMention2(?string $mention2): self
    {
        $this->mention2 = $mention2;

        return $this;
    }

    public function getExecutedAt(): ?\DateTime
    {
        return $this->executedAt;
    }

    /**
     * @return FileObject
     */
    public function setExecutedAt(?\DateTime $executedAt): self
    {
        $this->executedAt = $executedAt;

        return $this;
    }

    public function getReason(): ?string
    {
        return $this->reason;
    }

    /**
     * @return FileObject
     */
    public function setReason(?string $reason): self
    {
        $this->reason = $reason;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @return FileObject
     */
    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function isContentRequired(): bool
    {
        return $this->contentRequired;
    }

    /**
     * @return FileObject
     */
    public function setContentRequired(bool $contentRequired): self
    {
        $this->contentRequired = $contentRequired;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @return FileObject
     */
    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getFontFamily(): ?string
    {
        return $this->fontFamily;
    }

    /**
     * @return FileObject
     */
    public function setFontFamily(?string $fontFamily): self
    {
        $this->fontFamily = $fontFamily;

        return $this;
    }

    public function getFontSize(): ?int
    {
        return $this->fontSize;
    }

    /**
     * @return FileObject
     */
    public function setFontSize(?int $fontSize): self
    {
        $this->fontSize = $fontSize;

        return $this;
    }

    public function getFontColor(): ?string
    {
        return $this->fontColor;
    }

    /**
     * @return FileObject
     */
    public function setFontColor(?string $fontColor): self
    {
        $this->fontColor = $fontColor;

        return $this;
    }

    public function getFileId(): ?string
    {
        if ($this->getFile()) {
            return $this->getFile()->getId();
        }

        return $this->fileId;
    }

    /**
     * @return FileObject
     */
    public function setFileId(?string $fileId): self
    {
        $this->fileId = $fileId;

        return $this;
    }

    public function getFile(): ?File
    {
        return $this->file;
    }

    /**
     * @return FileObject
     */
    public function setFile(?File $file): self
    {
        $this->file = $file;

        return $this;
    }
}
