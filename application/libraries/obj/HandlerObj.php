<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of handlerObj
 *
 * @author Raymond Ativie
 */
class HandlerObj {

    function msgBox($noClose=false) {
        $CI = & get_instance();
        
        if ($CI->session->flashdata("msgbox")) {
            ?>
            <div class="alert alert-<?php echo $CI->session->flashdata("msgbox") ?>">
                <button type="button" class="close" data-dismiss="alert">
                    <?php if(!$noClose){ ?>
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    <?php } ?>
                </button>
            <?php echo $CI->session->flashdata("msgmsg") ?>
            </div>
            <?php
        }
    }

}
