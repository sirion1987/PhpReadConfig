<?php

namespace Sirion1987;

use Sirion1987\ConfigType;

abstract class PhpReadConfigAbstract{

 const VALID_CONFIG_TYPE = [
  'directory' => 'Sirion1987\ConfigType\Directory',
  'file'      => 'Sirion1987\ConfigType\File',
  'array'     => 'Sirion1987\ConfigType\Array',
  'externalContent' => 'Sirion1987\ConfigType\ExternalContent'
 ];

 private $configType = NULL;
 private $configTypeClass = NULL;

 public function __construct($configInputType){
  if (class_exists($configInputType)){
   $this->configTypeClass = new $configInputType;
  }else{
   throw new \Exception('Error: Class not found.');
  }
 }
 
 public function getValidConfigType($configInput){
  if (array_key_exists($configInput, self::VALID_CONFIG_TYPE)){
   return self::VALID_CONFIG_TYPE["{$configInput}"]; 
  }else{
   return NULL;
  }
 }

 public function getConfigTypeClass(){
  return $this->configTypeClass;
 }

}