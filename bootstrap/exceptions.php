<?php

set_exception_handler('handleException');
set_error_handler('handleError');
register_shutdown_function('handleShutdown');

function handleException($exception): void
{
    error_log("Uncaught Exception: " . $exception->getMessage());
    http_response_code(500);
    displayErrorPage('Fatal Error', $exception->getMessage(), $exception->getFile(), $exception->getLine(), $exception->getTraceAsString());
}

/**
 * @throws ErrorException
 */
function handleError($errno, $errstr, $errfile, $errline) {
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
}
function handleShutdown(): void
{
    $error = error_get_last();
    if ($error !== null && in_array($error['type'], [E_ERROR, E_CORE_ERROR, E_COMPILE_ERROR, E_PARSE])) {
        // Log the fatal error
        error_log("Fatal Error: {$error['message']} in {$error['file']} on line {$error['line']}");

        // Display a custom error page
        http_response_code(500);
        displayErrorPage('Fatal Error', $error['message'], $error['file'], $error['line'], '');
    }
}
function displayErrorPage($errorType, $errorMessage, $errorFile, $errorLine, $errorTrace): void
{
    echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Page</title>
    <style>
        body {
            background-color: #f7f7f7;
            font-family: \'Courier New\', Courier, monospace;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .error-container {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            max-width: 800px;
            margin: 20px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #d9534f;
            font-size: 24px;
            margin-bottom: 10px;
        }
        .error-message {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
        }
        .error-file {
            font-size: 16px;
            color: #888;
            margin-bottom: 20px;
        }
        .error-file span {
            color: #555;
            font-weight: bold;
        }
        h2 {
            font-size: 20px;
            margin-bottom: 10px;
        }
        .stack-trace {
            list-style-type: none;
            padding: 0;
            font-size: 14px;
            color: #555;
        }
        .stack-trace li {
            margin-bottom: 5px;
            padding-left: 10px;
            border-left: 2px solid #d9534f;
        }
        .stack-trace li:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <h1>' . htmlspecialchars($errorType) . '</h1>
        <p class="error-message"><strong>Uncaught Exception:</strong> ' . htmlspecialchars($errorMessage) . '</p>
        <p class="error-file">in <span>' . htmlspecialchars($errorFile) . '</span> on line <span>' . htmlspecialchars($errorLine) . '</span></p>';

        if (!empty($errorTrace)) {
            echo '<h2>Stack Trace:</h2><ul class="stack-trace">';
            foreach (explode("\n", $errorTrace) as $traceLine) {
                echo '<li>' . htmlspecialchars($traceLine) . '</li>';
            }
            echo '</ul>';
        }
    echo '</div></body></html>';
}

/**
 * @throws Exception
 */
function doSomethingRisky() {
    throw new Exception("This is an uncaught exception!");
}

// Example function to trigger an error
function doSomethingRiskyError(): void
{
    trigger_error("This is a custom error!", E_USER_ERROR);
}
