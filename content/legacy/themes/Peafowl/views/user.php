<?php

use function Chevereto\Legacy\G\get_base_url;
use Chevereto\Legacy\G\Handler;
use function Chevereto\Legacy\G\require_theme_file;
use function Chevereto\Legacy\G\require_theme_file_return;
use function Chevereto\Legacy\G\require_theme_footer;
use function Chevereto\Legacy\G\require_theme_header;
use function Chevereto\Legacy\G\safe_html;
use function Chevereto\Legacy\getSetting;
use function Chevereto\Legacy\show_banner;
use function Chevereto\Legacy\show_theme_inline_code;
use function Chevereto\Vars\request;

// @phpstan-ignore-next-line
if (!defined('ACCESS') || !ACCESS) {
    die('This file cannot be directly accessed.');
}
$tags = require_theme_file_return('snippets/tags_filter');
$sub_tabs = Handler::var('sub_tabs');
$tabs = Handler::var('tabs');
?>
<?php require_theme_header(); ?>
<?php if (isset(Handler::var('user')["background"]) || Handler::cond('owner') || Handler::cond('content_manager')) { ?>
<div id="background-cover" data-content="user-background-cover"<?php if (!isset(Handler::var('user')["background"])) {
            ?> class="no-background"<?php
        } ?>>
	<div id="background-cover-wrap">
		<div id="background-cover-src" data-content="user-background-cover-src"<?php if (isset(Handler::var('user')["background"], Handler::var('user')["background"]["url"])) {
            ?> style="background-image: url('<?php echo Handler::var('user')["background"]["url"]; ?>');"<?php
        } ?>></div>
<?php
if (Handler::cond('owner') || Handler::cond('content_manager')) {
?>
        <div title="<?php _se('Change background'); ?>" class="content-width">
            <div data-content="user-upload-background" class="btn btn-input default<?php if (isset(Handler::var('user')["background"])) {
                    ?> hidden<?php
                } ?>" data-trigger="user-background-upload"><span class="btn-icon fas fa-camera"></span><span class="btn-text"><?php _se('Upload profile background'); ?></span></div>
            <div id="change-background-cover" data-content="user-change-background" class="pop-btn<?php if (!isset(Handler::var('user')["background"])) {
                    ?> hidden<?php
                } ?>">
                <span class="btn btn-capsule"><span class="btn-icon fas fa-camera"></span><span class="btn-text hidden"><?php _se('Change background'); ?></span></span>
                <div class="pop-box anchor-right arrow-box arrow-box-top margin-top-10">
                    <div class="pop-box-inner pop-box-menu">
                        <ul>
                            <li class="with-icon"><a data-trigger="user-background-upload"><span class="btn-icon fas fa-camera"></span> <?php _se('Upload new image'); ?></a></li>
                            <li class="with-icon"><a data-confirm="<?php _se("Are you sure that you want to delete the profile background image?"); ?> <?php _se("This can't be undone."); ?>" data-submit-fn="CHV.fn.user_background.delete.submit" data-ajax-deferred="CHV.fn.user_background.delete.deferred"><span class="btn-icon fas fa-trash-alt"></span><?php _se('Delete background'); ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <input id="user-background-upload" data-content="user-background-upload-input" class="hidden-visibility" type="file" accept="image/*">
        </div>
<?php
}
?>
	</div>
	<div class="loading-placeholder hidden"></div>
</div>
<?php
    }
?>
<div class="content-width">
	<?php show_banner('user_after_top', Handler::var('listing')->sfw()); ?>
	<div id="top-user" class="top-user<?php echo !isset(Handler::var('user')["background"]) ? ' no-background' : ''; ?>">
		<div class="top-user-credentials">
			<a class="top-user-avatar" href="<?php echo Handler::var('user')["url"]; ?>">
				<?php
                    if (isset(Handler::var('user')["avatar"])) {
                        ?>
				<img class="user-image" src="<?php echo Handler::var('user')["avatar"]["url"]; ?>" alt="">
				<?php
                    } else {
                        ?>
				<span class="user-image default-user-image"><?php require_theme_file('tpl_list_item/user_cover_empty.php'); ?></span>
				<?php
                    }
                ?>
			</a>
            <h1><a href="<?php echo Handler::var('user')["url"]; ?>"><?php echo Handler::var('safe_html_user')[Handler::var('user')["name"] ? "name" : "username"]; ?></a></h1>
            <div class="user-social-networks">
            <?php if (isset(Handler::var('user')["twitter"])) {
                    ?><a class="fab fa-x-twitter" title="X" rel="tooltip" data-tipTip="top" href="<?php echo Handler::var('user')["twitter"]["url"]; ?>" rel="nofollow" target="_blank"></a><?php
                } if (isset(Handler::var('user')["facebook"])) {
                    ?><a class="icon fab fa-facebook" href="<?php echo Handler::var('user')["facebook"]["url"]; ?>" rel="nofollow" target="_blank"></a><?php
                } if (isset(Handler::var('user')["website"])) {
                    ?><a title="<?php _se('Website'); ?>" rel="tooltip" data-tipTip="top" href="<?php echo Handler::var('user')['website_display']; ?>"<?php echo !Handler::var('user')['is_admin'] ? ' rel="nofollow"' : null; ?> target="_blank"><span class="fas fa-globe-americas margin-right-5"></span>Website</a><?php
                } ?>
            </div>
            <?php if (Handler::var('user')['is_private'] == 1) { ?>
            <div class="user-meta font-size-small"><span class="icon icon--lock fas fa-lock"></span><?php _se('Private profile'); ?></div>
            <?php } else { ?>
            <?php } ?>
			<?php if (getSetting('enable_followers') && Handler::var('user')['is_private'] == 0) {
                    ?>
			<div class="user-meta">
				<a class="number-figures display-inline-block margin-bottom-5" href="<?php echo Handler::var('user')['url_following']; ?>"><b data-text="following-count"><?php echo Handler::var('user')['following']; ?></b> <span><?php _se('Following'); ?></span></a>
				<a class="number-figures display-inline-block margin-bottom-5" href="<?php echo Handler::var('user')['url_followers']; ?>"><b data-text="followers-count"><?php echo Handler::var('user')['followers']; ?></b> <span data-text="followers-label" data-label-single="<?php _ne('Follower', 'Followers', 1); ?>" data-label-plural="<?php _ne('Follower', 'Followers', 2); ?>"><?php _ne('Follower', 'Followers', Handler::var('user')['followers']); ?></span></a>
			</div>
			<?php
                } ?>
			<?php if (Handler::var('user')['bio']) {
                    ?>
			<div class="user-meta overflow-hidden margin-bottom-10">
				<p class="word-break-break-word"><?php echo Handler::var('user')['bio_linkify']; ?></p>
			</div>
			<?php
                } ?>
		</div>
		<div class="header-content-right phone-float-none">
			<div class="text-align-right">
				<a class="number-figures" href="<?php echo Handler::var('user')["url_images"]; ?>"><i class="icon fas fa-photo-film"></i> <b data-text="image-count"><?php echo Handler::var('user')["image_count"]; ?></b> <span data-text="image-label" data-label-single="<?php _ne('file', 'files', 1); ?>" data-label-plural="<?php _ne('file', 'files', 2); ?>"><?php _ne('file', 'files', Handler::var('user')['image_count']); ?></span></a>
				<a class="number-figures" href="<?php echo Handler::var('user')["url_albums"]; ?>"><i class="icon far fa-images"></i> <b data-text="album-count"><?php echo Handler::var('user')["album_count"]; ?></b> <span data-text="album-label" data-label-single="<?php _ne('album', 'albums', 1); ?>" data-label-plural="<?php _ne('album', 'albums', 2); ?>"><?php _ne('album', 'albums', Handler::var('user')['album_count']); ?></span></a>
				<?php if (getSetting('enable_likes') && Handler::var('user')['is_private'] == 0) {
                ?>
				<a class="number-figures" href="<?php echo Handler::var('user')["url"]; ?>/liked"><span class="icon far fa-heart"></span> <b data-text="likes-count"><?php echo Handler::var('user')["liked"]; ?></b></a>
				<?php
            } ?>
			</div>
            <?php if (Handler::cond('search_enabled')) { ?>
			<div class="input-search col-7 col-7-max">
				<form action="<?php echo rtrim(Handler::var('user')["url"], '/') . "/search/"; ?>">
                    <input required class="search two-icon-padding" type="text" placeholder="<?php echo Handler::var('safe_html_user')["name"]; ?>" autocomplete="off" spellcheck="false" name="q" value="<?php echo safe_html(Handler::var('user')['search']['q'] ?? ''); ?>">
				</form>
				<span class="icon fas fa-search icon--search"></span><span class="icon icon--close fas fa-times hidden" data-action="clear-search"></span>
			</div>
            <?php
            } ?>

            <div class="buttons text-align-right">
            <?php
                    if (Handler::cond('show_follow_button')) {
                        ?>
				<a title="<?php _se("Toggle following"); ?>" class="btn-follow" data-followed="<?php echo (int)Handler::var('user')['followed']; ?>" data-action="follow"><span class="btn btn-small btn-followed default--hover"><span class="btn-icon fas fa-user-check"></span><span class="btn-text phone-hide"><?php _se('Following'); ?></span></span><span class="btn btn-small btn-unfollowed default"><span class="btn-icon fas fa-user-plus"></span></span></a>
				<?php
                    } ?>
            <?php
                if (! Handler::cond('owner') && (Handler::cond('admin') || (Handler::cond('content_manager') && !Handler::var('user')['is_content_manager']))) {
                    ?>
				<a title="<?php _se('Settings'); ?>" class="btn btn-small default" href="<?php echo get_base_url('dashboard/user/' . Handler::var('user')['id']); ?>"><span class="icon fas fa-user-gear"></span></a>
			<?php
                    if (!Handler::cond('owner') && Handler::cond('content_manager')) {
                        ?>
                <div class="display-inline-block" data-banned="<?php echo (string) (int) (Handler::var('user')['status'] === 'banned'); ?>">
                    <a data-action="user_ban" class="btn btn-small default" title="<?php _se('Ban'); ?>"><span class="icon fas fa-ban"></span></a>
                    <a data-action="user_unban" class="btn btn-small black" title="<?php _se('Remove ban'); ?>"><span class="icon fas fa-ban"></span><span class="margin-left-5"><?php _se('Banned'); ?></span></a>
                </div>
				<a title="<?php _se('Delete'); ?>" class="btn btn-small default" data-confirm="<?php _se("Do you really want to delete this %s?", _n('user', 'users', 1)); ?> <?php _se("This can't be undone."); ?>" data-submit-fn="CHV.fn.submit_resource_delete" data-ajax-deferred="CHV.fn.complete_resource_delete" data-ajax-url="<?php echo get_base_url("json"); ?>"><span class="icon fas fa-trash-alt"></span></a>
			<?php
                    } ?>
			<?php
                }
            ?>
			<?php
                if (Handler::cond('owner') || Handler::cond('content_manager')) {
                    ?>
				<button data-action="create-album" title="<?php _se('Create new %s', _n('album', 'albums', 1)); ?> (A)" class="btn btn-small default" data-modal="edit" data-target="new-album"><span class="btn-icon fas fa-images"></span></button>
				<?php require_theme_file('snippets/modal_create_album.php'); ?>
                <?php
                    }
                ?>
			</div>

		</div>
	</div>
	<?php
        if (isset(Handler::var('user')["background"]) || Handler::cond('owner') || Handler::cond('content_manager')) {
            show_theme_inline_code('snippets/user.js');
        }
    ?>
    <div id="user-tags-filter">
<?php echo $tags(Handler::var('tags_display'), Handler::var('tags_active')); ?>
    </div>
</div>
<div class="content-width">
    <div class="header header-tabs">
        <h2 class="header-title">
            <i class="header-icon <?php echo Handler::var('icon'); ?> color-accent"></i> <strong><?php echo Handler::var('title_short'); ?></strong>
        </h2>
<?php
Handler::setVar('tabs', $sub_tabs);
require_theme_file('snippets/tabs');
?>
    </div>
</div>
<div class="top-sub-bar follow-scroll margin-bottom-5">
    <div class="content-width">
        <div class="header header-tabs">
            <a href="<?php echo Handler::var('user')["url"]; ?>" class="user-image margin-right-5 float-left">
                <?php if (isset(Handler::var('user')["avatar"])) {
        ?>
                <img src="<?php echo Handler::var('user')["avatar"]["url"]; ?>" alt="">
                <?php
    } else {
        ?>
                <span class="user-image default-user-image margin-top-0"><span class="icon fas fa-user-circle"></span></span>
                <?php
    } ?>
            </a>
<?php
Handler::setVar('tabs', $tabs);
require_theme_file("snippets/tabs");
?>
            <?php
                if (Handler::cond('show_user_items_editor') || (Handler::cond('owner') || Handler::cond('content_manager'))) {
                    require_theme_file("snippets/user_items_editor"); ?>
            <div class="header-content-right">
                <?php require_theme_file("snippets/listing_tools_editor"); ?>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>

<div class="content-width">
<?php show_banner('user_before_listing', Handler::var('listing')->sfw()); ?>
	<div id="content-listing-tabs" class="tabbed-listing">
      <div id="tabbed-content-group">
          <?php
              require_theme_file("snippets/listing");
          ?>
      </div>
  </div>
</div>

<?php if ((Handler::cond('owner') || Handler::cond('content_manager')) && isset(request()["deleted"])) {
              ?>
<script>
document.addEventListener("DOMContentLoaded", function(event) {
	PF.fn.growl.expirable("<?php _se('The %s has been deleted.', _s('user')); ?>");
});
</script>
<?php
          } ?>
<?php require_theme_footer(); ?>
