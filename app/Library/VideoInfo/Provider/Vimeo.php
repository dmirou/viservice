<?php

namespace App\Library\VideoInfo\Provider;

use App\Library\Facades\Vimeo\Videos as VimeoVideosFacade;
use App\Library\Adapters\Vimeo\Videos\VideoInfo as VimeoVideoToVideoInfoAdapter;

/**
 * Description of Youtube
 *
 * @author dmirou
 */
class Vimeo extends Base {
  
  /**
   * 
   * @param string $videoId
   * @return \App\Library\Contracts\VideoInfo\VideoInfo | null
   */
  protected function getVideoInfoById($videoId) {
    
    $vimeoVideosService = new VimeoVideosFacade();
    
    $result = $vimeoVideosService->getVideoById($videoId);
    
    return empty($result) ? null : new VimeoVideoToVideoInfoAdapter($result);
  }
}
