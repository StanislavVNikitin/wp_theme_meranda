<div class="wrap meranda-options">
    <h1><?php _e('Theme options page','meranda');?></h1>
    <?php settings_errors();?>

    <form action="options.php" method="post">

        <?php settings_fields('meranda_general_group');?>
        <?php do_settings_sections('meranda-options');?>
        <?php submit_button();?>

    </form>

</div>
