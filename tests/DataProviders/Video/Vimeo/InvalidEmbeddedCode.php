<?php

namespace Tests\DataProviders\Video\Vimeo;

use App\Library\Testing\DataProviders\Video\InvalidEmbeddedCode as InvalidVideoEmbeddedCodeDataProvider;

/**
 *
 * @author dmirou
 */
class InvalidEmbeddedCode extends InvalidVideoEmbeddedCodeDataProvider {
  
  public function getInvalidVideoSourceCodes() {
    return [
      '<iframe src="https://player.vimeo.com/video/fd261606905?autoplay=1&loop=1" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>',
      '<iframe src="https://player.vimeo.com/video//261606905?autoplay=1&loop=1" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>',
      '<iframe src="https://vimeo.com/video/261606905" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>',
      '<iframe src="https://player.vimeo.com/video/fdsaf/261606905?autoplay=1&loop=1" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>',
      '<iframe src="https://player.vimeo.com/videos/261606905?autoplay=1&loop=1" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>',
      '<iframe src=""https://vimeo.com/channels/music/261606905?autoplay=1&loop=1" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>',
      '<iframe src="https://youtube.com/video/261606905?autoplay=1&loop=1" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>',
      '<iframe src="https://player.vimeo.com/video/261606905?autoplay=1&loop=1" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen>',
      'src="https://player.vimeo.com/video/261606905?autoplay=1&loop=1" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen',
      'https://www.youtube.com/?v=fds3432',
      'https://www.player.vimeo.com/video/213443?color=ffffff&title=0&byline=0&portrait=0',
      'https://www.player.vimeo.com/video/4234324',
      'player.vimeo.com/video/423423'
    ];
  }
}
