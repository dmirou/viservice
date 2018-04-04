<?php

namespace Tests\DataProviders\Video\Vimeo;

use App\Library\Testing\DataProviders\Video\InvalidSourceCode as InvalidVideoUrlDataProvider;

/**
 *
 * @author dmirou
 */
class InvalidUrl extends InvalidVideoUrlDataProvider {
  
  public function getInvalidVideoSourceCodes() {
    return [
      "https://www.vimeo.com/video/fsgdf/gdsf32/344/a321312#t=120s",
      "https://www.ameo.com/video/321312#t=120s",
      "https://www.vimeo.ru/video/321312#t=120s",
      'https://www.vimeo.com/video/abdfgdf',
      'https://vimeo.com/categories/experimental',
      "://vimeo.com/261314259",
      "/vimeo.com/261782772#t=60s",
      "https://vimeo.com/gordonvonsteiner/paris",
      "https://player.vimeo.com/video/dasdasdas?autoplay=1&loop=1&color=ff9933",
      "://player.vimeo.com/video/232439064?color=ffffff&title=0&byline=0&portrait=0",
      "//player.vimeo.com/video/232439064?color=ffffff&title=0&byline=0&portrait=0",
      "/player.vimeo.com/video/232439064?color=ffffff&title=0&byline=0&portrait=0"
    ];
  }
}
