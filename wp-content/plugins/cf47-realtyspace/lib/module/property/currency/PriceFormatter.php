<?php

namespace cf47\plugin\realtyspace\module\property\currency;

use cf47\themecore\helper\Util;
use Respect\Validation\Validator as v;

class PriceFormatter
{
    const SEPARATOR_SPACE = 'space';
    const SEPARATOR_DOT = 'dot';
    const SEPARATOR_COMMA = 'comma';

    const POSITION_BEFORE = 'before';
    const POSITION_AFTER = 'after';

    private static $separator_map = [
        'space' => ' ',
        'dot' => '.',
        'comma' => ','
    ];

    private $thousand_separator;
    private $sign;
    private $sign_position;
    private $sign_space;
    private $decimal_separator;
    private $show_decimals;

    public function __construct($thousand_separator, $show_decimals, $decimal_separator, $sign, $sign_position, $sign_space)
    {
        v::in([self::SEPARATOR_DOT, self::SEPARATOR_COMMA, self::SEPARATOR_SPACE])->assert($thousand_separator);
        v::in([self::POSITION_BEFORE, self::POSITION_AFTER])->assert($sign_position);

        $this->thousand_separator = self::$separator_map[$thousand_separator];
        $this->sign = $sign;
        $this->sign_position = $sign_position;
        $this->sign_space = $sign_space;
        $this->decimal_separator = self::$separator_map[$decimal_separator];
        $this->show_decimals = $show_decimals;
    }

    public function abbreviate($price)
    {
        return $this->format($price, true);
    }

    public function format($price, $abbreviate = false)
    {

        if (!$price) {
            $price = 0;
        }

        if (!$abbreviate) {
            $decimals = $this->show_decimals ? 2 : 0;
            $price = number_format((float)$price, $decimals, $this->decimal_separator, $this->thousand_separator);
        } else {
            $price = Util::humanize_number($price);
        }

        if ($this->sign_position === 'before') {
            if ($this->sign_space) {
                $price = ' ' . $price;
            }
            $price = $this->sign . $price;
        } else {
            if ($this->sign_space) {
                $price .= ' ';
            }
            $price .= $this->sign;
        }

        return $price;
    }
}
