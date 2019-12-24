<?php
/**
 *
 * DS = DIRECTORY_SEPARATOR = (/) (slash)
 *
 */
defined('DS') OR define('DS',DIRECTORY_SEPARATOR);
/**
 *
 * CHARSET the default charset
 *
 */
defined('CHARSET') OR define('CHARSET','utf-8');
/**
 *
 * PS = PATH_SEPARATOR = (:) (Two point)
 *
 */
defined('PS') OR define('PS',PATH_SEPARATOR);
/**
 *
 * EOL = PHP_EOL = ('\n') (new line)
 *s
 */
defined('EOL') OR define('EOL',PHP_EOL);
/**
 *
 * ROOT home base url
 *
 */
defined('CPF_ROOT') OR define('CPF_ROOT',dirname(__DIR__));
/**
 *
 * HOST hostname (domainname)
 *
 */
defined('HOST') OR define('HOST',$_SERVER['HTTP_HOST']);
/**
 *
 *  LOG logs base url
 *
 */
defined('CPF_LOG') OR define('CPF_LOG',CPF_ROOT.DS.'logs');
/**
 *
 * LOCALE locale base url (translation)
 *
 */
defined('CPF_LOCALE') OR define('CPF_LOCALE',CPF_ROOT.DS.'locale');
/**
 *
 *  Default time zone
 *
 */
defined('CPF_DEFAULT_TIME_ZONE') OR define('CPF_DEFAULT_TIME_ZONE','Africa/Algiers');
/**
 *
 * local script version
 *
 */
defined('CPF_VERSION') OR define('CPF_VERSION',file_get_contents(dirname(CPF_ROOT).DS.'VERSION'));