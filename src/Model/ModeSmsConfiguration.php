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

class ModeSmsConfiguration
{
    /**
     * @Groups({"read", "write"})
     */
    protected ?string $content = null;

    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @return ModeSmsConfiguration
     */
    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }
}
