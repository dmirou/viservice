<?php

namespace App\Library\Contracts\SourceVideo;

/**
 * Description of SourceVideo
 *
 * @author dmirou
 */
interface SourceVideo {
  
  /**
   * @return string
   */
  public function getSourceCode();
  
  /**
   * @return string
   */
  public function getId();
}
