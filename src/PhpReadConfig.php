<?php

namespace Sirion1987;

class PhpReadConfig extends PhpReadConfigAbstract{

 public function __construct($configInput){
  if (($type = parent::getValidConfigType($configInput)) !== NULL ){
   parent::__construct($type);
  }else{
   throw new \Exception('Unsupported type');
  }
 }

}