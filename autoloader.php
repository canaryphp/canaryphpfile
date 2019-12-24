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
$GLOBALS['CP_CONFIG'] = [];
require_once __DIR__.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'requires.php';
$_AUTOLOADER = [
					'class'=>[
						'Canary',
						'File',
						'FileMimeTypes'
					],
];
foreach($_AUTOLOADER as $keys=>$values){
	if ($keys === 'class') {
		foreach($values as $value){
			require CPF_ROOT.DS.$value.'.php';
		}
	}else {
		foreach($values as $value){
			require CPF_ROOT.DS.$keys.DS.$value.'.php';
		}
	}
}
unset($GLOBALS['CP_CONFIG']);
