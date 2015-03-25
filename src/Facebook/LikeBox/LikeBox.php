<?php

namespace Minetro\Social\Facebook;

use Nette\Utils\Html;

/**
 * LikeBox control
 *
 * @author Milan Felix Sulc <sulcmil@gmail.com>
 * @version 3.0
 */
class LikeBox extends Control
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
