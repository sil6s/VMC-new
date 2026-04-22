<?php
/**
 * Template Name: Patient Portal / Online Booking Page
 */

get_header();

$h1         = get_field( 'portal_h1' ) ?: 'Northern Kentucky & Cincinnati Patient Portal and Online Booking';
$intro      = get_field( 'portal_intro' ) ?: 'Welcome to the Veterinary Medical Center patient portal and online booking page for Northern Kentucky and Cincinnati pet families.';
$link_label = get_field( 'portal_external_link_label' ) ?: 'Open Patient Portal & Online Booking';
$link_url   = get_field( 'portal_external_link_url' ) ?: vmc_get( 'vmc_portal_url', 'https://tvmcft.use1.ezyvet.com/external/portal/main/login?id=2' );
$body       = get_field( 'portal_body' );
?>
<section class="np-sec np-sec--cream">
  <div class="services-shell" style="max-width:1060px;margin:0 auto;padding:76px 24px;">
    <div class="sec-eye"><span class="sec-lbl">Patient Portal</span><span class="sec-rule"></span></div>
    <h1 class="sec-h2" style="margin-top:14px;"><?php echo esc_html( $h1 ); ?></h1>
    <p style="max-width:76ch;line-height:1.9;color:var(--mid);"><?php echo esc_html( $intro ); ?></p>
    <div style="display:flex;gap:12px;flex-wrap:wrap;margin:24px 0 34px;">
      <a class="btn-red" href="<?php echo esc_url( $link_url ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $link_label ); ?></a>
      <a class="btn-ghost" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Need Help? Contact Us</a>
    </div>
    <div class="np-card" style="padding:28px;">
      <?php
      if ( $body ) {
          echo wp_kses_post( $body );
      } else {
          echo '<p>Use the button above to open the secure patient portal.</p>';
      }
      ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>
