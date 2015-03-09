<?php

namespace Minetro\Social\Twitter;

/**
 * Twitter > tweet button factory interface
 *
 * @author Milan Felix Sulc <rkfelix@gmail.com>
 * @version 1.0
 */
interface ITweetButtonFactory
{

    /**
     * @return TweetButton
     */
    function create();
}
