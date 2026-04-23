<?php
/**
 * Template Name: Vet Fort Thomas KY SEO Page
 */

if ( ! defined( 'ABSPATH' ) ) exit;

require_once get_template_directory() . '/inc/render-location-page.php';

vmc_render_location_page([
    'id'             => 'fort-thomas',
    'keyword'        => 'vet in Fort Thomas, KY',
    'eyebrow'        => 'Vet in Fort Thomas, KY',
    'h1'             => 'Trusted vet in Fort Thomas, KY for convenient, full-service pet care.',
    'intro'          => 'Looking for a veterinarian near Fort Thomas who offers consistent care and clear communication? Veterinary Medical Center provides locally owned, relationship-based care for dogs and cats near Memorial Parkway, Tower Park, and the neighborhoods around Highlands High School. From wellness visits and preventive plans to diagnostics, surgery, and urgent sick appointments, our team makes it easier to keep your pet healthy through every life stage.',
    'hero_bullets'   => [
        'Same-day sick visit appointments when available.',
        'Experienced doctors and support team with Fear Free handling.',
        'Full-service care in one clinic, from routine exams to diagnostics and surgery.',
    ],
    'panel_heading'  => 'Fort Thomas pet care with clear next steps.',
    'panel_body'     => 'Call our clinic, request your appointment online, and complete registration before your first visit so check-in is easy.',
    'phone'          => vmc_get('vmc_ft_phone', '(859) 442-4420'),
    'address'        => vmc_get('vmc_ft_address', '2000 Memorial Parkway, Fort Thomas, KY 41075'),
    'hours_weekday'  => vmc_get('vmc_ft_hours_weekday', '8:00 AM – 6:00 PM'),
    'hours_saturday' => vmc_get('vmc_ft_hours_saturday', 'Rotating — call ahead'),
    'image'          => get_template_directory_uri() . '/assets/images/about-fort-thomas.jpg',
    'image_alt'      => 'Veterinary Medical Center Fort Thomas exterior near Memorial Parkway',
    'image_caption'  => 'Locally owned veterinary care serving Fort Thomas families and nearby river cities.',
    'second_image'   => get_template_directory_uri() . '/assets/images/VMC Social Media.jpg',
    'second_alt'     => 'Veterinary Medical Center team serving Fort Thomas and nearby communities',
    'trust'          => [
        'Locally owned and women-led veterinary care, not a corporate chain.',
        'Experienced vets and staff focused on continuity, education, and practical care plans.',
        'Modern diagnostic tools and in-house treatment planning for faster answers.',
        'Personalized recommendations based on your pet, your goals, and your household routine.',
        'Strong community ties across Fort Thomas, Newport, Bellevue, and Cold Spring.',
    ],
    'services'       => [
        [ 'title' => 'Wellness Exams', 'body' => 'Comprehensive wellness exams, vaccinations, parasite prevention, nutrition guidance, and senior pet planning.', 'url' => home_url('/services/') ],
        [ 'title' => 'Surgery', 'body' => 'Soft tissue surgery with thoughtful prep, anesthesia monitoring, pain control, and detailed discharge instructions.', 'url' => home_url('/services/') ],
        [ 'title' => 'Dental Care', 'body' => 'Dental assessments and treatment planning to support oral comfort, fresh breath, and long-term health.', 'url' => home_url('/services/') ],
        [ 'title' => 'Diagnostics', 'body' => 'Targeted diagnostics and medical workups to investigate symptoms and guide next-step treatment decisions.', 'url' => home_url('/services/') ],
        [ 'title' => 'Urgent Care', 'body' => 'Same-day sick visit support for vomiting, itching, limping, appetite changes, and other non-life-threatening concerns.', 'url' => home_url('/contact/') ],
    ],
    'new_patient_steps' => [
        [ 'title' => 'Request your visit', 'body' => 'Call or request an appointment online with your preferred day and time window.' ],
        [ 'title' => 'Complete registration', 'body' => 'Submit the new patient form so our team can review your pet history before arrival.' ],
        [ 'title' => 'Attend your first exam', 'body' => 'Meet your care team, review goals, and receive a customized wellness or treatment plan.' ],
        [ 'title' => 'Follow your care plan', 'body' => 'Use our reminders and follow-up guidance for rechecks, refills, and preventive care timing.' ],
    ],
    'community_heading' => 'Areas we serve around Fort Thomas, KY.',
    'community'      => [
        'Our Fort Thomas clinic supports families across the river cities and nearby NKY neighborhoods, including pet owners commuting from downtown Cincinnati via I-471.',
        'If you are searching for pet care in Fort Thomas, veterinarian near Fort Thomas, or dog and cat care close to Newport and Bellevue, VMC offers a practical local option with continuity.',
    ],
    'areas'          => [
        [ 'label' => 'Fort Thomas', 'slug' => '/vet-fort-thomas-ky/' ],
        [ 'label' => 'Highland Heights', 'slug' => '/vet-fort-thomas-ky/' ],
        [ 'label' => 'Bellevue', 'slug' => '/vet-fort-thomas-ky/' ],
        [ 'label' => 'Newport', 'slug' => '/vet-fort-thomas-ky/' ],
        [ 'label' => 'Cold Spring', 'slug' => '/vet-fort-thomas-ky/' ],
    ],
    'location_heading' => 'Visit Veterinary Medical Center in Fort Thomas.',
    'locality'       => 'Fort Thomas',
    'schema_name'    => 'Veterinary Medical Center Fort Thomas',
    'meta'           => 'Vet in Fort Thomas, KY offering full-service dog and cat care, same-day sick visits when available, and locally owned continuity-focused veterinary medicine.',
    'faq'            => [
        [ 'Do you offer same-day appointments in Fort Thomas?', 'Yes, we reserve scheduling space for sick pets whenever possible. Call early so our team can guide timing based on your pet’s symptoms.' ],
        [ 'Is this an emergency veterinary hospital?', 'We provide urgent same-day care for many issues, but true emergencies may be referred to a 24/7 ER partner depending on severity and time of day.' ],
        [ 'How transparent are prices for first visits?', 'Our team discusses exam fees, diagnostic recommendations, and treatment options before proceeding so you can make informed decisions.' ],
        [ 'What should I bring to my first appointment?', 'Please bring prior records, current medications, your pet’s food or supplement list, and any concerns you want to discuss during the exam.' ],
    ],
]);
