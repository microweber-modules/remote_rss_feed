<?php only_admin_access(); ?>

<div class="module-live-edit-settings">
    <div class="mw-ui-field-holder">
        <label class="mw-ui-label"><?php _e("RSS url"); ?></label>
        <div class="range-slider">
            <input name="rss_url"  class="mw-ui-field-range mw_option_field mw-full-width form-control" type="text"  value="<?php print get_option('rss_url', $params['id']) ?>">
        </div>
    </div>

    <div class="mw-ui-field-holder">
        <label class="mw-ui-label"><?php _e("Number of posts"); ?></label>
        <div class="range-slider">
            <input name="rss_post_limit"  class="mw-ui-field-range mw_option_field mw-full-width form-control" type="text"  value="<?php print get_option('rss_post_limit', $params['id']) ?>">
        </div>
    </div>
</div>

<hr>
<module type="admin/modules/templates"/>
