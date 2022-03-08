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

trait TimestampsTrait
{
    /**
     * @var \DateTime|\DateTimeImmutable|null
     */
    #[Groups(['read'])]
    protected ?\DateTimeInterface $createdAt = null;

    /**
     * @var \DateTime|\DateTimeImmutable|null
     */
    #[Groups(['read'])]
    protected ?\DateTimeInterface $updatedAt = null;

    /**
     * @return \DateTime|\DateTimeImmutable|null
     */
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime|\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return \DateTime|\DateTimeImmutable|null
     */
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime|\DateTimeImmutable|null $updatedAt
     */
    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
