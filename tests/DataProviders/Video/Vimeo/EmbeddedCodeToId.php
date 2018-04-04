<?php

namespace Tests\DataProviders\Video\Vimeo;

use App\Library\Testing\DataProviders\Video\EmbeddedCodeToId as VideoEmeddedCodeToIdDataProvider;

/**
 *
 * @author dmirou
 */
class EmbeddedCodeToId extends VideoEmeddedCodeToIdDataProvider {
  
  protected function getValidVideoIds() {
    return [
      '261794608',
      '260203367',
      '261198757'
    ];
  }

  protected function getValidVideoEmbeddedCodeTemplates() {
    
    return [
      '<iframe src="%s" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
      <p><a href="https://vimeo.com/261198757">The North Face presents THE LAND OF MAYBE</a> from <a href="https://vimeo.com/colabcreativenz">CoLab Creative</a> on <a href="https://vimeo.com">Vimeo</a>.</p>
<p>Travel with us to the remote Faroe Islands where Cedar Wright, James Pearson and Yuji Hirayama take on the world&#039;s largest sea cliff in a climbing expedition like no other.<br />
<br />
Producer | Director | DOP - Will Lascelles (www.colabcreative.co.nz)<br />
2nd Camera - Cedar Wright<br />
Edit | Colour Grade - Andrew Bamford (www.andybamford.com)<br />
Original Music | Sound  Mix - Danny Fairley (www.mirrorsaudio.co.nz)<br />
<br />
Special thanks to:<br />
www.visitfaroeislands.com<br />
and all the beautiful people of the Faroe Islands!</p>',
      '<iframe src="%s" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
<p><a href="https://vimeo.com/261606905">WRONGSIDE.</a> from <a href="https://vimeo.com/douwehennink">Douwe Hennink</a> on <a href="https://vimeo.com">Vimeo</a>.</p>
<p>Concept: Douwe Hennink &amp; Abel v Dijk<br />
Director: Abel v Dijk<br />
DOP: Douwe Hennink<br />
Edit: Stefanie Sibbald<br />
Sound: Gijs Domen<br />
Starring: Tim Olivier Bijtelaar</p>',
      '<iframe src="%s" width="640" height="360"></iframe>'
    ];
  }
    
  protected function getValidVideoEmbedUrlsTemplates() {
    
    return [
      'https://www.player.vimeo.com/video/%d?color=ffffff&title=0&byline=0&portrait=0',
      'https://www.player.vimeo.com/video/%d?autoplay=1&loop=1',
      'https://www.player.vimeo.com/video/%d',
      'https://player.vimeo.com/video/%d?color=ffffff&title=0&byline=0&portrait=0',
      'https://player.vimeo.com/video/%d?autoplay=1&loop=1',
      'https://player.vimeo.com/video/%d',
      'http://player.vimeo.com/video/%d?color=ffffff&title=0&byline=0&portrait=0',
      'http://player.vimeo.com/video/%d?autoplay=1&loop=1',
      'http://player.vimeo.com/video/%d',
      'player.vimeo.com/video/%d?color=ffffff&title=0&byline=0&portrait=0',
      'player.vimeo.com/video/%d?autoplay=1&loop=1',
      'player.vimeo.com/video/%d'
    ];
  }
}
