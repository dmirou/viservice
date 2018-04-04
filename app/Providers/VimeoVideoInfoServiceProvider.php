<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Library\VideoInfo\Provider\Vimeo as VimeoVideoInfoProvider;
use App\Library\SourceVideo\CodeParser\Vimeo\Url as VimeoVideoUrlParser;
use App\Library\SourceVideo\CodeParser\Vimeo\EmbeddedCode as VimeoVideoEmbeddedCodeParser;

class VimeoVideoInfoServiceProvider extends ServiceProvider {

  /**
   * Register services.
   *
   * @return void
   */
  public function register() {
    
    $this->app->bind('\App\Library\VideoInfo\Provider\Vimeo', function ($app) {

      $videoInfoProvider = new VimeoVideoInfoProvider();

      $parsers = [
        new VimeoVideoUrlParser(),
        new VimeoVideoEmbeddedCodeParser()
      ];

      foreach($parsers as $videoParser) {
        $videoInfoProvider->addSourceVideoCodeParser($videoParser);
      }

      return $videoInfoProvider;
    });
  }

  /**
   * Get the services provided by the provider.
   *
   * @return array
   */
  public function provides() {
    return ['\App\Library\VideoInfo\Provider\Vimeo'];
  }

  protected $defer = true;

}
