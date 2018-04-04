<?php

namespace Tests\DataProviders\Video\Youtube;

use App\Library\Testing\DataProviders\Video\UrlToId as VideoUrlToIdDataProvider;

/**
 *
 * @author dmirou
 */
class UrlToId extends VideoUrlToIdDataProvider {
  
  protected function getValidVideoIds() {
     return [
      'n9pyOzfPnc4',
      'OarkBKBAwTc',
      'n9pyOzfPnc4'
    ];
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

}
