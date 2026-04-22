<?php
/**
 * Template Name: Independence Location Page
 */

require_once get_template_directory() . '/inc/render-location-page.php';

$ind_phone    = vmc_get( 'vmc_ind_phone',           '(859) 356-2242' );
$ind_address  = vmc_get( 'vmc_ind_address',         '4147 Madison Pike, Independence, KY 41051' );
$ind_weekday  = vmc_get( 'vmc_ind_hours_weekday',   '8:00 AM – 6:00 PM' );
$ind_saturday = vmc_get( 'vmc_ind_hours_saturday',  'Closed' );

vmc_render_location_page( [
    'id'             => 'independence',
    'keyword'        => 'vet in Independence KY',
    'eyebrow'        => 'Vet in Independence, KY',
    'h1'             => 'Vet in Independence KY for central Northern Kentucky pets.',
    'intro'          => 'Veterinary Medical Center is a vet in Independence KY families choose for full-service dog and cat care on Madison Pike. VMC Independence gives central Northern Kentucky families a locally owned, women-led veterinary hospital with clear communication, practical access, and relationship-based care.',
    'panel_heading'  => 'Why Independence families choose VMC',
    'panel_body'     => 'VMC Independence gives central Northern Kentucky families full-service care on Madison Pike with the same locally owned, women-led values that guide the whole practice.',
    'phone'          => $ind_phone,
    'address'        => $ind_address,
    'hours_weekday'  => $ind_weekday,
    'hours_saturday' => $ind_saturday,
    'image'          => get_template_directory_uri() . '/assets/images/about-independence.jpg',
    'image_alt'      => 'vet in Independence KY Veterinary Medical Center exterior on Madison Pike',
    'image_caption'  => 'Veterinary Medical Center Independence on Madison Pike serving central Northern Kentucky.',
    'second_image'   => get_template_directory_uri() . '/assets/images/VMC Social Media.jpg',
    'second_alt'     => 'vet in Independence KY team at locally owned Veterinary Medical Center',
    'trust'          => [
        'Locally owned and women-led veterinary hospital',
        'Not corporate owned or built around rushed visits',
        'Full-service care for dogs and cats on Madison Pike',
        'Accessible for Independence and central Northern Kentucky families',
    ],
    'community_heading' => 'A vet in Independence KY for families who want local care close to home.',
    'community'      => [
        'VMC Independence is built for central Northern Kentucky families who want veterinary care that is convenient without feeling impersonal. The Madison Pike location serves Independence, Covington, Taylor Mill, Latonia, Erlanger, Florence, Edgewood, Kenton County, and nearby neighborhoods.',
        'When families search for a vet in Independence KY, they are often looking for a team that can help with everyday wellness as well as changing medical needs. VMC Independence supports puppies, kittens, adult pets, senior pets, nervous pets, and cats who need a calmer plan.',
        'VMC Independence reflects the same independently owned, women-led values as the broader practice, written for families who need accessible veterinary care in central Northern Kentucky.',
    ],
    'areas'          => [ 'Independence KY', 'Covington KY', 'Taylor Mill KY', 'Latonia KY', 'Erlanger KY', 'Florence KY', 'Edgewood KY', 'Kenton County KY' ],
    'location_heading' => 'Visit Our Independence Location',
    'locality'       => 'Independence',
    'schema_name'    => 'Veterinary Medical Center - Independence',
    'meta'           => 'Need a vet in Independence KY? Visit locally owned VMC on Madison Pike for full-service dog and cat care in Northern Kentucky.',
    'faq'            => [
        [ 'How do I choose a vet in Independence KY?', 'Look for a veterinary clinic that is nearby, locally accountable, clear about recommendations, and able to support wellness, dental care, surgery, diagnostics, and sick visits.' ],
        [ 'Where is VMC Independence located?', 'Veterinary Medical Center Independence is located at 4147 Madison Pike, Independence, KY 41051.' ],
        [ 'Is this a locally owned veterinary clinic?', 'Yes. Veterinary Medical Center is independently owned, women-led, and rooted in Northern Kentucky. It is not corporate owned.' ],
        [ 'Do you accept new patients in Independence?', 'Yes. New patients are welcome at VMC Independence. You can request an appointment and complete the new patient registration form before your visit.' ],
        [ 'What services do you offer?', 'VMC Independence offers wellness care, dental care, surgery, diagnostics, sick visits, medical care, senior pet support, and comfort-focused dog and cat care.' ],
        [ 'What communities does your Independence office serve?', 'The Independence office serves pets from Independence, Covington, Taylor Mill, Latonia, Erlanger, Florence, Edgewood, Kenton County, and surrounding communities.' ],
    ],
] );
