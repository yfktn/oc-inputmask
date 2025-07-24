<?php namespace Yfktn\InputMask\FormWidgets;

use Backend\Classes\FormField;
use Backend\Classes\FormWidgetBase;

class NumberInputMask extends FormWidgetBase
{
    protected $dataMask = '#.##0,00';

    public $dataMaskReverse = true;

    public $clearIfNotMatch = true;

    public $selectOnFocus = true;

    public $removeMaskOnSubmit = true;

    public $decimalSeparator = ',';

    public $decimalCount = 0;

    public $thousandsSeparator = '.';

    public $readOnly = false;

    public $placeholder = '';

    public $disabled = false;

    protected $defaultAlias = 'ocnumberinputmask';

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
            'decimalSeparator',
            'decimalCount',
            'thousandsSeparator'
        ]);
    }

    public function render()
    {
        $this->prepareVars();
        return $this->makePartial('$/yfktn/inputmask/formwidgets/inputmask/partials/_inputmask_number.php');
    }

    protected function generateMask()
    {
        $decimalMask = '';
        if($this->decimalCount > 0) {
            $decimalMask = $this->decimalSeparator . str_repeat('0', $this->decimalCount);
        }
        $thousandMask = '#';
        if(mb_strlen($this->thousandsSeparator) > 0) {
            $thousandMask = '#' . $this->thousandsSeparator . '##0';
        }

        return $thousandMask . $decimalMask;
    }

    protected function prepareVars()
    {
        $this->vars['name'] = $this->getFieldName();
        $this->vars['value'] = $this->getNumericLoadValue();
        $this->vars['dataMask'] = $this->dataMask = $this->generateMask();
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

    protected function getNumericLoadValue()
    {
        $v = $this->getLoadValue();
        if(is_numeric($v)) {
            return number_format($v, $this->decimalCount, $this->decimalSeparator, $this->thousandsSeparator);
        }
        return $v;
    }

    public function loadAssets()
    {
        //plugins/yfktn/inputmask/formwidgets/inputmask/assets/jquery.mask.min.js
        $this->addJs('/plugins/yfktn/inputmask/formwidgets/inputmask/assets/jquery.mask.min.js');
    }

    public function getSaveValue($value)
    {
        if($this->disabled) {
            return FormField::NO_SAVE_DATA;
        }

        if (!strlen($value)) {
            return null;
        }

        $value = str_replace($this->thousandsSeparator, '', $value);
        $value = str_replace($this->decimalSeparator, '.', $value);

        if(is_numeric($value)) {
            return $value+0;
        }
        
        return $value;
    }
}