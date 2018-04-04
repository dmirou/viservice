<?php

namespace App\Library\SourceVideo\CodeParser\Youtube;

use App\Library\SourceVideo\CodeParser\EmbeddedCode as BaseEmbeddedCodeParser;
use App\Library\SourceVideo\CodeParser\Youtube\Url as YoutubeVideoUrlParser;

/**
 * Description of Base
 *
 * @author dmirou
 */
class EmbeddedCode extends BaseEmbeddedCodeParser {
  
  public function __construct() {
    $this->urlParser = new YoutubeVideoUrlParser();
  }
  
  protected function getSourceCodeRegExp() {
    return '{^<iframe.+src="(https?\:\/\/)?(www\.)?(youtube\.com|youtu\.?be|youtube-nocookie.com)\/embed/.+".+><\/iframe>$}';
  }

  /**
   * 
   * @return \App\Library\Contracts\SourceVideo\CodeParser
   */
  protected function getUrlParser() {
    return $this->urlParser;
  }

  private $urlParser = null;
}
