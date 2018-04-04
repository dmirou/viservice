<?php

namespace Tests\Feature\SourceVideo\CodeParser\Youtube;

use Tests\Feature\SourceVideo\CodeParser\UrlTestBase;
use Tests\DataProviders\Video\Youtube\UrlToId as YoutubeVideoUrlToIdDataProvider;
use Tests\DataProviders\Video\Youtube\InvalidUrl as YoutubeInvalidVideoUrlDataProvider;
use App\Library\SourceVideo\CodeParser\Youtube\Url as YoutubeUrlCodeParser;

class UrlTest extends UrlTestBase {

  /**
   * @return \App\Library\Contracts\Testing\DataProvider
   */
  protected function buildValidVideosDataProvider() {
    return new YoutubeVideoUrlToIdDataProvider;
  }
  
  /**
   * @return \App\Library\Contracts\Testing\DataProvider
   */
  protected function buildInvalidVideoSourceCodeDataProvider() {
    return new YoutubeInvalidVideoUrlDataProvider;
  }

  protected function buildUrlCodeParser() {
    return new YoutubeUrlCodeParser;
  }
}
