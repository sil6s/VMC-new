<?php
/**
 * Template Name: Vet Near Cincinnati SEO Page
 */

get_header();

$keyword = 'vet near Cincinnati';
$h1      = get_field('loc_hero_heading') ?: '7 Reasons Cincinnati Pet Owners Choose a Vet Near Cincinnati at VMC';
$intro   = get_field('loc_hero_body') ?: 'Veterinary Medical Center in Fort Thomas gives Cincinnati families a nearby veterinary option with easier access, straightforward parking, and locally owned care.';
$panel_h = get_field('loc_panel_heading') ?: 'Cincinnati-close care without downtown friction';
$panel_b = get_field('loc_panel_body') ?: 'Cross the river, park easily, and work with a team focused on long-term pet health.';
$image   = get_field('loc_image') ?: get_template_directory_uri() . '/assets/images/about-fort-thomas.jpg';
$img_alt = get_field('loc_image_alt') ?: 'vet near Cincinnati at Veterinary Medical Center Fort Thomas location';
$seo     = get_field('loc_seo_body');
?>
<section class="np-sec np-sec--cream">
  <div class="services-shell" style="max-width:1120px;margin:0 auto;padding:72px 24px;">
    <div class="sec-eye"><span class="sec-lbl">Cincinnati Area</span><span class="sec-rule"></span></div>
    <h1 class="sec-h2"><?php echo esc_html($h1); ?></h1>
    <p style="max-width:78ch;color:var(--mid);line-height:1.9"><?php echo esc_html($intro); ?></p>
    <div style="display:flex;gap:12px;flex-wrap:wrap;margin:20px 0 30px;">
      <button class="btn-red" onclick="openAptModal('cincinnati-page')">Book Appointment</button>
      <a class="btn-ghost" href="<?php echo esc_url(home_url('/contact/')); ?>">Contact Us</a>
    </div>

    <div class="np-form-grid" style="margin-bottom:24px;">
      <article class="np-card" style="padding:24px;">
        <h2 style="margin-top:0;"><?php echo esc_html($panel_h); ?></h2>
        <p><?php echo esc_html($panel_b); ?></p>
        <ul>
          <li><a href="<?php echo esc_url(vmc_patient_portal_page_url()); ?>">Patient portal and online booking</a></li>
          <li><a href="<?php echo esc_url(home_url('/services/')); ?>">Services for Cincinnati-area pets</a></li>
          <li><a href="<?php echo esc_url(home_url('/new-patient-registration-form/')); ?>">New patient registration</a></li>
        </ul>
      </article>
      <article class="np-card" style="padding:0;overflow:hidden;">
        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($img_alt); ?>" style="width:100%;height:100%;min-height:280px;object-fit:cover;display:block;">
      </article>
    </div>

    <article class="np-card" style="padding:28px;line-height:1.9;">
      <h2><?php echo esc_html($keyword); ?> with easier access from downtown and nearby neighborhoods</h2>
      <p>Cincinnati clients often need a clinic that is close enough for routine follow-up but easier than downtown logistics. Our Fort Thomas location is just across the river and convenient for many households in Downtown Cincinnati, Mount Adams, and Over-the-Rhine. This practical access helps owners stay consistent with annual exams, diagnostics, dental follow-up, and medication rechecks.</p>
      <h3>Local intent, natural language, and high-readability structure</h3>
      <p>This page is organized for readability with short sections, descriptive headings, and clear action links. We use the target keyword naturally at the beginning and throughout the content so the copy remains human-first while still supporting strong on-page SEO signals for “vet near Cincinnati.”</p>
      <h3>Helpful references for Cincinnati pet families</h3>
      <p>Use our <a href="<?php echo esc_url(home_url('/online-vet-pharmacy-northern-kentucky-cincinnati/')); ?>">online vet pharmacy page</a> for eligible refill ordering and the <a href="<?php echo esc_url(home_url('/patient-portal-online-booking/')); ?>">patient portal page</a> for online appointment requests. For broader pet-care education, review <a href="https://www.avma.org/resources-tools/pet-owners" target="_blank" rel="noopener">AVMA resources for pet owners</a>.</p>
      <?php if ($seo) : ?>
        <?php echo wp_kses_post($seo); ?>
      <?php endif; ?>
    </article>
  </div>
</section>
<?php get_footer(); ?>
