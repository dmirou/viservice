<?php

namespace Tests\Feature\SourceVideo\CodeParser\Vimeo;

use Tests\Feature\SourceVideo\CodeParser\EmbeddedCodeTestBase;
use Tests\DataProviders\Video\Vimeo\EmbeddedCodeToId as VimeoVideoEmbeddedCodeToIdDataProvider;
use Tests\DataProviders\Video\Vimeo\InvalidEmbeddedCode as VimeoInvalidVideoEmbeddedCodeDataProvider;
use App\Library\SourceVideo\CodeParser\Vimeo\EmbeddedCode as VimeoEmbeddedCodeParser;

class EmbeddedCodeTest extends EmbeddedCodeTestBase {

  /**
   * @return \App\Library\Contracts\Testing\DataProvider
   */
  protected function buildValidVideosDataProvider() {
    return new VimeoVideoEmbeddedCodeToIdDataProvider;
  }
  
  /**
   * @return \App\Library\Contracts\Testing\DataProvider
   */
  protected function buildInvalidVideoSourceCodeDataProvider() {
    return new VimeoInvalidVideoEmbeddedCodeDataProvider;
  }

  protected function buildUrlCodeParser() {
    return new VimeoEmbeddedCodeParser;
  }
}
