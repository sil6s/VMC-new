<?php
/**
 * Template Name: Online Vet Pharmacy Page
 */

get_header();

$h1            = get_field( 'pharmacy_h1' ) ?: 'Order Pet Medications Online with Local Vet Approval';
$intro         = get_field( 'pharmacy_intro' ) ?: 'Use this page to access our secure online pharmacy, request pet medication refill online NKY support, and connect with your Veterinary Medical Center team when you need guidance.';
$link_url      = get_field( 'pharmacy_external_link_url' ) ?: vmc_get( 'vmc_pharmacy_url', 'https://nky-vet.ourvet.com/' );
$body          = get_field( 'pharmacy_body' );
$ft_phone      = vmc_get( 'vmc_ft_phone', '(859) 442-4420' );
$ind_phone     = vmc_get( 'vmc_ind_phone', '(859) 356-2242' );
$ft_address    = vmc_get( 'vmc_ft_address', '2000 Memorial Parkway, Fort Thomas, KY 41075' );
$ind_address   = vmc_get( 'vmc_ind_address', '4147 Madison Pike, Independence, KY 41051' );
$ft_map_query  = rawurlencode( $ft_address );
$ind_map_query = rawurlencode( $ind_address );
?>

<style>
.pharm-page{background:var(--white)}
.pharm-hero{display:grid;grid-template-columns:minmax(0,1.02fr) minmax(0,.98fr);min-height:640px;background:var(--cream)}
.pharm-copy{padding:108px 68px 70px}
.pharm-side{background:var(--warm);padding:106px 52px 68px 28px;display:flex;align-items:center}
.pharm-card,.pharm-panel,.pharm-map-card{background:var(--white);border:1px solid rgba(0,0,0,.07);border-radius:8px;box-shadow:0 20px 56px rgba(0,0,0,.06)}
.pharm-toc{display:flex;flex-wrap:wrap;gap:10px;margin-top:18px}
.pharm-toc a{display:inline-flex;align-items:center;min-height:36px;padding:8px 12px;border-radius:8px;background:var(--white);border:1px solid rgba(0,0,0,.08);font-size:13px;color:var(--mid);text-decoration:none}
.pharm-panel{padding:28px}
.pharm-panel h2,.pharm-card h2,.pharm-map-card h3{font-family:'Playfair Display',serif;color:var(--dark)}
.pharm-panel h4{font-size:13px;letter-spacing:.1em;text-transform:uppercase;color:var(--gold);margin:18px 0 8px}
.pharm-panel p,.pharm-card p,.pharm-card li,.pharm-map-card p{font-size:14.5px;line-height:1.84;color:var(--mid)}
.pharm-actions{display:flex;gap:12px;flex-wrap:wrap;margin-top:24px}
.pharm-list{margin:0;padding:0;list-style:none}
.pharm-list li{padding:9px 0;border-bottom:1px solid rgba(0,0,0,.08)}
.pharm-list li:last-child{border-bottom:none}
.pharm-sec{padding:86px var(--pad)}
.pharm-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:22px;margin-top:28px}
.pharm-grid-3{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:18px;margin-top:24px}
.pharm-card{padding:30px}
.pharm-map{display:block;width:100%;height:240px;border:0;background:var(--cream)}
.pharm-map-body{padding:22px}
.pharm-map-meta{display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-top:14px}
.pharm-map-meta div{background:var(--cream);border:1px solid rgba(0,0,0,.05);border-radius:8px;padding:12px}
.pharm-map-meta strong{display:block;font-size:12px;letter-spacing:.12em;text-transform:uppercase;color:var(--gold);margin-bottom:4px}
.pharm-map-meta a,.pharm-map-meta span{font-size:13px;color:var(--mid)}
.pharm-copy-body h2,.pharm-copy-body h3{font-family:'Playfair Display',serif;color:var(--dark)}
.pharm-copy-body a{color:var(--red);font-weight:700}
.pharm-step{background:var(--white);border:1px solid rgba(0,0,0,.08);border-radius:8px;padding:22px}
.pharm-step .num{display:inline-flex;width:30px;height:30px;border-radius:999px;background:var(--red);color:#fff;align-items:center;justify-content:center;font-weight:700;margin-bottom:10px}
.pharm-step small{display:block;margin-top:8px;font-size:12px;color:var(--gold);letter-spacing:.06em;text-transform:uppercase}
.pharm-faq details{background:var(--white);border:1px solid rgba(0,0,0,.08);border-radius:8px;padding:0 18px;margin-top:10px}
.pharm-faq summary{cursor:pointer;padding:18px 0;font-weight:700;color:var(--dark)}
.pharm-faq p{padding:0 0 18px;margin:0}
.pharm-note{margin-top:10px;font-size:13px;line-height:1.7;color:var(--mid)}
@media(max-width:1100px){
  .pharm-hero,.pharm-grid,.pharm-grid-3{grid-template-columns:1fr}
  .pharm-copy{padding:82px 24px 34px}
  .pharm-side{padding:0 24px 56px}
}
@media(max-width:700px){
  .pharm-sec{padding:56px 24px}
  .pharm-map-meta{grid-template-columns:1fr}
}
</style>

<div class="pharm-page">
  <section class="pharm-hero">
    <div class="pharm-copy">
      <div class="eyebrow"><span class="eyebrow-dash"></span>Online Vet Pharmacy</div>
      <h1 class="hero-h1" style="max-width:14ch"><?php echo esc_html( $h1 ); ?></h1>
      <p class="hero-body" style="max-width:66ch"><?php echo esc_html( $intro ); ?></p>
      <div class="pharm-actions">
        <a class="btn-red" href="<?php echo esc_url( $link_url ); ?>" target="_blank" rel="noopener">Visit Online Pharmacy</a>
        <a class="btn-ghost" href="<?php echo esc_url( vmc_patient_portal_page_url() ); ?>">Open Patient Portal</a>
        <a class="btn-outline" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Request Refill from Vet</a>
      </div>
      <p class="pharm-note">Verified products, vet-reviewed approvals, and delivery convenience with local support.</p>
      <div class="pharm-toc">
        <a href="#pharm-steps">How pharmacy works</a>
        <a href="#pharm-support">When to call the clinic</a>
        <a href="#pharm-seo">Pharmacy FAQ + help</a>
      </div>
    </div>
    <aside class="pharm-side">
      <div class="pharm-panel rv">
        <h2>Choose your pharmacy path.</h2>
        <p>This page is designed for fast medication requests without guesswork.</p>

        <h4>Primary actions</h4>
        <ul class="pharm-list">
          <li><a href="<?php echo esc_url( $link_url ); ?>" target="_blank" rel="noopener">Visit online pharmacy</a></li>
          <li><a href="<?php echo esc_url( vmc_patient_portal_page_url() ); ?>">Open patient portal for account access</a></li>
        </ul>

        <h4>Secondary actions</h4>
        <ul class="pharm-list">
          <li><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">Review services tied to medication plans</a></li>
          <li><a href="<?php echo esc_url( home_url( '/new-patient-registration-form/' ) ); ?>">New patient registration</a></li>
        </ul>

        <h4>Support actions</h4>
        <ul class="pharm-list">
          <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact VMC with refill or shipping questions</a></li>
        </ul>
      </div>
    </aside>
  </section>

  <section class="pharm-sec" style="background:var(--white)" id="pharm-steps">
    <div class="rv">
      <div class="sec-eye"><span class="sec-lbl">How It Works</span><span class="sec-rule"></span></div>
      <h2 class="sec-h2">How online pharmacy ordering works.</h2>
      <div class="pharm-grid-3">
        <article class="pharm-step"><span class="num">1</span><h3>Open the secure pharmacy</h3><p>Use the primary button to reach the verified storefront connected to Veterinary Medical Center.</p><small>Safe and verified medications</small></article>
        <article class="pharm-step"><span class="num">2</span><h3>Select products and refills</h3><p>Choose eligible medications, prevention, and approved products for your pet.</p><small>Works for many routine refill requests</small></article>
        <article class="pharm-step"><span class="num">3</span><h3>Veterinary team reviews requests</h3><p>Requests are reviewed by your local vet team to confirm safety, timing, and treatment alignment.</p><small>Direct vet approval</small></article>
        <article class="pharm-step"><span class="num">4</span><h3>Receive delivery and follow up</h3><p>Most orders ship directly to your home, and you can call either clinic for dosage or timing questions.</p><small>Home delivery convenience</small></article>
      </div>
    </div>
  </section>

  <section class="pharm-sec" style="background:var(--warm)" id="pharm-support">
    <div class="rv">
      <div class="sec-eye"><span class="sec-lbl">Need Help?</span><span class="sec-rule"></span></div>
      <h2 class="sec-h2">When to use pharmacy tools vs calling the clinic.</h2>
      <p class="hero-body" style="max-width:70ch">Use the online pharmacy for routine refill requests and home delivery. Call the clinic for urgent medication gaps, side-effect questions, dose changes, or if your pet’s symptoms are getting worse.</p>
      <div class="pharm-grid">
        <article class="pharm-map-card">
          <iframe class="pharm-map" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://maps.google.com/maps?q=<?php echo esc_attr( $ft_map_query ); ?>&z=15&output=embed" title="Map to Veterinary Medical Center Fort Thomas"></iframe>
          <div class="pharm-map-body">
            <h3>Fort Thomas</h3>
            <p><?php echo esc_html( $ft_address ); ?></p>
            <div class="pharm-map-meta">
              <div><strong>Call</strong><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $ft_phone ) ); ?>">Call Fort Thomas</a></div>
              <div><strong>Directions</strong><a href="https://maps.google.com/?q=<?php echo esc_attr( $ft_map_query ); ?>" target="_blank" rel="noopener">Get Directions</a></div>
            </div>
          </div>
        </article>
        <article class="pharm-map-card">
          <iframe class="pharm-map" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://maps.google.com/maps?q=<?php echo esc_attr( $ind_map_query ); ?>&z=15&output=embed" title="Map to Veterinary Medical Center Independence"></iframe>
          <div class="pharm-map-body">
            <h3>Independence</h3>
            <p><?php echo esc_html( $ind_address ); ?></p>
            <div class="pharm-map-meta">
              <div><strong>Call</strong><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $ind_phone ) ); ?>">Call Independence</a></div>
              <div><strong>Directions</strong><a href="https://maps.google.com/?q=<?php echo esc_attr( $ind_map_query ); ?>" target="_blank" rel="noopener">Get Directions</a></div>
            </div>
          </div>
        </article>
      </div>
    </div>
  </section>

  <section class="pharm-sec" style="background:var(--white)" id="pharm-seo">
    <div class="rv">
      <div class="pharm-card pharm-copy-body">
        <div class="sec-eye"><span class="sec-lbl">Pharmacy Guide</span><span class="sec-rule"></span></div>
        <?php
        if ( $body ) {
            echo wp_kses_post( $body );
        } else {
            echo '<h2>Online medication access for Northern Kentucky and Cincinnati pet owners</h2><p>This page is built for pet families who need simple, reliable medication access tied directly to their veterinary care team. If you are comparing options for pet medication refill online NKY requests, our pharmacy pathway helps keep medication history, approvals, and refill timing aligned with your clinic records.</p><p>You can also switch to the <a href="' . esc_url( vmc_patient_portal_page_url() ) . '">patient portal and online booking page</a> when you need to manage appointments, records, or general account access. For treatment planning details, review our <a href="' . esc_url( home_url( '/services/' ) ) . '">service pages</a>, learn more <a href="' . esc_url( home_url( '/about/' ) ) . '">about our team</a>, or <a href="' . esc_url( home_url( '/contact/' ) ) . '">contact a clinic directly</a>.</p>';
        }
        ?>
        <div class="pharm-faq">
          <details open>
            <summary>Is this online pharmacy connected to Veterinary Medical Center?</summary>
            <p>Yes. Requests submitted through this page are tied to your veterinary care history so approval decisions can stay consistent with your treatment plan.</p>
          </details>
          <details>
            <summary>How quickly are refill requests reviewed?</summary>
            <p>Most requests are reviewed during business hours. For urgent medication needs, call the clinic directly so we can help with timing and alternatives.</p>
          </details>
          <details>
            <summary>Can new patients request medications online right away?</summary>
            <p>Some medications require an active veterinarian-client-patient relationship and current exam history. If you are new to VMC, start with <a href="<?php echo esc_url( home_url( '/new-patient-registration-form/' ) ); ?>">new patient registration</a> and our team will guide next steps.</p>
          </details>
          <details>
            <summary>What if a product is out of stock or delayed?</summary>
            <p>Contact us and we can discuss alternatives, timing adjustments, or in-clinic options when available. We will help you avoid treatment interruptions when possible.</p>
          </details>
          <details>
            <summary>Should I use pharmacy tools or call for side effects?</summary>
            <p>Call immediately for side effects, worsening symptoms, or dose concerns. Online requests are best for routine refills and non-urgent product ordering.</p>
          </details>
        </div>
        <div class="pharm-actions" style="margin-top:24px">
          <h3 style="width:100%;margin:0;font-family:'Playfair Display',serif;color:var(--dark)">Ready to get started?</h3>
          <a class="btn-red" href="<?php echo esc_url( $link_url ); ?>" target="_blank" rel="noopener">Visit Online Pharmacy</a>
          <a class="btn-ghost" href="<?php echo esc_url( vmc_patient_portal_page_url() ); ?>">Open Patient Portal</a>
          <a class="btn-outline" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Call the Clinic</a>
        </div>
      </div>
    </div>
  </section>
</div>

<?php get_footer(); ?>
