<?php

declare(strict_types=1);

namespace Postio\Site\Request;

final readonly class Request
{
    private string $requestUri;
    private string $method;
    private array $parameters;
    private array $headers;
    private array $cookies;

    public function __construct(
        array $server,
        array $request,
        array $cookies,
    ) {
        $this->requestUri = parse_url($server['REQUEST_URI'], PHP_URL_PATH);
        $this->method = $server['REQUEST_METHOD'];
        $this->parameters = $request;
        $this->headers = $this->extractHeaders($server);
        $this->cookies = $cookies;
    }

    public function getRequestUri(): string
    {
        return $this->requestUri;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function getCookies(): array
    {
        return $this->cookies;
    }

    private function extractHeaders(array $header): array
    {
        $headers = [];

        foreach ($_SERVER as $name => $value)
        {
            if (strpos($name, 'HTTP_') === 0) {
                $headers[str_replace(
                    ' ', '-', ucwords(
                        strtolower(str_replace('_', ' ', substr($name, 5))),
                    )
                )] = $value;
            }

        }

        return $headers;
    }
}
