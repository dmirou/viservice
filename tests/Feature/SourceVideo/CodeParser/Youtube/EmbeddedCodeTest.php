<?php

namespace Tests\Feature\SourceVideo\CodeParser\Youtube;

use Tests\Feature\SourceVideo\CodeParser\EmbeddedCodeTestBase;
use Tests\DataProviders\Video\Youtube\EmbeddedCodeToId as YoutubeVideoEmbeddedCodeToIdDataProvider;
use Tests\DataProviders\Video\Youtube\InvalidEmbeddedCode as YoutubeInvalidVideoEmbeddedCodeDataProvider;
use App\Library\SourceVideo\CodeParser\Youtube\EmbeddedCode as YoutubeEmbeddedCodeParser;

class EmbeddedCodeTest extends EmbeddedCodeTestBase {

  /**
   * @return \App\Library\Contracts\Testing\DataProvider
   */
  protected function buildValidVideosDataProvider() {
    return new YoutubeVideoEmbeddedCodeToIdDataProvider;
  }
  
  /**
   * @return \App\Library\Contracts\Testing\DataProvider
   */
  protected function buildInvalidVideoSourceCodeDataProvider() {
    return new YoutubeInvalidVideoEmbeddedCodeDataProvider;
  }

  protected function buildUrlCodeParser() {
    return new YoutubeEmbeddedCodeParser;
  }
}
