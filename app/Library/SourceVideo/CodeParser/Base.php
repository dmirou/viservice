<?php

namespace App\Library\SourceVideo\CodeParser;

use App\Library\Contracts\SourceVideo\CodeParser as CodeParserContract;

/**
 * Description of Base
 *
 * @author dmirou
 */
abstract class Base implements CodeParserContract {
  
  /**
   * 
   * @param string $sourceCode
   * @rerurn \App\Library\Contracts\SourceVideo\SourceVideo | null
   */
  public function parseSourceVideoCode($sourceCode) {
    
    return $this->checkSourceCode($sourceCode) ? $this->buildSourceVideo($sourceCode) : null;
  }
  
  private function checkSourceCode($sourceCode) {
    return preg_match($this->getSourceCodeRegExp(), $sourceCode);
  }
  
  abstract protected function getSourceCodeRegExp();
  
  /**
   * 
   * @param string $sourceCode
   * @return \App\Library\Contracts\SourceVideo\SourceVideo | null
   */
  abstract protected function buildSourceVideo($sourceCode);
}
