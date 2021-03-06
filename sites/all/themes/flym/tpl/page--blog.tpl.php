<?php
if (isset($node)) {
    $node_type = $node->type;
    $nid = $node->nid;
} else {
    $node_type = '';
    $nid = '';
}
if (isset($node->field_subtitle) && !empty($node->field_subtitle)) {
    $subtitle = $node->field_subtitle['und'][0]['value'];
} else {
    $subtitle = "";
}
?>

<?php require_once(drupal_get_path('theme', 'flym') . '/tpl/header.tpl.php'); ?>
<div class="section-wrapper">
    <?php require_once(drupal_get_path('theme', 'flym') . '/tpl/mobi-menu.php'); ?>
    <div class="move-wrapper">
        <?php if (arg(0) != 'node') { ?>

            <?php if (theme_get_setting('disable_blog_title', 'flym') == 1): ?>
                <?php
                $title = theme_get_setting('blog_title', 'flym');
                if ($title == "")
                    $title = drupal_get_title();
                ?>
                <section class="inner-banner" id="top">
                    <div class="w-container fixed-container">
                        <div class="algin-center">
                            <h1 class="inner-sub" data-ix="move-3"><span class="domote"><?php print $site_name; ?>.</span>&nbsp;<?php print $title; ?></h1>
                            <div class="tst-txt tst-ban" data-ix="move-3"><?php print theme_get_setting('blog_subtitle', 'flym'); ?></div>
                        </div>
                    </div>
                </section>

            <?php endif; ?>
            <?php if ($page['content']): ?>
                <?php
                if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
                    print render($tabs);
                endif;
                print $messages;
                ?>
                <section class="section s-b blog-s-b" >
                    <div class="w-row blog-content">
        <?php print render($page['content']); ?>
                    </div>
                </section>
            <?php endif; ?>	
<?php }else { ?>
            <!-- start service page -->
            <section class="inner-banner" id="top">
                <div class="w-container fixed-container">
                    <div class="algin-center">
                        <h1 class="inner-sub" data-ix="move-3"><span class="domote"><?php print $site_name; ?>.</span>&nbsp;<?php print drupal_get_title(); ?></h1>
                        <div class="tst-txt tst-ban" data-ix="move-3"><?php print $subtitle; ?></div>
                    </div>
                </div>
            </section>
            <?php if ($page['content']): ?>
                <?php
                if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
                    print render($tabs);
                endif;
                print $messages;
                ?>

                <?php print render($page['content']); ?>

            <?php endif; ?>	
        <?php } ?>
        <?php if ($page['section']): ?>
            <?php print render($page['section']); ?>
<?php endif; ?>
    </div>
</div>

