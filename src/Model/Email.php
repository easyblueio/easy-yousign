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

class Email
{
    /**
     * @Groups({"read", "write"})
     */
    protected array $to = [];

    /**
     * @Groups({"read", "write"})
     */
    protected ?string $subject = null;

    /**
     * @Groups({"read", "write"})
     */
    protected ?string $message = null;

    /**
     * @Groups({"read", "write"})
     */
    protected ?string $fromName = null;

    public function getTo(): array
    {
        return $this->to;
    }

    /**
     * @return Email
     */
    public function setTo(array $to): self
    {
        $this->to = $to;

        return $this;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    /**
     * @return Email
     */
    public function setSubject(?string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @return Email
     */
    public function setMessage(?string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getFromName(): ?string
    {
        return $this->fromName;
    }

    /**
     * @return Email
     */
    public function setFromName(?string $fromName): self
    {
        $this->fromName = $fromName;

        return $this;
    }
}
