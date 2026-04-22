<?php
/**
 * Location page renderer.
 * Call vmc_render_location_page( $config ) from a page template.
 *
 * Required config keys: id, keyword, eyebrow, h1, intro, phone, address,
 * hours_weekday, hours_saturday, image, image_alt, image_caption,
 * second_image, second_alt, trust[], community_heading, community[],
 * areas[], location_heading, locality, schema_name, meta, faq[][].
 *
 * Optional: panel_heading, panel_body.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function vmc_render_location_page( array $cfg ): void {

    $phone      = $cfg['phone'];
    $phone_href = preg_replace( '/[^0-9+]/', '', $phone );
    $address    = $cfg['address'];
    $keyword    = $cfg['keyword'];
    $id         = $cfg['id'];

    $eyebrow    = get_field( 'loc_hero_eyebrow' )  ?: $cfg['eyebrow'];
    $h1         = get_field( 'loc_hero_heading' )  ?: $cfg['h1'];
    $hero_body  = get_field( 'loc_hero_body' )     ?: $cfg['intro'];
    $panel_head = get_field( 'loc_panel_heading' ) ?: ( $cfg['panel_heading'] ?? 'Start with a local team that knows the area.' );
    $panel_body = get_field( 'loc_panel_body' )    ?: ( $cfg['panel_body'] ?? 'Call, register, or request an appointment. VMC makes the next step clear for new and returning pet families.' );
    $image      = get_field( 'loc_image' )         ?: $cfg['image'];
    $image_alt  = get_field( 'loc_image_alt' )     ?: $cfg['image_alt'];
    $image_cap  = get_field( 'loc_image_caption' ) ?: $cfg['image_caption'];

    $map_embed  = 'https://www.google.com/maps?q=' . rawurlencode( $address ) . '&output=embed';
    $map_link   = 'https://maps.google.com/?q=' . rawurlencode( $address );

    $locality    = $cfg['locality']    ?? 'Fort Thomas';
    $schema_name = $cfg['schema_name'] ?? 'Veterinary Medical Center';

    $arrow_svg = '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12,5 19,12 12,19"/></svg>';

    $service_cards = [
        [ 'Wellness',    'Life-stage exams, vaccines, parasite prevention, nutrition guidance, and preventive care planning for dogs and cats.' ],
        [ 'Dental Care', 'Oral exams, cleanings, dental treatment planning, and home-care guidance to protect comfort and long-term health.' ],
        [ 'Surgery',     'Soft tissue surgery with careful preparation, anesthesia monitoring, recovery support, and clear discharge instructions.' ],
        [ 'Diagnostics', 'Practical testing and medical workups when symptoms, chronic issues, or new health concerns need a clearer answer.' ],
        [ 'Sick Visits', 'Medical care for vomiting, skin issues, limping, coughing, appetite changes, behavior changes, and other concerns.' ],
    ];

    get_header();
    ?>

    <div class="lp lp--<?php echo esc_attr( $id ); ?>">

      <!-- ─── HERO ─── -->
      <section class="lp-hero">
        <div class="lp-hero-copy">
          <div class="eyebrow">
            <span class="eyebrow-dash"></span>
            <?php echo esc_html( $eyebrow ); ?>
          </div>
          <h1 class="hero-h1" style="max-width:15ch"><?php echo esc_html( $h1 ); ?></h1>
          <p class="hero-body" style="max-width:620px"><?php echo esc_html( $hero_body ); ?></p>
          <div class="lp-actions" style="margin-top:32px">
            <button class="btn-red" onclick="openAptModal('lp-<?php echo esc_attr( $id ); ?>-hero')">Request Appointment</button>
            <a class="btn-ghost" href="<?php echo esc_url( home_url( '/new-patient-registration-form/' ) ); ?>">
              New Patient Registration <?php echo $arrow_svg; ?>
            </a>
          </div>
        </div>
        <aside class="lp-hero-side">
          <div class="lp-panel rv">
            <h2><?php echo esc_html( $panel_head ); ?></h2>
            <p><?php echo esc_html( $panel_body ); ?></p>
            <ul class="lp-list" style="margin-top:22px">
              <li>
                <a href="tel:<?php echo esc_attr( $phone_href ); ?>"><?php echo esc_html( $phone ); ?></a>
              </li>
              <li>
                <a href="<?php echo esc_url( home_url( '/new-patient-registration-form/' ) ); ?>">Complete New Patient Registration</a>
              </li>
              <li style="border-bottom:none;padding-bottom:0;padding-top:14px">
                <button class="btn-red" style="width:100%;justify-content:center" onclick="openAptModal('lp-<?php echo esc_attr( $id ); ?>-panel')">Request Appointment</button>
              </li>
            </ul>
          </div>
        </aside>
      </section>

      <!-- ─── WHY VMC ─── -->
      <section class="lp-section lp-section--white">
        <div class="rv">
          <div class="sec-eye"><span class="sec-lbl">Why Choose Us</span><span class="sec-rule"></span></div>
          <h2 class="sec-h2"><?php echo esc_html( $keyword ); ?> care with local ownership and real continuity.</h2>
          <p class="lp-copy">Veterinary Medical Center is locally owned, women-led, and relationship-based. Families choose VMC because they want a dog and cat veterinarian who communicates clearly, supports long-term pet health, and stays accountable to the community instead of a corporate office.</p>
          <div class="lp-grid-2">
            <article class="lp-image-card rv">
              <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" loading="eager">
              <div class="lp-image-caption"><?php echo esc_html( $image_cap ); ?></div>
            </article>
            <article class="lp-card rv rv2">
              <h3>What makes VMC different</h3>
              <ul class="lp-list">
                <?php foreach ( $cfg['trust'] as $item ) : ?>
                  <li><?php echo esc_html( $item ); ?></li>
                <?php endforeach; ?>
              </ul>
              <p style="margin-top:18px">Learn more <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">about VMC</a>, compare our <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">veterinary services</a>, or review the <a href="<?php echo esc_url( home_url( '/first-vet-visit-northern-kentucky/' ) ); ?>">first visit guide</a>.</p>
            </article>
          </div>
        </div>
      </section>

      <!-- ─── SERVICES ─── -->
      <section class="lp-section lp-section--warm">
        <div class="rv">
          <div class="sec-eye"><span class="sec-lbl">Services</span><span class="sec-rule"></span></div>
          <h2 class="sec-h2"><?php echo esc_html( $keyword ); ?> services for dogs and cats.</h2>
          <p class="lp-copy">VMC provides full-service veterinary care in Northern Kentucky, including the everyday visits and more complex medical decisions that pets need over a lifetime.</p>
          <div class="lp-grid-3">
            <?php foreach ( $service_cards as $card ) : ?>
              <article class="lp-service-card rv">
                <h3><?php echo esc_html( $card[0] ); ?></h3>
                <p><?php echo esc_html( $card[1] ); ?></p>
              </article>
            <?php endforeach; ?>
          </div>
          <div class="lp-actions" style="margin-top:28px">
            <button class="btn-red" onclick="openAptModal('lp-<?php echo esc_attr( $id ); ?>-services')">Request Appointment</button>
            <a class="btn-ghost" href="<?php echo esc_url( home_url( '/services/' ) ); ?>">
              Explore All Services <?php echo $arrow_svg; ?>
            </a>
          </div>
        </div>
      </section>

      <!-- ─── COMMUNITY ─── -->
      <section class="lp-section lp-section--white">
        <div class="rv">
          <div class="lp-grid-2">
            <article class="lp-card rv">
              <div class="sec-eye"><span class="sec-lbl">Local Credibility</span><span class="sec-rule"></span></div>
              <h2><?php echo esc_html( $cfg['community_heading'] ); ?></h2>
              <?php foreach ( $cfg['community'] as $para ) : ?>
                <p style="margin-top:12px"><?php echo esc_html( $para ); ?></p>
              <?php endforeach; ?>
              <div class="lp-chips">
                <?php foreach ( $cfg['areas'] as $area ) : ?>
                  <span class="lp-chip"><?php echo esc_html( $area ); ?></span>
                <?php endforeach; ?>
              </div>
            </article>
            <article class="lp-image-card rv rv2">
              <img src="<?php echo esc_url( $cfg['second_image'] ); ?>" alt="<?php echo esc_attr( $cfg['second_alt'] ); ?>" loading="lazy">
              <div class="lp-image-caption">Women-led, locally owned veterinary care for families searching <?php echo esc_html( $keyword ); ?>.</div>
            </article>
          </div>
        </div>
      </section>

      <!-- ─── MAP / LOCATION ─── -->
      <section class="lp-section lp-section--cream" id="directions">
        <div class="rv">
          <div class="sec-eye"><span class="sec-lbl">Location &amp; Hours</span><span class="sec-rule"></span></div>
          <h2 class="sec-h2"><?php echo esc_html( $cfg['location_heading'] ); ?></h2>
          <div class="lp-grid-2">
            <div class="lp-map-card rv">
              <iframe
                class="lp-map"
                src="<?php echo esc_url( $map_embed ); ?>"
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                title="Map to Veterinary Medical Center <?php echo esc_attr( $locality ); ?>"
              ></iframe>
              <div class="lp-map-body">
                <h3><?php echo esc_html( $address ); ?></h3>
                <p>Call <a href="tel:<?php echo esc_attr( $phone_href ); ?>"><?php echo esc_html( $phone ); ?></a> or request an appointment online.</p>
                <div class="lp-map-meta">
                  <div>
                    <strong>Phone</strong>
                    <a href="tel:<?php echo esc_attr( $phone_href ); ?>"><?php echo esc_html( $phone ); ?></a>
                  </div>
                  <div>
                    <strong>Directions</strong>
                    <a href="<?php echo esc_url( $map_link ); ?>" target="_blank" rel="noopener">Open in Google Maps</a>
                  </div>
                  <div>
                    <strong>Mon – Fri</strong>
                    <span><?php echo esc_html( $cfg['hours_weekday'] ); ?></span>
                  </div>
                  <div>
                    <strong>Saturday</strong>
                    <span><?php echo esc_html( $cfg['hours_saturday'] ); ?></span>
                  </div>
                </div>
              </div>
            </div>
            <article class="lp-card rv rv2">
              <h3>Ready for your first visit?</h3>
              <p>Use the <a href="<?php echo esc_url( home_url( '/new-patient-registration-form/' ) ); ?>">new patient registration form</a> before your appointment, <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">contact our team</a> with questions, or browse the <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">VMC blog</a> for pet health guidance.</p>
              <p style="margin-top:10px">Exploring Northern Kentucky vets? See our <a href="<?php echo esc_url( home_url( '/northern-kentucky-vet-near-me/' ) ); ?>">vet near me page</a> for broader local guidance.</p>
              <div class="lp-actions" style="margin-top:22px">
                <button class="btn-red" onclick="openAptModal('lp-<?php echo esc_attr( $id ); ?>-map')">Book Appointment</button>
                <a class="btn-outline" href="<?php echo esc_url( $map_link ); ?>" target="_blank" rel="noopener">Get Directions</a>
              </div>
            </article>
          </div>
        </div>
      </section>

      <!-- ─── FAQ ─── -->
      <section class="lp-section lp-section--white">
        <div class="rv">
          <div class="sec-eye"><span class="sec-lbl">FAQ</span><span class="sec-rule"></span></div>
          <h2 class="sec-h2"><?php echo esc_html( $keyword ); ?> — common questions.</h2>
          <div class="lp-grid-2">
            <?php foreach ( $cfg['faq'] as $i => $faq ) : ?>
              <details class="lp-faq-card rv" <?php echo 0 === $i ? 'open' : ''; ?>>
                <summary><?php echo esc_html( $faq[0] ); ?></summary>
                <p><?php echo esc_html( $faq[1] ); ?></p>
              </details>
            <?php endforeach; ?>
          </div>
        </div>
      </section>

      <!-- ─── FINAL CTA ─── -->
      <section class="lp-section lp-section--warm">
        <div class="rv">
          <article class="lp-cta-card rv">
            <div class="sec-eye"><span class="sec-lbl">Get Started</span><span class="sec-rule"></span></div>
            <h2>Choose local veterinary care that makes the next step clear.</h2>
            <p><?php echo esc_html( $keyword ); ?> searches should end with a veterinary team that is nearby, trustworthy, and easy to contact. VMC gives families full-service care, clear communication, local ownership, and a practical path to the first appointment.</p>
            <?php if ( get_field( 'loc_seo_body' ) ) : ?>
              <div class="lp-copy" style="margin-top:20px"><?php echo wp_kses_post( get_field( 'loc_seo_body' ) ); ?></div>
            <?php endif; ?>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
              <?php if ( trim( wp_strip_all_tags( get_the_content() ) ) ) : ?>
                <div class="lp-copy" style="margin-top:20px"><?php the_content(); ?></div>
              <?php endif; ?>
            <?php endwhile; endif; ?>
            <div class="lp-actions" style="margin-top:28px">
              <button class="btn-red" onclick="openAptModal('lp-<?php echo esc_attr( $id ); ?>-cta')">Request Appointment</button>
              <a class="btn-ghost" href="<?php echo esc_url( home_url( '/new-patient-registration-form/' ) ); ?>">
                New Patient Registration <?php echo $arrow_svg; ?>
              </a>
            </div>
          </article>
        </div>
      </section>

    </div>

    <?php
    // ── Schema markup ──────────────────────────────────────────
    $schema_faqs = [];
    foreach ( $cfg['faq'] as $faq ) {
        $schema_faqs[] = [
            '@type'          => 'Question',
            'name'           => $faq[0],
            'acceptedAnswer' => [ '@type' => 'Answer', 'text' => $faq[1] ],
        ];
    }

    $addr_parts = array_map( 'trim', explode( ',', $address ) );

    $schema = [
        '@context' => 'https://schema.org',
        '@graph'   => [
            [
                '@type'       => 'WebPage',
                '@id'         => get_permalink() . '#webpage',
                'url'         => get_permalink(),
                'name'        => $h1,
                'description' => $cfg['meta'] ?? $keyword . ' — Veterinary Medical Center',
                'about'       => [ '@type' => 'Thing', 'name' => $keyword ],
            ],
            [
                '@type'            => 'VeterinaryCare',
                '@id'              => get_permalink() . '#vmc',
                'name'             => $schema_name,
                'url'              => get_permalink(),
                'telephone'        => $phone,
                'address'          => [
                    '@type'           => 'PostalAddress',
                    'streetAddress'   => $addr_parts[0] ?? '',
                    'addressLocality' => $locality,
                    'addressRegion'   => 'KY',
                    'addressCountry'  => 'US',
                ],
                'areaServed'       => $cfg['areas'],
                'medicalSpecialty' => 'Veterinary medicine',
            ],
            [
                '@type'      => 'FAQPage',
                '@id'        => get_permalink() . '#faq',
                'mainEntity' => $schema_faqs,
            ],
        ],
    ];

    echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . '</script>' . "\n";

    get_footer();
}
