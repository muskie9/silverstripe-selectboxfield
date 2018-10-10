<?php

namespace Muskie9\SelectboxField;

use SilverStripe\Core\Convert;
use SilverStripe\Forms\DropdownField;
use SilverStripe\View\Requirements;

/**
 * Class SelectboxDropdownField
 */
class SelectboxDropdownField extends DropdownField
{

    /**
     * @var bool
     */
    private static $require_css = true;

    /**
     * @var array
     */
    protected $selectbox_config = array();

    /**
     * @param array $properties
     * @return string
     */
    public function Field($properties = array())
    {
        $this->addExtraClass('selectboxfield')
            ->setAttribute('data-selectboxconfig', Convert::array2json($this->selectbox_config));

        //allow for not including default styles
        if ($this->config()->get('require_css') == true) {
            Requirements::css('muskie9/silverstripe-selectboxfield: javascript/thirdparty/jquery.selectbox-0.2/css/jquery.selectbox.css');
        }
        Requirements::javascript('silverstripe/admin: thirdparty/jquery/jquery.min.js');
        Requirements::javascript('muskie9/silverstripe-selectboxfield: javascript/thirdparty/jquery.selectbox-0.2/js/jquery.selectbox-0.2.min.js');
        Requirements::javascript('muskie9/silverstripe-selectboxfield: javascript/selectbox.dropdown.field.js');

        return parent::Field($properties);
    }

    /**
     * @param null $key
     * @param null $val
     * @return $this
     */
    public function setSelectboxConfig($key = null, $val = null)
    {
        if ($key === null || $val === null) {
            user_error('Both $key and $val need to have non-null values in setSelectboxConfig()', E_USER_ERROR);
        }
        $this->selectbox_config[$key] = $val;
        return $this;
    }

    /**
     * @return array
     */
    public function getSelectboxConfig()
    {
        return $this->selectbox_config;
    }

}
