<?php
namespace Kaankilic\Gradian\Facades;
use Illuminate\Support\Facades\Facade;
 
class Gradian extends Facade {
 
  /**
   * Get the registered name of the component.
   *
   * @return string
   */
  protected static function getFacadeAccessor() { 
  	return 'Gradian'; 
  }
 
}