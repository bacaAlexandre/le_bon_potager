<?php

/**
 * Composer
 */
//require dirname(__DIR__) . '/vendor/autoload.php';

/**
 * Load .env file
 */
//$env = new Dotenv\Dotenv(dirname(__DIR__));
//$env->load();

/**
 * Run the Framework
 */
require_once '../core/Framework.php';

Framework::run();
