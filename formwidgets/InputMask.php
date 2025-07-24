<?php namespace Yfktn\InputMask\FormWidgets;

use Backend\Classes\FormField;
use Backend\Classes\FormWidgetBase;

class InputMask extends FormWidgetBase
{
    public $dataMask = '#.##0,00';

    public $dataMaskReverse = true;

    public $clearIfNotMatch = true;

    public $selectOnFocus = true;

    public $removeMaskOnSubmit = true;

    public $readOnly = false;

    public $placeholder = '';

    public $disabled = false;

    protected $defaultAlias = 'ocinputmask';

    public function init()
    {
        $this->fillFromConfig([
            'dataMask',
            'dataMaskReverse',
            'clearIfNotMatch',
            'selectOnFocus',
            'removeMaskOnSubmit',
            'disabled',
            'placeholder',
        ]);
    }

    public function render()
    {
        $this->prepareVars();
        return $this->makePartial('inputmask');
    }

    protected function prepareVars()
    {
        $this->vars['name'] = $this->getFieldName();
        $this->vars['value'] = $this->getLoadValue();
        $this->vars['dataMask'] = $this->dataMask;
        // $this->vars['dataMaskReverse'] = $this->dataMaskReverse;
        // $this->vars['clearIfNotMatch'] = $this->clearIfNotMatch;
        // $this->vars['selectOnFocus'] = $this->selectOnFocus;
        $this->vars['removeMaskOnSubmit'] = $this->removeMaskOnSubmit;
        $this->vars['readOnly'] = $this->readOnly;
        $this->vars['disabled'] = $this->disabled;
        $this->vars['dataMaskOptions'] = json_encode([
            'reverse' => $this->dataMaskReverse,
            'clearIfNotMatch' => $this->clearIfNotMatch ? 'true' : 'false',
            'selectOnFocus' => $this->selectOnFocus ? 'true' : 'false',
            'placeholder' => $this->placeholder
        ]);
    }

    public function loadAssets()
    {
        $this->addJs('jquery.mask.min.js');
    }

    public function getSaveValue($value)
    {
        if($this->disabled) {
            return FormField::NO_SAVE_DATA;
        }

        if (!strlen($value)) {
            return null;
        }

        return $value;
    }
}