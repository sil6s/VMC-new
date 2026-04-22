<?php
/**
 * Template Name: Vet Fort Thomas KY SEO Page
 */

get_header();

$keyword       = 'vet in Fort Thomas KY';
$eyebrow       = get_field('loc_hero_eyebrow') ?: 'Vet in Fort Thomas, KY';
$h1            = get_field('loc_hero_heading') ?: 'Vet in Fort Thomas KY with local ownership and consistent care';
$hero_body     = get_field('loc_hero_body') ?: 'Veterinary Medical Center on Memorial Parkway offers women-led, locally owned veterinary care for Fort Thomas dogs and cats.';
$primary_label = get_field('loc_primary_button') ?: 'Request Appointment';
$secondary_lbl = get_field('loc_secondary_button') ?: 'Get Directions';
$panel_heading = get_field('loc_panel_heading') ?: 'Fort Thomas care with clear next steps';
$panel_body    = get_field('loc_panel_body') ?: 'Book online, call our team, or complete registration before your first visit.';
$intro_heading = get_field('loc_intro_heading') ?: 'A Fort Thomas veterinary page built around real routines';
$intro_body    = get_field('loc_intro_body') ?: 'Our Memorial Parkway location is practical for school drop-off routes, work commutes, and regular preventive care follow-through.';
$quick_body    = get_field('loc_quick_body') ?: 'Families rely on this location for wellness visits, diagnostics, dentistry, and treatment planning with direct communication.';
$resource_h    = get_field('loc_resource_heading') ?: 'Fort Thomas resources';
$resource_b    = get_field('loc_resource_body') ?: 'Use these links for booking, registration, pharmacy access, and first-visit preparation.';

$image         = get_field('loc_image') ?: get_template_directory_uri() . '/assets/images/about-fort-thomas.jpg';
$image_alt     = get_field('loc_image_alt') ?: 'vet in Fort Thomas KY Veterinary Medical Center exterior on Memorial Parkway';
$image_caption = get_field('loc_image_caption') ?: 'Veterinary Medical Center Fort Thomas near Highlands High School.';
$team_image    = get_template_directory_uri() . '/assets/images/VMC Social Media.jpg';

$address       = vmc_get('vmc_ft_address', '2000 Memorial Parkway, Fort Thomas, KY 41075');
$phone         = vmc_get('vmc_ft_phone', '(859) 442-4420');
$weekday_hours = vmc_get('vmc_ft_hours_weekday', '8:00 AM – 6:00 PM');
$sat_hours     = vmc_get('vmc_ft_hours_saturday', 'Rotating — call ahead');
$phone_href    = preg_replace('/[^0-9+]/', '', $phone);
$map_embed     = 'https://www.google.com/maps?q=' . rawurlencode($address) . '&output=embed';
$map_link      = 'https://maps.google.com/?q=' . rawurlencode($address);
$seo_body      = get_field('loc_seo_body');
?>

<div class="lp-page">
  <section class="lp-hero">
    <div class="lp-hero-copy">
      <div class="eyebrow"><span class="eyebrow-dash"></span><?php echo esc_html($eyebrow); ?></div>
      <h1 class="hero-h1"><?php echo esc_html($h1); ?></h1>
      <p class="hero-body"><?php echo esc_html($hero_body); ?></p>
      <div class="lp-actions">
        <button class="btn-red" onclick="openAptModal('fort-thomas-hero')"><?php echo esc_html($primary_label); ?></button>
        <a class="btn-ghost" href="<?php echo esc_url(home_url('/contact/')); ?>">Contact Us</a>
      </div>
    </div>
    <aside class="lp-hero-side">
      <div class="lp-card">
        <h2><?php echo esc_html($panel_heading); ?></h2>
        <p><?php echo esc_html($panel_body); ?></p>
        <ul class="lp-list">
          <li><a href="tel:<?php echo esc_attr($phone_href); ?>"><?php echo esc_html($phone); ?></a></li>
          <li><a href="<?php echo esc_url(vmc_patient_portal_page_url()); ?>">Patient Portal & Online Booking</a></li>
          <li><a href="<?php echo esc_url(home_url('/new-patient-registration-form/')); ?>">New Patient Registration Form</a></li>
        </ul>
      </div>
    </aside>
  </section>

  <section class="lp-section lp-section--white">
    <div class="home-shell">
      <div class="sec-eye"><span class="sec-lbl">Local Fort Thomas Care</span><span class="sec-rule"></span></div>
      <h2 class="sec-h2"><?php echo esc_html($intro_heading); ?></h2>
      <p class="lp-copy"><?php echo esc_html($intro_body); ?></p>
      <div class="lp-grid-2">
        <article class="lp-image-card"><img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>" loading="eager"><p><?php echo esc_html($image_caption); ?></p></article>
        <article class="lp-card">
          <h3><?php echo esc_html($keyword); ?> for long-term continuity</h3>
          <p><?php echo esc_html($quick_body); ?></p>
          <div class="lp-chips">
            <span class="lp-chip">Fort Thomas</span><span class="lp-chip">Highland Heights</span><span class="lp-chip">Bellevue</span><span class="lp-chip">Newport</span><span class="lp-chip">Cold Spring</span>
          </div>
        </article>
      </div>
    </div>
  </section>

  <section class="lp-section lp-section--warm" id="directions">
    <div class="home-shell">
      <div class="sec-eye"><span class="sec-lbl">Office & Map</span><span class="sec-rule"></span></div>
      <h2 class="sec-h2">Visit our Fort Thomas office</h2>
      <div class="lp-grid-2">
        <article class="lp-map-card">
          <iframe class="lp-map" src="<?php echo esc_url($map_embed); ?>" loading="lazy" title="Map to Veterinary Medical Center Fort Thomas"></iframe>
          <div class="lp-map-body">
            <h3><?php echo esc_html($address); ?></h3>
            <p>Mon–Fri: <?php echo esc_html($weekday_hours); ?> · Saturday: <?php echo esc_html($sat_hours); ?></p>
            <div class="lp-actions"><a class="btn-outline" target="_blank" rel="noopener" href="<?php echo esc_url($map_link); ?>"><?php echo esc_html($secondary_lbl); ?></a></div>
          </div>
        </article>
        <article class="lp-card">
          <h3><?php echo esc_html($resource_h); ?></h3>
          <p><?php echo esc_html($resource_b); ?></p>
          <ul class="lp-list">
            <li><a href="<?php echo esc_url(home_url('/services/')); ?>">Explore Services</a></li>
            <li><a href="<?php echo esc_url(home_url('/online-vet-pharmacy-northern-kentucky-cincinnati/')); ?>">Online Vet Pharmacy</a></li>
            <li><a href="https://fearfreepets.com/resources/directory/" target="_blank" rel="noopener">Fear Free Pet Owner Resources</a></li>
          </ul>
          <img src="<?php echo esc_url($team_image); ?>" alt="Vet in Fort Thomas KY Veterinary Medical Center team" style="width:100%;border-radius:8px;margin-top:16px;">
        </article>
      </div>
    </div>
  </section>

  <section class="lp-section lp-section--white">
    <div class="home-shell">
      <article class="lp-card lp-card--seo">
        <h2>Choosing a <?php echo esc_html($keyword); ?> for preventive and advanced care</h2>
        <p>When families compare options for a <?php echo esc_html($keyword); ?>, they usually evaluate convenience, communication, and depth of services. We support all three. Our Fort Thomas team helps with annual care, diagnostics, dental consultations, and treatment follow-up while keeping recommendations understandable and practical.</p>
        <p>Because this location is part of daily community routines, it is easier for many owners to stay consistent with wellness and recheck scheduling. That continuity can make a major difference for chronic conditions and senior pet care planning.</p>
        <h3>Helpful next steps</h3>
        <p>Complete your first-visit paperwork, book online through the patient portal, and use our online pharmacy for eligible refill support between visits.</p>
        <?php if ($seo_body) : ?><div class="lp-wysiwyg"><?php echo wp_kses_post($seo_body); ?></div><?php endif; ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <?php if (trim(wp_strip_all_tags(get_the_content()))) : ?><div class="lp-wysiwyg"><?php the_content(); ?></div><?php endif; ?>
        <?php endwhile; endif; ?>
      </article>
    </div>
  </section>
</div>

<?php get_footer(); ?>
