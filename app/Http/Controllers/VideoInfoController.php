<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\Adapters\VideoInfo\ToArray as VideoInfoToArrayAdapter;

class VideoInfoController extends Controller {

  public function __invoke(Request $request) {
    
    $videoSourceCode = $request->get('sourceCode', '');

    if(empty($videoSourceCode)) {
      return response()->json([], 400);
    }

    try {

      $videoProvidersChain = $this->buildVideoInfoProvidersChain();

      $videoInfo = $videoProvidersChain->getVideoInfo($videoSourceCode);
      
    } catch(Exception $exception) {
      return response()->json([], 500);
    }
    
    if(is_null($videoInfo)) {
      return response()->json([], 200);
    }

    $videoInfoToArrayAdapter = new VideoInfoToArrayAdapter($videoInfo);

    return response()->json($videoInfoToArrayAdapter->toArray());
  }

  /**
   * 
   * @return \App\Library\Contracts\VideoInfo\Provider
   */
  private function buildVideoInfoProvidersChain() {

    $providers = $this->getVideoInfoProviders();

    for($i = 0; $i < count($providers); $i++) {

      $nextProvider = empty($providers[$i + 1]) ? null : $providers[$i + 1];

      $providers[$i]->setNext($nextProvider);
    }

    return $providers[0];
  }

  private function getVideoInfoProviders() {

    $providers = [];

    foreach($this->getVideoInfoProviderClasses() as $providerClass) {
      $providers[] = resolve($providerClass);
    }

    return $providers;
  }

  private function getVideoInfoProviderClasses() {
    return [
      '\App\Library\VideoInfo\Provider\Youtube',
      '\App\Library\VideoInfo\Provider\Vimeo'
    ];
  }

}
