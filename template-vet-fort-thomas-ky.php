<?php
/**
 * Template Name: Vet Fort Thomas KY SEO Page
 */

get_header();
$keyword = 'vet in Fort Thomas KY';
$h1 = get_field('loc_hero_heading') ?: 'Vet in Fort Thomas KY for Community-Rooted Dog and Cat Care';
$intro = get_field('loc_hero_body') ?: 'Veterinary Medical Center on Memorial Parkway provides locally owned, women-led veterinary care for Fort Thomas families who want consistency and clear communication.';
$seo = get_field('loc_seo_body');
?>
<section class="np-sec np-sec--cream">
  <div class="services-shell" style="max-width:1080px;margin:0 auto;padding:72px 24px;">
    <div class="sec-eye"><span class="sec-lbl">Fort Thomas Location</span><span class="sec-rule"></span></div>
    <h1 class="sec-h2"><?php echo esc_html($h1); ?></h1>
    <p style="line-height:1.9;color:var(--mid)"><?php echo esc_html($intro); ?></p>
    <div style="display:flex;gap:12px;flex-wrap:wrap;margin:20px 0 30px;">
      <button class="btn-red" onclick="openAptModal('fort-thomas-page')">Book Appointment</button>
      <a class="btn-ghost" href="<?php echo esc_url(home_url('/contact/')); ?>">Contact Us</a>
    </div>
    <div class="np-card" style="padding:28px;line-height:1.9;">
      <h2><?php echo esc_html($keyword); ?> with local continuity and trusted communication</h2>
      <p>Pet owners looking for a vet in Fort Thomas KY are often comparing convenience, trust, and long-term follow-through. Veterinary Medical Center on Memorial Parkway brings those priorities together. Our team serves Fort Thomas and nearby communities with full-service dog and cat medicine that stays grounded in the same local relationships visit after visit.</p>
      <p>Because this location is near common Fort Thomas routes, many families can fit preventive visits, checkups, and follow-up care into normal school and work routines. That consistency helps pets stay on schedule and helps owners avoid last-minute care gaps.</p>
      <h3>Start your next step</h3>
      <ul>
        <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">Call or message our team</a></li>
        <li><a href="<?php echo esc_url(home_url('/new-patient-registration-form/')); ?>">Complete registration before your visit</a></li>
        <li><a href="<?php echo esc_url(vmc_patient_portal_page_url()); ?>">Use patient portal and online booking</a></li>
      </ul>
      <p>External reference: <a href="https://fearfreepets.com/resources/directory/" target="_blank" rel="noopener">Fear Free pet owner resources</a>.</p>
      <?php if ( $seo ) : ?>
        <?php echo wp_kses_post($seo); ?>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>
