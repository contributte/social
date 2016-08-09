<?php

namespace Minetro\Social\Facebook\OG;

use Minetro\Social\Facebook\Control;
use Nette\Utils\Html;

/**
 * OpenGraph control
 *
 * @author Milan Felix Sulc <sulcmil@gmail.com>
 * @version 3.0
 */
class OG extends Control
{

    /** @var array */
    private $tags = [];

    /**
     * @param string $name
     * @param string $value
     */
    public function add($name, $value)
    {
        $this->tags[$name] = $value;
    }

    /**
     * @return array
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param array $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    /** API ********************************************************************/

    /**
     * @return Html
     */
    public function build()
    {
        $wrapper = Html::el();
        foreach ($this->tags as $property => $content) {
            $wrapper->addHtml(Html::el('meta')->addAttributes([
                'property' => $property,
                'content' => $content,
            ]));
        }

        return $wrapper;
    }

    /** RENDERS ***************************************************************/

    public function render()
    {
        echo $this->build();
    }
}
