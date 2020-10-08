<?php
//add_filter('site_option__site_transient_update_plugins', 'filter_hide_update_notice');
function filter_hide_update_notice($data) {
  //  SNAPは画像のチェックを付与しているので手動UPDATE
    if (isset($data->response['social-networks-auto-poster-facebook-twitter-g/NextScripts_SNAP.php'])) {
        unset($data->response['social-networks-auto-poster-facebook-twitter-g/NextScripts_SNAP.php']);
    }
}