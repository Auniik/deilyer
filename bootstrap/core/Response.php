<?php

namespace Core;

class Response
{
    public static function redirect($to, $status = 200): bool
    {
        http_response_code($status);
        header("Location: $to");
        return true;
    }


    public function __construct(
        protected $content,
        protected $status = 200,
        protected $headers = []
    ) {
    }

    public function send(): void
    {
        http_response_code($this->status);
        foreach ($this->headers as $header => $value) {
            header("$header: $value");
        }
        echo $this->content;
    }

    public function setContent($content): static
    {
        $this->content = $content;
        return $this;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus($status): static
    {
        $this->status = $status;
        return $this;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function setHeaders($headers): static
    {
        $this->headers = $headers;
        return $this;
    }

    public function addHeader($header, $value): static
    {
        $this->headers[$header] = $value;
        return $this;
    }

    public function removeHeader($header): static
    {
        unset($this->headers[$header]);
        return $this;
    }
}
