<?php

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
     * @return HTMLText
     */
    public function Field($properties = array())
    {
        $this->addExtraClass('selectboxfield')
            ->setAttribute('data-selectboxconfig', Convert::array2json($this->selectbox_config));

        //allow for not including default styles
        if ($this->config()->get('require_css') == true) {
            Requirements::css(SELECTBOX_DROPDOWN_FIELD_DIR_THIRD_PARTY_DIR . '/jquery.selectbox-0.2/css/jquery.selectbox.css');
        }
        Requirements::javascript(SELECTBOX_DROPDOWN_FIELD_DIR_THIRD_PARTY_DIR . '/jquery.selectbox-0.2/js/jquery.selectbox-0.2.min.js');
        Requirements::javascript(SELECTBOX_DROPDOWN_FIELD_JAVASCRIPT . '/selectbox.dropdown.field.js');

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