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
$hero_image = get_field( 'portal_hero_image' ) ?: get_template_directory_uri() . '/assets/images/VMC Social Media.jpg';
$hero_alt   = get_field( 'portal_hero_image_alt' ) ?: 'Northern Kentucky and Cincinnati patient portal and online booking support at Veterinary Medical Center';
?>
<section class="np-sec np-sec--cream">
  <div class="services-shell" style="max-width:1060px;margin:0 auto;padding:76px 24px;">
    <div class="sec-eye"><span class="sec-lbl">Patient Portal</span><span class="sec-rule"></span></div>
    <h1 class="sec-h2" style="margin-top:14px;"><?php echo esc_html( $h1 ); ?></h1>
    <p style="max-width:76ch;line-height:1.9;color:var(--mid);"><?php echo esc_html( $intro ); ?></p>
    <img src="<?php echo esc_url( $hero_image ); ?>" alt="<?php echo esc_attr( $hero_alt ); ?>" style="width:100%;max-height:440px;object-fit:cover;border-radius:8px;margin:20px 0 0;" loading="eager">
    <div style="display:flex;gap:12px;flex-wrap:wrap;margin:24px 0 34px;">
      <a class="btn-red" href="<?php echo esc_url( $link_url ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $link_label ); ?></a>
      <a class="btn-ghost" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Need Help? Contact Us</a>
    </div>
    <div class="np-card" style="padding:24px;margin-bottom:24px;">
      <h2 style="margin-top:0;">On this page</h2>
      <ul>
        <li><a href="#portal-steps">How to use the patient portal and online booking</a></li>
        <li><a href="#portal-benefits">Why Northern Kentucky and Cincinnati pet owners use this page</a></li>
        <li><a href="#portal-help">If you need help with login or appointment requests</a></li>
      </ul>
    </div>
    <div id="portal-steps" class="np-card" style="padding:28px;margin-bottom:24px;">
      <h2>How to use patient portal and online booking in Northern Kentucky and Cincinnati</h2>
      <p>Use the red button on this page to open the secure patient portal and online booking platform. This page is intentionally built as your single source for portal access so you do not have to search through old emails or outdated bookmarks. Families across Northern Kentucky and Cincinnati can return here to request visits, complete next steps, and sign in with confidence.</p>
      <p>The process is simple: open the portal, sign in, choose the appropriate appointment path, and submit your request. If your pet needs urgent guidance during business hours, call us directly from our <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">contact page</a> while also using this portal for follow-up planning. If you are new to Veterinary Medical Center, please review our <a href="<?php echo esc_url( home_url( '/new-patients/' ) ); ?>">new patient information</a> and complete the <a href="<?php echo esc_url( home_url( '/new-patient-registration-form/' ) ); ?>">new patient registration form</a> before your first appointment.</p>
    </div>
    <div id="portal-benefits" class="np-card" style="padding:28px;margin-bottom:24px;">
      <h2>Why this patient portal and online booking page works better</h2>
      <p>When pet owners search for a “Northern Kentucky and Cincinnati patient portal and online booking” page, they usually need speed and clarity. This page is designed for that real-world need. We keep one direct destination, one trusted URL, and one clear call to action for clients who want to move quickly from reminder to appointment request.</p>
      <p>Centralizing portal access reduces friction for busy households. It also helps families coordinating care for multiple pets. Instead of saving different links on different devices, everyone can use this page as the shared starting point. That consistency improves communication and keeps preventive care schedules on track.</p>
      <p>For broader pet-owner education, we also recommend <a href="https://www.avma.org/resources-tools/pet-owners" target="_blank" rel="noopener">AVMA pet owner resources</a> and <a href="https://www.aaha.org/pet-owner-resources/" target="_blank" rel="noopener">AAHA pet owner guidance</a>.</p>
    </div>
    <div id="portal-help" class="np-card" style="padding:28px;">
      <h2>If you need help with patient portal login or booking</h2>
      <p>If you are unsure which appointment type to request, contact our team first and we will help you choose the right path. If a login issue appears, use this page again to confirm you are on the official portal URL. You can also keep this page bookmarked as your permanent patient portal and online booking home for Northern Kentucky and Cincinnati care coordination.</p>
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
