<?php

namespace App\Library\SourceVideo;

use App\Library\Contracts\SourceVideo\SourceVideo as SourceVideoContract;

/**
 * Description of SourceVideoUrl
 *
 * @author dmirou
 */
class SourceVideo implements SourceVideoContract {
  
  public function __construct($sourceCode, $id) {
    $this->sourceCode = $sourceCode;
    $this->id = $id;
  }
  
  /**
   * 
   * @return string
   */
  public function getSourceCode(){
    return $this->sourceCode;
  }

  /**
   * 
   * @return string
   */
  public function getId() {
    return $this->id;
  }

  private $sourceCode;
  
  private $id;
}
