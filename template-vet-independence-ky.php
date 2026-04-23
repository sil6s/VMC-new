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
    'intro'          => 'Need a vet in Independence, KY that keeps care straightforward and consistent? Veterinary Medical Center Independence on Madison Pike serves dogs and cats with preventive medicine, diagnostics, dental care, surgery, and urgent sick visits when available. Families across Independence, Covington, Taylor Mill, Erlanger, and Florence choose our team for clear communication and reliable follow-up.',
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
        'Independent clinic with care decisions made close to home.',
        'Consistent doctor relationships that support long-term care planning.',
        'Modern diagnostics and practical treatment plans for clearer next steps.',
        'Personalized recommendations for wellness, chronic conditions, and behavior concerns.',
        'Trusted by Independence families and nearby NKY neighborhoods.',
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
        'Our Madison Pike location serves pet families across central Northern Kentucky, including daily commuters between Independence, Covington, Taylor Mill, and Florence corridors.',
        'If you are searching for a vet in Independence, KY, this clinic offers full-service care in one location with easy scheduling and practical follow-up support.',
    ],
    'areas'          => [
        [ 'label' => 'Independence', 'slug' => '/vet-independence-ky/' ],
        [ 'label' => 'Covington', 'slug' => '/vet-near-me/' ],
        [ 'label' => 'Taylor Mill', 'slug' => '/vet-near-me/' ],
        [ 'label' => 'Erlanger', 'slug' => '/vet-near-me/' ],
        [ 'label' => 'Florence', 'slug' => '/vet-near-me/' ],
    ],
    'location_heading' => 'Visit Veterinary Medical Center in Independence.',
    'locality'       => 'Independence',
    'schema_name'    => 'Veterinary Medical Center Independence',
    'meta'           => 'Vet in Independence, KY offering full-service veterinary medicine, clear treatment planning, and convenient access for central Northern Kentucky pet families.',
    'faq'            => [
        [ 'How quickly can I schedule with a vet in Independence, KY?', 'Routine visits are scheduled as soon as openings are available, and same-day sick visits may be offered based on urgency and schedule capacity. Calling early gives your pet the best chance for same-day placement.' ],
        [ 'Can new patients book online?', 'Yes. New families can request appointments online and complete registration before arriving. Sharing records in advance helps us build a focused first-visit plan.' ],
        [ 'Do I need an account to request an appointment?', 'No special account is required to start a new patient request with our clinic. If you already use our portal, it can make updates and follow-up communication faster.' ],
        [ 'Do you see both dogs and cats?', 'Yes, we provide preventive and medical care for both dogs and cats. Our team uses handling strategies that support calmer visits for nervous pets and cat patients.' ],
        [ 'Can I request medication refills online?', 'Yes, many refills can be requested through our online pharmacy or through the clinic directly. Requests are reviewed by your veterinary team to confirm timing and safety.' ],
        [ 'What happens during the first visit?', 'Your first appointment includes history review, a full physical exam, and clear recommendations for diagnostics, prevention, or treatment. We also outline practical next steps so you know what to do after the visit.' ],
    ],
]);
