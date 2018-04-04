<?php

namespace App\Library\Adapters\Vimeo\Videos;

use App\Library\Contracts\VideoInfo\VideoInfo as VideoInfoContract;

/**
 * Description of VideoInfo
 *
 * @author dmirou
 */
class VideoInfo implements VideoInfoContract {
  
  /**
   * 
   * @param array $vimeoVideoBodyResponse
   */
  public function __construct($vimeoVideoBodyResponse) {
    $this->vimeoVideoBodyResponse = $vimeoVideoBodyResponse;
  }
  
  public function getDescription() {
    return isset($this->vimeoVideoBodyResponse['description']) ? 
      $this->vimeoVideoBodyResponse['description'] : '';
  }

  public function getEmbeddedCode() {
    return $this->vimeoVideoBodyResponse['embed']['html'];
  }

  public function getPreviewImageUrl() {
    return isset($this->vimeoVideoBodyResponse['pictures']['sizes'][7]['link']) ? 
      $this->vimeoVideoBodyResponse['pictures']['sizes'][7]['link'] : '';
  }

  public function getTitle() {
    return $this->vimeoVideoBodyResponse['name'];
  }
  
  /**
   *
   * @var array
   */
  private $vimeoVideoBodyResponse;
}
