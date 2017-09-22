<?php

namespace Sirion1987;

class PhpReadConfig
{
 public $configFile;

 public function __construct($file)
 {
  $config_file = $this->checkValidFile($file);
 }

 private function checkValidFile($file)
 {
  if (!file_exists($file)){
   throw new \Exception(
    "{$file}: File not found"
   );   
  }else{
   return $file;
  }
 }

}
