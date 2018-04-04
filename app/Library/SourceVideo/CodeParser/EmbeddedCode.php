<?php

namespace App\Library\SourceVideo\CodeParser;

use App\Library\SourceVideo\CodeParser\Base;
use App\Library\SourceVideo\SourceVideo;

/**
 * Description of Base
 *
 * @author dmirou
 */
abstract class EmbeddedCode extends Base {
  
  protected function buildSourceVideo($embeddedCode) {
    
    $url = $this->getVideoUrl($embeddedCode);
    
    $sourceVideo = $this->getUrlParser()->parseSourceVideoCode($url);
    
    return is_null($sourceVideo) ? null : new SourceVideo($embeddedCode, $sourceVideo->getId()); 
  }
  
  /**
   * @return \App\Library\Contracts\SourceVideo\CodeParser
   */
  abstract protected function getUrlParser();

  private function getVideoUrl($embeddedCode) {
    
    $matches = '';
    
    $status = preg_match($this->getVideoSrcRegExp(), $embeddedCode, $matches);
    
    if(empty($status) || empty($matches[1])) {
      return null;
    }
    
    return $matches[1];
  }
  
  private function getVideoSrcRegExp() {
    return '{src="([^"]+)"}';
  }
}
