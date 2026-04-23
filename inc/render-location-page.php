<?php
/**
 * Location page renderer.
 * Call vmc_render_location_page( $config ) from a page template.
 *
 * Required config keys: id, keyword, eyebrow, h1, intro, hero_bullets[], phone, address,
 * hours_weekday, hours_saturday, image, image_alt, image_caption,
 * second_image, second_alt, trust[], community_heading, community[],
 * areas[label|slug][], location_heading, locality, schema_name, meta, faq[][],
 * new_patient_steps[title|body][], services[title|body|url][].
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function vmc_render_location_page( array $cfg ): void {

    $phone      = $cfg['phone'];
    $phone_href = preg_replace( '/[^0-9+]/', '', $phone );
    $address    = $cfg['address'];
    $keyword    = $cfg['keyword'];
    $id         = $cfg['id'];

    $eyebrow      = get_field( 'loc_hero_eyebrow' )  ?: $cfg['eyebrow'];
    $h1           = get_field( 'loc_hero_heading' )  ?: $cfg['h1'];
    $hero_body    = get_field( 'loc_hero_body' )     ?: $cfg['intro'];
    $panel_head   = get_field( 'loc_panel_heading' ) ?: ( $cfg['panel_heading'] ?? 'Start with a local team that knows the area.' );
    $panel_body   = get_field( 'loc_panel_body' )    ?: ( $cfg['panel_body'] ?? 'Call, register, or request an appointment. VMC makes the next step clear for new and returning pet families.' );
    $image        = get_field( 'loc_image' )         ?: $cfg['image'];
    $image_alt    = get_field( 'loc_image_alt' )     ?: $cfg['image_alt'];
    $image_cap    = get_field( 'loc_image_caption' ) ?: $cfg['image_caption'];
    $hero_bullets = $cfg['hero_bullets'] ?? [];

    $map_embed  = 'https://www.google.com/maps?q=' . rawurlencode( $address ) . '&output=embed';
    $map_link   = 'https://maps.google.com/?q=' . rawurlencode( $address );

    $locality    = $cfg['locality']    ?? 'Fort Thomas';
    $schema_name = $cfg['schema_name'] ?? 'Veterinary Medical Center';

    $arrow_svg = '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12,5 19,12 12,19"/></svg>';

    $service_cards = $cfg['services'] ?? [
        [ 'title' => 'Wellness Exams', 'body' => 'Life-stage exams, vaccines, parasite prevention, nutrition guidance, and preventive care planning for dogs and cats.', 'url' => home_url( '/services/' ) ],
        [ 'title' => 'Dental Care', 'body' => 'Oral exams, cleanings, dental treatment planning, and home-care guidance to protect comfort and long-term health.', 'url' => home_url( '/services/' ) ],
        [ 'title' => 'Surgery', 'body' => 'Soft tissue surgery with careful preparation, anesthesia monitoring, recovery support, and clear discharge instructions.', 'url' => home_url( '/services/' ) ],
        [ 'title' => 'Diagnostics', 'body' => 'Practical testing and medical workups when symptoms, chronic issues, or new health concerns need a clearer answer.', 'url' => home_url( '/services/' ) ],
        [ 'title' => 'Urgent & Sick Visits', 'body' => 'Medical care for vomiting, skin issues, limping, coughing, appetite changes, behavior changes, and other concerns.', 'url' => home_url( '/services/' ) ],
    ];

    get_header();
    ?>

    <div class="lp lp--<?php echo esc_attr( $id ); ?> lp-page">

      <section class="lp-hero">
        <div class="lp-hero-copy">
          <div class="eyebrow">
            <span class="eyebrow-dash"></span>
            <?php echo esc_html( $eyebrow ); ?>
          </div>
          <h1 class="hero-h1"><?php echo esc_html( $h1 ); ?></h1>
          <p class="hero-body"><?php echo esc_html( $hero_body ); ?></p>
          <?php if ( ! empty( $hero_bullets ) ) : ?>
            <ul class="lp-hero-points">
              <?php foreach ( $hero_bullets as $bullet ) : ?>
                <li><?php echo esc_html( $bullet ); ?></li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
          <div class="lp-actions" style="margin-top:26px">
            <button class="btn-red" onclick="openAptModal('lp-<?php echo esc_attr( $id ); ?>-hero')">Request Appointment</button>
            <a class="btn-ghost" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Call Now</a>
            <a class="btn-outline" href="<?php echo esc_url( home_url( '/new-patient-registration-form/' ) ); ?>">Book Online</a>
          </div>
        </div>
        <aside class="lp-hero-side">
          <div class="lp-panel rv">
            <h2><?php echo esc_html( $panel_head ); ?></h2>
            <p><?php echo esc_html( $panel_body ); ?></p>
            <ul class="lp-list" style="margin-top:22px">
              <li><a href="tel:<?php echo esc_attr( $phone_href ); ?>"><?php echo esc_html( $phone ); ?></a></li>
              <li><a href="<?php echo esc_url( home_url( '/new-patient-registration-form/' ) ); ?>">Complete New Patient Registration</a></li>
              <li><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">Explore Full-Service Pet Care</a></li>
              <li style="border-bottom:none;padding-bottom:0;padding-top:14px">
                <button class="btn-red" style="width:100%;justify-content:center" onclick="openAptModal('lp-<?php echo esc_attr( $id ); ?>-panel')">Request Appointment</button>
              </li>
            </ul>
          </div>
        </aside>
      </section>

      <section class="lp-section lp-section--white">
        <div class="home-shell">
          <div class="rv">
            <div class="sec-eye"><span class="sec-lbl">Services</span><span class="sec-rule"></span></div>
            <h2 class="sec-h2">Services for pets in <?php echo esc_html( $locality ); ?>.</h2>
            <p class="lp-copy"><?php echo esc_html( $keyword ); ?> families can rely on one team for routine preventive medicine and more complex care decisions. Explore the core service categories below to find the right next step for your dog or cat.</p>
            <div class="lp-grid-3">
              <?php foreach ( $service_cards as $card ) : ?>
                <article class="lp-service-card rv">
                  <h3><?php echo esc_html( $card['title'] ); ?></h3>
                  <p><?php echo esc_html( $card['body'] ); ?></p>
                  <a href="<?php echo esc_url( $card['url'] ); ?>">Learn more <?php echo $arrow_svg; ?></a>
                </article>
              <?php endforeach; ?>
            </div>
            <div class="lp-actions" style="margin-top:26px">
              <button class="btn-red" onclick="openAptModal('lp-<?php echo esc_attr( $id ); ?>-services')">Request Appointment</button>
              <a class="btn-ghost" href="<?php echo esc_url( home_url( '/services/' ) ); ?>">View All Services <?php echo $arrow_svg; ?></a>
            </div>
          </div>
        </div>
      </section>

      <section class="lp-section lp-section--warm">
        <div class="home-shell">
          <div class="rv">
            <div class="sec-eye"><span class="sec-lbl">Why Choose VMC</span><span class="sec-rule"></span></div>
            <h2 class="sec-h2">Why choose our <?php echo esc_html( $locality ); ?> vet clinic.</h2>
            <p class="lp-copy">If you are searching for a veterinarian near <?php echo esc_html( $locality ); ?>, trust and continuity matter just as much as convenience. VMC is locally owned, relationship-based, and structured for clear communication at every visit.</p>
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
                <div class="lp-actions" style="margin-top:16px">
                  <a class="btn-outline" href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About Our Team</a>
                  <a class="btn-outline" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact the Clinic</a>
                </div>
              </article>
            </div>
            <div class="lp-actions" style="margin-top:24px">
              <button class="btn-red" onclick="openAptModal('lp-<?php echo esc_attr( $id ); ?>-why')">Request Appointment</button>
              <a class="btn-ghost" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Call Now</a>
              <a class="btn-outline" href="<?php echo esc_url( home_url( '/new-patient-registration-form/' ) ); ?>">Get Started as a New Patient</a>
            </div>
          </div>
        </div>
      </section>

      <section class="lp-section lp-section--white">
        <div class="home-shell">
          <div class="rv">
            <div class="sec-eye"><span class="sec-lbl">New Patients</span><span class="sec-rule"></span></div>
            <h2 class="sec-h2">What to expect as a new patient in <?php echo esc_html( $locality ); ?>.</h2>
            <div class="lp-grid-steps">
              <?php foreach ( $cfg['new_patient_steps'] as $idx => $step ) : ?>
                <article class="lp-step-card rv">
                  <span class="lp-step-num"><?php echo esc_html( (string) ( $idx + 1 ) ); ?></span>
                  <h3><?php echo esc_html( $step['title'] ); ?></h3>
                  <p><?php echo esc_html( $step['body'] ); ?></p>
                </article>
              <?php endforeach; ?>
            </div>
            <div class="lp-actions" style="margin-top:24px">
              <a class="btn-red" href="<?php echo esc_url( home_url( '/new-patient-registration-form/' ) ); ?>">Start New Patient Form</a>
              <button class="btn-ghost" onclick="openAptModal('lp-<?php echo esc_attr( $id ); ?>-new-patient')">Request Appointment</button>
            </div>
          </div>
        </div>
      </section>

      <section class="lp-section lp-section--cream">
        <div class="home-shell">
          <div class="rv">
            <div class="sec-eye"><span class="sec-lbl">Areas We Serve</span><span class="sec-rule"></span></div>
            <h2 class="sec-h2"><?php echo esc_html( $cfg['community_heading'] ); ?></h2>
            <?php foreach ( $cfg['community'] as $para ) : ?>
              <p class="lp-copy" style="margin-top:12px"><?php echo esc_html( $para ); ?></p>
            <?php endforeach; ?>
            <div class="lp-linked-chips">
              <?php foreach ( $cfg['areas'] as $area ) : ?>
                <a class="lp-chip" href="<?php echo esc_url( home_url( $area['slug'] ) ); ?>"><?php echo esc_html( $area['label'] ); ?></a>
              <?php endforeach; ?>
            </div>
            <div class="lp-actions" style="margin-top:22px">
              <a class="btn-outline" href="<?php echo esc_url( home_url( '/vet-near-me/' ) ); ?>">Vets Near Me</a>
              <a class="btn-outline" href="<?php echo esc_url( home_url( '/services/' ) ); ?>">Pet Care Services</a>
            </div>
          </div>
        </div>
      </section>

      <section class="lp-section lp-section--white" id="directions">
        <div class="home-shell">
          <div class="rv">
            <div class="sec-eye"><span class="sec-lbl">Location &amp; Hours</span><span class="sec-rule"></span></div>
            <h2 class="sec-h2"><?php echo esc_html( $cfg['location_heading'] ); ?></h2>
            <div class="lp-grid-2">
              <div class="lp-map-card rv">
                <iframe class="lp-map" src="<?php echo esc_url( $map_embed ); ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Map to Veterinary Medical Center <?php echo esc_attr( $locality ); ?>"></iframe>
                <div class="lp-map-body">
                  <h3><?php echo esc_html( $address ); ?></h3>
                  <p>Call <a href="tel:<?php echo esc_attr( $phone_href ); ?>"><?php echo esc_html( $phone ); ?></a> or request an appointment online.</p>
                  <div class="lp-map-meta">
                    <div><strong>Phone</strong><a href="tel:<?php echo esc_attr( $phone_href ); ?>"><?php echo esc_html( $phone ); ?></a></div>
                    <div><strong>Directions</strong><a href="<?php echo esc_url( $map_link ); ?>" target="_blank" rel="noopener">Open in Google Maps</a></div>
                    <div><strong>Mon – Fri</strong><span><?php echo esc_html( $cfg['hours_weekday'] ); ?></span></div>
                    <div><strong>Saturday</strong><span><?php echo esc_html( $cfg['hours_saturday'] ); ?></span></div>
                  </div>
                </div>
              </div>
              <article class="lp-card rv rv2">
                <h3>Ready for your first visit?</h3>
                <p>Use the <a href="<?php echo esc_url( home_url( '/new-patient-registration-form/' ) ); ?>">new patient registration form</a>, <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">contact our team</a> with questions, or browse our <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">pet health resources</a>.</p>
                <div class="lp-actions" style="margin-top:22px">
                  <button class="btn-red" onclick="openAptModal('lp-<?php echo esc_attr( $id ); ?>-map')">Book Appointment</button>
                  <a class="btn-outline" href="<?php echo esc_url( $map_link ); ?>" target="_blank" rel="noopener">Get Directions</a>
                </div>
              </article>
            </div>
          </div>
        </div>
      </section>

      <section class="lp-section lp-section--white">
        <div class="home-shell">
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
            <div class="lp-actions" style="margin-top:24px">
              <button class="btn-red" onclick="openAptModal('lp-<?php echo esc_attr( $id ); ?>-faq')">Book Online</button>
              <a class="btn-outline" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Call Now</a>
            </div>
          </div>
        </div>
      </section>

      <section class="lp-section lp-section--warm">
        <div class="home-shell">
          <div class="rv">
            <article class="lp-cta-card rv">
              <div class="sec-eye"><span class="sec-lbl">Get Started</span><span class="sec-rule"></span></div>
              <h2>Simple next steps for pet families in <?php echo esc_html( $locality ); ?>.</h2>
              <div class="lp-grid-2" style="margin-top:20px">
                <article class="lp-card rv rv2">
                  <h3>Choosing the right vet in <?php echo esc_html( $locality ); ?></h3>
                  <p>Look for a team that explains findings clearly, offers preventive care and medical follow-up, and keeps communication consistent from one visit to the next.</p>
                  <p>That consistency helps you make better decisions for routine care, urgent concerns, and long-term health planning.</p>
                </article>
                <article class="lp-card rv rv2">
                  <h3>Why local, independent care matters</h3>
                  <p>Independent clinics can stay flexible around real families and real pets, instead of forcing one-size-fits-all care paths.</p>
                  <ul class="lp-list">
                    <li>Clear treatment options and practical next steps.</li>
                    <li>Continuity with a team that knows your pet over time.</li>
                    <li>Direct access to your clinic when questions come up.</li>
                  </ul>
                </article>
              </div>
              <div class="lp-grid-2" style="margin-top:18px">
                <article class="lp-card rv rv2">
                  <h3>Convenience for <?php echo esc_html( $locality ); ?> pet owners</h3>
                  <p>Use online booking, submit new patient information before arrival, and keep follow-up simple through one connected team.</p>
                  <p>Need guidance? Our clinic staff can help you choose the right appointment type and timing.</p>
                </article>
                <article class="lp-card rv rv2">
                  <h3>Simple next steps for new patients</h3>
                  <ul class="lp-list">
                    <li>Request your appointment online or by phone.</li>
                    <li>Complete new patient registration before your visit.</li>
                    <li>Bring records and questions so your first exam is productive.</li>
                  </ul>
                </article>
              </div>
              <?php if ( get_field( 'loc_seo_body' ) ) : ?>
                <div class="lp-copy" style="margin-top:18px"><?php echo wp_kses_post( get_field( 'loc_seo_body' ) ); ?></div>
              <?php endif; ?>
              <div class="lp-actions" style="margin-top:28px">
                <button class="btn-red" onclick="openAptModal('lp-<?php echo esc_attr( $id ); ?>-cta')">Request Appointment</button>
                <a class="btn-ghost" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Call Now</a>
                <a class="btn-outline" href="<?php echo esc_url( home_url( '/new-patient-registration-form/' ) ); ?>">Book Online <?php echo $arrow_svg; ?></a>
              </div>
            </article>
          </div>
        </div>
      </section>

    </div>

    <?php
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
                'areaServed'       => array_column( $cfg['areas'], 'label' ),
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
