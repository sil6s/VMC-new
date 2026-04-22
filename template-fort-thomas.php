<?php
/**
 * Template Name: Fort Thomas Location Page
 */

require_once get_template_directory() . '/inc/render-location-page.php';

$ft_phone    = vmc_get( 'vmc_ft_phone',           '(859) 442-4420' );
$ft_address  = vmc_get( 'vmc_ft_address',         '2000 Memorial Parkway, Fort Thomas, KY 41075' );
$ft_weekday  = vmc_get( 'vmc_ft_hours_weekday',   '8:00 AM – 6:00 PM' );
$ft_saturday = vmc_get( 'vmc_ft_hours_saturday',  'Rotating — call ahead' );

vmc_render_location_page( [
    'id'             => 'fort-thomas',
    'keyword'        => 'vet in Fort Thomas KY',
    'eyebrow'        => 'Vet in Fort Thomas, KY',
    'h1'             => 'Vet in Fort Thomas KY for local dogs, cats, and families.',
    'intro'          => 'Veterinary Medical Center is a vet in Fort Thomas KY families choose when they want local, independently owned veterinary care on Memorial Parkway. Led by Dr. Kristi Baker, VMC combines full-service dog and cat medicine with a personal, women-led, community-rooted approach that feels different from a corporate clinic.',
    'panel_heading'  => 'Why Fort Thomas families choose VMC',
    'panel_body'     => 'VMC Fort Thomas combines local ownership, Memorial Parkway convenience, and relationship-based care from a team rooted in the community.',
    'phone'          => $ft_phone,
    'address'        => $ft_address,
    'hours_weekday'  => $ft_weekday,
    'hours_saturday' => $ft_saturday,
    'image'          => get_template_directory_uri() . '/assets/images/about-fort-thomas.jpg',
    'image_alt'      => 'vet in Fort Thomas KY Veterinary Medical Center exterior on Memorial Parkway',
    'image_caption'  => 'Veterinary Medical Center Fort Thomas on Memorial Parkway near Highlands High School.',
    'second_image'   => get_template_directory_uri() . '/assets/images/VMC Social Media.jpg',
    'second_alt'     => 'vet in Fort Thomas KY team at women-led Veterinary Medical Center',
    'trust'          => [
        'Locally owned and women-led by Dr. Kristi Baker',
        'Not corporate owned or managed from outside the community',
        'Relationship-based veterinary care for long-term pet health',
        'Convenient Memorial Parkway location for daily routines',
    ],
    'community_heading' => 'A vet in Fort Thomas KY rooted in the same community you call home.',
    'community'      => [
        'Dr. Kristi Baker lives in Fort Thomas. Her two children were born and raised here, and they attend Fort Thomas schools. That local connection gives Veterinary Medical Center a practical understanding of the families, routes, schools, and routines that shape daily life in Fort Thomas.',
        'The Fort Thomas office is on Memorial Parkway near Highlands High School and across from the Northern Kentucky Water District. For many families, that means a wellness visit, dental follow-up, sick visit, or vaccine appointment can happen on the way to work, after school, or during the same errands already built into the day.',
        'When you search for a vet in Fort Thomas KY, distance matters, but trust matters more. VMC gives local pet owners both: a convenient veterinary clinic in Northern Kentucky and a locally owned veterinary hospital that wants to know your pet over time.',
    ],
    'areas'          => [ 'Fort Thomas KY', 'Highland Heights KY', 'Bellevue KY', 'Newport KY', 'Dayton KY', 'Cold Spring KY', 'Southgate KY', 'Campbell County KY' ],
    'location_heading' => 'Visit Our Fort Thomas Location',
    'locality'       => 'Fort Thomas',
    'schema_name'    => 'Veterinary Medical Center - Fort Thomas',
    'meta'           => 'Need a vet in Fort Thomas KY? Visit locally owned VMC on Memorial Parkway for trusted dog and cat care near Highlands High School.',
    'faq'            => [
        [ 'How do I choose a vet in Fort Thomas KY?', 'Choose a veterinary team that is easy to reach, locally accountable, clear in communication, and able to support your pet through wellness, medical care, dental care, surgery, and senior life.' ],
        [ 'Where is VMC Fort Thomas located?', 'Veterinary Medical Center Fort Thomas is located at 2000 Memorial Parkway, Fort Thomas, KY 41075, near Highlands High School and across from the Northern Kentucky Water District.' ],
        [ 'Is Veterinary Medical Center locally owned?', 'Yes. VMC is independently owned and women-led by Dr. Kristi Baker. It is not a corporate-owned veterinary clinic.' ],
        [ 'Do you accept new patients?', 'Yes. New patients are welcome. You can request an appointment and complete the new patient registration form before your first visit.' ],
        [ 'What services do you offer in Fort Thomas?', 'VMC Fort Thomas offers wellness care, dental care, surgery, diagnostics, sick visits, medical care, senior support, and comfort-focused dog and cat veterinary care.' ],
        [ 'What should I bring to my first visit?', 'Bring prior records, vaccine history, medication details, and your questions. You can also review the first-visit guide before your appointment.' ],
    ],
] );
