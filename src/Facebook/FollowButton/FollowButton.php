<?php

namespace Minetro\Social\Facebook;

use Nette\Utils\Html;

/**
 * FollowButton control
 *
 * @author Milan Felix Sulc <sulcmil@gmail.com>
 * @version 3.0
 */
class FollowButton extends Control
{

    /** Layouts */
    const LAYOUT_STANDARD = 'standard';
    const LAYOUT_BOX_COUNT = 'box_count';
    const LAYOUT_BUTTON_COUNT = 'button_count';
    const LAYOUT_BUTTON = 'button';

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
