<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Library\VideoInfo\Provider\Youtube as YoutubeVideoInfoProvider;
use App\Library\SourceVideo\CodeParser\Youtube\Url as YoutubeVideoUrlParser;
use App\Library\SourceVideo\CodeParser\Youtube\EmbeddedCode as YoutubeVideoEmbeddedCodeParser;

class YoutubeVideoInfoServiceProvider extends ServiceProvider {

  /**
   * Register services.
   *
   * @return void
   */
  public function register() {
    
    $this->app->bind('\App\Library\VideoInfo\Provider\Youtube', function ($app) {

      $youtubeVideoInfoProvider = new YoutubeVideoInfoProvider();

      $youtubeParsers = [
        new YoutubeVideoUrlParser(),
        new YoutubeVideoEmbeddedCodeParser()
      ];

      foreach($youtubeParsers as $youtubeVideoIdParser) {
        $youtubeVideoInfoProvider->addSourceVideoCodeParser($youtubeVideoIdParser);
      }

      return $youtubeVideoInfoProvider;
    });
  }

  /**
   * Get the services provided by the provider.
   *
   * @return array
   */
  public function provides() {
    return ['\App\Library\VideoInfo\Provider\Youtube'];
  }

  protected $defer = true;
}
