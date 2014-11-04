<?php

$plugin_info = array(
    'pi_name' => 'Thotbox Salt Shaker',
    'pi_author' =>'Shane Woodward',
    'pi_description' => 'Simple string encryption using a custom salt key',
    'pi_version' =>'1.0',
    'pi_usage' => salt_shaker::usage()
);

class salt_shaker {

    public function __construct() {
        $this->return_data = $this->output();
    }

    public function output() {
        $this->EE =& get_instance();
        $data = $this->EE->TMPL->tagdata;
        $salt = $this->EE->TMPL->fetch_param('salt');
        $result = md5($salt . $data);
        return $result;
    }

    public function usage() {
        ob_start();
    ?>
        Use {exp:salt_shaker salt='random_salt_key'}content you want salted{/exp:salt_shaker} to output salted contents.
    <?php
        $text = ob_get_contents();
        ob_end_clean();
        return $text;
    }

}

?>