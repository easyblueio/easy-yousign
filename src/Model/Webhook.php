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

class Webhook
{
    /**
     * @Groups({"read", "write"})
     */
    protected ?string $url = null;

    /**
     * @Groups({"read", "write"})
     */
    protected ?string $method = null;

    /**
     * @Groups({"read", "write"})
     */
    protected Header $headers;

    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @return Webhook
     */
    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getMethod(): ?string
    {
        return $this->method;
    }

    /**
     * @return Webhook
     */
    public function setMethod(?string $method): self
    {
        $this->method = $method;

        return $this;
    }

    public function getHeaders(): array
    {
        return $this->headers->getParameters();
    }

    /**
     * @return Webhook
     */
    public function setHeaders(Header $headers): self
    {
        $this->headers = $headers;

        return $this;
    }
}
