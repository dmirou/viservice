<?php

namespace Tests\DataProviders\Video\Youtube;

use App\Library\Testing\DataProviders\Video\UrlToVideoInfo as VideoUrlToVideoInfoDataProvider;
use Google_Client;
use Google_Service_YouTube;

/**
 *
 * @author dmirou
 */
class UrlToVideoInfo extends VideoUrlToVideoInfoDataProvider {
  
  public function __construct($config = []) {
    
    $this->google_api_key = isset($config['google_api_key']) ? $config['google_api_key'] : '';
  }
  
  protected function getValidVideoSourceCodeTemplates() {
    return [
      'https://www.youtube.com/watch?v=%s',
      'https://youtube.com/watch?v=%s',
      'http://www.youtube.com/watch?v=%s',
      'http://youtube.com/watch?v=%s',
      'youtube.com/watch?v=%s',
      'https://www.youtube.com/watch?v=%s&t=10s',
      'https://youtube.com/watch?v=%s&t=10s',
      'http://www.youtube.com/watch?v=%s&t=10s',
      'http://youtube.com/watch?v=%s&t=10s',
      'youtube.com/watch?v=%s&t=10s',
      'https://youtu.be/%s', 
      'http://youtu.be/%s', 
      'youtu.be/%s', 
      'https://youtu.be/%s?t=2s', 
      'http://youtu.be/%s?t=2s',
      'youtu.be/%s?t=2s',
      'https://www.youtube.com/embed/%s', 
      'https://youtube.com/embed/%s', 
      'http://www.youtube.com/embed/%s', 
      'http://youtube.com/embed/%s', 
      'youtube.com/embed/%s', 
      'https://www.youtube.com/embed/%s?start=60',
      'http://www.youtube.com/embed/%s?start=60',
      'https://youtube.com/embed/%s?start=60',
      'http://youtube.com/embed/%s?start=60',
      'youtube.com/embed/%s?start=60',
      'http://www.youtube.com/v/%s?fs=1&hl=en_US',
      'https://www.youtube-nocookie.com/embed/%s'
    ];
  }
  
  /**
   *
   * @var string
   */
  private $google_api_key;
  
  /**
   *
   * @var \Google_Service_YouTube
   */
  private $youtubeService;

  protected function getValidVideosInfo() {
   
    $videosInfo = [];
    
    foreach($this->getVideoIds() as $videoId) {
      
      $result = $this->getYoutubeService()->videos->listVideos('snippet, player', ['id' => $videoId]);
      
      $youtubeVideoInfo = $result[0];
      
      $videosInfo[] = [
        'id'              => $videoId,
        'title'           => $youtubeVideoInfo['snippet']['title'],
        'embeddedCode'    => $youtubeVideoInfo['player']['embedHtml'],
        'description'     => $youtubeVideoInfo['snippet']['description'],
        'previewImageUrl' => $youtubeVideoInfo['snippet']['thumbnails']['default']['url']
      ];
    }
    
    return $videosInfo;
  }
  
  private function getVideoIds() {
     return [
      'n9pyOzfPnc4',
      'OarkBKBAwTc',
      '4pc6cgisbKE'
    ];
  }
  
  private function getYoutubeService() {
    
    if(empty($this->youtubeService)) {
      $this->youtubeService = $this->buildYoutubeService();
    }
    
    return $this->youtubeService;
  }
  
  private function buildYoutubeService() {
    
    $googleClient = new Google_Client(['developer_key' => $this->google_api_key]);
    
    return new Google_Service_YouTube($googleClient);
  }
}
