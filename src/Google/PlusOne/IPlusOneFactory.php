<?php

namespace Minetro\Social\Google\PlusOne;

/**
 * Google +1 component factory interface
 *
 * @author Milan Felix Sulc <rkfelix@gmail.com>
 * @author Petr Stuchl4n3k Stuchlik <stuchl4n3k@gmail.com>
 * @version 2.0
 */
interface IPlusOneFactory
{

    /**
     * @return PlusOne
     */
    function create();
}
