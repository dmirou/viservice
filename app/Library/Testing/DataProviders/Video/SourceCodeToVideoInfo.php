<?php

namespace App\Library\Testing\DataProviders\Video;

use App\Library\Contracts\Testing\DataProvider as DataProviderContract;

/**
 * Description of Base
 *
 * @author dmirou
 */
abstract class SourceCodeToVideoInfo implements DataProviderContract {
  
  public function getData() {
    
    $validVideosData = [];

    foreach($this->getValidVideosInfo() as $videoInfoArray) {
      
      $validVideosData = array_merge(
        $validVideosData, 
        $this->buildValidVideoDataSet($videoInfoArray)
      );
    }

    return $validVideosData;
  }
  
  abstract protected function getValidVideosInfo();

  /**
   * 
   * @param array $videoInfoArray
   */
  private function buildValidVideoDataSet($videoInfoArray) {

    $validVideoDataSet = [];
    
    foreach($this->getValidVideoSourceCodeTemplates() as $validSourceCodeTemplate) {

      $validVideoSourceCode = $this->buildValidVideoSourceCode(
        $validSourceCodeTemplate, $videoInfoArray['id']
      );
      
      $validVideoDataSet[] = [
        $validVideoSourceCode,
        $videoInfoArray['title'],
        $videoInfoArray['embeddedCode'],
        $videoInfoArray['description'],
        $videoInfoArray['previewImageUrl']
      ];
    }

    return $validVideoDataSet;
  }

  private function buildValidVideoSourceCode($validVideoUrlTemplate, $videoId) {
    return sprintf($validVideoUrlTemplate, $videoId);
  }

  abstract protected function getValidVideoSourceCodeTemplates();
}
