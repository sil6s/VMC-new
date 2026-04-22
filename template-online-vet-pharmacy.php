<?php
/**
 * Template Name: Online Vet Pharmacy Page
 */

get_header();

$h1         = get_field( 'pharmacy_h1' ) ?: 'Northern Kentucky & Cincinnati Online Vet Pharmacy';
$intro      = get_field( 'pharmacy_intro' ) ?: 'Use our Northern Kentucky and Cincinnati online vet pharmacy page to request refills and browse trusted products.';
$link_label = get_field( 'pharmacy_external_link_label' ) ?: 'Open Online Vet Pharmacy';
$link_url   = get_field( 'pharmacy_external_link_url' ) ?: vmc_get( 'vmc_pharmacy_url', 'https://nky-vet.ourvet.com/' );
$body       = get_field( 'pharmacy_body' );
?>
<section class="np-sec np-sec--white">
  <div class="services-shell" style="max-width:1060px;margin:0 auto;padding:76px 24px;">
    <div class="sec-eye"><span class="sec-lbl">Online Pharmacy</span><span class="sec-rule"></span></div>
    <h1 class="sec-h2" style="margin-top:14px;"><?php echo esc_html( $h1 ); ?></h1>
    <p style="max-width:76ch;line-height:1.9;color:var(--mid);"><?php echo esc_html( $intro ); ?></p>
    <div style="display:flex;gap:12px;flex-wrap:wrap;margin:24px 0 34px;">
      <a class="btn-red" href="<?php echo esc_url( $link_url ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $link_label ); ?></a>
      <a class="btn-ghost" href="<?php echo esc_url( vmc_patient_portal_page_url() ); ?>">Patient Portal & Booking</a>
    </div>
    <div class="np-card" style="padding:28px;">
      <?php
      if ( $body ) {
          echo wp_kses_post( $body );
      } else {
          echo '<p>Use the button above to open the secure online pharmacy.</p>';
      }
      ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>
