<?php

namespace App\Library\SourceVideo\CodeParser\Vimeo;

use App\Library\SourceVideo\CodeParser\EmbeddedCode as BaseEmbeddedCodeParser;
use App\Library\SourceVideo\CodeParser\Vimeo\Url as VimeoVideoUrlParser;

/**
 * Description of Base
 *
 * @author dmirou
 */
class EmbeddedCode extends BaseEmbeddedCodeParser {
  
  public function __construct() {
    $this->urlParser = new VimeoVideoUrlParser();
  }
  
  protected function getSourceCodeRegExp() {
    return '{^<iframe.+src="(https?:\/\/)?(www\.)?player\.vimeo\.com\/video/([0-9]{6,11})[?]?.*".+><\/iframe>}';
  }

  /**
   * 
   * @return \App\Library\SourceVideo\CodeParser
   */
  protected function getUrlParser() {
    return $this->urlParser;
  }

  private $urlParser = null;
}
