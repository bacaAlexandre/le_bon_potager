<?php

class ErrorHandler
{
    public static function handleError($level, $message, $file, $line)
    {
        if (error_reporting() !== 0) {
            throw new \ErrorException($message, 0, $level, $file, $line);
        }
    }

    public static function handleException($exception)
    {
        if (!is_dir(LOG_PATH)) {
            mkdir(LOG_PATH, $recursive = true);
        }
        $log = LOG_PATH . date('Y-m-d') . '.txt';
        ini_set('error_log', $log);

        $message = "Uncaught exception: '" . get_class($exception) . "'";
        $message .= " with message '" . $exception->getMessage() . "'";
        $message .= "\nStack trace: " . $exception->getTraceAsString();
        $message .= "\nThrown in '" . $exception->getFile() . "' on line " . $exception->getLine();

        error_log($message);

        ob_clean();
        $code = $exception->getCode();
        $view = 'errors.' . (file_exists(VIEW_PATH . "errors/$code.php") ? $code : 'error');
        $view_path = preg_replace('/\./', DS, $view);
        $$exception = $exception;
        require VIEW_PATH . "$view_path.php";
        $content = ob_get_contents();
        ob_end_clean();
        echo $content;
    }
}