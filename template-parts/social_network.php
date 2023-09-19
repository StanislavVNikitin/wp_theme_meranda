<?php
for ($i = 1; $i <= 3; $i++) {
    if (!empty(get_option('socialnetwork'.$i))){
        $social_network[get_option('socialnetwork'.$i)] = get_option('socialnetwork'.$i.'_url');
    }

}
?>

<div class="ml-md-auto top-social d-none d-lg-inline-block">
    <?php foreach($social_network as $social_net_icon => $social_net_url):?>
        <a href="<?php echo $social_net_url;?>" class="d-inline-block p-3"><span class="<?php echo $social_net_icon;?>"></span></a>
    <?php endforeach;?>
</div>
