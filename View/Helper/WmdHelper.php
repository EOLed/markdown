<?php
App::uses("FormHelper", "View/Helper");
App::uses("HtmlHelper", "View/Helper");
App::uses("AppHelper", "View/Helper");

/**
 * Helper for outputting WMD Markdown editor
 */
class WmdHelper extends AppHelper {
    var $helpers = array("Html", "Form");

    /**
     * @return a WMD Markdown input.
     */
    function input($field_name, $options = array()) {
        $this->setEntity($field_name);
        CakeLog::write(LOG_DEBUG, "wmd field name: $field_name");
        CakeLog::write(LOG_DEBUG, "new wmd field name: $field_name");
        $field_dom = $this->domId();

        $this->Html->css("/markdown/css/wmd", null, array("inline" => false));
        $this->Html->script("/markdown/js/wmd", array("inline" => false));
        $this->Html->script("/markdown/js/showdown", array("inline" => false));

        $between  = $this->Html->div("", "", array("id" => "$field_dom-button-bar"));

        if (isset($options["between"])) {
            $before = $options["between"] . $between;
        }

        $options["between"] = $between;

        $wmd = $this->Form->input($field_name, $options);
        $wmd .= $this->Html->div("", "", array("id" => "$field_dom-preview"));
        $wmd .= $this->Form->text("", array("id" => "$field_dom-copy-html", 
                                            "name" => "$field_dom-copy-html",
                                            "style" => "display: none"));

        $wmd = $this->Html->div("", $wmd);

        return $wmd . $this->setup_script($field_name, $field_dom);
    }

    /**
     * @return the setup_wmd() javascript.
     */
    function setup_script($field_name, $field_dom) {
        return $this->Html->scriptBlock("setup_wmd({
            input: '$field_dom',
            button_bar: '$field_dom-button-bar',
            preview: '$field_dom-preview',
            output: '$field_dom-copy-html'
        });");
    }
}
