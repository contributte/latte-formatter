<?php

namespace Minetro\Formatter;

use InvalidArgumentException;
use Nette\Utils\Html;

/**
 * Number Formatter
 *
 * @author Milan Felix Sulc <sulcmil@gmail.com>
 */
class NumberFormatter implements IFormatter
{
    /** UTF-8 &nbsp; */
    CONST NBSP = "\xc2\xa0";

    /** Default mask */
    CONST DEFAULT_MASK = "%d";

    /** @var int|float */
    private $rawValue;

    /** @var string */
    private $thousand = ' ';

    /** @var int */
    private $decimals = 2;

    /** @var string */
    private $point = ',';

    /** @var callable */
    private $callback;

    /** @var bool */
    private $zeros = FALSE;

    /** @var bool */
    private $strict = TRUE;

    /** @var bool */
    private $spaces = TRUE;

    /** @var string */
    private $prefix;

    /** @var string */
    private $suffix;

    /** @var Html */
    private $wrapper;

    /**
     * @param string $suffix
     * @param string $prefix
     */
    function __construct($suffix = NULL, $prefix = NULL)
    {
        $this->suffix = $suffix;
        $this->prefix = $prefix;

        $this->wrapper = Html::el();
    }

    /**
     * @param int $decimals
     */
    public function setDecimals($decimals)
    {
        $this->decimals = intval($decimals);
    }

    /**
     * @param string $point
     */
    public function setPoint($point)
    {
        $this->point = $point;
    }

    /**
     * @param string $thousand
     */
    public function setThousand($thousand)
    {
        $this->thousand = $thousand;
    }

    /**
     * @param boolean $zeros
     */
    public function setZeros($zeros)
    {
        $this->zeros = (bool)$zeros;
    }

    /**
     * @param string $suffix
     */
    public function setSuffix($suffix)
    {
        $this->suffix = $suffix;
    }

    /**
     * @param string $prefix
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
    }

    /**
     * @param boolean $strict
     */
    public function setStrict($strict)
    {
        $this->strict = (bool)$strict;
    }

    /**
     * @param boolean $spaces
     */
    public function setSpaces($spaces)
    {
        $this->spaces = (bool)$spaces;
    }

    /**
     * @param callable $callback
     */
    public function setCallback($callback)
    {
        $this->callback = $callback;
    }

    /**
     * @return Html
     */
    public function prototype()
    {
        return $this->wrapper;
    }

    /**
     * @param int|float $value
     * @param int $decimals
     * @return mixed
     */
    public function format($value, $decimals = NULL)
    {
        $value = trim($value);
        $value = str_replace(',', '.', $value);

        if (!is_numeric($value)) {
            if ($this->strict) {
                throw new InvalidArgumentException("Value must be numeric");
            } else {
                return $value;
            }
        }

        $this->rawValue = $value;

        if ($decimals == NULL) {
            $decimals = $this->decimals;
        }

        if ($decimals < 0) {
            $value = round($value, $decimals);
            $decimals = 0;
        }

        $number = number_format((float)$value, $decimals, $this->point, $this->thousand);

        if ($decimals > 0 && !$this->zeros) {
            $number = rtrim(rtrim($number, '0'), $this->point);
        }

        if ($this->callback) {
            return call_user_func_array($this->callback, [$this->prefix, $number, $this->suffix]);
        } else if ($this->spaces) {
            return trim(sprintf("%s %s %s", $this->prefix, $number, $this->suffix));
        } else {
            return trim(sprintf("%s%s%s", $this->prefix, $number, $this->suffix));
        }
    }

    /**
     * @param int|float $value
     * @param int $decimals
     * @return Html
     */
    public function formatHtml($value, $decimals = NULL)
    {
        $wrapper = clone $this->wrapper;
        $wrapper->setHtml($this->format($value, $decimals));
        return $wrapper;
    }

}
