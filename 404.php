<?php get_header(); ?>

<div style="padding-top:70px;min-height:80vh;background:var(--cream);display:flex;align-items:center;justify-content:center">
  <div style="text-align:center;padding:80px var(--pad,68px)">
    <div style="font-family:'Playfair Display',serif;font-size:120px;font-weight:700;color:rgba(169,27,27,0.1);line-height:1">404</div>
    <h1 style="font-family:'Playfair Display',serif;font-size:clamp(28px,4vw,44px);font-weight:700;color:var(--dark);margin-top:-16px;margin-bottom:16px"><?php esc_html_e("This page wandered off.",'vmc'); ?></h1>
    <p style="font-size:16px;color:var(--mid);max-width:420px;margin:0 auto 32px;line-height:1.7"><?php esc_html_e("Even the best noses lose the scent sometimes. Let's get you back on the right path.",'vmc'); ?></p>
    <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="btn-red"><?php esc_html_e('Back to Home','vmc'); ?></a>
      <a href="<?php echo esc_url(home_url('/#contact')); ?>" class="btn-ghost"><?php esc_html_e('Find a Location','vmc'); ?> →</a>
    </div>
  </div>
</div>

<?php get_footer(); ?>
