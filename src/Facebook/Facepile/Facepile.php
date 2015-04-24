<?php

namespace Minetro\Social\Facebook;

use Nette\Utils\Html;

/**
 * Facepile control
 *
 * @author Milan Felix Sulc <sulcmil@gmail.com>
 * @version 3.0
 * @deprecated
 */
class Facepile extends Control
{

    /** Shemes */
    const SCHEME_LIGHT = 'light';
    const SCHEME_DARK = 'dark';

    /** Photo sizes */
    const SIZE_LARGE = 'large';
    const SIZE_MEDIUM = 'medium';
    const SIZE_SMALL = 'small';

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
        return $this->build();
    }
}
