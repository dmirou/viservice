<?php

namespace App\Library\Adapters\VideoInfo;

use Illuminate\Contracts\Support\Arrayable as ArrayableContract;
use App\Library\Contracts\VideoInfo\VideoInfo as VideoInfoContract;

/**
 *
 * @author dmirou
 */
class ToArray implements VideoInfoContract, ArrayableContract {
  
  /**
   * 
   * @param \App\Library\Contracts\VideoInfo\VideoInfo $videoInfo
   */
  public function __construct($videoInfo) {
    $this->videoInfo = $videoInfo;
  }
  
  public function getDescription() {
    return $this->videoInfo->getDescription();
  }

  public function getEmbeddedCode() {
    return $this->videoInfo->getEmbeddedCode();
  }

  public function getPreviewImageUrl() {
    return $this->videoInfo->getPreviewImageUrl();
  }

  public function getTitle() {
    return $this->videoInfo->getTitle();
  }
  
  public function toArray() {
    return [
      'title'           => $this->getTitle(),
      'embeddedCode'    => $this->getEmbeddedCode(),
      'description'     => $this->getDescription(),
      'previewImageUrl' => $this->getPreviewImageUrl()
    ];
  }
  
  /**
   *
   * @var \App\Library\Contracts\VideoInfo\VideoInfo
   */
  private $videoInfo;
}
