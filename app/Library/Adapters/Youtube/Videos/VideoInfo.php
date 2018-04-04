<?php

namespace App\Library\Adapters\Youtube\Videos;

use App\Library\Contracts\VideoInfo\VideoInfo as VideoInfoContract;

/**
 * Description of VideoInfo
 *
 * @author dmirou
 */
class VideoInfo implements VideoInfoContract {
  
  /**
   * 
   * @param \Google_Service_YouTube_Video $youtubeVideo
   */
  public function __construct($youtubeVideo) {
    $this->youtubeVideo = $youtubeVideo;
  }
  
  public function getDescription() {
    return isset($this->youtubeVideo['snippet']['description']) ? 
      $this->youtubeVideo['snippet']['description'] : '';
  }

  public function getEmbeddedCode() {
    return $this->youtubeVideo['player']['embedHtml'];
  }

  public function getPreviewImageUrl() {
    return isset($this->youtubeVideo['snippet']['thumbnails']['default']['url']) ?
      $this->youtubeVideo['snippet']['thumbnails']['default']['url'] : '';
  }

  public function getTitle() {
    return $this->youtubeVideo['snippet']['title'];
  }
  
  /**
   *
   * @var \Google_Service_YouTube_Video
   */
  private $youtubeVideo;
}
