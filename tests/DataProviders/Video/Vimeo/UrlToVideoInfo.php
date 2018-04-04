<?php

namespace Tests\DataProviders\Video\Vimeo;

use App\Library\Testing\DataProviders\Video\UrlToVideoInfo as VideoUrlToVideoInfoDataProvider;
use Vimeo\Vimeo;

/**
 *
 * @author dmirou
 */
class UrlToVideoInfo extends VideoUrlToVideoInfoDataProvider {
  
  public function __construct($config = []) {
    
    $this->vimeoService = new Vimeo($config['client_id'], $config['client_secret']);
  }
  
  protected function getValidVideoSourceCodeTemplates() {
    return [
      "https://www.vimeo.com/video/%d#t=120s",
      "https://www.vimeo.com/%d#t=40s",
      "https://vimeo.com/video/%d#t=4s",
      "https://vimeo.com/%d#t=130s",
      "http://www.vimeo.com/video/%d#t=50s",
      "http://www.vimeo.com/%d#t=1s",
      "http://vimeo.com/video/%d#t=240s",
      "http://vimeo.com/%d#t=60s",
      "www.vimeo.com/video/%d#t=3s",
      "www.vimeo.com/%d#t=130s",
      "vimeo.com/video/%d#t=110s",
      "vimeo.com/%d#t=33",
      "https://www.player.vimeo.com/video/%d?autoplay=1&loop=1&color=ff9933",
      "https://player.vimeo.com/video/%d?color=ffffff&title=0&byline=0&portrait=0",
      "http://www.player.vimeo.com/video/%d?autoplay=1&loop=1&color=ff9933",
      "http://player.vimeo.com/video/%d?color=ffffff&title=0&byline=0&portrait=0",
      "www.player.vimeo.com/video/%d?autoplay=1&loop=1&color=ff9933",
      "player.vimeo.com/video/%d?color=ffffff&title=0&byline=0&portrait=0",
      "https://vimeo.com/channels/music/%d",
      "https://vimeo.com/groups/motion/videos/%d",
      "https://www.vimeo.com/video/%d",
      "https://www.vimeo.com/%d",
      "https://vimeo.com/video/%d",
      "https://vimeo.com/%d",
      "http://www.vimeo.com/video/%d",
      "http://www.vimeo.com/%d",
      "http://vimeo.com/video/%d",
      "http://vimeo.com/%d",
      "www.vimeo.com/video/%d",
      "www.vimeo.com/%d",
      "vimeo.com/video/%d",
      "vimeo.com/%d",
      "https://www.player.vimeo.com/video/%d",
      "https://player.vimeo.com/video/%d",
      "http://www.player.vimeo.com/video/%d",
      "http://player.vimeo.com/video/%d",
      "www.player.vimeo.com/video/%d",
      "player.vimeo.com/video/%d"
    ];
  }
  
  /**
   *
   * @var \Vimeo
   */
  private $vimeoService;

  protected function getValidVideosInfo() {
   
    $videosInfo = [];
    
    foreach($this->getVideoIds() as $videoId) {
      
      $result = $this->getVimeoService()->request(
        "/videos/$videoId?fields=name,description,embed.html,pictures.sizes"
      );
      
      $resultVideoInfo = $result['body'];
      
      $videosInfo[] = [
        'id'              => $videoId,
        'title'           => $resultVideoInfo['name'],
        'embeddedCode'    => $resultVideoInfo['embed']['html'],
        'description'     => $resultVideoInfo['description'],
        'previewImageUrl' => $resultVideoInfo['pictures']['sizes'][7]['link']
      ];
    }
    
    return $videosInfo;
  }
  
  private function getVideoIds() {
     return [
      '261314259', 
      '261810466', 
      '239029778'
    ];
  }
  
  /**
   * 
   * @return \Vimeo
   */
  private function getVimeoService() {  
    return $this->vimeoService;
  }
}
