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
class File{
public function __construct($file_path = ''){
if(empty($file_path)) {
    throw new \CanaryPHPTools\Exception("(CanaryPHPFile {v".CPF_VERSION."}) : Parameter #1 : file path is empty or is wrong .");
}
    //Path
    $this->_PATH = $file_path;
    $this->_NEW_PATH = '';
    //name
    $this->_NAME = basename($file_path);
    $this->_NEW_NAME = '';
    //Dir
    $this->_DIR = dirname($file_path);
    $this->_NEW_DIR = '';
if(file_exists($file_path)){
    //MIME type
    $this->_MIME = mime_content_type($file_path);
    // Size (B|KB|MB)
    $this->_SIZE_B = (int) filesize($file_path);
    $this->_SIZE_KB =  number_format($this->_SIZE_B / 1024,2);
    $this->_SIZE_MB =  number_format($this->_SIZE_B / 1048576,5);
}
}
/**
 *
 * File information
 *
 */
public $_NAME,$_NEW_NAME,
       $_MIME,
       $_SIZE_B,$_SIZE_KB,$_SIZE_MB,
       $_PATH,$_NEW_PATH,
       $_DIR,$_NEW_DIR;
/**
 *
 * Store Error
 *
 * @param (array)
 *
 */
private $_FILE_ERRORS = [];
/**
 *
 * Get file size Parameter
 *
 */
public const SIZE_BYTES = 1;
public const SIZE_KILOBYTES = 2;
public const SIZE_MEGABYTES = 3;
/**
 *
 * add error to file errors array
 *
 * @param $value (string) : error message
 *
 */
private function addErr($value){
    $this->_FILE_ERRORS[] = $value;
}
/**
 *
 * Get errors
 *
 */
public function FILE_ERRORS(){
    return $this->_FILE_ERRORS;
}
/**
 *
 * Set new file name
 *
 * @param $name (string) : the new file name
 *
 */
public function setNewName($name){
    $this->_NEW_NAME = $name;
    return $this;
}
/**
 *
 * Set Move path
 *
 * @param $name (string) : the new move path
 *
 */
public function setNewDir($dir){
    $filename = ($this->_NEW_NAME !== null) ? $this->_NEW_NAME : $this->_NEW_NAME;
    $this->_NEW_DIR = $dir;
    $this->_NEW_PATH = $dir.DS.$filename;
    return $this;
}
/**
 *
 * Get name
 *
 * @return (string) : file name
 *
 */
public function getName(){
    return $this->_NAME;
}
/**
 *
 * Get new name
 *
 * @return (string) : file new name
 *
 */
public function getNewName(){
    return $this->_NEW_NAME;
}
/**
 *
 * Get path
 *
 * @return (string) : file path
 *
 */
public function getPath(){
    return $this->_PATH;
}
/**
 *
 * Get new path
 *
 * @return (string) : file new path
 *
 */
public function getNewPath(){
    return $this->_NEW_PATH;
}
/**
 *
 * Get directory
 *
 * @return (string) : file directory
 *
 */
public function getDir(){
    return $this->_DIR;
}
/**
 *
 * Get new directory
 *
 * @return (string) : file new directory
 *
 */
public function getNewDir(){
    return $this->_NEW_DIR;
}
/**
 *
 * Get mime type
 *
 * @return (string) : file mime type
 *
 */
public function getMime(){
    return $this->_MIME;
}
/**
 *
 * Get size
 *
 * @param (int) : (BYTES |MEGABYTES|KILOBYTES)
 *
 * @return (string) : file size
 *
 */
public function getSize($param = self::SIZE_BYTES){
    switch ($param) {
        case self::SIZE_BYTES:
            return $this->_SIZE_B;
        break;
        case self::SIZE_KILOBYTES:
            return $this->_SIZE_KB;
        break;
        case self::SIZE_MEGABYTES:
            return $this->_SIZE_MB;
        break;
        default:
            return $this->_SIZE_B;
        break;
    }
}
/**
 *
 * Get size
 *
 * @param (int) : (BYTES |MEGABYTES|KILOBYTES)
 *
 * @return (string) : file size
 *
 */
public function getInfo(){
    return [
        'name'=>$this->getName(),
        'newName'=>$this->getNewName(),
        'path'=>$this->getPath(),
        'newPath'=>$this->getNewPath(),
        'dir'=>$this->getDir(),
        'newDir'=>$this->getNewDir(),
        'mime'=>$this->getMime(),
        'sizeB'=>$this->getSize(self::SIZE_BYTES),
        'sizeKB'=>$this->getSize(self::SIZE_KILOBYTES),
        'sizeMB'=>$this->getSize(self::SIZE_MEGABYTES),
    ];
}
public function move($move_uploaded_file = false){
    //original file path
    $file_path = $this->_PATH;
    //Name of file
    $name_file = (empty($this->_NEW_NAME)) ? $this->_NAME : $this->_NEW_NAME ;
    //save to dir
    $save_dir = (empty($this->_NEW_DIR)) ? $this->_DIR : $this->_NEW_DIR;
    //save full path
    $save_path = $save_dir.DS.$name_file;
    //check if
    if (file_exists($save_dir)) {
        $file_content = file_get_contents($file_path);
        if (!file_exists($save_path)) {
            if ($move_uploaded_file) {
                return move_uploaded_file($file_path,$save_path);
            } else {
                $handle = fopen($save_path,'w');
	            fwrite($handle,$file_content);
                fclose($handle);
                unlink($file_path);
                return TRUE;
            }
        } else {
            $this->addErr("<b>FileError({$save_path})</b> : The file already exist .");
            return FALSE;
        }
    } else {
        $this->addErr("<b>FileError({$save_dir})</b> : The folder does not exist .");
        return FALSE;
    }
}
public function copy(){
    //original file path
    $file_path = $this->_PATH;
    //Name of file
    $name_file = (empty($this->_NEW_NAME)) ? $this->_NAME : $this->_NEW_NAME ;
    //save to dir
    $save_dir = (empty($this->_NEW_DIR)) ? $this->_DIR : $this->_NEW_DIR;
    //save full path
    $save_path = $save_dir.DS.$name_file;
    //check if
    if (file_exists($save_dir)) {
        $file_content = file_get_contents($file_path);
        if (!file_exists($save_path)) {
            $handle = fopen($save_path,'w');
	        fwrite($handle,$file_content);
            fclose($handle);
        } else {
            $this->addErr("<b>FileError({$save_path})</b> : The file already exist ,add new name.");
        }
    } else {
        $this->addErr("<b>FileError({$save_dir})</b> : The folder does not exist .");
    }
    return $this;
}
public function put($content,$type = 'w'){
    if (file_exists(dirname($this->_PATH))) {
            $handle = fopen($this->_PATH,$type);
	            fwrite($handle,$content);
                fclose($handle);
    } else {
        $this->addErr("<b>FileError({$save_dir})</b> : The folder does not exist .");
    }
    return $this;
}
public function get($type = 'r'){
    if (file_exists($this->_DIR)) {
            $handle = fopen($this->_PATH,$type);
	            $content = fread($handle,$this->_SIZE_B);
                fclose($handle);
            return $content;
    } else {
        $this->addErr("<b>FileError({$this->_DIR})</b> : The folder does not exist .");
    }
    return '';
}
public function delete(){
    if (file_exists($this->_PATH)) {
        unlink($this->_PATH);
    } else {
        $this->addErr("<b>FileError({$this->_PATH})</b> : The file does not exist .");
    }
    return $this;
}
//check file if image or text etc
public function checkImage(){
    $mime_list = new \CanaryPHPFile\FileMimeTypes();
    return in_array($this->_MIME,$mime_list->image());
}
public function checkText(){
    $mime_list = new \CanaryPHPFile\FileMimeTypes();
    return in_array($this->_MIME,$mime_list->text());
}
public function checkVideo(){
    $mime_list = new \CanaryPHPFile\FileMimeTypes();
    return in_array($this->_MIME,$mime_list->video());
}
public function checkAudio(){
    $mime_list = new \CanaryPHPFile\FileMimeTypes();
    return in_array($this->_MIME,$mime_list->audio());
}
}
