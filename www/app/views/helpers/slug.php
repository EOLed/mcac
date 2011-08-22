<?php
class SlugHelper extends AppHelper {
    var $helpers = array("Html", "Form");

    function slug($text_field, $slug_field, $options = array()) {
        $this->setEntity($text_field);
        $text_field = $this->field();
        $text_dom_id = $this->domId();

        $this->setEntity($slug_field);
        $slug_field = $this->field();
        $slug_dom_id = $this->domId();

        $slug_options = array("class"=>"label no-key-press", "tabindex"=>-1);
        if (isset($options["slug_prefix"])) {
            $slug_options["value"] = $options["slug_prefix"];
        }

        $slug_input = $this->Html->tag("span", "<strong>" . __("Permalink: ", true) . "</strong> " . 
                $options["base_url"], array("id" => $slug_dom_id . "Label")) . 
                $this->Form->text($slug_field, $slug_options);

        $js = $this->Form->input($text_field, array("after" => $slug_input));

        $script = "$('#$slug_dom_id').focus(function() {"  .
                    "   $(this).removeClass('label');" .
                    "}).blur(function() {" .
                    "   $(this).addClass('label');" .
                    "});";

        // auto update by default
        if (!isset($options['auto_update']) || $options["auto_update"] === true) {
            $prefix = "''";
            if (isset($options["slug_prefix"])) {
                $prefix = "'$options[slug_prefix]'";
            }
            $slug_js = "$($('#$text_dom_id').slugIt({ output: '.no-key-press#$slug_dom_id', prefix: $prefix }));";
            $keypress_js = "$($('.no-key-press#$slug_dom_id').keypress(function() { $(this).removeClass('no-key-press') }));";

            $script .= $slug_js.$keypress_js;
        }

        $js .= $this->Html->scriptBlock($script);

        return $js;
    }

    function include_script($options = array()) {
        return $this->Html->script("jquery/jquery.slugit", array("inline"=>"true"));
    }
}
?>
