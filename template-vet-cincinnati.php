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
    'intro'          => 'Veterinary Medical Center Fort Thomas is a practical option for pet owners looking for a vet near Cincinnati without downtown parking stress. Just across the river via I-471, our clinic provides full-service dog and cat care, including prevention, diagnostics, dental treatment planning, surgery, and urgent sick visits when available. If you want convenience plus long-term continuity, VMC is ready to help.',
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
        'Independent veterinary care guided by community values.',
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
        'Many households from downtown Cincinnati, Mount Adams, Hyde Park, and nearby riverfront neighborhoods choose our Fort Thomas clinic for easy access and dependable follow-up.',
        'If you are comparing options for a vet near Cincinnati, this location gives you full-service medicine with straightforward travel routes and one connected care team.',
    ],
    'areas'          => [
        [ 'label' => 'Downtown Cincinnati', 'slug' => '/vet-near-me/' ],
        [ 'label' => 'Mount Adams', 'slug' => '/vet-near-me/' ],
        [ 'label' => 'Hyde Park', 'slug' => '/vet-near-me/' ],
        [ 'label' => 'Newport', 'slug' => '/vet-fort-thomas-ky/' ],
        [ 'label' => 'Bellevue', 'slug' => '/vet-fort-thomas-ky/' ],
    ],
    'location_heading' => 'Visit our Fort Thomas clinic from Cincinnati.',
    'locality'       => 'Fort Thomas',
    'schema_name'    => 'Veterinary Medical Center Near Cincinnati',
    'meta'           => 'Vet near Cincinnati with full-service pet care, easy Fort Thomas access, and locally owned continuity-focused veterinary support.',
    'faq'            => [
        [ 'How far is your clinic for families searching a vet near Cincinnati?', 'Our Fort Thomas location is only minutes from downtown Cincinnati via I-471 for many drivers. That access makes routine exams and recheck visits easier to keep on schedule.' ],
        [ 'Can Cincinnati pet owners book online?', 'Yes. Cincinnati-area families can request appointments online and complete new patient registration before the first visit. This helps reduce check-in time and keeps the first exam focused on your pet.' ],
        [ 'Do I need to call for urgent concerns?', 'For urgent symptoms, call the clinic directly so our team can guide timing immediately. We treat many urgent cases during open hours and refer life-threatening emergencies to 24/7 ER partners when needed.' ],
        [ 'Do you offer full-service care if I cross the river for appointments?', 'Yes. Families using our clinic as their vet near Cincinnati can access wellness care, diagnostics, surgery planning, dental care, and medication support through one team.' ],
        [ 'Can I request medication refills online?', 'Yes, refill requests can be submitted through our online pharmacy, and approvals are reviewed by your veterinary team. You can also call us for support with timing, dosage, or alternatives.' ],
        [ 'Will I receive estimate information before treatment?', 'Yes. We review recommendations, options, and expected pricing before services are performed so you can make confident care decisions.' ],
    ],
]);
