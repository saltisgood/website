/**
 * Created by Nick on 9/12/13.
 */
function toggleShowMenu(id, srcFolder) {
    var el = document.getElementById(id);
    var img = document.getElementById("side-menu-toggle");
    var box = el.getAttribute("class");

    var matches = box.split(" ");
    if (matches[0] == "side-hide") {
        el.setAttribute("class", "side-show " + matches[1]);
        delay(img, srcFolder + "side_menu_contract.png", 400);
    } else {
        el.setAttribute("class", "side-hide " + matches[1]);
        delay(img, srcFolder + "side_menu_expand.png", 400);
    }
}

function delay(elem, src, delayTime) {
    window.setTimeout(function() {
            elem.setAttribute("src", src);
        },
        delayTime);
}
