<?php
/**
 * Template Name: Vet Independence KY SEO Page
 */

get_header();

$keyword = 'vet in Independence KY';
$h1      = get_field('loc_hero_heading') ?: 'Vet in Independence KY for Full-Service, Locally Owned Pet Care';
$intro   = get_field('loc_hero_body') ?: 'Veterinary Medical Center on Madison Pike supports Independence and central Northern Kentucky families with practical scheduling, clear recommendations, and long-term care for dogs and cats.';
$panel_h = get_field('loc_panel_heading') ?: 'Independence care that stays connected visit to visit';
$panel_b = get_field('loc_panel_body') ?: 'Use this page to book, prepare, and stay organized with online tools.';
$image   = get_field('loc_image') ?: get_template_directory_uri() . '/assets/images/about-independence.jpg';
$img_alt = get_field('loc_image_alt') ?: 'vet in Independence KY Veterinary Medical Center location on Madison Pike';
$seo     = get_field('loc_seo_body');
?>
<section class="np-sec np-sec--white">
  <div class="services-shell" style="max-width:1120px;margin:0 auto;padding:72px 24px;">
    <div class="sec-eye"><span class="sec-lbl">Independence Location</span><span class="sec-rule"></span></div>
    <h1 class="sec-h2"><?php echo esc_html($h1); ?></h1>
    <p style="max-width:78ch;color:var(--mid);line-height:1.9"><?php echo esc_html($intro); ?></p>
    <div style="display:flex;gap:12px;flex-wrap:wrap;margin:20px 0 30px;">
      <button class="btn-red" onclick="openAptModal('independence-page')">Book Appointment</button>
      <a class="btn-ghost" href="<?php echo esc_url(home_url('/contact/')); ?>">Contact Us</a>
    </div>

    <div class="np-form-grid" style="margin-bottom:24px;">
      <article class="np-card" style="padding:24px;">
        <h2 style="margin-top:0;"><?php echo esc_html($panel_h); ?></h2>
        <p><?php echo esc_html($panel_b); ?></p>
        <ul>
          <li><a href="<?php echo esc_url(home_url('/services/')); ?>">Explore veterinary services</a></li>
          <li><a href="<?php echo esc_url(vmc_online_pharmacy_page_url()); ?>">Northern Kentucky and Cincinnati online vet pharmacy</a></li>
          <li><a href="<?php echo esc_url(vmc_patient_portal_page_url()); ?>">Patient portal and online booking page</a></li>
        </ul>
      </article>
      <article class="np-card" style="padding:0;overflow:hidden;">
        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($img_alt); ?>" style="width:100%;height:100%;min-height:280px;object-fit:cover;display:block;">
      </article>
    </div>

    <article class="np-card" style="padding:28px;line-height:1.9;">
      <h2><?php echo esc_html($keyword); ?> for central Northern Kentucky households</h2>
      <p>Families searching for a <?php echo esc_html($keyword); ?> typically need a clinic that combines convenience with stronger follow-through. The Independence hospital on Madison Pike is designed for that mix: easy access for routine care, but also a team that can help you navigate diagnostics, chronic conditions, and plan updates when your pet’s needs change over time.</p>
      <h3>Why this page is built for local SEO and real users</h3>
      <p>This Independence page is written specifically for local families, not copied from another city. We include local search intent naturally, use clear headings, and provide quick internal links so visitors can move from research to scheduling without extra clicks. That improves usability and helps search engines understand relevance for “vet in Independence KY” queries.</p>
      <h3>Where to go next</h3>
      <p>Before your first visit, review the <a href="<?php echo esc_url(home_url('/new-patients/')); ?>">new patient checklist</a> and complete your <a href="<?php echo esc_url(home_url('/new-patient-registration-form/')); ?>">registration form</a>. For general pet-care reading, the <a href="https://www.aspca.org/pet-care" target="_blank" rel="noopener">ASPCA pet care library</a> is a useful external reference.</p>
      <?php if ($seo) : ?>
        <?php echo wp_kses_post($seo); ?>
      <?php endif; ?>
    </article>
  </div>
</section>
<?php get_footer(); ?>
