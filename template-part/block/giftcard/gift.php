<?php
/**
 * blockname Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'c-giftcard-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'c-giftcard';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
if( $is_preview ) {
    $className .= ' is-admin';
}

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
<div class="c-taco-illustration"><img  src="<?php bloginfo( 'template_url' ) ?>/img/taco.png" alt="taco illustration" /></div>
<div class="c-tacolove-illustration"><img  src="<?php bloginfo( 'template_url' ) ?>/img/taco_love.png" alt="tacolove text illustration" /></div>
    <div class="c-giftcard__inner">
        <div class="c-giftcard__content">
            <?php if( get_field('title') ) { echo '<h2>' . get_field('title') . '</h2>'; }?>
            <?php if( get_field('description') ) { echo '<p>' . get_field('description') . '</p>'; }?>
        </div>
        <a class="c-btn-yellow" href="https://www.toasttab.com/cincos-cantina-epping/giftcards?utm_source=undefined&utm_content=online--cincos-cantina-epping&utm_medium=toast_sites&utm_campaign=giftcards">Give a Gift</a>
    </div>
</div>

