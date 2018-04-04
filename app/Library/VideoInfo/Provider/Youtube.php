<?php

namespace App\Library\VideoInfo\Provider;

use App\Library\Facades\Youtube\Videos as YoutubeVideosFacade;
use App\Library\Adapters\Youtube\Videos\VideoInfo as YoutubeVideoToVideoInfoAdapter;

/**
 * Description of Youtube
 *
 * @author dmirou
 */
class Youtube extends Base {
  
  /**
   * 
   * @param string $videoId
   * @return \App\Library\Contracts\VideoInfo\VideoInfo | null
   */
  protected function getVideoInfoById($videoId) {
    
    $youtubeVideosService = new YoutubeVideosFacade();
    
    $youtubeVideo = $youtubeVideosService->getVideoById($videoId);
    
    return is_null($youtubeVideo) ? null : new YoutubeVideoToVideoInfoAdapter($youtubeVideo);
  }
}
