<?php
/**
 * Template Name: Cincinnati Area Location Page
 */

require_once get_template_directory() . '/inc/render-location-page.php';

$ft_phone    = vmc_get( 'vmc_ft_phone',           '(859) 442-4420' );
$ft_address  = vmc_get( 'vmc_ft_address',         '2000 Memorial Parkway, Fort Thomas, KY 41075' );
$ft_weekday  = vmc_get( 'vmc_ft_hours_weekday',   '8:00 AM – 6:00 PM' );
$ft_saturday = vmc_get( 'vmc_ft_hours_saturday',  'Rotating — call ahead' );

vmc_render_location_page( [
    'id'             => 'cincinnati',
    'keyword'        => 'vet near Cincinnati',
    'eyebrow'        => 'Vet Near Cincinnati',
    'h1'             => 'Vet near Cincinnati with easy access from downtown.',
    'intro'          => 'Veterinary Medical Center Fort Thomas is a vet near Cincinnati for pet owners who want full-service dog and cat care without downtown parking stress. The Fort Thomas office is just across the river, right off I-471, and about 10 minutes from downtown Cincinnati for many drivers.',
    'panel_heading'  => 'Why Cincinnati families choose VMC Fort Thomas',
    'panel_body'     => 'VMC Fort Thomas is close to downtown Cincinnati via I-471, easier than many city parking experiences, and rooted in locally owned veterinary care.',
    'phone'          => $ft_phone,
    'address'        => $ft_address,
    'hours_weekday'  => $ft_weekday,
    'hours_saturday' => $ft_saturday,
    'image'          => get_template_directory_uri() . '/assets/images/about-fort-thomas.jpg',
    'image_alt'      => 'vet near Cincinnati at Veterinary Medical Center in Northern Kentucky',
    'image_caption'  => 'Veterinary Medical Center Fort Thomas — a Cincinnati-close option right off I-471.',
    'second_image'   => get_template_directory_uri() . '/assets/images/VMC Social Media.jpg',
    'second_alt'     => 'vet near Cincinnati with easy parking at Veterinary Medical Center Fort Thomas',
    'trust'          => [
        'About 10 minutes from downtown Cincinnati for many drivers',
        'Right off I-471 with easier access than many downtown clinics',
        'No downtown street parking hassle for pet appointments',
        'Locally owned and women-led veterinary care just across the river',
    ],
    'community_heading' => 'A vet near Cincinnati without the downtown clinic hassle.',
    'community'      => [
        'For Cincinnati pet owners, location can make or break whether routine care stays on schedule. VMC Fort Thomas is close to downtown Cincinnati but avoids many common downtown frustrations, including tight streets, circling for parking, and carrying a nervous pet through busy city blocks.',
        'The Fort Thomas office is right off I-471 and Memorial Parkway. For many families, a vet near Cincinnati that is just across the river is easier than navigating a downtown appointment — especially for cats, senior pets, anxious dogs, and families trying to fit care around work.',
        'VMC Fort Thomas is a strong nearby alternative for Cincinnati pet owners who want a local vet near Cincinnati, women-led care, and full-service veterinary medicine in Northern Kentucky without giving up convenience.',
    ],
    'areas'          => [ 'Downtown Cincinnati OH', 'Mount Adams OH', 'Over-the-Rhine OH', 'Newport KY', 'Bellevue KY', 'Fort Thomas KY', 'Highland Heights KY', 'Northern Kentucky' ],
    'location_heading' => 'Visit Our Cincinnati-Close Fort Thomas Location',
    'locality'       => 'Fort Thomas',
    'schema_name'    => 'Veterinary Medical Center - Fort Thomas',
    'meta'           => 'Need a vet near Cincinnati? VMC Fort Thomas is about 10 minutes from downtown via I-471 with easy access and local care.',
    'faq'            => [
        [ 'How close is VMC Fort Thomas to downtown Cincinnati?', 'For many drivers, VMC Fort Thomas is about 10 minutes from downtown Cincinnati via I-471, depending on traffic and starting point.' ],
        [ 'Why choose a vet near Cincinnati instead of a downtown clinic?', 'Many pet owners choose VMC Fort Thomas because it is close to Cincinnati while avoiding downtown street parking, tight urban routes, and extra appointment friction.' ],
        [ 'Where is the Cincinnati-close location?', 'The Cincinnati-close VMC location is at 2000 Memorial Parkway, Fort Thomas, KY 41075, just across the river in Northern Kentucky.' ],
        [ 'Do you accept Cincinnati pet owners as new patients?', 'Yes. Cincinnati pet owners are welcome. You can request an appointment and complete new patient registration before your first visit.' ],
        [ 'What services do you offer near Cincinnati?', 'VMC Fort Thomas offers wellness care, dental care, surgery, diagnostics, sick visits, medical care, senior pet support, and comfort-focused dog and cat veterinary care.' ],
        [ 'Is VMC locally owned?', 'Yes. Veterinary Medical Center is locally owned, women-led, and not corporate owned.' ],
    ],
] );
