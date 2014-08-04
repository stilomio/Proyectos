<?php

/**
 * SwitchToggleJD.php
 *
 * @author "Jose Daniel Stilomio" Stilomio <shop.velasquez@gmail.com>
 * @copyright 2014 Jose Velasquez
 * @package SwitchToggleJD
 * @version 1.0
 */
class SwitchToggleJD extends CWidget {
    /*
     * Variable que define Estatus del Swichet 
     * Posibles Valores: TRUE o FALSE
     */

    public $state = FALSE;
    public $name = 'active';
    public $id = 'activeID';
    public $model;
    public $attribute;

    public function init() {
        self::registerFile();
        echo self::Labels();
    }

    public function LabelCheckBox() {
        return CHtml::activeCheckBox($this->model, $this->attribute, array('class' => 'onoffswitch-checkbox', 'id' => $this->id));
    }

    private function Labels() {

        $data = '<div class="onoffswitch">';
        $data .= $this->LabelCheckBox();
        // $data .= '<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>';
        $data .= '<label class="onoffswitch-label" for="' . $this->id . '">';
        $data .= '<span class="onoffswitch-inner"></span>';
        $data .= '<span class="onoffswitch-switch"></span>';
        $data .= '</label>';
        $data .= '</div>';
        return $data;
    }

    private function registerFile() {
        $assets = dirname(__FILE__) . '/assets';
        $baseUrl = Yii::app()->assetManager->publish($assets);

        if (is_dir($assets)) {
            Yii::app()->clientScript->registerCssFile($baseUrl . '/SwitchToggleJD.css');
        } else {
            throw new Exception(Yii::t('Switch Toggle JD - Error: Couldn\'t find assets folder to publish.'));
        }
    }

}
