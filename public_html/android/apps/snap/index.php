<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 15/12/13
 * Time: 5:15 PM
 */

include "../../../php/stevo/util.php";
set_include_path("../../../");

$args = array(
    \stevo\Constants::TITLE => "OpenSnap",
    \stevo\Constants::MENU_STYLES => False,
    \stevo\Constants::PRIME_NAV => True,
    \stevo\Constants::SELECT_PRIME_NAV => new \stevo\PrimeNavEnum(\stevo\PrimeNavEnum::ANDROID),
    \stevo\Constants::INCLUDE_SCRIPTS => True,
    \stevo\Constants::SELECT_SUB_NAV => new \stevo\AndroidNavEnum(\stevo\AndroidNavEnum::OPENSNAP)
);

$cons = new \stevo\Constants($args);

include "base_header.php";

include "top_body.php";

echo '      <div class="content-body">
                This site is under development. Check back later!
            </div>';

include "bottom_body.php";

$hierarchy = array(
    'Home' => '../../../',
    'Android' => '../../',
    'OpenSnap' => ''
);

include "footer.php";