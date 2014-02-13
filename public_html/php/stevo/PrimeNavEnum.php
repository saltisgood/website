<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 14/12/13
 * Time: 2:09 PM
 */

namespace stevo;


class PrimeNavEnum {
    const HOME = 0;
    const ANDROID = 1;
    const OTHER = 2;
    const NONE = -1;

    protected $enum = PrimeNavEnum::NONE;

    public function __construct($val) {
        if (is_int($val)) {
            $this->enum = $val;
        }
    }

    public function getValue() {
        return $this->enum;
    }
} 