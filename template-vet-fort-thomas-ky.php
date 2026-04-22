<?php
/**
 * Template Name: Vet Fort Thomas KY SEO Page
 */

get_header();

$keyword = 'vet in Fort Thomas KY';
$h1      = get_field('loc_hero_heading') ?: 'Vet in Fort Thomas KY: Local, Relationship-Based Care for Dogs and Cats';
$intro   = get_field('loc_hero_body') ?: 'Veterinary Medical Center offers locally owned veterinary care on Memorial Parkway for Fort Thomas families who value clear communication, practical access, and long-term follow-through.';
$panel_h = get_field('loc_panel_heading') ?: 'Fort Thomas veterinary care with practical next steps';
$panel_b = get_field('loc_panel_body') ?: 'Book online, call our team, or complete registration before your first visit.';
$image   = get_field('loc_image') ?: get_template_directory_uri() . '/assets/images/about-fort-thomas.jpg';
$img_alt = get_field('loc_image_alt') ?: 'vet in Fort Thomas KY Veterinary Medical Center exterior on Memorial Parkway';
$seo     = get_field('loc_seo_body');
?>
<section class="np-sec np-sec--cream">
  <div class="services-shell" style="max-width:1120px;margin:0 auto;padding:72px 24px;">
    <div class="sec-eye"><span class="sec-lbl">Fort Thomas Location</span><span class="sec-rule"></span></div>
    <h1 class="sec-h2"><?php echo esc_html($h1); ?></h1>
    <p style="max-width:78ch;color:var(--mid);line-height:1.9"><?php echo esc_html($intro); ?></p>
    <div style="display:flex;gap:12px;flex-wrap:wrap;margin:20px 0 30px;">
      <button class="btn-red" onclick="openAptModal('fort-thomas-page')">Book Appointment</button>
      <a class="btn-ghost" href="<?php echo esc_url(home_url('/contact/')); ?>">Contact Us</a>
    </div>

    <div class="np-form-grid" style="margin-bottom:24px;">
      <article class="np-card" style="padding:24px;">
        <h2 style="margin-top:0;"><?php echo esc_html($panel_h); ?></h2>
        <p><?php echo esc_html($panel_b); ?></p>
        <ul>
          <li><a href="<?php echo esc_url(vmc_patient_portal_page_url()); ?>">Patient portal and online booking</a></li>
          <li><a href="<?php echo esc_url(home_url('/new-patient-registration-form/')); ?>">New patient registration form</a></li>
          <li><a href="<?php echo esc_url(home_url('/services/')); ?>">Services for dogs and cats</a></li>
        </ul>
      </article>
      <article class="np-card" style="padding:0;overflow:hidden;">
        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($img_alt); ?>" style="width:100%;height:100%;min-height:280px;object-fit:cover;display:block;">
      </article>
    </div>

    <article class="np-card" style="padding:28px;line-height:1.9;">
      <h2><?php echo esc_html($keyword); ?> for Fort Thomas families who want consistency</h2>
      <p>If you are comparing options for a <?php echo esc_html($keyword); ?>, most decisions come down to trust, convenience, and communication. Our Fort Thomas hospital is positioned on Memorial Parkway near daily school and work routes, making preventive care and follow-up visits easier to keep on schedule. That practical access matters when your pet needs rechecks, medication monitoring, or annual care that should not be delayed.</p>
      <h3>What local pet owners ask for most</h3>
      <p>Fort Thomas households usually want a veterinary team that can handle wellness, diagnostics, dentistry, and sick visits without unnecessary confusion. We focus on clear explanations, step-by-step recommendations, and realistic treatment plans that fit your pet and your family’s routine. If you have a nervous pet, let us know before the visit so we can plan a calmer arrival and exam experience.</p>
      <h3>Internal and external resources</h3>
      <p>Start with our <a href="<?php echo esc_url(home_url('/new-patients/')); ?>">new patients page</a>, use the <a href="<?php echo esc_url(home_url('/patient-portal-online-booking/')); ?>">patient portal page</a>, and request refills through our <a href="<?php echo esc_url(home_url('/online-vet-pharmacy-northern-kentucky-cincinnati/')); ?>">online pharmacy page</a>. For additional pet-owner education, review <a href="https://www.avma.org/resources-tools/pet-owners" target="_blank" rel="noopener">AVMA pet owner guidance</a>.</p>
      <?php if ($seo) : ?>
        <?php echo wp_kses_post($seo); ?>
      <?php endif; ?>
    </article>
  </div>
</section>
<?php get_footer(); ?>
