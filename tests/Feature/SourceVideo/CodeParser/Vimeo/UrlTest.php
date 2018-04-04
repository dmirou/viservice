<?php

namespace Tests\Feature\SourceVideo\CodeParser\Vimeo;

use Tests\Feature\SourceVideo\CodeParser\UrlTestBase;
use Tests\DataProviders\Video\Vimeo\UrlToId as VimeoVideoUrlToIdDataProvider;
use Tests\DataProviders\Video\Vimeo\InvalidUrl as VimeoInvalidVideoUrlDataProvider;
use App\Library\SourceVideo\CodeParser\Vimeo\Url as VimeoUrlCodeParser;

class UrlTest extends UrlTestBase {

  /**
   * @return \App\Library\Contracts\Testing\DataProvider
   */
  protected function buildValidVideosDataProvider() {
    return new VimeoVideoUrlToIdDataProvider;
  }
  
  /**
   * @return \App\Library\Contracts\Testing\DataProvider
   */
  protected function buildInvalidVideoSourceCodeDataProvider() {
    return new VimeoInvalidVideoUrlDataProvider;
  }

  protected function buildUrlCodeParser() {
    return new VimeoUrlCodeParser;
  }
}
