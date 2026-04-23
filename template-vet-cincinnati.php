<?php
/**
 * Template Name: Vet Near Cincinnati SEO Page
 */

if ( ! defined( 'ABSPATH' ) ) exit;

require_once get_template_directory() . '/inc/render-location-page.php';

vmc_render_location_page([
    'id'             => 'cincinnati',
    'keyword'        => 'vet near Cincinnati',
    'eyebrow'        => 'Vet Near Cincinnati',
    'h1'             => 'A trusted veterinarian near Cincinnati with easy Fort Thomas access.',
    'intro'          => 'Veterinary Medical Center Fort Thomas is a practical choice for Cincinnati pet owners who want excellent care without downtown parking stress. Just across the river via I-471, our locally owned clinic provides full-service dog and cat care with the consistency families need for preventive medicine, diagnostics, surgery, dental treatment planning, and urgent sick visits when available. If you are searching for a veterinarian near Cincinnati who combines convenience with long-term relationships, VMC is ready to help.',
    'hero_bullets'   => [
        'Convenient across-the-river location minutes from downtown Cincinnati.',
        'Experienced veterinary team focused on clear communication and continuity.',
        'Comprehensive pet care in one clinic for routine and advanced needs.',
    ],
    'panel_heading'  => 'Near-Cincinnati care with practical scheduling.',
    'panel_body'     => 'Book online, complete registration in advance, and partner with a local team that keeps follow-up simple.',
    'phone'          => vmc_get('vmc_ft_phone', '(859) 442-4420'),
    'address'        => vmc_get('vmc_ft_address', '2000 Memorial Parkway, Fort Thomas, KY 41075'),
    'hours_weekday'  => vmc_get('vmc_ft_hours_weekday', '8:00 AM – 6:00 PM'),
    'hours_saturday' => vmc_get('vmc_ft_hours_saturday', 'Rotating — call ahead'),
    'image'          => get_template_directory_uri() . '/assets/images/about-fort-thomas.jpg',
    'image_alt'      => 'Veterinary Medical Center Fort Thomas near Cincinnati and I-471',
    'image_caption'  => 'A near-Cincinnati clinic for families who want trusted veterinary care without downtown friction.',
    'second_image'   => get_template_directory_uri() . '/assets/images/VMC Social Media.jpg',
    'second_alt'     => 'Veterinary Medical Center team caring for Cincinnati and Northern Kentucky pets',
    'trust'          => [
        'Independent, locally owned veterinary care guided by community values.',
        'Experienced doctors and support team delivering continuity visit after visit.',
        'Modern diagnostic approach for clearer answers and faster treatment planning.',
        'Personalized care for anxious pets, cats, and chronic condition management.',
        'Strong community presence for families in Cincinnati and Northern Kentucky.',
    ],
    'services'       => [
        [ 'title' => 'Wellness Exams', 'body' => 'Routine preventive care including vaccines, annual exams, parasite prevention, and nutrition guidance.', 'url' => home_url('/services/') ],
        [ 'title' => 'Surgery', 'body' => 'Surgical consultation and procedures with attentive anesthesia monitoring and post-op support.', 'url' => home_url('/services/') ],
        [ 'title' => 'Dental Care', 'body' => 'Dental assessments and oral care planning that protect comfort and reduce long-term disease risk.', 'url' => home_url('/services/') ],
        [ 'title' => 'Diagnostics', 'body' => 'Diagnostic evaluations for new symptoms, chronic concerns, and treatment-response monitoring.', 'url' => home_url('/services/') ],
        [ 'title' => 'Urgent Care', 'body' => 'Same-day sick care options for many non-emergency issues when scheduling availability allows.', 'url' => home_url('/contact/') ],
    ],
    'new_patient_steps' => [
        [ 'title' => 'Request your appointment', 'body' => 'Contact us online or by phone and we will match your pet with the right visit type.' ],
        [ 'title' => 'Submit intake forms', 'body' => 'Fill out the new patient registration form and send prior records before arrival.' ],
        [ 'title' => 'Visit the clinic', 'body' => 'Meet your veterinarian, review concerns, and leave with a clear plan and follow-up guidance.' ],
        [ 'title' => 'Coordinate ongoing care', 'body' => 'Use reminders and follow-up communication to keep preventive and chronic care on schedule.' ],
    ],
    'community_heading' => 'Areas we serve for pet owners near Cincinnati.',
    'community'      => [
        'Many households from downtown Cincinnati, Mount Adams, Hyde Park, and nearby riverfront neighborhoods choose our Fort Thomas clinic for easier access and reliable continuity.',
        'If you are comparing vets near Cincinnati, VMC offers local pet care with practical travel routes, full-service medicine, and personalized support.',
    ],
    'areas'          => [
        [ 'label' => 'Downtown Cincinnati', 'slug' => '/vet-near-cincinnati/' ],
        [ 'label' => 'Mount Adams', 'slug' => '/vet-near-cincinnati/' ],
        [ 'label' => 'Hyde Park', 'slug' => '/vet-near-cincinnati/' ],
        [ 'label' => 'Newport', 'slug' => '/vet-fort-thomas-ky/' ],
        [ 'label' => 'Bellevue', 'slug' => '/vet-fort-thomas-ky/' ],
    ],
    'location_heading' => 'Visit our Fort Thomas clinic from Cincinnati.',
    'locality'       => 'Fort Thomas',
    'schema_name'    => 'Veterinary Medical Center Near Cincinnati',
    'meta'           => 'Vet near Cincinnati with full-service pet care, easy Fort Thomas access, and locally owned continuity-focused veterinary support.',
    'faq'            => [
        [ 'How far is your clinic from downtown Cincinnati?', 'Our Fort Thomas location is minutes from downtown via I-471, making routine exams and follow-up visits easier for many city households.' ],
        [ 'Can I book online if I live in Cincinnati?', 'Yes. Cincinnati-area families can request appointments online and complete new patient registration before the first visit.' ],
        [ 'Do you handle emergencies?', 'We treat many urgent cases during open hours, but true life-threatening emergencies may require immediate referral to a 24/7 emergency hospital.' ],
        [ 'Do you provide cost clarity before treatment?', 'Yes. We discuss recommendations, options, and estimated pricing so you can make informed decisions about your pet’s care.' ],
    ],
]);
