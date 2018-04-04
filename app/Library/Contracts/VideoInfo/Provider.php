<?php

namespace App\Library\Contracts\VideoInfo;

/**
 * Description of Provider
 *
 * @author dmirou
 */
interface Provider {

  /**
   * 
   * @param \App\Library\Contracts\VideoInfo\Provider $provider
   */
  public function setNext($provider);
  
  /**
   * 
   * @param string $sourceCode
   * @return \App\Library\Contracts\VideoInfo\VideoInfo
   */
  public function getVideoInfo($sourceCode);
  
}
