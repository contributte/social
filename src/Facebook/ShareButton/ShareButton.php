<?php

namespace Minetro\Social\Facebook\ShareButton;

use Minetro\Social\Facebook\Control;
use Nette\Utils\Html;

/**
 * ShareButton control
 *
 * @author Milan Felix Sulc <sulcmil@gmail.com>
 * @version 3.0
 */
class ShareButton extends Control
{

    /** Layouts */
    const LAYOUT_BOX_COUNT = 'box_count';
    const LAYOUT_BUTTON_COUNT = 'button_count';
    const LAYOUT_BUTTON = 'button';
    const LAYOUT_ICON_LINK = 'icon_link';
    const LAYOUT_ICON = 'icon';
    const LAYOUT_LINK = 'link';

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