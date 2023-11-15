<?php

namespace PhpScript\PrettyError\Handler;

use PhpScript\PrettyError\Frame\IFrame;

class DevelopmentErrorHandler extends IErrorHandler
{
    protected IFrame $frame;

    public function __construct(IFrame $frame)
    {
        $this->frame = $frame;
    }

    public function handle($exception): void
    {
        $frames = [];

        foreach ($exception->getTrace() as $key => $trace) {
            if ($key == 0) {
                $trace['file'] = $exception->getFile();
                $trace['line'] = $exception->getLine();
            }

            if (!isset($trace['file'])) {
                continue;
            }

            $trace['frame'] = $this->frame->render($trace['file'], $trace['line']);
            $frames[]       = $trace;
        }

        echo $this
            ->cleanBuffer()
            ->output(__DIR__ . '/../resources/error.php', ['exception' => $exception, 'frames' => $frames]);

        exit;
    }
}
