<?php

namespace Tests\Unit;

use Tests\TestCase;
use Tests\DataProviders\Video\Youtube\UrlToVideoInfo as YoutubeUrlToVideoInfoDataProvider;
use Tests\DataProviders\Video\Vimeo\UrlToVideoInfo as VimeoUrlToVideoInfoDataProvider;

class VideoInfoControllerTest extends TestCase {

  public function testBadRequest() {

    $response = $this->call('GET', '/api/video');

    $response->assertStatus(400);
  }

  public function testInvalidVideo() {

    $response = $this->call('GET', '/api/video', ['sourceCode' => '1223']);

    $response
      ->assertStatus(200)
      ->assertJson([]);
  }

  /**
   * 
   * @dataProvider validYoutubeVideoUrlToVideoInfoDataProvider
   * @param string $videoUrl
   * @param string $expectedTitle
   * @param string $expectedEmbeddedCode
   * @param string $expectedDescription
   * @param string $expectedPreviewUrl
   */
  public function testYoutubeValidVideoUrls($videoUrl, $expectedTitle, $expectedEmbeddedCode, $expectedDescription, $expectedPreviewUrl) {
    $this->runTestValidVideos(
      $videoUrl, $expectedTitle, $expectedEmbeddedCode, $expectedDescription, $expectedPreviewUrl
    );
  }
  
  private function runTestValidVideos($videoSourceCode, $expectedTitle, $expectedEmbeddedCode, $expectedDescription, $expectedPreviewUrl) {

    $response = $this->call('GET', '/api/video', ['sourceCode' => $videoSourceCode]);

    $expectedResult = [
      'title'           => $expectedTitle,
      'embeddedCode'    => $expectedEmbeddedCode,
      'description'     => $expectedDescription,
      'previewImageUrl' => $expectedPreviewUrl
    ];

    $response
      ->assertStatus(200)
      ->assertJson($expectedResult);
  }

  public function validYoutubeVideoUrlToVideoInfoDataProvider() {
    
    $youtubeDataProvider = new YoutubeUrlToVideoInfoDataProvider([
      'google_api_key' => env('GOOGLE_API_KEY')
    ]);
    
    return $youtubeDataProvider->getData();
  }
  
  /**
   * 
   * @dataProvider validVimeoVideoUrlToVideoInfoDataProvider
   * @param string $videoUrl
   * @param string $expectedTitle
   * @param string $expectedEmbeddedCode
   * @param string $expectedDescription
   * @param string $expectedPreviewUrl
   */
  public function testVimeoValidVideoUrls($videoUrl, $expectedTitle, $expectedEmbeddedCode, $expectedDescription, $expectedPreviewUrl) {
    $this->runTestValidVideos(
      $videoUrl, $expectedTitle, $expectedEmbeddedCode, $expectedDescription, $expectedPreviewUrl
    );
  }
  
  public function validVimeoVideoUrlToVideoInfoDataProvider() {
    
    $vimeoDataProvider = new VimeoUrlToVideoInfoDataProvider([
      'client_id'     => env('VIMEO_CLIENT_ID'),
      'client_secret' => env('VIMEO_CLIENT_SECRET')
    ]);
    
    return $vimeoDataProvider->getData();
  }
}
