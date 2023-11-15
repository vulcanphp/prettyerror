<?php

namespace PhpScript\PrettyError\Handler;

class CliErrorHandler extends IErrorHandler
{
    public function handle($exception): void
    {
        foreach ($exception->getTrace() as $key => $trace) {
            if ($key == 0) {
                echo sprintf(
                    "\n\033[36m%s \033[0m\n\033[31m%s\033[0m\n\n\033[33mTrace:\033[0m\n%s\n",
                    (isset($trace['class']) ? $trace['class'] . '->' : '') . (isset($trace['function']) ? $trace['function'] . '()' : '') . ':' . $exception->getLine(),
                    $exception->getMessage(),
                    sprintf("    (%d) %s:%s", $key, $exception->getFile(), $exception->getLine())
                );
            } else {
                echo sprintf("    (%d) %s:%s\n", $key + 1, $trace['file'], $trace['line']);
            }
        }

        exit;
    }
}
