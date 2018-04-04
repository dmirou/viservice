<?php

namespace App\Library\Testing\DataProviders\Video;

/**
 *
 * @author dmirou
 */
abstract class EmbeddedCodeToId extends SourceCodeToId {
  
  protected function getValidVideoSourceCodeTemplates() {
    
    $videoEmbedCodeTemplates = [];
    
    foreach($this->getValidVideoEmbeddedCodeTemplates() as $iframeTemplate) {
      
      foreach($this->getValidVideoEmbedUrlsTemplates() as $embedUrlTemplate) {
        
        $videoEmbedCodeTemplates[] = $this->embedUrlTemplateInIframeTemplate(
          $embedUrlTemplate, $iframeTemplate
        );
      }
    }
    
    return $videoEmbedCodeTemplates;
  }
  
  abstract protected function getValidVideoEmbeddedCodeTemplates();
    
  abstract protected function getValidVideoEmbedUrlsTemplates();
  
  private function embedUrlTemplateInIframeTemplate($urlTemplate, $iframeTemplate) {
     return sprintf($iframeTemplate, $urlTemplate);
  }
}
