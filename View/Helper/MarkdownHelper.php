<?php
App::uses("Helper", "Markdown.Wmd");
App::uses("Lib", "Markdown.Markdown");

/**
 * Helper for outputting a Markdown editor
 */
class MarkdownHelper extends AppHelper {
    var $helpers = array("Html", "Form", "Wmd");

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
