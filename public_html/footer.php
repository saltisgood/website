<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 14/12/13
 * Time: 12:43 PM
 */

echo '<div id="footer">';

if (!is_null($hierarchy) && is_array($hierarchy)) {
    echo '
    <div id="hierarchy">';

    $count = count($hierarchy);
    $vals = array_values($hierarchy);
    $keys = array_keys($hierarchy);
    for ($i = 0; $i < $count - 1; $i++) {
        echo '<a class="navi" href="', $vals[$i],'">', $keys[$i],'</a> &gt; ';
    }
    echo $keys[$count - 1], '</div>
';
}

echo '    <div id="vanity">Copyright Nicholas Stephen - 2013</div>
</div>
</body>';