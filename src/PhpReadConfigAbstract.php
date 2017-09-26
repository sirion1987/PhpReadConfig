<?php

namespace Sirion1987;

use Sirion1987\ConfigType;

abstract class PhpReadConfigAbstract {

 private $configType = NULL;
 private $configTypeClass = array();

 public function __construct($configInputType,$configInput){
  if (class_exists($configInputType)){
   $this->configTypeClass = new $configInputType($configInput);
  }else{
   throw new \Exception('Error: Class not found.');
  }
 }
 
 public function getValidConfigTypeClass($configInput){
  if (is_dir($configInput)){
   return "Sirion1987\ConfigType\Directory";
  }elseif (is_file($configInput)){
   return "Sirion1987\ConfigType\File";
  }

  if (!file_exists($configInput)){
   throw new \Exception("#{$configInput} not found ...");
  }
 }

 public function getConfigTypeClass(){
  return $this->configTypeClass;
 }

}