<?php
/**
 * Template Name: Online Vet Pharmacy Page
 */

get_header();

$h1           = get_field( 'pharmacy_h1' ) ?: 'Northern Kentucky & Cincinnati Online Vet Pharmacy';
$intro        = get_field( 'pharmacy_intro' ) ?: 'Use our Northern Kentucky and Cincinnati online vet pharmacy page to request refills and browse trusted products.';
$link_label   = get_field( 'pharmacy_external_link_label' ) ?: 'Open Online Vet Pharmacy';
$link_url     = get_field( 'pharmacy_external_link_url' ) ?: vmc_get( 'vmc_pharmacy_url', 'https://nky-vet.ourvet.com/' );
$body         = get_field( 'pharmacy_body' );
$ft_phone     = vmc_get( 'vmc_ft_phone', '(859) 442-4420' );
$ind_phone    = vmc_get( 'vmc_ind_phone', '(859) 356-2242' );
$ft_address   = vmc_get( 'vmc_ft_address', '2000 Memorial Parkway, Fort Thomas, KY 41075' );
$ind_address  = vmc_get( 'vmc_ind_address', '4147 Madison Pike, Independence, KY 41051' );
$ft_map_query = rawurlencode( $ft_address );
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
.pharm-panel p,.pharm-card p,.pharm-card li,.pharm-map-card p{font-size:14.5px;line-height:1.84;color:var(--mid)}
.pharm-actions{display:flex;gap:12px;flex-wrap:wrap;margin-top:24px}
.pharm-list{margin:18px 0 0;padding:0;list-style:none}
.pharm-list li{padding:11px 0;border-bottom:1px solid rgba(0,0,0,.08)}
.pharm-list li:last-child{border-bottom:none}
.pharm-sec{padding:86px var(--pad)}
.pharm-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:22px;margin-top:28px}
.pharm-grid-3{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:18px;margin-top:24px}
.pharm-card{padding:30px}
.pharm-map{display:block;width:100%;height:280px;border:0;background:var(--cream)}
.pharm-map-body{padding:22px}
.pharm-map-meta{display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-top:14px}
.pharm-map-meta div{background:var(--cream);border:1px solid rgba(0,0,0,.05);border-radius:8px;padding:12px}
.pharm-map-meta strong{display:block;font-size:12px;letter-spacing:.12em;text-transform:uppercase;color:var(--gold);margin-bottom:4px}
.pharm-map-meta a,.pharm-map-meta span{font-size:13px;color:var(--mid)}
.pharm-copy-body h2,.pharm-copy-body h3{font-family:'Playfair Display',serif;color:var(--dark)}
.pharm-copy-body a{color:var(--red);font-weight:700}
.pharm-step{background:var(--white);border:1px solid rgba(0,0,0,.08);border-radius:8px;padding:22px}
.pharm-step .num{display:inline-flex;width:30px;height:30px;border-radius:999px;background:var(--red);color:#fff;align-items:center;justify-content:center;font-weight:700;margin-bottom:10px}
.pharm-faq details{background:var(--white);border:1px solid rgba(0,0,0,.08);border-radius:8px;padding:0 18px;margin-top:10px}
.pharm-faq summary{cursor:pointer;padding:18px 0;font-weight:700;color:var(--dark)}
.pharm-faq p{padding:0 0 18px;margin:0}
@media(max-width:1100px){
  .pharm-hero,.pharm-grid{grid-template-columns:1fr}
  .pharm-copy{padding:82px 24px 34px}
  .pharm-side{padding:0 24px 56px}
}
@media(max-width:700px){
  .pharm-sec{padding:56px 24px}
  .pharm-map-meta{grid-template-columns:1fr}
  .pharm-grid-3{grid-template-columns:1fr}
}
</style>

<div class="pharm-page">
  <section class="pharm-hero">
    <div class="pharm-copy">
      <div class="eyebrow"><span class="eyebrow-dash"></span>Online Vet Pharmacy</div>
      <h1 class="hero-h1" style="max-width:15ch"><?php echo esc_html( $h1 ); ?></h1>
      <p class="hero-body" style="max-width:66ch"><?php echo esc_html( $intro ); ?></p>
      <div class="pharm-actions">
        <a class="btn-red" href="<?php echo esc_url( $link_url ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $link_label ); ?></a>
        <a class="btn-ghost" href="<?php echo esc_url( vmc_patient_portal_page_url() ); ?>">Patient Portal &amp; Booking</a>
      </div>
      <div class="pharm-toc">
        <a href="#pharm-steps">How it works</a>
        <a href="#pharm-support">Location support</a>
        <a href="#pharm-seo">Pharmacy guide</a>
      </div>
    </div>
    <aside class="pharm-side">
      <div class="pharm-panel rv">
        <h2>Trusted refill access with local veterinary support.</h2>
        <p>Open the online pharmacy, request eligible products, and call either VMC location if you need medication timing or refill support.</p>
        <ul class="pharm-list">
          <li><a href="<?php echo esc_url( $link_url ); ?>" target="_blank" rel="noopener">Open secure online pharmacy</a></li>
          <li><a href="<?php echo esc_url( vmc_patient_portal_page_url() ); ?>">Patient portal and online booking</a></li>
          <li><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">Review VMC services</a></li>
          <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact VMC with refill questions</a></li>
        </ul>
      </div>
    </aside>
  </section>

  <section class="pharm-sec" style="background:var(--white)" id="pharm-steps">
    <div class="rv">
      <div class="sec-eye"><span class="sec-lbl">How It Works</span><span class="sec-rule"></span></div>
      <h2 class="sec-h2">Confident online pharmacy ordering in three steps.</h2>
      <div class="pharm-grid-3">
        <article class="pharm-step"><span class="num">1</span><h3>Open secure pharmacy</h3><p>Use the pharmacy button to reach the official storefront tied to Veterinary Medical Center.</p></article>
        <article class="pharm-step"><span class="num">2</span><h3>Request eligible products</h3><p>Choose refills, prevention, and approved products based on your pet’s ongoing care plan.</p></article>
        <article class="pharm-step"><span class="num">3</span><h3>Confirm with local team</h3><p>Call either location if you have timing, dosage, or shipping questions.</p></article>
      </div>
    </div>
  </section>

  <section class="pharm-sec" style="background:var(--warm)" id="pharm-support">
    <div class="rv">
      <div class="sec-eye"><span class="sec-lbl">Local Support</span><span class="sec-rule"></span></div>
      <h2 class="sec-h2">Talk to our local teams while managing pharmacy orders.</h2>
      <div class="pharm-grid">
        <article class="pharm-map-card">
          <iframe class="pharm-map" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://maps.google.com/maps?q=<?php echo esc_attr( $ft_map_query ); ?>&z=15&output=embed" title="Map to Veterinary Medical Center Fort Thomas"></iframe>
          <div class="pharm-map-body">
            <h3>Fort Thomas</h3>
            <p><?php echo esc_html( $ft_address ); ?></p>
            <div class="pharm-map-meta">
              <div><strong>Call</strong><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $ft_phone ) ); ?>"><?php echo esc_html( $ft_phone ); ?></a></div>
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
              <div><strong>Call</strong><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $ind_phone ) ); ?>"><?php echo esc_html( $ind_phone ); ?></a></div>
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
            echo '<h2>Secure veterinary pharmacy access</h2><p>Use the button above to open the secure online pharmacy.</p>';
        }
        ?>
        <div class="pharm-faq">
          <details open>
            <summary>Is this linked to my veterinary records?</summary>
            <p>Yes, requests from the connected pharmacy flow through your veterinary team so approvals can align with your pet’s care history.</p>
          </details>
          <details>
            <summary>What if an item is delayed or unavailable?</summary>
            <p>Contact us directly and we can help review alternatives, timing, or in-clinic options when appropriate.</p>
          </details>
        </div>
      </div>
    </div>
  </section>
</div>

<?php get_footer(); ?>
