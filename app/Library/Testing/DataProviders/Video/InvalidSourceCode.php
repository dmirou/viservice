<?php

namespace App\Library\Testing\DataProviders\Video;

use App\Library\Contracts\Testing\DataProvider as DataProviderContract;

/**
 *
 * @author dmirou
 */
abstract class InvalidSourceCode implements DataProviderContract {
  
  public function getData() {
    
    $invalidVideosData = [];
    
    $invalidVideoSourceCodes = $this->getInvalidVideoSourceCodes();
    
    foreach($invalidVideoSourceCodes as $invalidVideoSourceCode) {
      $invalidVideosData[] = [$invalidVideoSourceCode];
    }
    
    return $invalidVideosData;
  }
  
  abstract function getInvalidVideoSourceCodes();
}
