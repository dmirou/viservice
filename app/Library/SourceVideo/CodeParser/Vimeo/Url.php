<?php

namespace App\Library\SourceVideo\CodeParser\Vimeo;

use App\Library\SourceVideo\CodeParser\Url as BaseUrlCodeParser;

/**
 * Description of Base
 *
 * @author dmirou
 */
class Url extends BaseUrlCodeParser {
  
  protected function getSourceCodeRegExp() {
    return '{^(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*$}';
  }
  
  protected function getVideoIdRegExp() {
    return '{vimeo\.com\/(?:[a-z]*\/)*([0-9]{6,11})[?]?.*}';
  }
}
