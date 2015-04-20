<form role="search" method="get" id="searchform" class="searchform form-inline" action="<?php echo home_url( '/' ); ?>">
    <div class="form-group">
      <div class="input-group">
        <!--<label for="s" class="screen-reader-text"><?php _e('Search for:','skeletontheme'); ?></label>-->
        <input type="search" id="s" name="s" value="" class="form-control" />
        <span class="input-group-btn">
          <button type="submit" id="searchsubmit" class="btn btn-primary" ><?php _e('Search','skeletontheme'); ?></button>
        </span>
      </div>
    </div>
</form>
