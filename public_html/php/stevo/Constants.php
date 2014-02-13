<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 14/12/13
 * Time: 12:34 AM
 */

namespace stevo;


class Constants {
    const TITLE = 'title';
    const MENU_STYLES = 'menu_styles';
    const PRIME_NAV = 'prime_nav';
    const SELECT_PRIME_NAV = 'select_prime_nav';
    const INCLUDE_SCRIPTS = 'include_scripts';
    const EXTRA_HEAD = 'extra_head';
    const SUB_NAV = 'sub_nav';
    const SELECT_SUB_NAV = 'select_sub_nav';

    protected $pageTitle = 'Empty';
    protected $includeMenuStyles = False;
    protected $includePrimeNavBar = True;
    protected $selectedPrimeNav = -1;
    protected $includeScripts = True;
    protected $extraHeaderSpace = "";
    protected $includeSubNavBar = True;
    protected $selectedSubNav = -1;

    public function __construct(array $args) {
        if (is_string($args[Constants::TITLE])) {
            $this->pageTitle = $args[Constants::TITLE];
        }
        if (is_bool($args[Constants::MENU_STYLES])) {
            $this->includeMenuStyles = $args[Constants::MENU_STYLES];
        }
        if (is_bool($args[Constants::PRIME_NAV])) {
            $this->includePrimeNavBar = $args[Constants::PRIME_NAV];
        }
        if ($args[Constants::SELECT_PRIME_NAV] instanceof PrimeNavEnum) {
            $this->selectedPrimeNav = $args[Constants::SELECT_PRIME_NAV]->getValue();
        }
        if (is_string($args[Constants::EXTRA_HEAD])) {
            $this->extraHeaderSpace = $args[Constants::EXTRA_HEAD];
        }
        if (is_bool($args[Constants::EXTRA_HEAD])) {
            $this->includeScripts = $args[Constants::EXTRA_HEAD];
        }
        if (is_bool($args[Constants::SUB_NAV])) {
            $this->includeSubNavBar = $args[Constants::SUB_NAV];
        }
        if ($args[Constants::SELECT_SUB_NAV] instanceof AndroidNavEnum) {
            $this->selectedSubNav = $args[Constants::SELECT_SUB_NAV]->getValue();
        }
    }

    public function getPageTitle() {
        return $this->pageTitle;
    }

    public function setPageTitle($newTitle = "No Title") {
        if (is_string($newTitle)) {
            $this->pageTitle = $newTitle;
        }
    }

    public function includeMenuStyles() {
        return $this->includeMenuStyles;
    }

    public function setMenuStyles($newStyles = False) {
        if (is_bool($newStyles)) {
            $this->includeMenuStyles = $newStyles;
        }
    }

    public function includePrimeNav() {
        return $this->includePrimeNavBar;
    }

    public function setIncludePrimeNav($newNav = True) {
        if (is_bool($newNav)) {
            $this->includePrimeNavBar = $newNav;
        }
    }

    public function getSelectedPrimeNav() {
        return $this->selectedPrimeNav;
    }

    public function getExtraHeaders() {
        return $this->extraHeaderSpace;
    }

    public function getIncludeScripts() {
        return $this->includeScripts;
    }

    public function getIncludeSubNav() {
        return $this->includeSubNavBar;
    }

    public function getSelectedSubNav() {
        return $this->selectedSubNav;
    }
}