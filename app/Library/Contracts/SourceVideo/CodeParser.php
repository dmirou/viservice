<?php

namespace App\Library\Contracts\SourceVideo;

/**
 * Description of SourceVideoCodeParser
 *
 * @author dmirou
 */
interface CodeParser {
  
  /**
   * 
   * @param string $sourceCode
   * @return \App\Library\Contracts\SourceVideo\SourceVideo | null
   */
  public function parseSourceVideoCode($sourceCode);
  
}
