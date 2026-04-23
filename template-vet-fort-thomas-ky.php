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
    'intro'          => 'Looking for a vet in Fort Thomas, KY with clear communication and practical next steps? Veterinary Medical Center provides complete dog and cat care near Memorial Parkway, Tower Park, and surrounding neighborhoods. From wellness and prevention to diagnostics, dental care, surgery, and urgent sick visits when available, our team helps you manage care in one place.',
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
        'Independently owned and women-led veterinary care with decisions made close to home.',
        'Experienced vets and staff focused on continuity, education, and practical care plans.',
        'Modern diagnostic tools and in-house treatment planning for faster answers.',
        'Personalized recommendations based on your pet, your goals, and your household routine.',
        'Trusted by families across Fort Thomas, Newport, Bellevue, and Cold Spring.',
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
        'Our Fort Thomas clinic serves pets throughout the river cities and nearby NKY neighborhoods, including households coming from Newport, Bellevue, and Highland Heights.',
        'If you need a vet in Fort Thomas, KY with full-service care, use this location for wellness exams, sick visits, diagnostics, dental planning, surgery follow-up, and ongoing preventive support.',
    ],
    'areas'          => [
        [ 'label' => 'Fort Thomas', 'slug' => '/vet-fort-thomas-ky/' ],
        [ 'label' => 'Highland Heights', 'slug' => '/vet-near-me/' ],
        [ 'label' => 'Bellevue', 'slug' => '/vet-near-me/' ],
        [ 'label' => 'Newport', 'slug' => '/vet-near-me/' ],
        [ 'label' => 'Cold Spring', 'slug' => '/vet-near-me/' ],
    ],
    'location_heading' => 'Visit Veterinary Medical Center in Fort Thomas.',
    'locality'       => 'Fort Thomas',
    'schema_name'    => 'Veterinary Medical Center Fort Thomas',
    'meta'           => 'Vet in Fort Thomas, KY offering full-service dog and cat care, same-day sick visits when available, and locally owned continuity-focused veterinary medicine.',
    'faq'            => [
        [ 'Do you offer same-day appointments for a vet in Fort Thomas, KY?', 'Yes, our Fort Thomas team keeps scheduling space for sick pets whenever availability allows. Call early so we can match your pet with the most appropriate appointment timing.' ],
        [ 'Can new patients book online before their first visit?', 'Yes. You can request an appointment and complete the new patient registration form before arrival so check-in is faster and your care team can review records ahead of time.' ],
        [ 'What should I bring to my first appointment?', 'Bring prior veterinary records, current medications, supplement details, and any recent lab or imaging reports. A short symptom timeline or list of concerns also helps your veterinarian focus the exam quickly.' ],
        [ 'Do you provide both preventive and medical care?', 'Absolutely. Families looking for a vet in Fort Thomas, KY use VMC for wellness exams, vaccinations, diagnostics, dental care, surgery planning, and follow-up care for ongoing conditions.' ],
        [ 'How do I get medication refills or long-term prescriptions?', 'You can request refills through our online pharmacy or by calling the clinic directly. Our team reviews history and treatment timing before approving medications so your pet stays on a safe plan.' ],
        [ 'When should I call instead of waiting for online booking?', 'Call right away for urgent symptoms like repeated vomiting, breathing concerns, pain, or sudden behavior changes. We can advise same-day options or direct you to emergency care when needed.' ],
    ],
]);
