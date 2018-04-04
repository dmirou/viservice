<?php

namespace App\Library\SourceVideo\CodeParser;

use App\Library\SourceVideo\SourceVideo;

/**
 * Description of Base
 *
 * @author dmirou
 */
abstract class Url extends Base {
  
  /**
   * 
   * @param string $sourceCode
   * @return \App\Library\Contracts\SourceVideo\SourceVideo | null
   */
  protected function buildSourceVideo($sourceCode) {
    
    $videoId = $this->getVideoId($sourceCode);
    
    return is_null($videoId) ? null : new SourceVideo($sourceCode, $videoId); 
  }
  
  protected function getVideoId($sourceCode) {
    
    $matches = '';
    
    $status = preg_match($this->getVideoIdRegExp(), $sourceCode, $matches);
    
    if(empty($status) || empty($matches[1])) {
      return null;
    }
    
    return $matches[1];
  }
  
  abstract protected function getVideoIdRegExp();
}
