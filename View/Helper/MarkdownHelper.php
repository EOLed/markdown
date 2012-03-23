<?php
require_once(APP . "/Plugin/Markdown/Vendor/markdown.php");
App::uses("WmdHelper", "Markdown.View/Helper");

/**
 * Helper for outputting a Markdown editor
 */
class MarkdownHelper extends AppHelper {
    var $helpers = array("Html", "Form", "Markdown.Wmd");

    /**
     * @return a markdown input.
     */
    function input($field_name, $options = array()) {
        return $this->Wmd->input($field_name, $options);
    }

    function html($text) {
        return Markdown($text);
    }
}
