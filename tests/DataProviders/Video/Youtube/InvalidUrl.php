<?php

namespace Tests\DataProviders\Video\Youtube;

use App\Library\Testing\DataProviders\Video\InvalidSourceCode as InvalidVideoUrlDataProvider;

/**
 *
 * @author dmirou
 */
class InvalidUrl extends InvalidVideoUrlDataProvider {
  
  public function getInvalidVideoSourceCodes() {
    return [
      'https://www.youtube.com/watch?v=??',
      'https://www.youtube.com/watch?v=``',
      'https://www.youtube.com/watch?v=//',
      'https://www.youtube.com/watch?v=',
      'https://www.youtube.com/watch?v=\\',
      'https://www.youtube.com/watch?v=+',
      'https://www.youtube.com/watch?v=|',
      'https://www.youtube.com/watch?v21322',
      'fsdfsd://www.youtube.com/watch?v=??',
      'https://www.youtub.com/?v=fdsg',
      'https://www.youtube.ru/?v=fdsg',
      'https://www.you.com/?v=fdsg',
      'https://www.youtu.com/?v=fdsg',
      '://www.youtube.com/watch?v=324vdfs',
      '//www.youtube.com/watch?v=342fsd3',
      '/youtube.com/watch?v=432fs4g'
    ];
  }
}
