<?php

namespace App\Library\Testing\DataProviders\Video;

use App\Library\Contracts\Testing\DataProvider as DataProviderContract;

/**
 * Description of Base
 *
 * @author dmirou
 */
abstract class SourceCodeToId implements DataProviderContract {
  
  public function getData() {
    
    $validVideosData = [];

    foreach($this->getValidVideoIds() as $videoId) {
      $validVideosData = array_merge($validVideosData, $this->buildValidVideoDataSet($videoId));
    }

    return $validVideosData;
  }
  
  abstract protected function getValidVideoIds();

  private function buildValidVideoDataSet($videoId) {

    $validVideoData = [];

    foreach($this->getValidVideoSourceCodeTemplates() as $validSourceCodeTemplate) {

      $validVideoSourceCode = $this->buildValidVideoSourceCode($validSourceCodeTemplate, $videoId);

      $validVideoData[] = [$validVideoSourceCode, $videoId];
    }

    return $validVideoData;
  }

  private function buildValidVideoSourceCode($validVideoUrlTemplate, $videoId) {
    return sprintf($validVideoUrlTemplate, $videoId);
  }

  abstract protected function getValidVideoSourceCodeTemplates();
}
