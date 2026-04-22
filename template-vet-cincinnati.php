<?php
/**
 * Template Name: Vet Near Cincinnati SEO Page
 */

get_header();
$keyword = 'vet near Cincinnati';
$h1 = get_field('loc_hero_heading') ?: '7 Smart Reasons Pet Owners Choose a Vet Near Cincinnati at VMC';
$intro = get_field('loc_hero_body') ?: 'If you are searching for a vet near Cincinnati, Veterinary Medical Center in Fort Thomas gives you quick access from downtown with easier parking and a calm, relationship-based care environment.';
$seo = get_field('loc_seo_body');
?>
<section class="np-sec np-sec--cream">
  <div class="services-shell" style="max-width:1080px;margin:0 auto;padding:72px 24px;">
    <div class="sec-eye"><span class="sec-lbl">Vet Near Cincinnati</span><span class="sec-rule"></span></div>
    <h1 class="sec-h2"><?php echo esc_html($h1); ?></h1>
    <p style="line-height:1.9;color:var(--mid)"><?php echo esc_html($intro); ?></p>
    <div style="display:flex;gap:12px;flex-wrap:wrap;margin:20px 0 30px;">
      <button class="btn-red" onclick="openAptModal('cincinnati-page')">Book Appointment</button>
      <a class="btn-ghost" href="<?php echo esc_url(home_url('/contact/')); ?>">Contact Us</a>
    </div>
    <div class="np-card" style="padding:28px;line-height:1.9;">
      <h2><?php echo esc_html($keyword); ?> with practical access and local accountability</h2>
      <p>Cincinnati pet owners often need a clinic that is close to downtown but not trapped by downtown parking stress. Veterinary Medical Center in Fort Thomas is right off I-471, so many families can cross the river, park, and start their visit without the usual city friction. For anxious pets, senior pets, and busy households, that smoother arrival can make a real difference.</p>
      <p>Our Fort Thomas location serves clients from Downtown Cincinnati, Over-the-Rhine, Mount Adams, Newport, and Bellevue. You get full-service preventive care, diagnostics, dental care, and surgery planning with a team that communicates clearly and follows through after the appointment. If you are comparing options for a vet near Cincinnati, continuity matters as much as convenience.</p>
      <h3>What to do next</h3>
      <ul>
        <li>Review our <a href="<?php echo esc_url(home_url('/services/')); ?>">veterinary services</a>.</li>
        <li>Complete the <a href="<?php echo esc_url(home_url('/new-patient-registration-form/')); ?>">new patient form</a>.</li>
        <li>Use our <a href="<?php echo esc_url(vmc_patient_portal_page_url()); ?>">patient portal and online booking page</a>.</li>
      </ul>
      <p>Helpful external guidance: <a href="https://www.avma.org/resources-tools/pet-owners" target="_blank" rel="noopener">AVMA pet owner resources</a>.</p>
      <?php if ( $seo ) : ?>
        <?php echo wp_kses_post($seo); ?>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>
