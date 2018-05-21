<?php

class Errors
{
    public static function errorHandler($level, $message, $file, $line)
    {
        if (error_reporting() !== 0) {
            throw new \ErrorException($message, 0, $level, $file, $line);
        }
    }

    public static function exceptionHandler($exception)
    {
        if (!is_dir(LOG_PATH)) {
            mkdir(LOG_PATH, $recursive = true);
        }
        $log = LOG_PATH . date('Y-m-d') . '.txt';
        ini_set('error_log', $log);

        $stacktrace = "Uncaught exception: '" . get_class($exception) . "'";
        $stacktrace .= " with message '" . $exception->getMessage() . "'";
        $stacktrace .= "\nStack trace: " . $exception->getTraceAsString();
        $stacktrace .= "\nThrown in '" . $exception->getFile() . "' on line " . $exception->getLine();

        error_log($stacktrace);

        $message = false;
        if (DEBUG) {
            $message = "<p>Uncaught exception: '" . get_class($exception) . "'</p>";
            $message .= "<p>Message: '" . $exception->getMessage() . "'</p>";
            $message .= "<p>Stack trace:<pre>" . $exception->getTraceAsString() . "</pre></p>";
            $message .= "<p>Thrown in '" . $exception->getFile() . "' on line " . $exception->getLine() . "</p>";
        }
        $code = $exception->getCode();
        return self::display('error.' . (file_exists(VIEW_PATH . "error/$code.php") ? $code : 'errors'), array(
            'title' => "<h1>An error occurred</h1>",
            'message' =>  $message,
        ));
    }

    private static function display($view, $args = [])
    {
        ob_clean();
        $view_path = preg_replace('/\./', DS, $view);
        if (file_exists(VIEW_PATH . "$view_path.php")) {
            foreach ($args as $key => $value) {
                $$key = $value;
            }
            require VIEW_PATH . "$view_path.php";
            return true;
        }
        return false;
    }
}