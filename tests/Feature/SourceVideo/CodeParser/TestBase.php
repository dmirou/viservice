<?php

namespace Tests\Feature\SourceVideo\CodeParser;

use Tests\TestCase;
use App\Library\Contracts\SourceVideo\SourceVideo as SourceVideoContract;

abstract class TestBase extends TestCase {

  /**
   *
   * @var \App\Library\Contracts\SourceVideo\CodeParser
   */
  private $codeParser;
  
  protected function setUp() {
    
    parent::setUp();

    $this->codeParser = $this->buildUrlCodeParser();
  }

  /**
   * 
   * @return \App\Library\Contracts\SourceVideo\CodeParser
   */
  private function getUrlCodeParser() {
    return $this->codeParser;
  }
  
  abstract protected function buildUrlCodeParser();
  
  /**
   * @dataProvider validVideoSourceCodeToIdDataProvider
   * @param string $sourceVideoCode
   * @param string $expectedSourceVideoId
   * @return void
   */
  public function testParseValidSourceVideoCode($sourceVideoCode, $expectedSourceVideoId) {
    
    $actualSourceVideo = $this->getUrlCodeParser()->parseSourceVideoCode($sourceVideoCode);

    $this->assertTrue($actualSourceVideo instanceof SourceVideoContract, "Can't parse source video code $sourceVideoCode");
    $this->assertEquals($sourceVideoCode, $actualSourceVideo->getSourceCode());
    $this->assertEquals($expectedSourceVideoId, $actualSourceVideo->getId());
  }
  
  private $validVideoSourceCodeToIdDataProvider;
  private $invalidVideoSourceCodeDataProvider;
  
  public function validVideoSourceCodeToIdDataProvider() {
    return $this->getValidVideoSourceCodeToIdDataProvider()->getData();
  }
  
  private function getValidVideoSourceCodeToIdDataProvider() {
    
    if(empty($this->validVideoSourceCodeToIdDataProvider)) {
      $this->validVideoSourceCodeToIdDataProvider = $this->buildValidVideosDataProvider();
    }
    
    return $this->validVideoSourceCodeToIdDataProvider;
  }
  
  /**
   * @return \App\Library\Contracts\Testing\DataProvider
   */
  abstract protected function buildValidVideosDataProvider();
  
  /**
   * @dataProvider invalidVideoSourceCodeDataProvider
   * @param string $sourceVideoCode
   * @return void
   */
  public function testParseInvalidSourceVideoCode($sourceVideoCode) {
    
    $actualSourceVideo = $this->getUrlCodeParser()->parseSourceVideoCode($sourceVideoCode);

    $this->assertNull($actualSourceVideo);
  }
  
  public function invalidVideoSourceCodeDataProvider() {
    return $this->getInvalidVideoSourceCodeDataProvider()->getData();
  }
  
  private function getInvalidVideoSourceCodeDataProvider() {
    
   if(empty($this->invalidVideoSourceCodeDataProvider)) {
      $this->invalidVideoSourceCodeDataProvider = $this->buildInvalidVideoSourceCodeDataProvider();
    }
    
    return $this->invalidVideoSourceCodeDataProvider;
  }
  
  /**
   * @return \App\Library\Contracts\Testing\DataProvider
   */
  abstract protected function buildInvalidVideoSourceCodeDataProvider();
}
