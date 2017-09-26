<?php

namespace Sirion1987;

class PhpReadConfig extends PhpReadConfigAbstract{

 public function __construct($configInput){
  try{
   parent::__construct(parent::getValidConfigTypeClass($configInput),$configInput);
  }catch (\Exception $error){
   echo $error->getMessage();
  }
 }

}