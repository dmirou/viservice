<?php

namespace App\Library\Facades\Youtube;

/**
 * Description of Videos
 *
 * @author dmirou
 */
class Videos {
  
  public function __construct() {
    $this->youtube_service = resolve('\Google_Service_YouTube');
  }
  
  /**
   * 
   * @param string $videoId
   * @return \Google_Service_YouTube_Video | null
   */
  public function getVideoById($videoId) {
     
    $videoList = $this->videosListById('snippet, player', ['id' => $videoId]);
    
    return empty($videoList->count()) ? null : $videoList->current();
  }
  
  /**
   *
   * @var \Google_Service_YouTube
   */
  private $youtube_service;
  
  /**
   * 
   * @param string $part
   * @param array $params
   * @return \Google_Service_YouTube_VideoListResponse
   */
  private function videosListById($part, $params) {
    
    $filtered_params = array_filter($params);
    
    return $this->getYoutubeService()->videos->listVideos($part, $filtered_params);
  }
  
   /**
   *
   * @var \Google_Service_YouTube
   */
  private function getYoutubeService() {
    return $this->youtube_service;
  }
}
