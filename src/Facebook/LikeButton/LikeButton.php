<?php

namespace Minetro\Facebook;

use Nette\Utils\Html;

/**
 * LikeButton control
 *
 * @author Milan Felix Sulc <sulcmil@gmail.com>
 * @version 3.0
 */
class LikeButton extends Control
{

    /** Layouts */
    const LAYOUT_STANDARD = 'standard';
    const LAYOUT_BOX_COUNT = 'box_count';
    const LAYOUT_BUTTON_COUNT = 'button_count';
    const LAYOUT_BUTTON = 'button';

    /** Actions */
    const ACTION_LIKE = 'like';
    const ACTION_RECOMMEND = 'recommend';

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
        echo (string) $this->build();
    }

    public function renderFaces()
    {
        $this->attributes->add('data-layout', self::LAYOUT_STANDARD);
        $this->attributes->add('data-show-faces', TRUE);
        $this->render();
    }

    public function renderButton()
    {
        $this->attributes->add('data-layout', self::LAYOUT_BUTTON);
        $this->attributes->add('data-show-faces', TRUE);
        $this->render();
    }

    public function renderCount()
    {
        $this->attributes->add('data-layout', self::LAYOUT_BUTTON_COUNT);
        $this->attributes->add('data-show-faces', TRUE);
        $this->render();
    }

    public function renderBox()
    {
        $this->attributes->add('data-layout', self::LAYOUT_BOX_COUNT);
        $this->attributes->add('data-show-faces', TRUE);
        $this->render();
    }

}
