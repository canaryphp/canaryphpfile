<?php
/**
 * CanaryPHPFile (tm) Simple File Managing for php (canaryphp@gmail.com)
 * Copyright (c) Canaryphp Software Foundation, Inc. (canaryphp@gmail.com)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Canaryphp Software Foundation, Inc. (canaryphp@gmail.com)
 * @link      https://github.com/canaryphp/ CanaryPHP(tm) Project
 * @since     1.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
require __DIR__.DIRECTORY_SEPARATOR.'constants'.DIRECTORY_SEPARATOR.'constants.php';
if(version_compare(PHP_VERSION,'5.5.9') < 0) {
	exit('(CanaryPHPFile "'.CPF_VERSION.'") : Your PHP version must be equal or higher than 5.6.0 to use our script ,Update your php version or contact your hosting provider .');
}
if (!class_exists('\\CanaryPHPTools\\Canary')) {
    exit('<b>(CanaryPHPFile "'.CPF_VERSION.'") : </b>The class \CanaryPHPTools\Canary Required , install from github : https://github.com/canaryphp/canaryphptools');
}
