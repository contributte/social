<?php

namespace Minetro\Social\Facebook;

use Nette\Utils\Html;

/**
 * EmbeddedPosts control
 *
 * @author Milan Felix Sulc <sulcmil@gmail.com>
 * @version 3.0
 */
class EmbeddedPosts extends Control
{

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
