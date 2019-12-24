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
namespace CanaryPHPFile;
class FileMimeTypes{
public function video(){
    return [
        'video/mp4',// mp4 mp4a m4p m4b m4r m4v
        'video/3gpp',// 3gp
        'video/mpeg',// m1v
        'video/ogg',// ogg
        'video/quicktime', // mov qt
        'video/webm',// webm
        'video/x-m4v',// m4v
        'video/x-ms-wmv',// wmv
        'video/ms-asf',// asf wma wmv
        'video/x-msvideo',// avi
        'video/x-la-ms',// lsf lsx
        'video/x-ms-asf',// asf asr asx
        'video/x-sgi-movie',// movie
        'aplication/vnd.apple.mpegurl',// m3u m3u8
        'aplication/x-mpegurl',// m3u m3u8
    ];
}
public function audio(){
    return [
        'audio/basic',// au snd
        'audio/mid',// mid rmi
        'audio/mpeg',// mp3
        'audio/x-aiff',// aif aifc aiff
        'audio/x-mpegurl',// m3u
        'audio/x-pn-realaudio',// ra ram
        'audio/vnd.rn-realaudio',// ra ram
        'audio/x-wav',// wav
        'audio/ogg',//ogg
    ];
}
public function text(){
    return [
        'text/plain',// bas c h txt
        'text/html',// html htm stm
        'text/css',// css
        'text/h323',// 323
        'text/iuls',// uls
        'text/richtext',// rtx
        'text/scriptlet',// sct
        'text/tab-separated-values',// tsv
        'text/webviewhtml',// htt
        'text/x-component',// htc
        'text/x-setext',// etx
        'text/x-vcard',//
    ];
}
public function image(){
    return [
        'image/bmp',//bmp
        'image/cis-cod',// cod
        'image/gif',// gif
        'image/ief',// ief
        'image/jpeg',// jpe jpg jpeg
        'image/pipeg',// jfif
        'image/svg+xml',// svg
        'image/tiff',// tif tiff
        'image/x-cmu-raster',// ras
        'image/x-cmx',// cmx
        'image/x-icon',// ico
        'image/x-portable-anymap',// pnm
        'image/x-portable-bitmap',// pbm
        'image/x-portable-graymap',// pgm
        'image/x-portable-pixmap',// ppm
        'image/x-xbitmap',// xbm
        'image/x-xpixmap',// xpm
        'image/x-rgb',// rgb
        'image/xwindowdump',// xwd
    ];
}
}
