<?php

namespace App\Library\VideoInfo\Provider;

use App\Library\Contracts\VideoInfo\Provider as VideoInfoProviderContract;

/**
 * Description of Base
 *
 * @author dmirou
 */
abstract class Base implements VideoInfoProviderContract {
  
  /**
   * 
   * @param string $sourceCode
   * @return \App\Library\Contracts\VideoInfo\VideoInfo | null
   */
  public function getVideoInfo($sourceCode) {
    
    $sourceVideo = $this->parseSourceVideoCode($sourceCode);
    
    if(!is_null($sourceVideo)) {    
      return $this->getVideoInfoById($sourceVideo->getId());
    }
    
    if($this->next != null) {
      return $this->next->getVideoInfo($sourceCode);
    }
    
    return null;
  }

  /**
   * 
   * @param App\Library\Contracts\VideoInfo\Provider $provider
   * @return App\Library\Contracts\VideoInfo\Provider
   */
  public function setNext($provider) {
    
    $this->next = $provider;
    
    return $provider;
  }
  
  /**
   * 
   * @param App\Library\Contracts\SourceVideo\CodeParser $sourceVideoCodeParser
   */
  public function addSourceVideoCodeParser($sourceVideoCodeParser) {
    $this->parsers[] = $sourceVideoCodeParser;
  }
  
  /**
   *
   * @var App\Library\Contracts\VideoInfo\Provider
   */
  private $next;
  
  /**
   *
   * @var array
   */
  private $parsers = [];

  /**
   * 
   * @param string $sourceCode
   * @rerurn \App\Library\Contracts\SourceVideo\SourceVideo | null
   */
  private function parseSourceVideoCode($sourceCode) {
    
    foreach($this->parsers as $parser) {
      
      $sourceVideo = $parser->parseSourceVideoCode($sourceCode);
      
      if(!is_null($sourceVideo)) {
        return $sourceVideo;
      }
    }
    
    return null;
  }
  
  /**
   * @return \App\Library\Contracts\VideoInfo\VideoInfo | null
   */
  abstract protected function getVideoInfoById($videoId);
}
