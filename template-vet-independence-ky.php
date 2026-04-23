<?php
/**
 * Template Name: Vet Independence KY SEO Page
 */

if ( ! defined( 'ABSPATH' ) ) exit;

require_once get_template_directory() . '/inc/render-location-page.php';

vmc_render_location_page([
    'id'             => 'independence',
    'keyword'        => 'vet in Independence, KY',
    'eyebrow'        => 'Vet in Independence, KY',
    'h1'             => 'Dependable vet in Independence, KY for dogs and cats across central NKY.',
    'intro'          => 'Veterinary Medical Center Independence on Madison Pike is built for everyday convenience, trusted relationships, and complete care. Families in Independence, Covington, Taylor Mill, Erlanger, and Florence choose our clinic for preventive medicine, diagnostics, surgery, dental care, and urgent sick visits when available. If you are looking for a veterinarian near Independence who explains options clearly and stays consistent over time, our local team is here to help.',
    'hero_bullets'   => [
        'Same-day sick appointments when schedule openings are available.',
        'Experienced vets and team members who prioritize communication.',
        'Full-service pet care from puppy and kitten visits through senior support.',
    ],
    'panel_heading'  => 'Independence veterinary care that stays connected.',
    'panel_body'     => 'Request an appointment, complete your forms online, and start with a plan designed around your pet’s real needs.',
    'phone'          => vmc_get('vmc_ind_phone', '(859) 356-2242'),
    'address'        => vmc_get('vmc_ind_address', '4147 Madison Pike, Independence, KY 41051'),
    'hours_weekday'  => vmc_get('vmc_ind_hours_weekday', '8:00 AM – 6:00 PM'),
    'hours_saturday' => vmc_get('vmc_ind_hours_saturday', 'Closed'),
    'image'          => get_template_directory_uri() . '/assets/images/about-independence.jpg',
    'image_alt'      => 'Veterinary Medical Center Independence clinic on Madison Pike',
    'image_caption'  => 'Local pet care in Independence with easy access from central Northern Kentucky communities.',
    'second_image'   => get_template_directory_uri() . '/assets/images/VMC Social Media.jpg',
    'second_alt'     => 'Veterinary Medical Center team helping Independence pet owners',
    'trust'          => [
        'Locally owned clinic with care decisions made close to home.',
        'Consistent doctor relationships that support long-term care planning.',
        'Modern diagnostics and practical treatment plans for clearer next steps.',
        'Personalized recommendations for wellness, chronic conditions, and behavior concerns.',
        'Trusted by Independence families and nearby NKY neighborhoods for years.',
    ],
    'services'       => [
        [ 'title' => 'Wellness Exams', 'body' => 'Routine exams, vaccines, prevention, and life-stage care plans for puppies, kittens, adults, and seniors.', 'url' => home_url('/services/') ],
        [ 'title' => 'Surgery', 'body' => 'Surgical evaluations and procedures with safety-focused anesthesia and thoughtful recovery planning.', 'url' => home_url('/services/') ],
        [ 'title' => 'Dental Care', 'body' => 'Dental evaluations and treatment plans to prevent pain, infection, and progressive oral disease.', 'url' => home_url('/services/') ],
        [ 'title' => 'Diagnostics', 'body' => 'Diagnostic testing and medical interpretation that help identify causes and guide treatment choices.', 'url' => home_url('/services/') ],
        [ 'title' => 'Urgent Care', 'body' => 'Timely care for non-critical but urgent symptoms like GI upset, skin flare-ups, or behavior changes.', 'url' => home_url('/contact/') ],
    ],
    'new_patient_steps' => [
        [ 'title' => 'Choose a time', 'body' => 'Call or request online so our team can match your pet to the right appointment type.' ],
        [ 'title' => 'Send your pet history', 'body' => 'Complete the new patient form and share prior records so we can prepare before your visit.' ],
        [ 'title' => 'Meet your veterinary team', 'body' => 'During your exam, we review lifestyle, concerns, and medical priorities for a complete care plan.' ],
        [ 'title' => 'Stay on track', 'body' => 'Receive reminders and practical follow-up guidance for rechecks, prevention, and ongoing care.' ],
    ],
    'community_heading' => 'Areas we serve around Independence, KY.',
    'community'      => [
        'Our Madison Pike location serves pet families throughout central Northern Kentucky, including neighborhoods with daily commutes to Covington and Florence corridors.',
        'If you need a veterinarian near Independence for regular preventive care and reliable follow-up, VMC offers local continuity with full-service capabilities.',
    ],
    'areas'          => [
        [ 'label' => 'Independence', 'slug' => '/vet-independence-ky/' ],
        [ 'label' => 'Covington', 'slug' => '/vet-independence-ky/' ],
        [ 'label' => 'Taylor Mill', 'slug' => '/vet-independence-ky/' ],
        [ 'label' => 'Erlanger', 'slug' => '/vet-independence-ky/' ],
        [ 'label' => 'Florence', 'slug' => '/vet-independence-ky/' ],
    ],
    'location_heading' => 'Visit Veterinary Medical Center in Independence.',
    'locality'       => 'Independence',
    'schema_name'    => 'Veterinary Medical Center Independence',
    'meta'           => 'Vet in Independence, KY offering full-service veterinary medicine, clear treatment planning, and convenient access for central Northern Kentucky pet families.',
    'faq'            => [
        [ 'How quickly can I schedule an appointment in Independence?', 'Routine appointments are scheduled as soon as openings are available, and same-day sick visits may be offered depending on medical urgency and calendar capacity.' ],
        [ 'Do you see both dogs and cats?', 'Yes. Our team provides preventive and medical care for both dogs and cats, including cat-friendly handling and stress-reducing visit strategies.' ],
        [ 'Will I receive estimate information before treatment?', 'Absolutely. We review exam findings, recommended diagnostics, and expected costs so you can decide on next steps confidently.' ],
        [ 'What happens during the first visit?', 'Your first appointment includes history review, physical exam, discussion of goals, and a personalized plan for immediate and long-term care.' ],
    ],
]);
