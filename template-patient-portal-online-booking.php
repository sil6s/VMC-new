<?php
/**
 * Template Name: Patient Portal / Online Booking Page
 */

get_header();

$h1           = get_field( 'portal_h1' ) ?: 'Northern Kentucky & Cincinnati Patient Portal and Online Booking';
$intro        = get_field( 'portal_intro' ) ?: 'Welcome to the Veterinary Medical Center patient portal and online booking page for Northern Kentucky and Cincinnati pet families.';
$link_label   = get_field( 'portal_external_link_label' ) ?: 'Open Patient Portal & Online Booking';
$link_url     = get_field( 'portal_external_link_url' ) ?: vmc_get( 'vmc_portal_url', 'https://tvmcft.use1.ezyvet.com/external/portal/main/login?id=2' );
$body         = get_field( 'portal_body' );
$ft_phone     = vmc_get( 'vmc_ft_phone', '(859) 442-4420' );
$ind_phone    = vmc_get( 'vmc_ind_phone', '(859) 356-2242' );
$ft_address   = vmc_get( 'vmc_ft_address', '2000 Memorial Parkway, Fort Thomas, KY 41075' );
$ind_address  = vmc_get( 'vmc_ind_address', '4147 Madison Pike, Independence, KY 41051' );
$ft_map_query = rawurlencode( $ft_address );
$ind_map_query = rawurlencode( $ind_address );
?>

<style>
.portal-page{background:var(--cream)}
.portal-hero{display:grid;grid-template-columns:minmax(0,1.05fr) minmax(0,.95fr);min-height:640px}
.portal-copy{padding:110px 68px 70px}
.portal-side{background:var(--warm);padding:110px 52px 68px 28px;display:flex;align-items:center}
.portal-card,.portal-panel,.portal-map-card{background:var(--white);border:1px solid rgba(0,0,0,.07);border-radius:8px;box-shadow:0 20px 56px rgba(0,0,0,.06)}
.portal-toc{display:flex;flex-wrap:wrap;gap:10px;margin-top:18px}
.portal-toc a{display:inline-flex;align-items:center;min-height:36px;padding:8px 12px;border-radius:8px;background:var(--cream);border:1px solid rgba(0,0,0,.08);font-size:13px;color:var(--mid);text-decoration:none}
.portal-panel{padding:28px}
.portal-panel h2,.portal-card h2,.portal-map-card h3{font-family:'Playfair Display',serif;color:var(--dark)}
.portal-panel p,.portal-card p,.portal-card li,.portal-map-card p{font-size:14.5px;line-height:1.84;color:var(--mid)}
.portal-actions{display:flex;gap:12px;flex-wrap:wrap;margin-top:24px}
.portal-list{margin:18px 0 0;padding:0;list-style:none}
.portal-list li{padding:11px 0;border-bottom:1px solid rgba(0,0,0,.08)}
.portal-list li:last-child{border-bottom:none}
.portal-sec{padding:86px var(--pad)}
.portal-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:22px;margin-top:28px}
.portal-grid-3{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:18px;margin-top:24px}
.portal-card{padding:30px}
.portal-map{display:block;width:100%;height:280px;border:0;background:var(--cream)}
.portal-map-body{padding:22px}
.portal-map-meta{display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-top:14px}
.portal-map-meta div{background:var(--cream);border:1px solid rgba(0,0,0,.05);border-radius:8px;padding:12px}
.portal-map-meta strong{display:block;font-size:12px;letter-spacing:.12em;text-transform:uppercase;color:var(--gold);margin-bottom:4px}
.portal-map-meta a,.portal-map-meta span{font-size:13px;color:var(--mid)}
.portal-copy-body h2,.portal-copy-body h3{font-family:'Playfair Display',serif;color:var(--dark)}
.portal-copy-body a{color:var(--red);font-weight:700}
.portal-step{background:var(--white);border:1px solid rgba(0,0,0,.08);border-radius:8px;padding:22px}
.portal-step .num{display:inline-flex;width:30px;height:30px;border-radius:999px;background:var(--red);color:#fff;align-items:center;justify-content:center;font-weight:700;margin-bottom:10px}
.portal-faq details{background:var(--white);border:1px solid rgba(0,0,0,.08);border-radius:8px;padding:0 18px;margin-top:10px}
.portal-faq summary{cursor:pointer;padding:18px 0;font-weight:700;color:var(--dark)}
.portal-faq p{padding:0 0 18px;margin:0}
@media(max-width:1100px){
  .portal-hero,.portal-grid{grid-template-columns:1fr}
  .portal-copy{padding:82px 24px 34px}
  .portal-side{padding:0 24px 56px}
}
@media(max-width:700px){
  .portal-sec{padding:56px 24px}
  .portal-map-meta{grid-template-columns:1fr}
  .portal-grid-3{grid-template-columns:1fr}
}
</style>

<div class="portal-page">
  <section class="portal-hero">
    <div class="portal-copy">
      <div class="eyebrow"><span class="eyebrow-dash"></span>Patient Portal &amp; Booking</div>
      <h1 class="hero-h1" style="max-width:15ch"><?php echo esc_html( $h1 ); ?></h1>
      <p class="hero-body" style="max-width:66ch"><?php echo esc_html( $intro ); ?></p>
      <div class="portal-actions">
        <a class="btn-red" href="<?php echo esc_url( $link_url ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $link_label ); ?></a>
        <button class="btn-ghost" onclick="openAptModal('portal-page-hero')">Request Appointment</button>
      </div>
      <div class="portal-toc">
        <a href="#portal-steps">How it works</a>
        <a href="#portal-support">Location support</a>
        <a href="#portal-seo">Portal guide</a>
      </div>
    </div>
    <aside class="portal-side">
      <div class="portal-panel rv">
        <h2>Fast next steps for Northern Kentucky and Cincinnati pet families.</h2>
        <p>Use this page whenever you need the secure patient portal, online booking access, registration links, or direct team support.</p>
        <ul class="portal-list">
          <li><a href="<?php echo esc_url( $link_url ); ?>" target="_blank" rel="noopener">Open patient portal login</a></li>
          <li><a href="<?php echo esc_url( home_url( '/new-patient-registration-form/' ) ); ?>">Complete new patient registration</a></li>
          <li><a href="<?php echo esc_url( vmc_online_pharmacy_page_url() ); ?>">Visit online vet pharmacy</a></li>
          <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact VMC for portal help</a></li>
        </ul>
      </div>
    </aside>
  </section>

  <section class="portal-sec" style="background:var(--warm)" id="portal-steps">
    <div class="rv">
      <div class="sec-eye"><span class="sec-lbl">How It Works</span><span class="sec-rule"></span></div>
      <h2 class="sec-h2">Simple online booking in three steps.</h2>
      <div class="portal-grid-3">
        <article class="portal-step"><span class="num">1</span><h3>Open the secure portal</h3><p>Use the primary button on this page to open the official patient portal and online booking system.</p></article>
        <article class="portal-step"><span class="num">2</span><h3>Choose the right appointment</h3><p>Select visit type, preferred location, and your ideal schedule window for faster team review.</p></article>
        <article class="portal-step"><span class="num">3</span><h3>Call if you need help</h3><p>If something is unclear, call Fort Thomas or Independence and our team will guide next steps.</p></article>
      </div>
    </div>
  </section>

  <section class="portal-sec" style="background:var(--white)" id="portal-support">
    <div class="rv">
      <div class="sec-eye"><span class="sec-lbl">Location Support</span><span class="sec-rule"></span></div>
      <h2 class="sec-h2">Call either location while using online booking.</h2>
      <div class="portal-grid">
        <article class="portal-map-card">
          <iframe class="portal-map" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://maps.google.com/maps?q=<?php echo esc_attr( $ft_map_query ); ?>&z=15&output=embed" title="Map to Veterinary Medical Center Fort Thomas"></iframe>
          <div class="portal-map-body">
            <h3>Fort Thomas</h3>
            <p><?php echo esc_html( $ft_address ); ?></p>
            <div class="portal-map-meta">
              <div><strong>Call</strong><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $ft_phone ) ); ?>"><?php echo esc_html( $ft_phone ); ?></a></div>
              <div><strong>Directions</strong><a href="https://maps.google.com/?q=<?php echo esc_attr( $ft_map_query ); ?>" target="_blank" rel="noopener">Get Directions</a></div>
            </div>
          </div>
        </article>
        <article class="portal-map-card">
          <iframe class="portal-map" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://maps.google.com/maps?q=<?php echo esc_attr( $ind_map_query ); ?>&z=15&output=embed" title="Map to Veterinary Medical Center Independence"></iframe>
          <div class="portal-map-body">
            <h3>Independence</h3>
            <p><?php echo esc_html( $ind_address ); ?></p>
            <div class="portal-map-meta">
              <div><strong>Call</strong><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $ind_phone ) ); ?>"><?php echo esc_html( $ind_phone ); ?></a></div>
              <div><strong>Directions</strong><a href="https://maps.google.com/?q=<?php echo esc_attr( $ind_map_query ); ?>" target="_blank" rel="noopener">Get Directions</a></div>
            </div>
          </div>
        </article>
      </div>
    </div>
  </section>

  <section class="portal-sec" style="background:var(--warm)" id="portal-seo">
    <div class="rv">
      <div class="portal-card portal-copy-body">
        <div class="sec-eye"><span class="sec-lbl">Portal Guide</span><span class="sec-rule"></span></div>
        <?php
        if ( $body ) {
            echo wp_kses_post( $body );
        } else {
            echo '<h2>Secure online booking and portal access</h2><p>Use the button above to open the secure patient portal and online booking site.</p>';
        }
        ?>
        <div class="portal-faq">
          <details open>
            <summary>Can new patients use online booking?</summary>
            <p>Yes. Start with online booking, then complete the <a href="<?php echo esc_url( home_url( '/new-patient-registration-form/' ) ); ?>">new patient registration form</a> before your visit.</p>
          </details>
          <details>
            <summary>What if I cannot log in to the portal?</summary>
            <p>Use the contact link or call either location for immediate help. We can walk you through portal access and next appointment steps.</p>
          </details>
        </div>
      </div>
    </div>
  </section>
</div>

<?php get_footer(); ?>
