<form action="<?php echo home_url('/');?>" class="search-form d-inline-block" method="get" id="searchform">
    <div class="d-flex">
        <input type="search" name="s" id="s" class="form-control" placeholder="<?php esc_html_e('Search...','meranda');?>">
        <button type="submit" class="btn btn-secondary"><span class="icon-search"></span></button>
    </div>
</form>