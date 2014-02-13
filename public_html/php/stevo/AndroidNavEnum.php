<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 15/12/13
 * Time: 1:04 AM
 */

namespace stevo;


class AndroidNavEnum {
    const OPEN_APP = 0;
    const OPENSNAP = 1;
    const INFO = 2;
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