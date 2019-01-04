<?php

namespace cf47\plugin\realtyspace\module\property\area;

use cf47\themecore\Options;
use Respect\Validation\Validator as v;
use Symfony\Component\HttpFoundation\Request;

class Manager
{
    const SESSION_KEY = 'area_unit';

    const UNIT_M2 = 'm2';
    const UNIT_SQFT = 'sqft';

    private $request;

    private $unit_map;
    /**
     * @var Options
     */
    private $options;

    public function __construct(Request $request, Options $options)
    {

        $this->request = $request;
        $this->unit_map = [
            self::UNIT_SQFT => esc_html__('Sq Ft', 'realtyspace'),
            self::UNIT_M2 => wp_kses(__('M <sup>2</sup>', 'realtyspace'), ['sup' => []])
        ];
        $this->options = $options;
    }

    public function get_primary_unit_label()
    {
        return $this->unit_map[$this->get_primary_unit()];
    }

    public function get_primary_unit()
    {
        return $this->options->config_propgeneral_area_unit;
    }

    public function get_secondary_unit_label()
    {
        return $this->unit_map[$this->get_secondary_unit()];
    }

    public function get_secondary_unit()
    {
        return $this->get_primary_unit() === self::UNIT_M2 ? self::UNIT_SQFT : self::UNIT_M2;
    }

    public function get_unit_label($unit)
    {
        v::trueVal()->assert($this->is_valid_unit($unit));

        return $this->unit_map[$unit];
    }

    public function is_valid_unit($unit)
    {
        return in_array($unit, [self::UNIT_SQFT, self::UNIT_M2], true);
    }

    public function set_unit($unit)
    {
        if (!$this->is_valid_unit($unit)) {
            $unit = null;
            cf47_errlog("Invalid unit '{$unit}'");
        }

        $sesion = $this->request->getSession();

        if ($unit === null || $unit === $this->get_primary_unit()) {
            $sesion->remove(self::SESSION_KEY);

            return;
        }

        $sesion->set(self::SESSION_KEY, $unit);
    }

    public function convert($value)
    {
        if ($this->get_primary_unit() === $this->get_current_unit()) {
            return $value;
        }

        switch ($this->get_current_unit()) {
            case self::UNIT_M2:
                $value = round($value / 10.764);

                break;

            case self::UNIT_SQFT:
                $value = round($value * 10.764);
                break;

            default:
                cf47_errlog_throw("Unexpected unit type {$this->get_current_unit()}");
                break;
        }

        return $value;
    }

    public function get_current_unit()
    {
        return $this->is_primary_unit_active()
            ? $this->get_primary_unit()
            : $this->get_secondary_unit();
    }

    /**
     * @return bool
     */
    public function is_primary_unit_active()
    {
        $sesion = $this->request->getSession();
        $unit = $sesion->get(self::SESSION_KEY);

        return $unit === null || $unit === $this->get_primary_unit();
    }
}
