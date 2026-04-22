<?php
/**
 * Template Name: Vet Independence KY SEO Page
 */

get_header();

$keyword       = 'vet in Independence KY';
$eyebrow       = get_field('loc_hero_eyebrow') ?: 'Vet in Independence, KY';
$h1            = get_field('loc_hero_heading') ?: 'Vet in Independence KY for full-service pet care on Madison Pike';
$hero_body     = get_field('loc_hero_body') ?: 'Veterinary Medical Center Independence provides locally owned, relationship-based veterinary care for dogs and cats across central Northern Kentucky.';
$primary_label = get_field('loc_primary_button') ?: 'Request Appointment';
$secondary_lbl = get_field('loc_secondary_button') ?: 'Get Directions';
$panel_heading = get_field('loc_panel_heading') ?: 'Independence care that stays connected visit to visit';
$panel_body    = get_field('loc_panel_body') ?: 'Book online, complete registration, and keep pharmacy and follow-up tools in one place.';
$intro_heading = get_field('loc_intro_heading') ?: 'An Independence location designed for central Northern Kentucky access';
$intro_body    = get_field('loc_intro_body') ?: 'Our Madison Pike hospital supports wellness, diagnostics, dental care, and treatment planning with practical scheduling and direct communication.';
$quick_body    = get_field('loc_quick_body') ?: 'This page helps local families compare services, confirm office details, and take the next step quickly.';
$resource_h    = get_field('loc_resource_heading') ?: 'Independence resources';
$resource_b    = get_field('loc_resource_body') ?: 'Use these links for booking, paperwork, and trusted pet-owner information.';

$image         = get_field('loc_image') ?: get_template_directory_uri() . '/assets/images/about-independence.jpg';
$image_alt     = get_field('loc_image_alt') ?: 'vet in Independence KY Veterinary Medical Center on Madison Pike';
$image_caption = get_field('loc_image_caption') ?: 'Veterinary Medical Center Independence serving central Northern Kentucky.';
$team_image    = get_template_directory_uri() . '/assets/images/VMC Social Media.jpg';

$address       = vmc_get('vmc_ind_address', '4147 Madison Pike, Independence, KY 41051');
$phone         = vmc_get('vmc_ind_phone', '(859) 356-2242');
$weekday_hours = vmc_get('vmc_ind_hours_weekday', '8:00 AM – 6:00 PM');
$sat_hours     = vmc_get('vmc_ind_hours_saturday', 'Closed');
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
        <button class="btn-red" onclick="openAptModal('independence-hero')"><?php echo esc_html($primary_label); ?></button>
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
      <div class="sec-eye"><span class="sec-lbl">Independence Veterinary Care</span><span class="sec-rule"></span></div>
      <h2 class="sec-h2"><?php echo esc_html($intro_heading); ?></h2>
      <p class="lp-copy"><?php echo esc_html($intro_body); ?></p>
      <div class="lp-grid-2">
        <article class="lp-image-card"><img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>" loading="eager"><p><?php echo esc_html($image_caption); ?></p></article>
        <article class="lp-card">
          <h3><?php echo esc_html($keyword); ?> for central NKY</h3>
          <p><?php echo esc_html($quick_body); ?></p>
          <div class="lp-chips">
            <span class="lp-chip">Independence</span><span class="lp-chip">Covington</span><span class="lp-chip">Taylor Mill</span><span class="lp-chip">Erlanger</span><span class="lp-chip">Florence</span>
          </div>
        </article>
      </div>
    </div>
  </section>

  <section class="lp-section lp-section--warm" id="directions">
    <div class="home-shell">
      <div class="sec-eye"><span class="sec-lbl">Office & Map</span><span class="sec-rule"></span></div>
      <h2 class="sec-h2">Visit our Independence office</h2>
      <div class="lp-grid-2">
        <article class="lp-map-card">
          <iframe class="lp-map" src="<?php echo esc_url($map_embed); ?>" loading="lazy" title="Map to Veterinary Medical Center Independence"></iframe>
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
            <li><a href="https://www.aspca.org/pet-care" target="_blank" rel="noopener">ASPCA Pet Care Library</a></li>
          </ul>
          <img src="<?php echo esc_url($team_image); ?>" alt="Vet in Independence KY Veterinary Medical Center team" style="width:100%;border-radius:8px;margin-top:16px;">
        </article>
      </div>
    </div>
  </section>

  <section class="lp-section lp-section--white">
    <div class="home-shell">
      <article class="lp-card lp-card--seo">
        <h2>How to evaluate a <?php echo esc_html($keyword); ?> for long-term care</h2>
        <p>Choosing a veterinary team in Independence is about more than distance. Pet owners need a clinic that can support preventive care, explain diagnostics clearly, and guide treatment decisions as needs evolve. Our Independence location is structured for that long-term relationship approach.</p>
        <p>From first visits through follow-up care, we focus on practical communication and realistic care planning. If you are moving clinics or just moved to the area, this page gives you a direct path to registration, booking, and pharmacy coordination.</p>
        <h3>Helpful next steps</h3>
        <p>Use the patient portal page to request appointments online, complete new patient registration before your first visit, and keep pharmacy ordering centralized when eligible.</p>
        <?php if ($seo_body) : ?><div class="lp-wysiwyg"><?php echo wp_kses_post($seo_body); ?></div><?php endif; ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <?php if (trim(wp_strip_all_tags(get_the_content()))) : ?><div class="lp-wysiwyg"><?php the_content(); ?></div><?php endif; ?>
        <?php endwhile; endif; ?>
      </article>
    </div>
  </section>
</div>

<?php get_footer(); ?>
