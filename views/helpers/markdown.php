<?php
App::import("Helper", "Markdown.Wmd");
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
}
