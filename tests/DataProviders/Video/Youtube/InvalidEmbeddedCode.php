<?php

namespace Tests\DataProviders\Video\Youtube;

use App\Library\Testing\DataProviders\Video\InvalidEmbeddedCode as InvalidVideoEmbeddedCodeDataProvider;

/**
 *
 * @author dmirou
 */
class InvalidEmbeddedCode extends InvalidVideoEmbeddedCodeDataProvider {
  
  public function getInvalidVideoSourceCodes() {
    return [
      '<iframe width="560" height="315" src="https://www.youtube.com/embed//fdsafds32" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>',
      '<iframe width="560" height="315" src="https://www.youtube.com/embed/??234f" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>',
      '<iframe width="560" height="315" src="https://www.youtube.com/embed/=-=-332fsd" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>',
      '<iframe width="560" height="315" src="https://www.youtube.com/watch?v=fds3432" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>',
      '<iframe width="560" height="315" src="https://www.youtube.com/?v=fds3432" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>',
      'https://www.youtube.com/?v=fds3432',
      'https://www.youtube.com/embed/fds3432',
      'https://www.youtube-nocookie.com/embed/gfds232'
    ];
  }
}
