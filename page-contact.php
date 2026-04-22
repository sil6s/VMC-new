<?php
/**
 * Template Name: Contact
 * Template Post Type: page
 */

get_header();

/*
|--------------------------------------------------------------------------
| ACF-backed utility values
|--------------------------------------------------------------------------
| Use get_field() where escaping/attributes/conditionals are required.
| Use the_field() directly for plain visible text output.
*/

$ft_phone    = get_field('ft_phone');
$ind_phone   = get_field('ind_phone');
$ft_address  = get_field('ft_address');
$ind_address = get_field('ind_address');

$contact_email          = get_field('contact_email');
$contact_form_shortcode = get_field('contact_form_shortcode');

$ft_hours_weekday   = get_field('ft_hours_weekday');
$ft_hours_saturday  = get_field('ft_hours_saturday');
$ft_hours_sunday    = get_field('ft_hours_sunday');

$ind_hours_weekday  = get_field('ind_hours_weekday');
$ind_hours_saturday = get_field('ind_hours_saturday');
$ind_hours_sunday   = get_field('ind_hours_sunday');

$portal_url = get_field('portal_url');

$ft_map_query  = rawurlencode($ft_address ? $ft_address : '');
$ind_map_query = rawurlencode($ind_address ? $ind_address : '');
?>

<style>
.contact-page{
  background:var(--cream);
}

/* hero */
.contact-hero{
  background:var(--cream);
}
.contact-hero .hero-h1{
  max-width:11ch;
  font-size:clamp(40px,5vw,68px);
}
.contact-hero-side{
  display:flex;
  flex-direction:column;
  justify-content:center;
  padding:72px 52px 72px 24px;
  background:var(--warm);
}
.contact-panel{
  background:var(--white);
  border:1px solid rgba(0,0,0,0.06);
  border-radius:8px;
  box-shadow:0 20px 56px rgba(0,0,0,.06);
  padding:28px;
}
.contact-panel h3,
.contact-form-card h3,
.contact-hours-card h3,
.contact-loc-card h3,
.contact-cta-box h3,
.contact-mini-card h3{
  font-family:'Playfair Display',serif;
  color:var(--dark);
}
.contact-panel h3{
  font-size:28px;
  line-height:1.08;
  margin-bottom:12px;
}
.contact-panel-list{
  display:grid;
  gap:14px;
  margin-top:10px;
}
.contact-panel-item{
  display:grid;
  grid-template-columns:40px 1fr;
  gap:12px;
  align-items:start;
  padding-bottom:14px;
  border-bottom:1px solid rgba(0,0,0,0.08);
}
.contact-panel-item:last-child{
  border-bottom:none;
  padding-bottom:0;
}
.contact-icon{
  width:40px;
  height:40px;
  border-radius:10px;
  background:var(--rglow);
  color:var(--red);
  display:flex;
  align-items:center;
  justify-content:center;
  flex-shrink:0;
}
.contact-panel-item strong{
  display:block;
  margin-bottom:4px;
  font-size:14px;
  color:var(--dark);
}
.contact-panel-item span{
  display:block;
  font-size:13.5px;
  line-height:1.7;
  color:var(--mid);
}
.contact-panel-item span a{
  color:inherit;
  text-decoration:none;
}
.contact-panel-item span a:hover{
  color:var(--red);
}
.contact-panel-note{
  margin-top:16px;
  font-size:13px;
  line-height:1.7;
  color:var(--mid);
}
/* shared */
.contact-band{
  padding:88px 0;
}
.contact-shell{
  width:min(1600px, calc(100% - (var(--pad) * 2)));
  margin:0 auto;
}
.contact-copy{
  margin-top:14px;
  max-width:760px;
  font-size:15px;
  line-height:1.85;
  color:var(--mid);
}

/* form section */
.contact-form-grid{
  display:grid;
  grid-template-columns:minmax(0,1.05fr) minmax(0,.95fr);
  gap:24px;
  margin-top:34px;
}
.contact-form-card,
.contact-mini-card{
  background:var(--white);
  border:1px solid rgba(0,0,0,0.06);
  border-radius:8px;
  box-shadow:0 20px 56px rgba(0,0,0,.06);
  padding:30px;
}
.contact-form-card h3{
  font-size:30px;
  line-height:1.08;
  margin-bottom:12px;
}
.contact-form-card p,
.contact-mini-card p{
  font-size:14px;
  line-height:1.8;
  color:var(--mid);
}
.contact-mini-stack{
  display:grid;
  gap:18px;
}
.contact-mini-card h3{
  font-size:26px;
  line-height:1.08;
  margin-bottom:10px;
}

.contact-fallback-form{
  margin-top:22px;
}
.contact-field-grid{
  display:grid;
  grid-template-columns:1fr 1fr;
  gap:14px;
}
.contact-field{
  display:flex;
  flex-direction:column;
  gap:8px;
}
.contact-field-full{
  grid-column:1 / -1;
}
.contact-field label{
  font-size:11px;
  font-weight:700;
  letter-spacing:.14em;
  text-transform:uppercase;
  color:var(--gold);
}
.contact-field input,
.contact-field textarea,
.contact-field select{
  width:100%;
  border:1px solid rgba(0,0,0,0.12);
  background:var(--cream);
  color:var(--dark);
  border-radius:6px;
  padding:14px 14px;
  font:inherit;
}
.contact-field textarea{
  min-height:160px;
  resize:vertical;
}
.contact-form-actions{
  margin-top:18px;
}

/* hours */
.contact-hours-grid{
  display:grid;
  grid-template-columns:repeat(2,minmax(0,1fr));
  gap:22px;
  margin-top:34px;
}
.contact-hours-card{
  background:var(--white);
  border:1px solid rgba(0,0,0,0.06);
  border-radius:8px;
  padding:28px;
  box-shadow:0 20px 56px rgba(0,0,0,.06);
}
.contact-hours-card h3{
  font-size:28px;
  margin-bottom:16px;
}
.contact-hours-list{
  display:grid;
  gap:10px;
}
.contact-hours-row{
  display:flex;
  justify-content:space-between;
  gap:20px;
  padding-bottom:10px;
  border-bottom:1px solid rgba(0,0,0,0.08);
}
.contact-hours-row:last-child{
  border-bottom:none;
  padding-bottom:0;
}
.contact-hours-row span{
  font-size:14px;
  line-height:1.6;
  color:var(--mid);
}
.contact-hours-row strong{
  font-size:14px;
  line-height:1.6;
  color:var(--dark);
  text-align:right;
}

/* locations */
.contact-location-grid{
  display:grid;
  grid-template-columns:repeat(2,minmax(0,1fr));
  gap:22px;
  margin-top:34px;
}
.contact-loc-card{
  background:var(--white);
  border:1px solid rgba(0,0,0,0.06);
  border-radius:8px;
  box-shadow:0 20px 56px rgba(0,0,0,.06);
  padding:0;
  overflow:hidden;
}
.contact-map{
  width:100%;
  height:300px;
  border:0;
  display:block;
  background:var(--warm);
}
.contact-loc-body{
  padding:28px;
}
.contact-loc-card h3{
  font-size:26px;
  margin-bottom:10px;
}
.contact-loc-card p{
  font-size:14px;
  line-height:1.75;
  color:var(--mid);
}
.contact-loc-card a{
  display:inline-flex;
  margin-top:12px;
  font-size:14px;
  font-weight:700;
  color:var(--red);
}

/* SEO content section */
.contact-seo-content{
  font-size:15px;
  line-height:1.85;
  color:var(--mid);
}
.contact-seo-content > *:first-child{
  margin-top:0;
}
.contact-seo-content h2,
.contact-seo-content h3,
.contact-seo-content h4{
  color:var(--dark);
}

/* final CTA */
.contact-cta-box{
  background:var(--white);
  border:1px solid rgba(0,0,0,0.06);
  border-radius:8px;
  box-shadow:0 20px 56px rgba(0,0,0,.06);
  padding:34px;
}
.contact-cta-box h3{
  font-size:34px;
  line-height:1.08;
  margin-bottom:12px;
}
.contact-cta-box p{
  max-width:760px;
  font-size:15px;
  line-height:1.85;
  color:var(--mid);
}
.contact-cta-btns{
  display:flex;
  flex-wrap:wrap;
  gap:14px;
  margin-top:24px;
}

/* responsive */
@media(max-width:1100px){
  .contact-form-grid,
  .contact-hours-grid,
  .contact-location-grid{
    grid-template-columns:1fr;
  }
}
@media(max-width:900px){
  .contact-hero-side{
    padding:24px;
  }
  .contact-band{
    padding:64px 24px;
  }
  .contact-field-grid{
    grid-template-columns:1fr;
  }
  .contact-map{
    height:240px;
  }
  .contact-cta-btns{
    flex-direction:column;
    align-items:flex-start;
  }
}
</style>

<div class="contact-page">

  <section class="hero contact-hero">
    <div class="hero-copy">
      <div class="eyebrow">
        <span class="eyebrow-dash"></span>
        <?php the_field('hero_eyebrow'); ?>
      </div>

      <h1 class="hero-h1">
        <?php the_field('hero_title_line_1'); ?>
        <em><?php the_field('hero_title_emphasis'); ?></em>
      </h1>

      <p class="hero-body">
        <?php the_field('hero_body'); ?>
      </p>

      <div class="hero-btns">
        <a href="<?php echo esc_url(get_field('hero_button_1_url')); ?>" class="btn-red"><?php the_field('hero_button_1_text'); ?></a>
        <a href="<?php echo esc_url(get_field('hero_button_2_url')); ?>" class="btn-ghost"><?php the_field('hero_button_2_text'); ?></a>
      </div>

      <div class="hero-stats">
        <div class="hstat">
          <span class="hstat-n"><?php the_field('hero_stat_1_number'); ?></span>
          <span class="hstat-l"><?php the_field('hero_stat_1_label'); ?></span>
        </div>
        <div class="hstat">
          <span class="hstat-n"><?php the_field('hero_stat_2_number'); ?></span>
          <span class="hstat-l"><?php the_field('hero_stat_2_label'); ?></span>
        </div>
        <div class="hstat">
          <span class="hstat-n"><?php the_field('hero_stat_3_number'); ?></span>
          <span class="hstat-l"><?php the_field('hero_stat_3_label'); ?></span>
        </div>
      </div>
    </div>

    <aside class="contact-hero-side">
      <div class="contact-panel">
        <h3><?php the_field('quick_contact_heading'); ?></h3>

        <div class="contact-panel-list">
          <div class="contact-panel-item">
            <div class="contact-icon">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.79 19.79 0 0 1 2.12 4.18 2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.12.9.33 1.78.63 2.63a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.45-1.2a2 2 0 0 1 2.11-.45c.85.3 1.73.51 2.63.63A2 2 0 0 1 22 16.92z"/></svg>
            </div>
            <div>
              <strong><?php the_field('quick_contact_ft_label'); ?></strong>
              <span><?php echo esc_html($ft_phone); ?></span>
            </div>
          </div>

          <div class="contact-panel-item">
            <div class="contact-icon">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.79 19.79 0 0 1 2.12 4.18 2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.12.9.33 1.78.63 2.63a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.45-1.2a2 2 0 0 1 2.11-.45c.85.3 1.73.51 2.63.63A2 2 0 0 1 22 16.92z"/></svg>
            </div>
            <div>
              <strong><?php the_field('quick_contact_ind_label'); ?></strong>
              <span><?php echo esc_html($ind_phone); ?></span>
            </div>
          </div>

          <div class="contact-panel-item">
            <div class="contact-icon">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16v16H4z"/><path d="m4 7 8 6 8-6"/></svg>
            </div>
            <div>
              <strong><?php the_field('quick_contact_email_label'); ?></strong>
              <span>
                <a href="mailto:<?php echo antispambot(esc_attr($contact_email)); ?>">
                  <?php echo esc_html(antispambot($contact_email)); ?>
                </a>
              </span>
            </div>
          </div>

          <div class="contact-panel-item">
            <div class="contact-icon">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M8 2v4"/><path d="M16 2v4"/><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M3 10h18"/></svg>
            </div>
            <div>
              <strong><?php the_field('quick_contact_hours_label'); ?></strong>
              <span><?php the_field('quick_contact_hours_text'); ?></span>
            </div>
          </div>
        </div>

        <div class="contact-panel-note">
          <?php the_field('quick_contact_note'); ?>
        </div>
      </div>
    </aside>
  </section>

  <section class="contact-band" id="contact-form" style="background:var(--white);">
    <div class="contact-shell">
      <div class="sec-eye">
        <span class="sec-lbl"><?php the_field('form_section_eyebrow'); ?></span>
        <span class="sec-rule"></span>
      </div>
      <h2 class="sec-h2"><?php the_field('form_section_heading'); ?></h2>
      <p class="contact-copy">
        <?php the_field('form_section_intro'); ?>
      </p>

      <div class="contact-form-grid">
        <article class="contact-form-card">
          <h3><?php the_field('form_card_heading'); ?></h3>
          <p>
            <?php the_field('form_card_description'); ?>
          </p>

          <?php if (!empty($contact_form_shortcode)) : ?>
            <div style="margin-top:22px;">
              <?php echo do_shortcode($contact_form_shortcode); ?>
            </div>
          <?php else : ?>
            <form class="contact-fallback-form" method="post" action="#">
              <div class="contact-field-grid">
                <div class="contact-field">
                  <label for="contact-name"><?php the_field('fallback_name_label'); ?></label>
                  <input id="contact-name" name="contact_name" type="text" placeholder="<?php echo esc_attr(get_field('fallback_name_placeholder')); ?>">
                </div>

                <div class="contact-field">
                  <label for="contact-email"><?php the_field('fallback_email_label'); ?></label>
                  <input id="contact-email" name="contact_email" type="email" placeholder="<?php echo esc_attr(get_field('fallback_email_placeholder')); ?>">
                </div>

                <div class="contact-field">
                  <label for="contact-phone"><?php the_field('fallback_phone_label'); ?></label>
                  <input id="contact-phone" name="contact_phone" type="tel" placeholder="<?php echo esc_attr(get_field('fallback_phone_placeholder')); ?>">
                </div>

                <div class="contact-field">
                  <label for="contact-location"><?php the_field('fallback_location_label'); ?></label>
                  <select id="contact-location" name="contact_location">
                    <option value=""><?php the_field('fallback_location_option_default'); ?></option>
                    <option value="fort-thomas"><?php the_field('fallback_location_option_ft'); ?></option>
                    <option value="independence"><?php the_field('fallback_location_option_ind'); ?></option>
                    <option value="either"><?php the_field('fallback_location_option_either'); ?></option>
                  </select>
                </div>

                <div class="contact-field contact-field-full">
                  <label for="contact-message"><?php the_field('fallback_message_label'); ?></label>
                  <textarea id="contact-message" name="contact_message" placeholder="<?php echo esc_attr(get_field('fallback_message_placeholder')); ?>"></textarea>
                </div>
              </div>

              <div class="contact-form-actions">
                <button type="submit" class="btn-red"><?php the_field('fallback_submit_text'); ?></button>
              </div>
            </form>
          <?php endif; ?>
        </article>

        <div class="contact-mini-stack">
          <article class="contact-mini-card">
            <h3><?php the_field('mini_card_1_heading'); ?></h3>
            <p>
              <?php the_field('mini_card_1_body'); ?>
            </p>
          </article>

          <article class="contact-mini-card">
            <h3><?php the_field('mini_card_2_heading'); ?></h3>
            <p>
              <?php the_field('mini_card_2_body'); ?>
            </p>
          </article>

          <article class="contact-mini-card">
            <h3><?php the_field('mini_card_3_heading'); ?></h3>
            <p>
              <?php the_field('mini_card_3_body'); ?>
            </p>
          </article>
        </div>
      </div>
    </div>
  </section>

  <section class="contact-band" style="background:var(--cream);">
    <div class="contact-shell">
      <div class="sec-eye">
        <span class="sec-lbl"><?php the_field('hours_section_eyebrow'); ?></span>
        <span class="sec-rule"></span>
      </div>
      <h2 class="sec-h2"><?php the_field('hours_section_heading'); ?></h2>
      <p class="contact-copy">
        <?php the_field('hours_section_intro'); ?>
      </p>

      <div class="contact-hours-grid">
        <article class="contact-hours-card">
          <h3><?php the_field('ind_hours_heading'); ?></h3>
          <div class="contact-hours-list">
            <div class="contact-hours-row"><span><?php the_field('hours_monday_label'); ?></span><strong><?php echo esc_html($ind_hours_weekday); ?></strong></div>
            <div class="contact-hours-row"><span><?php the_field('hours_tuesday_label'); ?></span><strong><?php echo esc_html($ind_hours_weekday); ?></strong></div>
            <div class="contact-hours-row"><span><?php the_field('hours_wednesday_label'); ?></span><strong><?php echo esc_html($ind_hours_weekday); ?></strong></div>
            <div class="contact-hours-row"><span><?php the_field('hours_thursday_label'); ?></span><strong><?php echo esc_html($ind_hours_weekday); ?></strong></div>
            <div class="contact-hours-row"><span><?php the_field('hours_friday_label'); ?></span><strong><?php echo esc_html($ind_hours_weekday); ?></strong></div>
            <div class="contact-hours-row"><span><?php the_field('hours_saturday_label'); ?></span><strong><?php echo esc_html($ind_hours_saturday); ?></strong></div>
            <div class="contact-hours-row"><span><?php the_field('hours_sunday_label'); ?></span><strong><?php echo esc_html($ind_hours_sunday); ?></strong></div>
          </div>
        </article>

        <article class="contact-hours-card">
          <h3><?php the_field('ft_hours_heading'); ?></h3>
          <div class="contact-hours-list">
            <div class="contact-hours-row"><span><?php the_field('hours_monday_label'); ?></span><strong><?php echo esc_html($ft_hours_weekday); ?></strong></div>
            <div class="contact-hours-row"><span><?php the_field('hours_tuesday_label'); ?></span><strong><?php echo esc_html($ft_hours_weekday); ?></strong></div>
            <div class="contact-hours-row"><span><?php the_field('hours_wednesday_label'); ?></span><strong><?php echo esc_html($ft_hours_weekday); ?></strong></div>
            <div class="contact-hours-row"><span><?php the_field('hours_thursday_label'); ?></span><strong><?php echo esc_html($ft_hours_weekday); ?></strong></div>
            <div class="contact-hours-row"><span><?php the_field('hours_friday_label'); ?></span><strong><?php echo esc_html($ft_hours_weekday); ?></strong></div>
            <div class="contact-hours-row"><span><?php the_field('hours_saturday_label'); ?></span><strong><?php echo esc_html($ft_hours_saturday); ?></strong></div>
            <div class="contact-hours-row"><span><?php the_field('hours_sunday_label'); ?></span><strong><?php echo esc_html($ft_hours_sunday); ?></strong></div>
          </div>
        </article>
      </div>
    </div>
  </section>

  <section class="contact-band" id="locations" style="background:var(--warm);">
    <div class="contact-shell">
      <div class="sec-eye">
        <span class="sec-lbl"><?php the_field('locations_section_eyebrow'); ?></span>
        <span class="sec-rule"></span>
      </div>
      <h2 class="sec-h2"><?php the_field('locations_section_heading'); ?></h2>
      <p class="contact-copy">
        <?php the_field('locations_section_intro'); ?>
      </p>

      <div class="contact-location-grid">
        <article class="contact-loc-card">
          <iframe
            class="contact-map"
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            src="https://maps.google.com/maps?q=<?php echo esc_attr($ft_map_query); ?>&z=15&output=embed"
            title="<?php echo esc_attr(get_field('ft_map_title')); ?>">
          </iframe>
          <div class="contact-loc-body">
            <h3><?php the_field('ft_location_heading'); ?></h3>
            <p><?php echo esc_html($ft_address); ?></p>
            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $ft_phone)); ?>">
              <?php echo esc_html($ft_phone); ?>
            </a>
          </div>
        </article>

        <article class="contact-loc-card">
          <iframe
            class="contact-map"
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            src="https://maps.google.com/maps?q=<?php echo esc_attr($ind_map_query); ?>&z=15&output=embed"
            title="<?php echo esc_attr(get_field('ind_map_title')); ?>">
          </iframe>
          <div class="contact-loc-body">
            <h3><?php the_field('ind_location_heading'); ?></h3>
            <p><?php echo esc_html($ind_address); ?></p>
            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $ind_phone)); ?>">
              <?php echo esc_html($ind_phone); ?>
            </a>
          </div>
        </article>
      </div>
    </div>
  </section>

  <section class="contact-band" style="background:var(--cream);">
    <div class="contact-shell">
      <div class="sec-eye">
        <span class="sec-lbl"><?php the_field('seo_section_eyebrow'); ?></span>
        <span class="sec-rule"></span>
      </div>

      <?php if (get_field('seo_section_heading')) : ?>
        <h2 class="sec-h2"><?php the_field('seo_section_heading'); ?></h2>
      <?php endif; ?>

      <?php if (get_field('seo_section_intro')) : ?>
        <p class="contact-copy">
          <?php the_field('seo_section_intro'); ?>
        </p>
      <?php endif; ?>

      <!-- RANK MATH SEO CONTENT START: this is the primary editable long-form content area -->
      <div class="contact-seo-content">
        <?php
        while (have_posts()) :
          the_post();
          the_content();
        endwhile;
        ?>
      </div>
      <!-- RANK MATH SEO CONTENT END -->
    </div>
  </section>

  <section class="contact-band" style="background:var(--white);">
    <div class="contact-shell">
      <div class="contact-cta-box">
        <div class="sec-eye">
          <span class="sec-lbl"><?php the_field('cta_eyebrow'); ?></span>
          <span class="sec-rule"></span>
        </div>
        <h3><?php the_field('cta_heading'); ?></h3>
        <p>
          <?php the_field('cta_body'); ?>
        </p>

        <div class="contact-cta-btns">
          <a href="<?php echo esc_url(get_field('cta_button_1_url')); ?>" class="btn-red"><?php the_field('cta_button_1_text'); ?></a>

          <?php if (!empty($portal_url)) : ?>
            <a href="<?php echo esc_url($portal_url); ?>" target="_blank" rel="noopener" class="btn-ghost"><?php the_field('cta_button_2_text'); ?></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

</div>

<?php get_footer(); ?>