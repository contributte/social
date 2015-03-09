<?php

namespace Minetro\Facebook;

use Nette\Application\UI\Control as NetteControl;
use Nette\ComponentModel\IContainer;
use Nette\Utils\Html;

/**
 * Abstract control for facebook plugins
 *
 * @author Milan Felix Sulc <sulcmil@gmail.com>
 * @version 3.0
 */
abstract class Control extends NetteControl
{

    /** @var Attributes */
    protected $attributes;

    /**
     * @param IContainer $parent
     * @param string $name
     */
    public function __construct(IContainer $parent = NULL, $name = NULL)
    {
        parent::__construct($parent, $name);
        $this->attributes = new Attributes();
    }

    /** GETTERS ***************************************************************/

    /**
     * @return Attributes
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /** HELPERS ***************************************************************/

    /**
     * @param array $attributes
     * @return Html
     */
    protected function createElement(array $attributes = [])
    {
        $el = Html::el('div');
        $el->addAttributes($attributes);

        return $el;
    }

    /** ABSTRACT **************************************************************/

    /**
     * @return Html
     */
    abstract function build();

}
