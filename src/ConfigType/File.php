<?php

namespace Sirion1987\ConfigType;

class File implements ConfigTypeInterface{

 public  $dirname;
 public  $basename;
 public  $extension;
 public  $filename;
 public  $path;

 private $parserClass;
 private $parser;

 const ACCEPTED_FILETYPES = [
  'txt',
  'php',
  'yml'
 ];

 const ACCEPTED_FILETYPES_CLASS = [
  'php' => 'Sirion1987\FileParser\Php',
  'yml' => 'Sirion1987\FileParser\Yml'
 ];

 public function __construct($file){
  $file_info = pathinfo($file);
  if (in_array($file_info["extension"], self::ACCEPTED_FILETYPES)){
   $this->dirname = $file_info["dirname"];
   $this->basename = $file_info["basename"];
   $this->extension = $file_info["extension"];
   $this->filename = $file_info["filename"];
   $this->path = $file;
   $this->parserClass = $this->getParserClass($this->extension);

   if (class_exists($this->parserClass)){
    $this->parser = new $this->parserClass;
   }else{
    throw new \Exception("Parser {$file_info["extension"]} not find ...");
   }
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

 private function getParserClass($extension){
  return self::ACCEPTED_FILETYPES_CLASS[$this->extension];
 }
 
}