<?php
/**
 * File: autoload.php
 * Author: Yusuf Shakeel
 * GitHub: https://github.com/yusufshakeel/dyrssfeed-php
 * Date: 15-Apr-2018 Sunday
 * Description: This file contains the autoload.
 *
 * MIT License
 *
 * Copyright (c) 2018 Yusuf Shakeel
 */

if (version_compare(PHP_VERSION, '5.4.0', '<')) {
    throw new Exception('DYRSSFeed requires PHP version 5.4 or higher.');
}

spl_autoload_register(function ($class) {

    $namespace = 'DYRSSFeed\\';

    $baseDir = __DIR__;

    // if class is not using namespace then return
    $len = strlen($namespace);
    if (strncmp($namespace, $class, $len) !== 0) {
        return;
    }

    // get the relative class
    $relativeClass = substr($class, $len);

    // find file
    $file = $baseDir . '/' . str_replace('\\', '/', $relativeClass) . '.php';

    // require the file if exists
    if (file_exists($file)) {
        require $file;
    }

});