<?php

namespace App\Library\Facades\Vimeo;

use Vimeo\Laravel\Facades\Vimeo;

/**
 * Description of Videos
 *
 * @author dmirou
 */
class Videos {
  
  /**
   * 
   * @param string $videoId
   * @return array
   */
  public function getVideoById($videoId) {

    $result = Vimeo::request($this->buildRequestUrl($videoId));
    
    return !empty($result['body']['error']) ? [] : $result['body'];
  }
  
  private function buildRequestUrl($videoId) {
    return sprintf('/videos/%s?fields=name,description,embed.html,pictures.sizes', $videoId);
  }
}
