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
$hero_image = get_field( 'pharmacy_hero_image' ) ?: get_template_directory_uri() . '/assets/images/about-independence.jpg';
$hero_alt   = get_field( 'pharmacy_hero_image_alt' ) ?: 'Northern Kentucky and Cincinnati online vet pharmacy resource for pet owners';
?>
<section class="np-sec np-sec--white">
  <div class="services-shell" style="max-width:1060px;margin:0 auto;padding:76px 24px;">
    <div class="sec-eye"><span class="sec-lbl">Online Pharmacy</span><span class="sec-rule"></span></div>
    <h1 class="sec-h2" style="margin-top:14px;"><?php echo esc_html( $h1 ); ?></h1>
    <p style="max-width:76ch;line-height:1.9;color:var(--mid);"><?php echo esc_html( $intro ); ?></p>
    <img src="<?php echo esc_url( $hero_image ); ?>" alt="<?php echo esc_attr( $hero_alt ); ?>" style="width:100%;max-height:440px;object-fit:cover;border-radius:8px;margin:20px 0 0;" loading="eager">
    <div style="display:flex;gap:12px;flex-wrap:wrap;margin:24px 0 34px;">
      <a class="btn-red" href="<?php echo esc_url( $link_url ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $link_label ); ?></a>
      <a class="btn-ghost" href="<?php echo esc_url( vmc_patient_portal_page_url() ); ?>">Patient Portal & Booking</a>
    </div>
    <div class="np-card" style="padding:24px;margin-bottom:24px;">
      <h2 style="margin-top:0;">On this pharmacy page</h2>
      <ul>
        <li><a href="#pharm-how">How to use our online vet pharmacy</a></li>
        <li><a href="#pharm-safety">Medication safety and refill timing tips</a></li>
        <li><a href="#pharm-links">Helpful local and national resources</a></li>
      </ul>
    </div>
    <div id="pharm-how" class="np-card" style="padding:28px;margin-bottom:24px;">
      <h2>Northern Kentucky and Cincinnati online vet pharmacy access made simple</h2>
      <p>This page exists to give pet owners one reliable destination for online pharmacy ordering. When families search for a “Northern Kentucky / Cincinnati online vet pharmacy,” they are often trying to refill medication quickly and avoid outdated links. We built this page to solve that issue with a direct button to the official pharmacy platform.</p>
      <p>Use the pharmacy button for eligible refills, prevention products, and home-delivery options. If your pet needs an exam or treatment update before a refill can be approved, you can request care through our <a href="<?php echo esc_url( vmc_patient_portal_page_url() ); ?>">patient portal and online booking page</a> or contact us directly for guidance.</p>
    </div>
    <div id="pharm-safety" class="np-card" style="padding:28px;margin-bottom:24px;">
      <h2>Medication safety tips for online vet pharmacy orders</h2>
      <p>Online convenience should always stay connected to veterinary oversight. Before placing an order, verify your pet’s current weight, species, and medication history. If anything has changed since the last refill, please check in with our team so we can confirm the safest option.</p>
      <p>For parasite prevention and chronic-condition medications, set reminder intervals so orders arrive before doses run out. This helps prevent treatment gaps and keeps long-term plans consistent. For additional medication education, review <a href="https://www.fda.gov/animal-veterinary/animal-health-literacy/fda-and-pet-medications" target="_blank" rel="noopener">FDA pet medication guidance</a>.</p>
    </div>
    <div id="pharm-links" class="np-card" style="padding:28px;">
      <h2>Helpful links for pet owners in Northern Kentucky and Cincinnati</h2>
      <p>Need broader care planning? Explore our <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">veterinary services</a>, connect with our team on the <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">contact page</a>, and review preparation tips on the <a href="<?php echo esc_url( home_url( '/new-patients/' ) ); ?>">new patients page</a>. These internal resources help you pair online pharmacy convenience with complete in-clinic follow-through.</p>
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
