<?php
/*  Copyright (c) 2000-2008 hamcrest.org
 */
namespace Hamcrest;

$paths = explode(PATH_SEPARATOR, get_include_path());

foreach ($paths as $path) {
    $fullpath = $path . DIRECTORY_SEPARATOR . 'PHPUnit/Framework.php';

    if (file_exists($fullpath)) {
        $file = realpath($fullpath);
        break;
    }
}

if (isset($file)) {
    require_once 'PHPUnit/Framework.php';

    class AssertionError extends ::PHPUnit_Framework_AssertionFailedError {
    }
} else {
    class AssertionError extends RuntimeException {
    }
}
