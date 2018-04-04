<?php

namespace Tests\DataProviders\Video\Youtube;

use App\Library\Testing\DataProviders\Video\EmbeddedCodeToId as VideoEmeddedCodeToIdDataProvider;

/**
 *
 * @author dmirou
 */
class EmbeddedCodeToId extends VideoEmeddedCodeToIdDataProvider {
  
  protected function getValidVideoIds() {
    return [
      '7Vq6-4pTbe8',
      'bIiNa1HoLMQ',
      '9VOIMcdFbjo'
    ];
  }

  protected function getValidVideoEmbeddedCodeTemplates() {
    
    return [
      '<iframe width="560" height="315" src="%s" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>',
      '<iframe src="%s" width="560" height="315" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>',
      '<iframe src="%s" width="560" height="315"></iframe>'
    ];
  }
    
  protected function getValidVideoEmbedUrlsTemplates() {
    
    return [
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
      'https://www.youtube-nocookie.com/embed/%s'
    ];
  }
}
