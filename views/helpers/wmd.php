<?php
class WmdHelper extends AppHelper {
    var $helpers = array("Html", "Form");

    function input($field_name) {
        $this->setEntity($field_name);
        $field_name = $this->field();
        $field_dom = $this->domId();

        $this->Html->css("/wmd/css/wmd", null, array("inline" => false));
        $this->Html->js("/wmd/js/wmd", array("inline" => false));
        $this->Html->js("/wmd/js/showdown", array("inline" => false));

        $wmd = $this->Html->div("", "", array("id" => "$field_dom-button-bar"));
        $wmd .= $this->Form->textarea($fieldName);
        $wmd .= $this->Html->div("", "", array("id" => "$field_dom-preview"));
        $wmd .= $this->Form->text("", array("id" => "$field_dom-copy-html", 
                                            "name" => "$field_dom-copy-html"));

        $wmd = $this->Html->div("", $wmd);

        return $wmd . $this->setup_script($field_name, $field_dom);
    }

    function setup_script($field_name, $field_dom) {
        return $this->script("setup_wmd({
            input: '$field_name',
            button_bar: '$field_dom-button-bar',
            preview: '$field_dom-preview',
            output: '$field_dom-copy-html'
        });");
    }
}



