<?php

namespace Core;

class View
{
    protected $content;
    public function render($path, $context = [])
    {
        extract($context);

        $viewFullPath = BASE_PATH .
            DIRECTORY_SEPARATOR .
            "views" .
            DIRECTORY_SEPARATOR .
            $path . ".php";

        ob_start();

        if (!file_exists($viewFullPath)) {
            throw new \Exception('View file not found: ' . $path);
        }

        // Start output buffering
//        ob_start();
        include_once $viewFullPath;

        // Get the contents of the output buffer and clean it
        $content = ob_get_clean();

        $this->content = $content;
    }

    public function dispatch()
    {
        echo $this->content;
        return;
    }
}