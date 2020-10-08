<?php
/* WordPress管理画面のviewportを変更 */
function my_admin_footer_script(){ ?>
    <script type="text/javascript">
        jQuery(function ($) {
            $('meta').attr('name', 'viewport').attr('content', 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no').appendTo('head');
        });
    </script>
<?php }
add_action('admin_print_footer_scripts', 'my_admin_footer_script');