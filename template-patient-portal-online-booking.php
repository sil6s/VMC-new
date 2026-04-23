<?php
/**
 * Template Name: Patient Portal / Online Booking Page
 */

get_header();

$h1            = get_field( 'portal_h1' ) ?: 'Access Your Pet\'s Portal, Book Appointments, or Order Medications';
$intro         = get_field( 'portal_intro' ) ?: 'Use this page to manage the vet patient portal Northern Kentucky families rely on, start online vet booking Fort Thomas and Independence pet owners need, and quickly reach medication refill tools.';
$link_url      = get_field( 'portal_external_link_url' ) ?: vmc_get( 'vmc_portal_url', 'https://tvmcft.use1.ezyvet.com/external/portal/main/login?id=2' );
$body          = get_field( 'portal_body' );
$ft_phone      = vmc_get( 'vmc_ft_phone', '(859) 442-4420' );
$ind_phone     = vmc_get( 'vmc_ind_phone', '(859) 356-2242' );
$ft_address    = vmc_get( 'vmc_ft_address', '2000 Memorial Parkway, Fort Thomas, KY 41075' );
$ind_address   = vmc_get( 'vmc_ind_address', '4147 Madison Pike, Independence, KY 41051' );
$ft_map_query  = rawurlencode( $ft_address );
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
.portal-panel h4{font-size:13px;letter-spacing:.1em;text-transform:uppercase;color:var(--gold);margin:18px 0 8px}
.portal-panel p,.portal-card p,.portal-card li,.portal-map-card p{font-size:14.5px;line-height:1.84;color:var(--mid)}
.portal-actions{display:flex;gap:12px;flex-wrap:wrap;margin-top:24px}
.portal-list{margin:0;padding:0;list-style:none}
.portal-list li{padding:9px 0;border-bottom:1px solid rgba(0,0,0,.08)}
.portal-list li:last-child{border-bottom:none}
.portal-sec{padding:86px var(--pad)}
.portal-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:22px;margin-top:28px}
.portal-grid-3{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:18px;margin-top:24px}
.portal-card{padding:30px}
.portal-map{display:block;width:100%;height:240px;border:0;background:var(--cream)}
.portal-map-body{padding:22px}
.portal-map-meta{display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-top:14px}
.portal-map-meta div{background:var(--cream);border:1px solid rgba(0,0,0,.05);border-radius:8px;padding:12px}
.portal-map-meta strong{display:block;font-size:12px;letter-spacing:.12em;text-transform:uppercase;color:var(--gold);margin-bottom:4px}
.portal-map-meta a,.portal-map-meta span{font-size:13px;color:var(--mid)}
.portal-copy-body h2,.portal-copy-body h3{font-family:'Playfair Display',serif;color:var(--dark)}
.portal-copy-body a{color:var(--red);font-weight:700}
.portal-step{background:var(--white);border:1px solid rgba(0,0,0,.08);border-radius:8px;padding:22px}
.portal-step .num{display:inline-flex;width:30px;height:30px;border-radius:999px;background:var(--red);color:#fff;align-items:center;justify-content:center;font-weight:700;margin-bottom:10px}
.portal-step small{display:block;margin-top:8px;font-size:12px;color:var(--gold);letter-spacing:.06em;text-transform:uppercase}
.portal-faq details{background:var(--white);border:1px solid rgba(0,0,0,.08);border-radius:8px;padding:0 18px;margin-top:10px}
.portal-faq summary{cursor:pointer;padding:18px 0;font-weight:700;color:var(--dark)}
.portal-faq p{padding:0 0 18px;margin:0}
.portal-note{margin-top:10px;font-size:13px;line-height:1.7;color:var(--mid)}
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
      <h1 class="hero-h1" style="max-width:14ch"><?php echo esc_html( $h1 ); ?></h1>
      <p class="hero-body" style="max-width:66ch"><?php echo esc_html( $intro ); ?></p>
      <div class="portal-actions">
        <a class="btn-red" href="<?php echo esc_url( $link_url ); ?>" target="_blank" rel="noopener">Open Patient Portal</a>
        <button class="btn-ghost" onclick="openAptModal('portal-page-hero')">Book Appointment Online</button>
        <a class="btn-outline" href="<?php echo esc_url( vmc_online_pharmacy_page_url() ); ?>">Order Medications Online</a>
      </div>
      <p class="portal-note">Secure portal login, simple online steps, and local clinic support if you get stuck.</p>
      <div class="portal-toc">
        <a href="#portal-steps">How it works</a>
        <a href="#portal-support">Need local help?</a>
        <a href="#portal-seo">Portal guide + FAQ</a>
      </div>
    </div>
    <aside class="portal-side">
      <div class="portal-panel rv">
        <h2>Choose the right action in one minute.</h2>
        <p>Use this panel when you need to prioritize the next step quickly.</p>

        <h4>Primary actions</h4>
        <ul class="portal-list">
          <li><a href="<?php echo esc_url( $link_url ); ?>" target="_blank" rel="noopener">Open patient portal login</a></li>
          <li><button class="btn-red" style="width:100%;justify-content:center" onclick="openAptModal('portal-page-panel')">Book appointment online</button></li>
        </ul>

        <h4>Secondary actions</h4>
        <ul class="portal-list">
          <li><a href="<?php echo esc_url( home_url( '/new-patient-registration-form/' ) ); ?>">Complete new patient registration</a></li>
          <li><a href="<?php echo esc_url( vmc_online_pharmacy_page_url() ); ?>">Order medications and refills online</a></li>
        </ul>

        <h4>Support actions</h4>
        <ul class="portal-list">
          <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact VMC for login or booking help</a></li>
        </ul>
      </div>
    </aside>
  </section>

  <section class="portal-sec" style="background:var(--warm)" id="portal-steps">
    <div class="rv">
      <div class="sec-eye"><span class="sec-lbl">How It Works</span><span class="sec-rule"></span></div>
      <h2 class="sec-h2">Clear online booking and portal steps.</h2>
      <div class="portal-grid-3">
        <article class="portal-step"><span class="num">1</span><h3>Open the secure portal</h3><p>Select Open Patient Portal to log in, view records, and manage appointment requests. This is the main vet patient portal Northern Kentucky clients use for day-to-day account access.</p><small>Takes less than 2 minutes</small></article>
        <article class="portal-step"><span class="num">2</span><h3>Submit booking details</h3><p>Choose visit type, location, and a preferred time window. New families can begin booking first and complete registration afterward if needed.</p><small>No account needed to start booking</small></article>
        <article class="portal-step"><span class="num">3</span><h3>Get confirmation and next steps</h3><p>Our team reviews requests and follows up with timing, records needs, and preparation notes. If your concern is urgent, call directly so we can triage faster.</p><small>Local team follow-up</small></article>
      </div>
    </div>
  </section>

  <section class="portal-sec" style="background:var(--white)" id="portal-support">
    <div class="rv">
      <div class="sec-eye"><span class="sec-lbl">Need Help?</span><span class="sec-rule"></span></div>
      <h2 class="sec-h2">Need help? Contact a local clinic.</h2>
      <p class="hero-body" style="max-width:70ch">Use online tools for routine requests. Call a clinic when your pet is uncomfortable, symptoms are worsening, or you need same-day guidance.</p>
      <div class="portal-grid">
        <article class="portal-map-card">
          <iframe class="portal-map" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://maps.google.com/maps?q=<?php echo esc_attr( $ft_map_query ); ?>&z=15&output=embed" title="Map to Veterinary Medical Center Fort Thomas"></iframe>
          <div class="portal-map-body">
            <h3>Fort Thomas</h3>
            <p><?php echo esc_html( $ft_address ); ?></p>
            <div class="portal-map-meta">
              <div><strong>Call</strong><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $ft_phone ) ); ?>">Call Fort Thomas</a></div>
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
              <div><strong>Call</strong><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $ind_phone ) ); ?>">Call Independence</a></div>
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
            echo '<h2>Portal and booking help for Northern Kentucky pet owners</h2><p>If you need online vet booking Fort Thomas and Independence families can use quickly, this page keeps all major paths in one place. Start with portal access for records and requests, use online booking for routine appointments, and switch to direct phone support for urgent concerns.</p><p>You can also access pet medication refill online NKY tools from this page through our connected pharmacy link. That keeps appointment requests, communication, and refill planning aligned with the same veterinary team.</p><p>For new families, begin with the <a href="' . esc_url( home_url( '/new-patient-registration-form/' ) ) . '">new patient registration form</a>, then request your appointment. For ongoing care questions, visit our <a href="' . esc_url( home_url( '/services/' ) ) . '">services page</a>, read more <a href="' . esc_url( home_url( '/about/' ) ) . '">about our clinics</a>, or <a href="' . esc_url( home_url( '/contact/' ) ) . '">contact our team</a>.</p>';
        }
        ?>
        <div class="portal-faq">
          <details open>
            <summary>Can new patients book online?</summary>
            <p>Yes. New patients can start online booking and then complete the <a href="<?php echo esc_url( home_url( '/new-patient-registration-form/' ) ); ?>">registration form</a> before their visit. Sharing records in advance helps your appointment run smoothly.</p>
          </details>
          <details>
            <summary>Do I need an account to request an appointment?</summary>
            <p>No account is required to begin a booking request. Portal access is still helpful for returning clients who want to view records and track communication in one place.</p>
          </details>
          <details>
            <summary>What if I forgot my portal login?</summary>
            <p>Use portal recovery options first, then contact our clinic if you still cannot access your account. We can guide next steps and help you avoid delays in care requests.</p>
          </details>
          <details>
            <summary>Can I request medication refills here?</summary>
            <p>Yes, this page links directly to our online pharmacy where many refill requests can be submitted. For urgent refill questions, call the clinic so we can review your pet’s timeline immediately.</p>
          </details>
          <details>
            <summary>How fast are requests reviewed?</summary>
            <p>Most portal and booking requests are reviewed during normal business hours. If your pet is uncomfortable or symptoms are escalating, call instead of waiting for online follow-up.</p>
          </details>
        </div>
        <div class="portal-actions" style="margin-top:24px">
          <h3 style="width:100%;margin:0;font-family:'Playfair Display',serif;color:var(--dark)">Ready to get started?</h3>
          <a class="btn-red" href="<?php echo esc_url( $link_url ); ?>" target="_blank" rel="noopener">Open Patient Portal</a>
          <button class="btn-ghost" onclick="openAptModal('portal-page-final')">Book Appointment</button>
          <a class="btn-outline" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Call the Clinic</a>
        </div>
      </div>
    </div>
  </section>
</div>

<?php get_footer(); ?>
