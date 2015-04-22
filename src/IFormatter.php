<?php

namespace Minetro\Formatter;

/**
 * Formatter Interface
 *
 * @author Milan Felix Sulc <sulcmil@gmail.com>
 */
interface IFormatter
{

    /**
     * @param mixed $value
     * @return mixed
     */
    function format($value);
}
