<?php

namespace Minetro\Social\Facebook;
use Nette\Utils\Html;

/**
 * Script control
 *
 * @author Milan Felix Sulc <sulcmil@gmail.com>
 * @version 3.0
 */
class Script extends Control
{

    /** @var int */
    private $appId;

    /** GETTERS/SETTERS *******************************************************/

    /**
     * @return int
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * @param int $appId
     */
    public function setAppId($appId)
    {
        $this->appId = intval($appId);
    }

    /** API *******************************************************************/

    /**
     * @return Html
     */
    public function build()
    {
        return NULL;
    }

    /** RENDER ****************************************************************/

    public function render()
    {
        $this->template->setFile(dirname(__FILE__) . '/script.latte');
        $this->template->appId = $this->getAppId();
        $this->template->render();
    }

}
