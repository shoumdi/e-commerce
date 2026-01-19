<?php

namespace Core;

use Psr\Http\Message\UriInterface;

class URI implements UriInterface
{

    protected string $scheme = '';
    protected string $userInfo = '';
    protected string $host = '';
    protected ?int $port = null;
    protected string $path = '';
    protected string $query = '';
    protected string $fragment = '';

    public function __construct()
    {
        $this->path = $_SERVER['REQUEST_URI'];
    }

    public function getScheme(): string
    {
        throw new \Exception('Not implemented');
    }

    public function getAuthority(): string
    {
        throw new \Exception('Not implemented');
    }

    public function getUserInfo(): string
    {
        throw new \Exception('Not implemented');
    }

    public function getHost(): string
    {
        throw new \Exception('Not implemented');
    }

    public function getPort(): ?int
    {
        throw new \Exception('Not implemented');
    }

    public function getPath(): string
    {
        throw new \Exception('Not implemented');
    }

    public function getQuery(): string
    {
        throw new \Exception('Not implemented');
    }

    public function getFragment(): string
    {
        throw new \Exception('Not implemented');
    }

    public function withScheme($scheme): self
    {
        throw new \Exception('Not implemented');
    }

    public function withUserInfo($user, $password = null): self
    {
        throw new \Exception('Not implemented');
    }

    public function withHost($host): self
    {
        throw new \Exception('Not implemented');
    }

    public function withPort($port): self
    {
        throw new \Exception('Not implemented');
    }

    public function withPath($path): self
    {
        throw new \Exception('Not implemented');
    }

    public function withQuery($query): self
    {
        throw new \Exception('Not implemented');
    }

    public function withFragment($fragment): self
    {
        throw new \Exception('Not implemented');
    }

    public function __toString(): string
    {
        throw new \Exception('Not implemented');
    }
}
