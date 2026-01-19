<?php

namespace Core;

use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;

class Request implements ServerRequestInterface
{
    private array $methods = ["GET","POST"];
    private string $method;
    private UriInterface $uri;

    public function __construct()
    {
            $this->method = $_SERVER['REQUEST_METHOD'];
            $this->uri = new URI();
    }

    function getServerParams(): array
    {
        throw new \Exception('Not implemented');
    }

    public function getCookieParams(): array
    {
        throw new \Exception('Not implemented');
    }

    public function withCookieParams(array $cookies): ServerRequestInterface
    {
        throw new \Exception('Not implemented');
    }
    public function getQueryParams(): array
    {
        throw new \Exception('Not implemented');
    }
    public function withQueryParams(array $query): ServerRequestInterface
    {
        throw new \Exception('Not implemented');
    }
    public function getUploadedFiles(): array
    {
        throw new \Exception('Not implemented');
    }
    public function withUploadedFiles(array $uploadedFiles): ServerRequestInterface
    {
        throw new \Exception('Not implemented');
    }
    public function getParsedBody()
    {
        throw new \Exception('Not implemented');
    }
    public function withParsedBody($data): ServerRequestInterface
    {
        throw new \Exception('Not implemented');
    }
    public function getAttributes(): array
    {
        throw new \Exception('Not implemented');
    }
    public function withAttribute(string $name, $value): ServerRequestInterface
    {
        throw new \Exception('Not implemented');
    }
    public function withoutAttribute(string $name): ServerRequestInterface
    {
        throw new \Exception('Not implemented');
    }
    public function getRequestTarget(): string
    {
        throw new \Exception('Not implemented');
    }
    public function withRequestTarget(string $requestTarget): RequestInterface
    {
        throw new \Exception('Not implemented');
    }
    public function getMethod(): string
    {
        return $this->method;
    }
    public function withMethod(string $method): RequestInterface
    {
        if (!in_array($method,$this->methods)) throw new \UnexpectedValueException('Invalid method');
        $this->method = $method;
        return $this;
    }
    public function getUri(): UriInterface
    {
        return $this->uri;
    }

    public function withUri(UriInterface $uri, bool $preserveHost = false): RequestInterface
    {
        throw new \Exception('Not implemented');
    }
    public function getProtocolVersion(): string
    {
        throw new \Exception('Not implemented');
    }
    public function withProtocolVersion(string $version): MessageInterface
    {
        throw new \Exception('Not implemented');
    }
    public function getHeaders(): array
    {
        throw new \Exception('Not implemented');
    }
    public function hasHeader(string $name): bool
    {
        throw new \Exception('Not implemented');
    }
    public function getHeader(string $name): array
    {
        throw new \Exception('Not implemented');
    }
    public function getHeaderLine(string $name): string
    {
        throw new \Exception('Not implemented');
    }
    public function withHeader(string $name, $value): MessageInterface
    {
        throw new \Exception('Not implemented');
    }
    public function withAddedHeader(string $name, $value): MessageInterface
    {
        throw new \Exception('Not implemented');
    }
    public function withoutHeader(string $name): MessageInterface
    {
        throw new \Exception('Not implemented');
    }
    public function getBody(): StreamInterface
    {
        throw new \Exception('Not implemented');
    }
    public function withBody(StreamInterface $body): MessageInterface
    {
        throw new \Exception('Not implemented');
    }
    public function getAttribute(string $name, $default = null)
    {
        throw new \Exception('Not implemented');
    }
}
