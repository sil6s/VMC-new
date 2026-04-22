<?php
/**
 * Template Name: Vet Near Cincinnati SEO Page
 */

get_header();

$keyword        = 'vet near Cincinnati';
$eyebrow        = get_field('loc_hero_eyebrow') ?: 'Vet Near Cincinnati';
$h1             = get_field('loc_hero_heading') ?: 'Vet near Cincinnati with easy access and full-service care.';
$hero_body      = get_field('loc_hero_body') ?: 'Veterinary Medical Center Fort Thomas is a practical option for Cincinnati families who want easier parking, clear communication, and local continuity for dogs and cats.';
$primary_label  = get_field('loc_primary_button') ?: 'Request Appointment';
$secondary_lbl  = get_field('loc_secondary_button') ?: 'Get Directions';
$panel_heading  = get_field('loc_panel_heading') ?: 'Cincinnati-area families choose VMC for convenience and continuity';
$panel_body     = get_field('loc_panel_body') ?: 'Use this page to move quickly from research to booking, registration, and pharmacy support.';
$intro_heading  = get_field('loc_intro_heading') ?: 'A Cincinnati-close veterinary option without downtown stress';
$intro_body     = get_field('loc_intro_body') ?: 'For many households, crossing the river to Fort Thomas is easier than navigating downtown parking for routine and follow-up veterinary visits.';
$quick_body     = get_field('loc_quick_body') ?: 'We support wellness care, diagnostics, dental planning, surgery consultations, and same-week sick visit triage when available.';
$resource_h     = get_field('loc_resource_heading') ?: 'Resources for Cincinnati pet owners';
$resource_b     = get_field('loc_resource_body') ?: 'Use these links to book appointments, complete first-visit paperwork, and coordinate ongoing care online.';

$image          = get_field('loc_image') ?: get_template_directory_uri() . '/assets/images/about-fort-thomas.jpg';
$image_alt      = get_field('loc_image_alt') ?: 'vet near Cincinnati at Veterinary Medical Center Fort Thomas';
$image_caption  = get_field('loc_image_caption') ?: 'Veterinary Medical Center Fort Thomas, a Cincinnati-close location right off I-471.';
$team_image     = get_template_directory_uri() . '/assets/images/VMC Social Media.jpg';

$address        = vmc_get('vmc_ft_address', '2000 Memorial Parkway, Fort Thomas, KY 41075');
$phone          = vmc_get('vmc_ft_phone', '(859) 442-4420');
$weekday_hours  = vmc_get('vmc_ft_hours_weekday', '8:00 AM – 6:00 PM');
$sat_hours      = vmc_get('vmc_ft_hours_saturday', 'Rotating — call ahead');
$phone_href     = preg_replace('/[^0-9+]/', '', $phone);
$map_embed      = 'https://www.google.com/maps?q=' . rawurlencode($address) . '&output=embed';
$map_link       = 'https://maps.google.com/?q=' . rawurlencode($address);
$seo_body       = get_field('loc_seo_body');
?>

<div class="lp-page">
  <section class="lp-hero">
    <div class="lp-hero-copy">
      <div class="eyebrow"><span class="eyebrow-dash"></span><?php echo esc_html($eyebrow); ?></div>
      <h1 class="hero-h1"><?php echo esc_html($h1); ?></h1>
      <p class="hero-body"><?php echo esc_html($hero_body); ?></p>
      <div class="lp-actions">
        <button class="btn-red" onclick="openAptModal('cincinnati-hero')"><?php echo esc_html($primary_label); ?></button>
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
      <div class="sec-eye"><span class="sec-lbl">Why Cincinnati Families Choose VMC</span><span class="sec-rule"></span></div>
      <h2 class="sec-h2"><?php echo esc_html($intro_heading); ?></h2>
      <p class="lp-copy"><?php echo esc_html($intro_body); ?></p>
      <div class="lp-grid-2">
        <article class="lp-image-card"><img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>" loading="eager"><p><?php echo esc_html($image_caption); ?></p></article>
        <article class="lp-card">
          <h3><?php echo esc_html($keyword); ?> with practical local access</h3>
          <p><?php echo esc_html($quick_body); ?></p>
          <div class="lp-chips">
            <span class="lp-chip">Downtown Cincinnati</span><span class="lp-chip">Over-the-Rhine</span><span class="lp-chip">Mount Adams</span><span class="lp-chip">Newport</span><span class="lp-chip">Bellevue</span>
          </div>
        </article>
      </div>
    </div>
  </section>

  <section class="lp-section lp-section--warm" id="directions">
    <div class="home-shell">
      <div class="sec-eye"><span class="sec-lbl">Office & Map</span><span class="sec-rule"></span></div>
      <h2 class="sec-h2">Visit our Fort Thomas office from Cincinnati</h2>
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
            <li><a href="https://www.avma.org/resources-tools/pet-owners" target="_blank" rel="noopener">AVMA Pet Owner Resources</a></li>
          </ul>
          <img src="<?php echo esc_url($team_image); ?>" alt="Vet near Cincinnati team at Veterinary Medical Center" style="width:100%;border-radius:8px;margin-top:16px;">
        </article>
      </div>
    </div>
  </section>

  <section class="lp-section lp-section--white">
    <div class="home-shell">
      <article class="lp-card lp-card--seo">
        <h2>How to choose a <?php echo esc_html($keyword); ?> that actually works for your schedule</h2>
        <p>Cincinnati pet owners usually need more than proximity alone. They need a clinic where drop-off, parking, communication, and follow-up are all practical on a weekday. Veterinary Medical Center in Fort Thomas is built around that reality. For many households, the short drive across the river means less time navigating city parking and more time focused on your pet’s care plan.</p>
        <p>Our team supports preventive care, diagnostics, dental planning, surgery coordination, and sick-visit guidance with an emphasis on clear next steps. If your pet has anxiety, mobility limitations, or chronic conditions, that consistency helps visits feel manageable from check-in through follow-up.</p>
        <h3>What to do next</h3>
        <p>Start by requesting an appointment through our patient portal and online booking page, complete your registration form, and save our online pharmacy page for refill support. These steps make future care easier for your whole household.</p>
        <?php if ($seo_body) : ?><div class="lp-wysiwyg"><?php echo wp_kses_post($seo_body); ?></div><?php endif; ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <?php if (trim(wp_strip_all_tags(get_the_content()))) : ?><div class="lp-wysiwyg"><?php the_content(); ?></div><?php endif; ?>
        <?php endwhile; endif; ?>
      </article>
    </div>
  </section>
</div>

<?php get_footer(); ?>
