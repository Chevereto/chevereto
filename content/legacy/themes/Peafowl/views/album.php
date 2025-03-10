<?php

use function Chevereto\Legacy\arr_printer;
use function Chevereto\Legacy\G\get_base_url;
use function Chevereto\Legacy\G\get_global;
use Chevereto\Legacy\G\Handler;
use function Chevereto\Legacy\G\require_theme_file;
use function Chevereto\Legacy\G\require_theme_file_return;
use function Chevereto\Legacy\G\require_theme_footer;
use function Chevereto\Legacy\G\require_theme_header;
use function Chevereto\Legacy\getSetting;
use function Chevereto\Legacy\isShowEmbedContent;
use function Chevereto\Legacy\show_banner;
use function Chevereto\Legacy\time_elapsed_string;
use function Chevereto\Vars\request;

// @phpstan-ignore-next-line
if (!defined('ACCESS') || !ACCESS) {
    die('This file cannot be directly accessed.');
} ?>
<?php require_theme_header(); ?>

<div class="content-width">
	<?php show_banner('album_before_header', Handler::var('listing')->sfw()); ?>
    <div class="header header-content margin-bottom-10 margin-top-10">
		<div class="header-content-left">
			<div class="header-content-breadcrum">
            <?php
                if (Handler::var('album')['user']['id']) {
                    require_theme_file("snippets/breadcrum_owner_card");
                } ?>
                <div class="breadcrum-item buttons" data-contains="cta-album">
                <?php echo Handler::var('album')['cta_html']; ?>
                </div>
			</div>
		</div>
		<div class="header-content-right breaks-ui buttons">
<?php if((Handler::var('ancestors')[1] ?? []) !== []) { ?>
            <a href="<?php echo Handler::var('ancestors')[1]['url']; ?>/sub" class="btn btn-small default" title="<?php echo _s("Go up to: %s", Handler::var('ancestors')[1]['name_html']); ?>"><span class="icon fas fa-level-up-alt"></span></a>
<?php } ?>
        <?php
                if (Handler::cond('owner') || Handler::cond('content_manager')) {
                    ?>
                    <a data-action="edit" title="<?php _se('Edit'); ?> (E)" class="btn btn-small default" data-modal="edit"><span class="icon fas fa-edit"></span></a>
                    <a data-action="sub-album" title="<?php _se('Sub album'); ?> (J)" class="btn btn-small default" data-modal="edit" data-target="new-sub-album"><span class="icon fas fa-folder-tree"></span></a>
					<?php
                    if (Handler::cond('allowed_to_delete_content')) {
                        ?>
							<a data-action="delete" title="<?php _se('Delete'); ?> (Del)" class="btn btn-small default" data-confirm="<?php _se("Do you really want to delete this %a and all of its %i?", ['%a' => _n('album', 'albums', 1), '%i' => _n('file', 'files', 20)]); ?> <?php _se("This can't be undone."); ?>" data-submit-fn="CHV.fn.submit_resource_delete" data-ajax-deferred="CHV.fn.complete_resource_delete" data-ajax-url="<?php echo get_base_url("json"); ?>"><span class="icon fas fa-trash-alt"></span></a>
					<?php
                    } ?>
				<?php
                }
                ?>
        <?php
            if (Handler::cond('owner')) {
                if (getSetting('upload_gui') == 'js' && getSetting('homepage_style') !== 'route_upload') {
                    $createAlbumTag = 'button';
                    $createAlbumAttr = 'data-trigger="anywhere-upload-input" data-action="upload-to-album" title="' . _s('Upload to album') . ' (P)"';
                } else {
                    $createAlbumTag = 'a';
                    $createAlbumAttr = 'href="' . get_base_url(sprintf('upload/?toAlbum=%s', Handler::var('album')['id_encoded'])) . '"';
                } ?>
				<<?php echo $createAlbumTag; ?> class="btn btn-small default" <?php echo $createAlbumAttr; ?>><span class="btn-icon fas fa-cloud-upload-alt"></span></<?php echo $createAlbumTag; ?>>
			<?php
            }
            ?>
            <?php
            if (getSetting('theme_show_social_share')) {
                ?>
				<a class="btn btn-small default" data-action="share" title="<?php _se('Share'); ?> (S)"><span class="btn-icon fas fa-share-alt"></span></a>
			<?php
            }
            ?>
            <?php
            if (getSetting('enable_likes')) {
                ?>
				<a title="<?php _se('Like'); ?> (L)" class="btn-like" data-type="album" data-id="<?php echo Handler::var('album')['id_encoded']; ?>" data-liked="<?php echo (int) (Handler::var('album')['liked'] ?? '0'); ?>">
					<span data-action="like" class="btn btn-small default btn-liked" rel="tooltip" title="<?php _se("You like this"); ?>"><span class="btn-icon fas fa-heart"></span><span class="btn-text" data-text="likes-count"><?php echo Handler::var('album')['likes']; ?></span></span>
					<span class="btn btn-small default btn-unliked" data-action="like"><span class="btn-icon far fa-heart"></span><span class="btn-text" data-text="likes-count"><?php echo Handler::var('album')['likes']; ?></span></span>
				</a>
			<?php
            }
            ?>
		</div>
	</div>
    <div class="header margin-bottom-10">
<?php
if(Handler::var('breadcrumbs') !== []) {
    $breadcrumbs = require_theme_file_return('snippets/breadcrumbs');
    echo '<div class="margin-bottom-5">';
    echo $breadcrumbs(Handler::var('breadcrumbs'));
    echo '</div>';
}
?>
        <h1 class="header-title phone-float-none viewer-title">
            <a data-text="album-name" href="<?php echo Handler::var('album')["url"]; ?>"><?php echo Handler::var('album')["name_html"]; ?></a>
        </h1>
    </div>
    <div class="description-meta margin-bottom-10 overflow-auto">
        <div class="header-content-left">
            <span class="icon far fa-eye-slash <?php if (Handler::var('album')["privacy"] == "public") {
                echo "soft-hidden";
            } ?>" data-content="privacy-private" title="<?php _se('This content is private'); ?>" rel="tooltip"></span>
           <span class="fas fa-photo-film"></span> <span data-text="image-count"><?php echo Handler::var('album')["image_count"]; ?></span> <span data-text="image-label" data-label-single="<?php _ne('file', 'files', 1); ?>" data-label-plural="<?php _ne('file', 'files', 20); ?>"><?php _ne('file', 'files', Handler::var('album')['image_count']); ?></span> — <?php echo '<span title="' . Handler::var('album')['date_fixed_peer'] . '">' . time_elapsed_string(Handler::var('album')['date_gmt']) . '</span>'; ?> — <span class="far fa-views"></span><?php echo Handler::var('album')['views']; ?> <?php echo Handler::var('album')['views_label']; ?>
        </div>
    </div>
<?php
$tags = require_theme_file_return('snippets/tags_filter');
echo $tags(Handler::var('tags_display'), Handler::var('tags_active'));
?>
	<?php show_banner('album_after_header', Handler::var('listing')->sfw()); ?>
    <div class="description-meta margin-bottom-10 hide-empty" data-text="album-description"><?php echo nl2br(trim(Handler::var('album_safe_html')['description'] ?? '')); ?></div>
</div>

<div class="top-sub-bar follow-scroll margin-bottom-5">
    <div class="content-width">
        <div class="header header-tabs no-select">
            <?php require_theme_file("snippets/tabs"); ?>
            <?php
            if (Handler::cond('owner') || Handler::cond('content_manager')) {
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
    <div id="content-listing-tabs" class="tabbed-listing">
		<div id="tabbed-content-group">
			<?php
            require_theme_file("snippets/listing");
            ?>
			<?php if (isShowEmbedContent()) {
                ?>
				<div id="tab-embeds" class="tabbed-content padding-10">
						<div class="content-listing-loading"></div>
						<div id="embed-codes" class="input-label margin-bottom-0 margin-top-0 soft-hidden">
							<label for="album-embed-toggle"><?php _se('Embed codes'); ?></label>
							<div class="c8 margin-bottom-10">
								<select name="album-embed-toggle" id="album-embed-toggle" class="text-input" data-combo="album-embed-toggle-combo">
									<?php
                                    foreach (get_global('embed_share_tpl') as $key => $value) {
                                        echo '<optgroup label="' . $value['label'] . '">' . "\n";
                                        foreach ($value['options'] as $k => $v) {
                                            echo '	<option value="' . $k . '" data-size="' . $v["size"] . '">' . $v["label"] . '</option>' . "\n";
                                        }
                                        echo '</optgroup>';
                                    } ?>
								</select>
							</div>
							<div id="album-embed-toggle-combo" class="position-relative">
								<?php
                                $i = 0;
                foreach (get_global('embed_share_tpl') as $key => $value) {
                    foreach ($value['options'] as $k => $v) {
                        echo '<div data-combo-value="' . $k . '" class="switch-combo' . ($i > 0 ? " soft-hidden" : "") . '">
										<textarea id="album-embed-code-' . $i . '" class="r8 resize-vertical" name="' . $k . '" data-size="' . $v["size"] . '" data-focus="select-all"></textarea>
										<button type="button" class="input-action" data-action="copy" data-action-target="#album-embed-code-' . $i . '"><i class="far fa-copy"></i> ' . _s('copy') . '</button>
									</div>' . "\n";
                        $i++;
                    }
                } ?>
							</div>
						</div>
				</div>
			<?php
            } ?>
			<?php
            if (Handler::cond('admin')) {
                ?>
				<div id="tab-info" class="tabbed-content padding-10<?php if (Handler::var('current_tab') === 'tab-info') {
                    echo ' visible';
                } ?>">
					<?php echo arr_printer(Handler::var('album_safe_html'), '<li><div class="c4 display-table-cell padding-right-10 font-weight-bold">%K</div> <div class="display-table-cell">%V</div></li>', ['<ul class="tabbed-content-list table-li">', '</ul>']); ?>
				</div>
			<?php
            }
            ?>
		</div>
	</div>
</div>
<?php if (Handler::cond('content_manager')) { ?>
<script>
document.addEventListener("DOMContentLoaded", function() {
    CHV.fn.ctaForm.enable = <?php echo Handler::var('album')['cta_enable']; ?>;
    CHV.fn.ctaForm.array = <?php echo Handler::var('album')['cta']; ?>;
});
</script>
<?php
            } ?>
<?php
if (Handler::cond('content_manager') || Handler::cond('owner')) {
                require_theme_file('snippets/modal_edit_album');
                require_theme_file('snippets/modal_create_sub_album');
            }
?>
<?php if (Handler::cond('content_manager') and isset(request()["deleted"])) { ?>
<script>
document.addEventListener("DOMContentLoaded", function() {
    PF.fn.growl.call("<?php _se('The %s has been deleted.', _s('album')); ?>");
});
</script>
<?php } ?>
<?php if (Handler::var('current_tab') === 'tab-embeds') { ?>
<script>
document.addEventListener("DOMContentLoaded", function() {
    CHV.fn.album.showEmbedCodes();
})
</script>
<?php } ?>
<?php require_theme_footer(); ?>
