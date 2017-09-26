<?php

namespace Sirion1987\ConfigType;

class File implements ConfigTypeInterface{

 public $dirname;
 public $basename;
 public $extension;
 public $filename;
 public $path;

 const ACCEPTED_FILETYPES = [
  'txt',
  'php',
  'yml'
 ];

 public function __construct($file){
  $file_info = pathinfo($file);
  if (in_array($file_info["extension"], self::ACCEPTED_FILETYPES)){
   $this->dirname = $file_info["dirname"];
   $this->basename = $file_info["basename"];
   $this->extension = $file_info["extension"];
   $this->filename = $file_info["filename"];
   $this->path = $file;
  }else{
   throw new \Exception("#{$file_info["extension"]} not accepted ...");
  }
 }

 public function print(){
  return
   array (
    "dirname"   => $this->dirname,
    "basename"  => $this->basename,
    "extension" => $this->extension,
    "filename"  => $this->filename,
    "path"      => $this->path
   );
 }

 public function load(){
  return "File";
 }
 
}