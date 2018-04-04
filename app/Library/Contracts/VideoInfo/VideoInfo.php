<?php

namespace App\Library\Contracts\VideoInfo;

/**
 * Description of VideoInfo
 *
 * @author dmirou
 */
interface VideoInfo {
  
  public function getTitle();
  
  public function getEmbeddedCode();
  
  public function getDescription();
  
  public function getPreviewImageUrl();
}
