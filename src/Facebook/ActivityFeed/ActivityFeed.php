<?php

namespace Minetro\Social\Facebook;

use Nette\Utils\Html;

/**
 * ActivityFeed control
 *
 * @author Milan Felix Sulc <sulcmil@gmail.com>
 * @version 3.0
 * @deprecated
 */
class ActivityFeed extends Control
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
        echo $this->build();
    }

}
