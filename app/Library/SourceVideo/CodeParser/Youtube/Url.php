<?php

namespace App\Library\SourceVideo\CodeParser\Youtube;

use App\Library\SourceVideo\CodeParser\Url as BaseUrlCodeParser;

/**
 * Description of Base
 *
 * @author dmirou
 */
class Url extends BaseUrlCodeParser {
  
  protected function getSourceCodeRegExp() {
    return '{^(https?\:\/\/)?(www\.)?(youtube\.com|youtu\.?be|youtube-nocookie.com)\/.+$}';
  }
  
  protected function getVideoIdRegExp() {
    return "#(?:embed\/|youtu.be\/|youtube-nocookie.com|youtube.com/v/|v=)([a-zA-Z0-9\.\-\~]+)#";
  }
}
