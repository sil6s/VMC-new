<?php
/**
 * Template Name: Vet Independence KY SEO Page
 */

get_header();
$keyword = 'vet in Independence KY';
$h1 = get_field('loc_hero_heading') ?: 'Vet in Independence KY for Families Who Want Better Follow-Through';
$intro = get_field('loc_hero_body') ?: 'Veterinary Medical Center on Madison Pike supports dogs and cats across Independence and central Northern Kentucky with preventive care, diagnostics, and practical treatment planning.';
$seo = get_field('loc_seo_body');
?>
<section class="np-sec np-sec--white">
  <div class="services-shell" style="max-width:1080px;margin:0 auto;padding:72px 24px;">
    <div class="sec-eye"><span class="sec-lbl">Independence Location</span><span class="sec-rule"></span></div>
    <h1 class="sec-h2"><?php echo esc_html($h1); ?></h1>
    <p style="line-height:1.9;color:var(--mid)"><?php echo esc_html($intro); ?></p>
    <div style="display:flex;gap:12px;flex-wrap:wrap;margin:20px 0 30px;">
      <button class="btn-red" onclick="openAptModal('independence-page')">Book Appointment</button>
      <a class="btn-ghost" href="<?php echo esc_url(home_url('/contact/')); ?>">Contact Us</a>
    </div>
    <div class="np-card" style="padding:28px;line-height:1.9;">
      <h2><?php echo esc_html($keyword); ?> with full-service support on Madison Pike</h2>
      <p>Families searching for a vet in Independence KY usually want more than “nearby.” They want a team that can explain options clearly, schedule efficiently, and support long-term care for dogs and cats. Veterinary Medical Center in Independence is built around that real-life need. We serve Independence, Covington, Taylor Mill, Florence, Erlanger, and surrounding neighborhoods with relationship-first veterinary care.</p>
      <p>From wellness planning and vaccines to dental recommendations and chronic-condition follow-up, our team focuses on practical steps you can actually use at home. If you are moving to the area or changing clinics, this page gives you a direct path to contact, registration, and online booking tools.</p>
      <h3>Helpful links for Independence pet owners</h3>
      <ul>
        <li><a href="<?php echo esc_url(home_url('/new-patients/')); ?>">New patient guide</a></li>
        <li><a href="<?php echo esc_url(home_url('/services/')); ?>">Services overview</a></li>
        <li><a href="<?php echo esc_url(vmc_online_pharmacy_page_url()); ?>">Online vet pharmacy</a></li>
      </ul>
      <p>External reference: <a href="https://www.aspca.org/pet-care" target="_blank" rel="noopener">ASPCA pet care library</a>.</p>
      <?php if ( $seo ) : ?>
        <?php echo wp_kses_post($seo); ?>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>
