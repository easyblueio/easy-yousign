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

class File
{
    use TimestampsTrait;

    /**
     * @Groups({"read"})
     */
    protected ?string $id = null;

    /**
     * @Groups({"read", "write"})
     */
    protected ?string $name = null;

    /**
     * @Groups({"read", "write"})
     */
    protected ?string $type = null;

    /**
     * @Groups({"read", "write"})
     */
    protected ?string $password = null;

    /**
     * @Groups({"read", "write"})
     */
    protected ?string $description = null;

    protected ?array  $metadata = null;

    /**
     * @Groups({"read", "write"})
     */
    protected ?string $content = null;

    /**
     * @Groups({"read"})
     */
    protected ?string $contentType = null;

    /**
     * @Groups({"read", "write"})
     */
    protected ?string $procedure = null;

    /**
     * @Groups({"read"})
     */
    protected ?string $workspace = null;

    /**
     * @Groups({"read"})
     */
    protected ?string $creator = null;

    /**
     * @Groups({"read"})
     * @SerializedName("sha256")
     */
    protected ?string $hash = null;

    /**
     * @Groups({"read", "write"})
     */
    protected $position;

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

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

    public function getMetadata(): ?array
    {
        return $this->metadata;
    }

    public function setMetadata(?array $metadata): self
    {
        $this->metadata = $metadata;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getProcedure(): ?string
    {
        return $this->procedure;
    }

    public function setProcedure(?string $procedure): self
    {
        $this->procedure = $procedure;

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

    public function getCreator(): ?string
    {
        return $this->creator;
    }

    public function setCreator(?string $creator): self
    {
        $this->creator = $creator;

        return $this;
    }

    public function getHash(): ?string
    {
        return $this->hash;
    }

    public function setHash(?string $hash): self
    {
        $this->hash = $hash;

        return $this;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    public function getContentType(): ?string
    {
        return $this->contentType;
    }

    public function setContentType(?string $contentType): self
    {
        $this->contentType = $contentType;

        return $this;
    }
}
