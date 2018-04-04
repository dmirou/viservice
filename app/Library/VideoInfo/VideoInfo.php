<?php

namespace App\Library\VideoInfo;

use App\Library\Contracts\VideoInfo as VideoInfoContract;

/**
 * Description of VideoInfo
 *
 * @author dmirou
 */
class VideoInfo implements VideoInfoContract {
  
  public function __construct($title, $embeddedCode, $description = '', $previewImageUrl = '') {
    
    $this->title = $title;
    
    $this->embeddedCode = $embeddedCode;
    
    $this->description = $description;
    
    $this->previewImageUrl = $previewImageUrl;
  }
  
  public function getTitle() {
    return $this->title;
  }
  
  public function getEmbeddedCode() {
    return $this->embeddedCode;
  }
  
  public function getDescription() {
    return $this->description;
  }
  
  public function getPreviewImageUrl() {
    return $this->previewImageUrl;
  }

  public function toArray() {
    return [
      'title'           => $this->getTitle(),
      'embeddedCode'    => $this->getEmbeddedCode(),
      'description'     => $this->getDescription(),
      'previewImageUrl' => $this->getPreviewImageUrl()
    ];
  }

  private $title;
  
  private $embeddedCode;
  
  private $description;
  
  private $previewImageUrl;
}
