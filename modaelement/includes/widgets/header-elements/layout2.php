<div class="wrapper clicked-search-form">
    <div class="search-close"><i class="fas fa-times"></i></div>
    <form id="searchform" class="searchbox" action="<?php echo home_url('/'); ?>" method="get">
        <input type="text" id="search" placeholder="Search" class="input" name="s" value=""/>
        <div class="search-icon"><i class="fas fa-search"></i></div>
        <input type="hidden" name="post_type" value="product"/>
    </form>
</div>
<li><a class="searchbtn" href="#"><i class="fal fa-search"></i></a></li>