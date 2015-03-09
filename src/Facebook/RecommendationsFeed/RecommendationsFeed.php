<?php

namespace Minetro\Facebook;

use Nette\Utils\Html;

/**
 * RecommendationsFeed control
 *
 * @author Milan Felix Sulc <sulcmil@gmail.com>
 * @version 3.0
 */
class RecommendationsFeed extends Control
{

    /** Shemes */
    const SCHEME_LIGHT = 'light';
    const SCHEME_DARK = 'dark';

    /** API *******************************************************************/

    /**
     * @return Html
     */
    public function build()
    {
        return $this->createElement($this->attributes);
    }

    /** RENDERS ***************************************************************/

    public function render()
    {
        echo (string)$this->build();
    }

}
