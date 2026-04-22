<?php
/**
 * ACF Field Migration / Bootstrap
 *
 * Runs once (guarded by a transient) to populate ACF field values on the
 * New Patients, About, and Services pages from the hardcoded defaults.
 * Safe to run multiple times — only writes a field if it has no value yet.
 *
 * Trigger: admin_init. After the first successful run a transient prevents
 * re-execution. To force a re-run, delete the option vmc_acf_migration_v1
 * from wp_options (or visit /wp-admin/?vmc_reset_migration=1 while logged in
 * as an admin, which this file also handles).
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Manual reset hook (admin only, guarded by capability)
add_action( 'admin_init', function () {
    if ( isset( $_GET['vmc_reset_migration'] ) && current_user_can( 'manage_options' ) ) {
        delete_option( 'vmc_acf_migration_v1' );
        delete_option( 'vmc_location_pages_migration_v1' );
        wp_redirect( admin_url() );
        exit;
    }
} );

add_action( 'admin_init', 'vmc_run_acf_migration', 20 );

function vmc_run_acf_migration() {
    if ( ! function_exists( 'update_field' ) ) return;
    if ( get_option( 'vmc_acf_migration_v1' ) ) return;

    // ── Locate pages by template ────────────────────────────────────────
    $np_pages  = get_pages( [ 'meta_key' => '_wp_page_template', 'meta_value' => 'page-new-patients.php' ] );
    $ab_pages  = get_pages( [ 'meta_key' => '_wp_page_template', 'meta_value' => 'templates-about.php' ] );
    $svc_pages = get_pages( [ 'meta_key' => '_wp_page_template', 'meta_value' => 'template-services.php' ] );

    // Also try slug-based fallback for New Patients (implicit template routing)
    if ( empty( $np_pages ) ) {
        $np_by_slug = get_page_by_path( 'new-patients' );
        if ( $np_by_slug ) $np_pages = [ $np_by_slug ];
    }
    if ( empty( $ab_pages ) ) {
        $ab_by_slug = get_page_by_path( 'about' );
        if ( $ab_by_slug ) $ab_pages = [ $ab_by_slug ];
    }
    if ( empty( $svc_pages ) ) {
        $svc_by_slug = get_page_by_path( 'services' );
        if ( $svc_by_slug ) $svc_pages = [ $svc_by_slug ];
    }

    // Helper: write a field only if currently empty
    $set = function( $field_name, $value, $post_id ) {
        $existing = get_field( $field_name, $post_id );
        if ( $existing === false || $existing === '' || $existing === null ) {
            update_field( $field_name, $value, $post_id );
        }
    };

    // ── NEW PATIENTS ─────────────────────────────────────────────────────
    foreach ( $np_pages as $page ) {
        $pid = $page->ID;

        // Hero
        $set( 'hero_eyebrow',             'New Patients · Fort Thomas & Independence', $pid );
        $set( 'hero_title',               'Your first visit,',                          $pid );
        $set( 'hero_title_em',            'made simple.',                               $pid );
        $set( 'hero_body',                "We know a new vet visit can feel stressful. We'll take care of you and your pet from the start, with clear steps before your visit, a thoughtful appointment experience, and no surprises after.", $pid );
        $set( 'hero_btn_primary_label',   'Book a New Patient Visit',                  $pid );
        $set( 'hero_btn_secondary_label', 'Contact a Location',                        $pid );
        $set( 'stat_1_value',             '30–45',                                     $pid );
        $set( 'stat_1_label',             'Minute first visit',                        $pid );
        $set( 'stat_2_value',             'Bring',                                     $pid );
        $set( 'stat_2_label',             'Records if you have them',                  $pid );
        $set( 'stat_3_value',             '2',                                         $pid );
        $set( 'stat_3_label',             'Locations serving NKY',                     $pid );

        // What To Bring
        $set( 'bring_eyebrow',      'Before You Arrive',                                      $pid );
        $set( 'bring_heading',      'What to bring to your first vet visit',                  $pid );
        $set( 'bring_step_1_title', 'Completed forms',                                        $pid );
        $set( 'bring_step_1_body',  'Bring your registration form, plus the surgery packet if your pet is scheduled for a procedure.', $pid );
        $set( 'bring_step_2_title', 'Medical records',                                        $pid );
        $set( 'bring_step_2_body',  'Vaccines, medications, prior exam notes, and anything from previous care if you already have it.', $pid );
        $set( 'bring_step_3_title', 'Your questions',                                         $pid );
        $set( 'bring_step_3_body',  'Changes in appetite, energy, behavior, mobility, skin, dental health, or bathroom habits are all helpful to mention.', $pid );
        $set( 'bring_note',         'Dogs should arrive on a leash, and cats should come in a secure carrier. Arriving a few minutes early helps everything feel easier.', $pid );

        // Booking Options
        $set( 'booking_eyebrow',      'Book Your Appointment',                              $pid );
        $set( 'booking_heading',      'Choose the easiest way to book your new patient appointment.', $pid );
        $set( 'booking_body',         'Whether you want to book online, call our team, or send a message first, every path gets you to the same next step: a scheduled first visit and completed new patient paperwork.', $pid );
        $set( 'booking_card_1_title', 'Book online now',                                    $pid );
        $set( 'booking_card_1_body',  'Use our online scheduling software if you prefer to pick your appointment time yourself.', $pid );
        $set( 'booking_card_1_cta',   'Request Appointment Online',                          $pid );
        $set( 'booking_card_2_title', 'Call the clinic',                                    $pid );
        $set( 'booking_card_2_body',  'Want help choosing a time or location? Call Fort Thomas or Independence and we will schedule your first visit for you.', $pid );
        $set( 'booking_card_3_title', 'Fill out a contact form',                            $pid );
        $set( 'booking_card_3_body',  'Not ready to pick a time yet? Send a quick message and our local team will help with scheduling, paperwork, and next steps.', $pid );
        $set( 'booking_card_3_cta',   'Open Contact Form',                                  $pid );
        $set( 'ft_phone',             '(859) 442-4420',                                     $pid );
        $set( 'ind_phone',            '(859) 356-2242',                                     $pid );
        $set( 'ft_address',           '2000 Memorial Parkway, Fort Thomas, KY 41075',        $pid );
        $set( 'ind_address',          '4147 Madison Pike, Independence, KY 41051',           $pid );
        $set( 'ft_cta_label',         'Call Fort Thomas',                                   $pid );
        $set( 'ind_cta_label',        'Call Independence',                                  $pid );

        // Prepare / Forms
        $set( 'prepare_eyebrow',        'Step 1 · Prepare',                               $pid );
        $set( 'prepare_heading',        'A little prep now makes your visit smoother later.', $pid );
        $set( 'prepare_body',           "Fill out the paperwork before you arrive so your appointment can focus on your pet, not the front desk. Choose the digital option if you want the easiest path, or download a paper copy to print and bring with you.", $pid );
        $set( 'form_1_paper_url',       'https://nkyvet.com/storage/app/media/newpatientregistration%20v120626.2.pdf', $pid );
        $set( 'form_2_paper_url',       'https://nkyvet.com/storage/app/media/surgical-forms.pdf', $pid );
        $set( 'form1_kicker',           'Required · All first visits',                    $pid );
        $set( 'form1_title',            'New Patient Registration Form',                  $pid );
        $set( 'form1_description',      "Complete this before your first appointment so we have your contact details, your pet's information, and the basics we need to welcome you properly.", $pid );
        $set( 'form1_meta_needed',      'All new patient appointments',                   $pid );
        $set( 'form1_meta_recommended', 'Use the digital form first',                     $pid );
        $set( 'form1_meta_paper',       'Print and bring to check-in',                   $pid );
        $set( 'form1_btn_digital_label','Access Digital Form',                            $pid );
        $set( 'form1_btn_paper_label',  'Download Paper Copy',                            $pid );
        $set( 'form2_kicker',           'Required · Surgery patients only',               $pid );
        $set( 'form2_title',            'Surgical Information Packet',                    $pid );
        $set( 'form2_description',      'If your pet is scheduled for surgery or a procedure, review the packet ahead of time and complete anything requested before your visit.', $pid );
        $set( 'form2_meta_needed',      'Surgery and procedure visits',                   $pid );
        $set( 'form2_meta_recommended', 'Review digitally before your visit',             $pid );
        $set( 'form2_meta_paper',       'Download and print if needed',                   $pid );
        $set( 'form2_btn_digital_label','Access Digital Form',                            $pid );
        $set( 'form2_btn_paper_label',  'Download Paper Copy',                            $pid );

        // Visit Steps
        $set( 'visit_eyebrow',           'Step 2 · Visit',                                $pid );
        $set( 'visit_heading',           'What your first appointment will feel like.',   $pid );
        $set( 'visit_body',              "Your first visit includes a full physical exam, time to talk through concerns, and clear recommendations for next steps. We want you to leave understanding what we saw, what it means, and what happens next.", $pid );
        $set( 'visit_surgery_box_title', 'If your pet is scheduled for surgery',          $pid );
        $set( 'visit_surgery_box_body',  "Your veterinarian may recommend pre-anesthetic bloodwork or imaging depending on your pet's age and health. Before you leave, our team will review discharge instructions, medications if needed, what to watch for, and when to call.", $pid );
        $set( 'visit_step_1_title', 'Check-in',        $pid ); $set( 'visit_step_1_body', 'We confirm your paperwork, contact details, and any records you brought from previous providers.', $pid );
        $set( 'visit_step_2_title', 'History review',  $pid ); $set( 'visit_step_2_body', "We talk through your pet's routine, symptoms, medications, prior care, and the questions most on your mind.", $pid );
        $set( 'visit_step_3_title', 'Physical exam',   $pid ); $set( 'visit_step_3_body', 'Your veterinarian performs a full exam and explains findings in clear language as you go.', $pid );
        $set( 'visit_step_4_title', 'Recommendations', $pid ); $set( 'visit_step_4_body', 'We walk through care options, diagnostics, treatment plans, and any follow-up that makes sense.', $pid );
        $set( 'visit_step_5_title', 'Checkout',        $pid ); $set( 'visit_step_5_body', "You leave with next steps, a clearer picture of your pet's health, and answers you can actually use.", $pid );

        // Services (numbered)
        $svc_data = [
          1 => [ 'wellness',   'Wellness & Preventive Care',  'Annual exams, vaccines, parasite prevention, and life stage guidance for every dog and cat.',                                           '/service-item/pet-wellness-exams-northern-kentucky/',             'Learn More' ],
          2 => [ 'dental',     'Dental Care & COHAT',         'Oral exams, cleanings, and comprehensive dental treatment to protect long-term health.',                                                '/service-item/veterinary-dental-care-northern-kentucky/',         'Learn More' ],
          3 => [ 'surgery',    'Soft Tissue Surgery',         'Common and advanced surgical procedures with close anesthesia monitoring and attentive recovery care.',                                 '/service-item/pet-soft-tissue-surgery-northern-kentucky/',        'Learn More' ],
          4 => [ 'behavioral', 'Behavior Consultations',      'Anxiety, aggression, and environmental concerns addressed with a clear, practical treatment plan.',                                     '/service-item/pet-behavior-consultations-northern-kentucky/',     'Learn More' ],
          5 => [ 'urgent',     'Urgent Care',                 'Prompt attention for non-life-threatening concerns — call us first and we will guide you.',                                             '/service-item/urgent-veterinary-care-northern-kentucky/',         'Learn More' ],
          6 => [ 'feline',     'Feline-Friendly Visits',      'Quieter, lower-stress appointments designed for cats, including dedicated feline appointment hours.',                                   '/service-item/cat-friendly-veterinarian-northern-kentucky/',      'Learn More' ],
        ];
        foreach ( $svc_data as $n => $s ) {
            $set( "service_{$n}_icon_key", $s[0], $pid );
            $set( "service_{$n}_title",    $s[1], $pid );
            $set( "service_{$n}_body",     $s[2], $pid );
            $set( "service_{$n}_url",      $s[3], $pid );
            $set( "service_{$n}_cta",      $s[4], $pid );
        }
        $set( 'services_eyebrow',   'Our Services',                                         $pid );
        $set( 'services_heading',   'Everything your pet needs under one roof.',            $pid );
        $set( 'services_body',      'From routine wellness to surgery and urgent care, our team provides the full range of veterinary services for dogs and cats across Northern Kentucky.', $pid );
        $set( 'services_all_url',   '/services/',                                           $pid );
        $set( 'services_all_label', 'View All Services',                                    $pid );

        // Testimonials (numbered)
        $test_data = [
          1 => [ 'The team made our first visit genuinely easy. They answered every question, walked us through the exam as it happened, and we left feeling like we actually knew what was going on.', 'Jessica M.', 'Fort Thomas' ],
          2 => [ 'I was nervous about switching vets mid-year, but they had our records sorted before we even sat down. The vet spent real time with us. That meant a lot.',                           'Daniel R.',  'Independence' ],
          3 => [ 'Our cat usually hates vet visits but she was visibly calmer here. The exam room was quiet, the staff moved slowly and gently, and she did great.',                                   'Mara T.',    'Fort Thomas' ],
        ];
        foreach ( $test_data as $n => $t ) {
            $set( "testimonial_{$n}_quote",    $t[0], $pid );
            $set( "testimonial_{$n}_author",   $t[1], $pid );
            $set( "testimonial_{$n}_location", $t[2], $pid );
        }
        $set( 'testimonials_eyebrow', 'What Clients Say',                                   $pid );
        $set( 'testimonials_heading', 'Heard from families just like yours.',               $pid );
        $set( 'testimonials_body',    'Real feedback from Northern Kentucky pet owners who brought their animals in for the first time.', $pid );

        // Payment
        $set( 'pay_eyebrow',        'Step 3 · After',                                   $pid );
        $set( 'pay_heading',        'Payment options before your visit.',                $pid );
        $set( 'pay_body',           'Payment is due at the time of service. We accept several payment methods, and we can help you understand financing or reimbursement options before you leave.', $pid );
        $set( 'pay_summary_title',  'What to expect when it is time to pay',             $pid );
        $set( 'pay_summary_body',   'Most visits are simple at checkout. Standard payment methods are accepted at the time of service, and additional support may be available for larger or unexpected expenses.', $pid );
        $set( 'pay_card1_title',    'Accepted payments',                                 $pid );
        $set( 'pay_card1_body',     'We accept the standard payment methods most clients expect at checkout.',  $pid );
        $set( 'pay_method_1_label', 'Cash and checks',                                   $pid );
        $set( 'pay_method_1_note',  'are accepted.',                                     $pid );
        $set( 'pay_method_2_label', 'Debit cards',                                       $pid );
        $set( 'pay_method_2_note',  'are accepted.',                                     $pid );
        $set( 'pay_method_3_label', 'Major credit cards',                                $pid );
        $set( 'pay_method_3_note',  'including Visa, Mastercard, Discover, and Amex are accepted.', $pid );
        $set( 'pay_card2_title',    'Need more flexibility?',                            $pid );
        $set( 'pay_card2_body',     'For larger balances or unexpected care, there may be options that help make payment more manageable.', $pid );
        $set( 'pay_flex_1_label',   'CareCredit',                                        $pid );
        $set( 'pay_flex_1_note',    'can help break larger balances into monthly payments for diagnostics, treatment, or surgery-related costs.', $pid );
        $set( 'pay_flex_2_label',   'Pet insurance',                                     $pid );
        $set( 'pay_flex_2_note',    'clients can request documentation for reimbursement, depending on their provider and plan.', $pid );
        $set( 'pay_flex_link_url',  'https://www.carecredit.com/',                       $pid );
        $set( 'pay_flex_link_label','Learn about CareCredit',                            $pid );

        // Contact / Locations
        $set( 'contact_eyebrow',          'Contact',                                             $pid );
        $set( 'contact_heading',          'Choose the location that works best for you.',        $pid );
        $set( 'contact_body',             'Call either location with questions about your first visit, forms, records, or scheduling.', $pid );
        $set( 'ft_location_name',         'Fort Thomas',                                         $pid );
        $set( 'ind_location_name',        'Independence',                                        $pid );
        $set( 'contact_form_heading',     'Prefer to send a message first?',                     $pid );
        $set( 'contact_form_body',        'Fill out the contact form and our team will help you schedule a new patient appointment, answer paperwork questions, or guide you to the right booking option.', $pid );
        $set( 'contact_form_fallback_cta','Open Contact Form',                                   $pid );

        // Final CTA
        $set( 'final_cta_eyebrow', 'Need Help Getting Started?',                        $pid );
        $set( 'final_cta_heading', 'Book online, call, or fill out our contact form — we are here to help.', $pid );
        $set( 'final_cta_body',    'Once your appointment is requested or scheduled, please complete the New Patient Registration Form before your visit unless you are already an existing patient. If anything feels unclear, call Fort Thomas or Independence, or use our contact form. We value ease, clear communication, and a warm welcome for every family.', $pid );
        $set( 'final_cta_form_btn','Book Online',                                       $pid );

        // Convenience / Bottom SEO
        $set( 'conv_eyebrow',    'Convenience First',                                   $pid );
        $set( 'conv_heading',    'Designed to make veterinary care easier for busy Northern Kentucky families.', $pid );
        $set( 'conv_card1_title','Practical options that save time',                    $pid );
        $set( 'conv_card1_body', "<p>We prioritize convenience for patients and pet owners with online booking, friendly phone support, and a contact form for quick questions. You can request visits digitally, call either location for real-time help, or message our team and we will guide you to the right next step.</p><ul><li><strong>Online pharmacy available:</strong> request refills and have medications delivered when eligible.</li><li><strong>Drop-off appointments available:</strong> ask our team if a drop-off visit fits your schedule.</li><li><strong>Two nearby locations:</strong> Fort Thomas and Independence appointments for dogs and cats.</li></ul>", $pid );
        $set( 'conv_card2_title','Local, independent, and relationship-focused',        $pid );
        $set( 'conv_card2_body', "<p>Veterinary Medical Center is locally owned and not corporate. Our doctors and support team live and work in the same communities we serve, and we focus on personalized care, transparent communication, and long-term relationships with each pet family.</p><p>We frequently help new patients from Fort Thomas, Independence, Cold Spring, Highland Heights, Bellevue, Newport, Alexandria, Crestview Hills, and nearby Northern Kentucky neighborhoods. If you are comparing options for a local veterinarian, we are here to help.</p>", $pid );
    }

    // ── ABOUT ────────────────────────────────────────────────────────────
    foreach ( $ab_pages as $page ) {
        $pid = $page->ID;

        $set( 'about_hero_eyebrow',  'About Veterinary Medical Center', $pid );
        $set( 'about_hero_title',    'Independent veterinary care for Northern Kentucky families who want something more personal.', $pid );
        $set( 'about_hero_body',     'Veterinary Medical Center is an independently owned veterinary hospital serving Fort Thomas, Independence, and surrounding Northern Kentucky communities with thoughtful, relationship-based care. Led by Dr. Kristi Baker, our practice is built around strong medicine, honest communication, and a calmer experience for pets and the people who love them.', $pid );
        $set( 'about_hero_btn1_label','Request Appointment',            $pid );
        $set( 'about_hero_btn2_label','Explore Our Locations',          $pid );
        $set( 'about_stat1_value',   'Local',                           $pid );
        $set( 'about_stat1_label',   'Independent ownership',           $pid );
        $set( 'about_stat2_value',   '2',                               $pid );
        $set( 'about_stat2_label',   'Northern Kentucky locations',     $pid );
        $set( 'about_stat3_value',   'Fear Free',                       $pid );
        $set( 'about_stat3_label',   'Comfort-focused visits',          $pid );

        $set( 'about_panel_heading',      'Why families choose VMC',    $pid );
        $set( 'about_panel_item1_title',  'Independent and community-rooted', $pid );
        $set( 'about_panel_item1_body',   'We are based here because we live here, and the pets we care for belong to the same community we call home.', $pid );
        $set( 'about_panel_item2_title',  'Led by Dr. Kristi Baker',    $pid );
        $set( 'about_panel_item2_body',   'As owner, Dr. Baker has shaped a veterinary practice that values continuity, compassion, and truly knowing the families it serves.', $pid );
        $set( 'about_panel_item3_title',  'Full-service and relationship-based', $pid );
        $set( 'about_panel_item3_body',   'We support routine wellness, surgery, dental care, and long-term health with a more personal, less rushed approach to veterinary medicine.', $pid );
        $set( 'about_panel_item4_title',  'Real guidance for pet owners', $pid );
        $set( 'about_panel_item4_body',   'We believe families deserve practical support, clear answers, and education that helps pets thrive between visits too.', $pid );
        $set( 'about_panel_note',         'Proudly serving Fort Thomas, Independence, Covington, and pet families throughout Northern Kentucky and Greater Cincinnati.', $pid );

        $set( 'about_loc_eyebrow', 'Our Locations', $pid );
        $set( 'about_loc_heading', 'Two Northern Kentucky locations, each with the same personal approach to veterinary care.', $pid );
        $set( 'about_loc_body',    'Families choose Veterinary Medical Center because they want both convenience and continuity. With locations in Fort Thomas and Independence, we are able to serve pet owners across Northern Kentucky while still preserving the neighborhood feel that makes care more comfortable and personal.', $pid );

        $set( 'about_ft_eyebrow', 'Fort Thomas, KY', $pid );
        $set( 'about_ft_heading', 'Convenient veterinary care for Fort Thomas and nearby river city communities.', $pid );
        $set( 'about_ft_body1',   'Our Fort Thomas location offers a welcoming option for pet families who want a trusted local veterinarian close to home. This office reflects the same approach that defines our practice everywhere: calm, relationship-based care that makes space for real questions and individualized recommendations.', $pid );
        $set( 'about_ft_body2',   'For many families, proximity matters. It makes routine wellness visits easier to stay on top of, follow-up appointments more manageable, and continuity of care more consistent over time. We are proud to care for pets from Fort Thomas, Highland Heights, Bellevue, and nearby communities throughout Northern Kentucky.', $pid );
        $set( 'about_ft_btn1_label', 'Request Appointment', $pid );
        $set( 'about_ft_btn2_label', 'Get Directions',      $pid );

        $set( 'about_ind_eyebrow', 'Independence, KY', $pid );
        $set( 'about_ind_heading', 'Thoughtful veterinary care for Independence, Covington, and central Northern Kentucky.', $pid );
        $set( 'about_ind_body1',   'Our Independence location helps make comprehensive veterinary care more accessible for families throughout the area who want an independently owned hospital with a more personal feel. Here, pets and people are cared for with the same warmth, clarity, and comfort-focused approach that guides the entire practice.', $pid );
        $set( 'about_ind_body2',   'This location supports both everyday veterinary needs and more involved care, giving families a trusted place to turn for preventive medicine, treatment planning, and ongoing guidance. We are grateful to serve so many loyal pet owners in and around Independence and the broader Covington area.', $pid );
        $set( 'about_ind_btn1_label', 'Request Appointment', $pid );
        $set( 'about_ind_btn2_label', 'Get Directions',      $pid );

        $set( 'about_practice_eyebrow', 'About Our Practice', $pid );
        $set( 'about_practice_heading', 'A Northern Kentucky veterinary hospital built around relationships, not rush.', $pid );
        $set( 'about_practice_body',    'When families look for a veterinarian in Northern Kentucky, they are often looking for more than a checklist of services. They want a place where questions are welcome, recommendations are clear, and their pet is treated like an individual. That is the kind of practice Veterinary Medical Center was built to be.', $pid );
        $set( 'about_sc1_value',   '2',          $pid ); $set( 'about_sc1_heading', 'Convenient locations',   $pid ); $set( 'about_sc1_body', 'We serve pet families from both Fort Thomas and Independence, making it easier to stay connected to care close to home.', $pid );
        $set( 'about_sc2_value',   'Full',        $pid ); $set( 'about_sc2_heading', 'Service hospital',        $pid ); $set( 'about_sc2_body', 'We provide preventive care, surgery, dental care, and medical support for pets through many life stages and health needs.', $pid );
        $set( 'about_sc3_value',   'Local',       $pid ); $set( 'about_sc3_heading', 'Independent ownership',  $pid ); $set( 'about_sc3_body', 'Our practice is shaped by the community around us, not by a remote corporate model or one-size-fits-all expectations.', $pid );
        $set( 'about_sc4_value',   'Fear Free',   $pid ); $set( 'about_sc4_heading', 'Comfort-focused care',   $pid ); $set( 'about_sc4_body', 'We care deeply about making the veterinary experience gentler, calmer, and more supportive for pets and people alike.', $pid );

        $set( 'about_story_eyebrow',      'Our Story', $pid );
        $set( 'about_story_heading',      'The kind of practice you build when this community is your home.', $pid );
        $set( 'about_story_body',         'Veterinary Medical Center was built to serve Northern Kentucky families with care that feels more personal, more thoughtful, and more grounded. Dr. Kristi Baker is licensed in Kentucky and Ohio, but this practice is rooted right here, because this is where we live, where we work, and where we have chosen to invest in long-term relationships with pets and their people.', $pid );
        $set( 'about_story_card_heading', 'More than a clinic', $pid );
        $set( 'about_story_card_body',    "<p>We are a full-service animal hospital, but the heart of this practice has always been bigger than that. We care deeply about the day-to-day lives of the pets we see, the families who trust us, and the kind of experience people walk away with after a visit.</p><p>That means strong medicine, of course, but it also means kindness, communication, and a calmer environment. We want the waiting room to feel welcoming, the exam room to feel less overwhelming, and every recommendation to feel honest, helpful, and rooted in what is best for your pet.</p><p>We believe the best veterinary care grows from familiarity and trust. Over time, that helps us understand your pet more fully and support your family more thoughtfully.</p>", $pid );
        $set( 'about_sp1_title', 'Owned here. Built here.',       $pid ); $set( 'about_sp1_body', 'This is not a distant corporate practice. It is an independently owned hospital shaped by people who are part of this community.', $pid );
        $set( 'about_sp2_title', 'Relationships over transactions',$pid ); $set( 'about_sp2_body', "We want to know your pet over time, remember your concerns, and be a steady part of your animal's life.", $pid );
        $set( 'about_sp3_title', 'Wholesome, neighborhood care',  $pid ); $set( 'about_sp3_body', 'Our goal is simple: treat people with warmth, treat pets with gentleness, and care for both like they matter here, because they do.', $pid );
        $set( 'about_sp4_title', 'Clear support for pet owners',  $pid ); $set( 'about_sp4_body', 'We want families to leave visits with practical next steps, understandable recommendations, and confidence in how to care well at home.', $pid );

        $set( 'about_offer_eyebrow', 'What We Offer',                    $pid );
        $set( 'about_offer_heading', 'A full-service hospital with a more human feel.', $pid );
        $set( 'about_offer_body',    'We welcome both routine visits and more serious medical concerns, always with the goal of making care feel thorough, understandable, and supportive. Whether your pet needs preventive care, surgery, dental care, or help with a more complex issue, our team works to make the process feel clear and personal from the first conversation forward.', $pid );
        $set( 'about_oc1_heading', 'Routine & Preventive Care',           $pid ); $set( 'about_oc1_body', 'Ongoing wellness care helps pets stay healthier over time and helps families feel more confident about what their pets need at each life stage.', $pid ); $set( 'about_oc1_list', "Routine medical care and wellness visits\nPreventive guidance and education\nNutrition support and problem prevention\nLong-term care planning as needs change", $pid );
        $set( 'about_oc2_heading', 'Medical, Surgical & Dental Care',     $pid ); $set( 'about_oc2_body', 'From more complex medical conditions to soft tissue surgery and oral health support, we provide comprehensive care under one roof.', $pid ); $set( 'about_oc2_list', "Soft tissue surgery\nOral health assessments and treatment\nSupport for serious medical conditions\nThoughtful treatment planning and follow-up", $pid );
        $set( 'about_oc3_heading', 'Comfort, Behavior & Wellness',        $pid ); $set( 'about_oc3_body', 'We care about emotional wellbeing too. Mental wellness, lower-stress handling, and a calmer visit experience matter just as much as the treatment plan.', $pid ); $set( 'about_oc3_list', "Fear Free Certified approach\nComfort-focused handling and communication\nSupportive care for pets and their people\nA gentler visit for nervous or sensitive pets", $pid );

        $set( 'about_hours_eyebrow',    'Hours',                          $pid );
        $set( 'about_hours_heading',    'Office hours for both locations.',$pid );
        $set( 'about_hours_body',       'We are proud to serve families in both Independence and Fort Thomas, with hours designed to support everyday care and ongoing relationships.', $pid );
        $set( 'about_ind_hours_mon_fri','8:00 am–6:00 pm',                $pid );
        $set( 'about_ind_hours_sat',    'Closed',                         $pid );
        $set( 'about_ind_hours_sun',    'Closed',                         $pid );
        $set( 'about_ft_hours_mon_fri', '8:00 am–6:00 pm',               $pid );
        $set( 'about_ft_hours_sat',     'Rotating schedule, please call', $pid );
        $set( 'about_ft_hours_sun',     'Closed',                         $pid );

        $set( 'about_faq_eyebrow', 'Frequently Asked Questions', $pid );
        $set( 'about_faq_heading', 'Helpful answers for families looking for a veterinarian in Fort Thomas or Independence.', $pid );
        $set( 'about_faq_body',    'These are some of the questions pet owners often have when getting to know our practice and deciding whether Veterinary Medical Center is the right fit for their family.', $pid );
        $set( 'about_faq1_question', 'Is Veterinary Medical Center independently owned?', $pid );
        $set( 'about_faq1_answer',   'Yes. Veterinary Medical Center is independently owned and led by Dr. Kristi Baker. That independence helps us keep our care personal, community-rooted, and focused on long-term relationships.', $pid );
        $set( 'about_faq2_question', 'What veterinary services do you offer?', $pid );
        $set( 'about_faq2_answer',   'We provide routine wellness care, preventive medicine, surgery, dental care, and support for more involved medical concerns, along with a comfort-focused approach designed to reduce stress for pets and families.', $pid );
        $set( 'about_faq3_question', 'Do you serve families outside Fort Thomas and Independence?', $pid );
        $set( 'about_faq3_answer',   'Absolutely. We welcome pets and their people from across Northern Kentucky and nearby Greater Cincinnati communities who are looking for a local veterinary team with a more personal style of care.', $pid );
        $set( 'about_faq4_question', 'What makes your approach different?', $pid );
        $set( 'about_faq4_answer',   'We care about both the medical outcome and the experience surrounding it. That means clear communication, practical guidance, comfort-focused handling, and a pace of care that feels less rushed and more supportive.', $pid );

        $set( 'about_cta_eyebrow',    'Ready to Visit?',       $pid );
        $set( 'about_cta_heading',    "We'd be honored to care for your pet.", $pid );
        $set( 'about_cta_body',       'Whether you are new to the area, looking for a more personal veterinary experience, or simply want a team that feels rooted in the same community you are, we would love to welcome you to Veterinary Medical Center.', $pid );
        $set( 'about_cta_btn1_label', 'Request Appointment',  $pid );
        $set( 'about_cta_btn2_label', 'Contact Us',            $pid );
        $set( 'about_cta_btn2_url',   '/contact-us',           $pid );
        $set( 'about_cta_btn3_label', 'View Services',         $pid );
        $set( 'about_cta_btn3_url',   '/services',             $pid );
    }

    // ── SERVICES ─────────────────────────────────────────────────────────
    foreach ( $svc_pages as $page ) {
        $pid = $page->ID;

        $set( 'svc_hero_eyebrow',    'Veterinary Services',                      $pid );
        $set( 'svc_hero_title',      'Care that supports your pet,',             $pid );
        $set( 'svc_hero_title_em',   'through every stage of life.',             $pid );
        $set( 'svc_hero_body',       "We offer thoughtful, relationship-based veterinary care designed around your pet's needs, your goals, and a calmer experience from preventive visits to advanced treatment.", $pid );
        $set( 'svc_hero_btn1_label', 'Request Appointment',                      $pid );
        $set( 'svc_hero_btn2_label', 'View Locations',                           $pid );
        $set( 'svc_stat1_value',     'Fear Free',                                $pid );
        $set( 'svc_stat1_label',     'Comfort-focused care',                     $pid );
        $set( 'svc_stat2_value',     'Urgent',                                   $pid );
        $set( 'svc_stat2_label',     'Care available weekdays',                  $pid );
        $set( 'svc_stat3_value',     'Dogs to',                                  $pid );
        $set( 'svc_stat3_label',     'Pocket pets & more',                       $pid );

        $set( 'svc_panel_heading',      'What makes care here different',        $pid );
        $set( 'svc_panel_item1_title',  'Fear Free approach',                   $pid ); $set( 'svc_panel_item1_body', 'Gentle handling and lower-stress visits designed to help pets feel safer and people feel more supported.', $pid );
        $set( 'svc_panel_item2_title',  'Feline-exclusive appointment times',   $pid ); $set( 'svc_panel_item2_body', 'Dedicated times designed to make visits more comfortable for cats and the people who love them.', $pid );
        $set( 'svc_panel_item3_title',  'Urgent care support',                  $pid ); $set( 'svc_panel_item3_body', 'Our team is equipped to handle many urgent medical needs during the work week.', $pid );
        $set( 'svc_panel_item4_title',  'Personalized recommendations',         $pid ); $set( 'svc_panel_item4_body', "Care plans are tailored to your pet's age, species, lifestyle, and health history.", $pid );
        $set( 'svc_panel_note',         'We see dogs, cats, rabbits, pocket pets, and select small farm animals. Availability may vary by veterinarian.', $pid );

        $set( 'svc_section_eyebrow', 'Our Services', $pid );
        $set( 'svc_section_heading', 'Comprehensive veterinary care, from routine visits to advanced support.', $pid );
        $set( 'svc_section_body',    'Our team offers a wide range of services designed to help pets stay healthy, address problems early, and support quality of life over time. Whether your pet is due for preventive care or needs more specialized attention, we aim to make the process clear, thoughtful, and manageable.', $pid );

        $svc_cards = [
          1 => [ 'cross',   'Wellness & Preventive Care',     "Preventive care helps us build a complete picture of your pet's health and catch concerns before they become bigger problems.",          "Wellness evaluations tailored to life stage\nVaccinations and preventive recommendations\nRoutine physical exams\nPersonalized care planning",                                            '/service-item/pet-wellness-exams-northern-kentucky/' ],
          2 => [ 'tooth',   'Dental & Oral Health',           'Oral health affects comfort, appetite, and overall wellbeing. Dental care is an important part of long-term health.',                   "Comprehensive Oral Health Assessment and Treatment (COHAT)\nDental cleanings\nOral exams and treatment planning\nRecommendations for ongoing home care",                                '/service-item/veterinary-dental-care-northern-kentucky/' ],
          3 => [ 'scalpel', 'Surgery',                        'When surgery is needed, we focus on careful planning, clear communication, and support before and after the procedure.',               "Soft tissue surgery\nPre-surgical evaluation\nRecovery guidance and follow-up care\nDischarge instructions and home monitoring support",                                               '/service-item/pet-soft-tissue-surgery-northern-kentucky/' ],
          4 => [ 'search',  'Consultation & Second Opinions', 'Sometimes you need a fresh perspective or more time to talk through a complex issue. We are happy to help you make informed decisions.', "Second-opinion consultations\nReview of previous history and records\nAdditional recommendations and care options\nGoal-based conversations for ongoing conditions",              '/service-item/urgent-veterinary-care-northern-kentucky/' ],
          5 => [ 'brain',   'Behavior & Quality of Life',     'Behavior changes can affect daily life for both pets and people. We can help assess concerns and talk through realistic next steps.',    "Behavioral consultations\nStress-reduction recommendations\nSupport for lifestyle and home-management concerns\nQuality-of-life discussions when needs change",                     '/service-item/pet-behavior-consultations-northern-kentucky/' ],
          6 => [ 'heart',   'End-of-Life Care',               'Some of the most important care we provide happens during the hardest moments. We offer compassionate support centered on comfort, clarity, and dignity.', "Euthanasia in office or at home\nGuidance for difficult decisions\nSupportive conversations about comfort and next steps",                                                   '/service-item/cat-friendly-veterinarian-northern-kentucky/' ],
        ];
        foreach ( $svc_cards as $n => $c ) {
            $set( "svc_card{$n}_icon",  $c[0], $pid );
            $set( "svc_card{$n}_title", $c[1], $pid );
            $set( "svc_card{$n}_body",  $c[2], $pid );
            $set( "svc_card{$n}_list",  $c[3], $pid );
            $set( "svc_card{$n}_url",   $c[4], $pid );
        }

        $set( 'svc_comfort_eyebrow', 'Comfort-focused care',                    $pid );
        $set( 'svc_comfort_heading', 'Care built around comfort, communication, and trust.', $pid );
        $set( 'svc_comfort_body',    'We believe good veterinary medicine is not just about treatment. It is also about how care feels. That means taking time to explain what we see, creating a lower-stress environment whenever possible, and helping you feel confident about the decisions you make for your pet.', $pid );
        $set( 'svc_cp1_title', 'Calmer visits',       $pid ); $set( 'svc_cp1_body', 'Fear Free methods help reduce stress and make visits easier for nervous pets.', $pid );
        $set( 'svc_cp2_title', 'Species-aware care',  $pid ); $set( 'svc_cp2_body', 'Different pets need different approaches, and care is tailored accordingly.', $pid );
        $set( 'svc_cp3_title', 'Clear next steps',    $pid ); $set( 'svc_cp3_body', 'You leave with recommendations you can understand and act on.', $pid );

        $set( 'svc_appt_eyebrow', 'Appointments & Support', $pid );
        $set( 'svc_appt_heading', 'Here when you need routine care, answers, or urgent support.', $pid );
        $set( 'svc_appt_body',    'Our appointment system is designed to help us schedule efficiently while still giving each pet the attention they need. We do our best to accommodate requests, and our team is available during the week to address many urgent medical concerns.', $pid );
        $set( 'svc_appt1_title',  'Appointments', $pid ); $set( 'svc_appt1_body', 'Our computerized appointment book helps us coordinate care efficiently and make the most of your visit. If you have scheduling concerns or need help choosing the right appointment type, our team is happy to guide you.', $pid );
        $set( 'svc_appt2_title',  'Urgent care',  $pid ); $set( 'svc_appt2_body', 'We have a veterinarian and trained staff on duty five days a week who are equipped to handle urgent medical needs. If your pet needs prompt attention, contact us so we can help you determine the best next step.', $pid );

        $set( 'svc_pets_eyebrow', 'Pets We See',                                 $pid );
        $set( 'svc_pets_heading', 'We care for more than just dogs and cats.',   $pid );
        $set( 'svc_pets_body',    'Because our veterinarians have a range of experience and interests, we are able to care for many different kinds of pets. Availability for some species may depend on the veterinarian, so please call if you have specific questions.', $pid );
        $set( 'svc_pets_list',    "Dogs\nCats\nRabbits*\nPocket Pets*\nSmall Farm Animals*", $pid );
        $set( 'svc_pets_note',    '*Select veterinarians only. Contact us for details about species-specific care and appointment availability.', $pid );
    }

    update_option( 'vmc_acf_migration_v1', true );
}

// Location SEO pages: create/update the three local landing pages, fill ACF, and
// write Rank Math fields. This is intentionally separate from the general page
// migration so these pages can be reset without disturbing About/Services data.
add_action( 'admin_init', 'vmc_run_location_page_migration', 15 );

function vmc_location_update_field( $field_name, $value, $post_id ) {
    if ( function_exists( 'update_field' ) ) {
        update_field( $field_name, $value, $post_id );
        return;
    }

    update_post_meta( $post_id, $field_name, $value );
}

function vmc_run_location_page_migration() {
    if ( get_option( 'vmc_location_pages_migration_v1' ) ) return;

    $image_base = get_template_directory_uri() . '/assets/images/';

    $pages = [
        [
            'title'    => 'Vet in Fort Thomas KY',
            'slug'     => 'vet-fort-thomas-ky',
            'template' => 'template-vet-fort-thomas-ky.php',
            'content'  => '<p>Veterinary Medical Center is a vet in Fort Thomas KY families choose for locally owned, women-led, community-rooted dog and cat care on Memorial Parkway. Dr. Kristi Baker lives in Fort Thomas, her children were born and raised here, and they attend Fort Thomas schools.</p><p>This Fort Thomas veterinary page is designed for pet owners comparing local options near Highlands High School, the Northern Kentucky Water District, Memorial Parkway, and nearby Campbell County neighborhoods.</p>',
            'acf'      => [
                'loc_hero_eyebrow'     => 'Vet in Fort Thomas, KY',
                'loc_hero_heading'     => 'Vet in Fort Thomas KY for local dogs, cats, and families.',
                'loc_hero_body'        => 'Veterinary Medical Center is a vet in Fort Thomas KY families choose when they want local, independently owned veterinary care on Memorial Parkway. Led by Dr. Kristi Baker, VMC combines full-service dog and cat medicine with a personal, women-led, community-rooted approach that feels different from a corporate clinic.',
                'loc_primary_button'   => 'Request Appointment',
                'loc_secondary_button' => 'Get Directions',
                'loc_panel_heading'    => 'Why Fort Thomas families choose VMC',
                'loc_panel_body'       => 'VMC Fort Thomas combines local ownership, Memorial Parkway convenience, and relationship-based care from a team rooted in the community.',
                'loc_intro_eyebrow'    => 'Fort Thomas Veterinary Care',
                'loc_intro_heading'    => 'A vet in Fort Thomas KY page built around local families.',
                'loc_intro_body'       => 'From school routes near Highlands High School to daily commutes along Memorial Parkway, VMC Fort Thomas is positioned for real-life access and long-term veterinary relationships.',
                'loc_image'            => $image_base . 'about-fort-thomas.jpg',
                'loc_image_alt'        => 'vet in Fort Thomas KY Veterinary Medical Center exterior on Memorial Parkway',
                'loc_image_caption'    => 'A local Fort Thomas veterinary hospital on Memorial Parkway near Highlands High School and the Northern Kentucky Water District.',
                'loc_quick_body'       => 'Ready to compare a vet in Fort Thomas KY option with local ownership, full-service care, and a practical location? These links help you move from research to scheduling.',
                'loc_resource_heading' => 'Fort Thomas veterinary care with a local next step.',
                'loc_resource_body'    => 'Use this page to choose a local Fort Thomas veterinarian, request care, complete registration, contact the team, and prepare for your first visit.',
                'loc_seo_body'         => '<p>If you are comparing vet in Fort Thomas KY options, Veterinary Medical Center gives you local care with a clear Fort Thomas connection. Dr. Kristi Baker lives in Fort Thomas, her two children were born and raised here, and they attend Fort Thomas schools. That matters because VMC is not a corporate-owned clinic trying to look local from a distance. It is an independently owned, women-led veterinary hospital shaped by the community it serves.</p><p>Our Memorial Parkway location is convenient for families traveling to school, work, sports, errands, and home. Pet owners searching for a vet in Fort Thomas KY hospital often choose VMC because it is near Highlands High School, across from the Northern Kentucky Water District, and easy to recognize on a route they already know.</p><p>For new patients, start with our <a href="/first-vet-visit-northern-kentucky/">new patient information</a>, compare our <a href="/services/">veterinary services</a>, complete <a href="/new-patient-registration-form/">new patient registration</a>, <a href="/contact/">contact our team</a>, or learn more <a href="/about/">about our locally owned practice</a>.</p>',
            ],
            'rank_math' => [
                'rank_math_focus_keyword'        => 'vet in Fort Thomas KY',
                'rank_math_title'                => 'Vet in Fort Thomas KY | 5 Trusted Reasons Local Families Choose VMC',
                'rank_math_description'          => 'Need a vet in Fort Thomas KY? Visit locally owned VMC on Memorial Parkway for trusted dog and cat care near Highlands High School.',
                'rank_math_facebook_title'       => 'Vet in Fort Thomas KY | Veterinary Medical Center',
                'rank_math_facebook_description' => 'Local, women-led veterinary care on Memorial Parkway for Fort Thomas dogs, cats, and families.',
                'rank_math_twitter_title'        => 'Vet in Fort Thomas KY | Veterinary Medical Center',
                'rank_math_twitter_description'  => 'Local, women-led veterinary care on Memorial Parkway for Fort Thomas dogs, cats, and families.',
            ],
        ],
        [
            'title'    => 'Vet in Independence KY',
            'slug'     => 'vet-independence-ky',
            'template' => 'template-vet-independence-ky.php',
            'content'  => '<p>Veterinary Medical Center is a vet in Independence KY families choose for locally owned, women-led, full-service dog and cat care on Madison Pike. This Independence veterinary page is written for central Northern Kentucky families who want practical access, clear communication, and care that is not corporate owned.</p><p>VMC Independence serves pets from Independence, Covington, Taylor Mill, Latonia, Erlanger, Florence, Edgewood, Kenton County, and nearby communities.</p>',
            'acf'      => [
                'loc_hero_eyebrow'     => 'Vet in Independence, KY',
                'loc_hero_heading'     => 'Vet in Independence KY for central Northern Kentucky pets.',
                'loc_hero_body'        => 'Veterinary Medical Center is a vet in Independence KY families choose for full-service dog and cat care on Madison Pike. VMC Independence gives central Northern Kentucky families a locally owned, women-led veterinary hospital with clear communication, practical access, and relationship-based care.',
                'loc_primary_button'   => 'Request Appointment',
                'loc_secondary_button' => 'Get Directions',
                'loc_panel_heading'    => 'Why Independence families choose VMC',
                'loc_panel_body'       => 'VMC Independence gives central Northern Kentucky families full-service care on Madison Pike with locally owned, women-led values.',
                'loc_intro_eyebrow'    => 'Independence Veterinary Care',
                'loc_intro_heading'    => 'A vet in Independence KY page for central Northern Kentucky.',
                'loc_intro_body'       => 'Our Independence office supports wellness visits, dental care, surgery planning, sick visits, senior care, and comfort-focused guidance for dogs and cats.',
                'loc_image'            => $image_base . 'about-independence.jpg',
                'loc_image_alt'        => 'vet in Independence KY Veterinary Medical Center exterior on Madison Pike',
                'loc_image_caption'    => 'A central Northern Kentucky veterinary hospital on Madison Pike for Independence families and nearby communities.',
                'loc_quick_body'       => 'If you are comparing a vet in Independence KY option, these links help you learn about VMC, review services, and request a practical next appointment.',
                'loc_resource_heading' => 'Independence veterinary care with a clear next step.',
                'loc_resource_body'    => 'Use this page to choose a local Independence veterinarian, request care, complete registration, contact the team, and prepare for your first visit.',
                'loc_seo_body'         => '<p>Families searching vet in Independence KY usually want more than a nearby appointment. They want a veterinary team that can explain recommendations clearly, help with everyday wellness, and stay with their pet through changing health needs. Veterinary Medical Center Independence serves central Northern Kentucky from Madison Pike with full-service dog and cat care in a locally owned, women-led setting.</p><p>VMC Independence is not corporate owned. The practice is led by Dr. Kristi Baker and rooted in relationship-based values: practical communication, compassionate handling, and care decisions made close to the community. Pet owners from Independence, Covington, Taylor Mill, Latonia, Erlanger, Florence, Edgewood, and Kenton County can use this location for wellness visits, dental care, surgery planning, sick visits, senior care, and comfort-focused support.</p><p>New here? Visit our <a href="/first-vet-visit-northern-kentucky/">new patient page</a>, explore <a href="/services/">veterinary services</a>, complete <a href="/new-patient-registration-form/">new patient registration</a>, <a href="/contact/">contact VMC</a>, or read more <a href="/about/">about VMC</a>.</p>',
            ],
            'rank_math' => [
                'rank_math_focus_keyword'        => 'vet in Independence KY',
                'rank_math_title'                => 'Vet in Independence KY | Trusted Local Care Without the Corporate Feel',
                'rank_math_description'          => 'Need a vet in Independence KY? Visit locally owned VMC on Madison Pike for full-service dog and cat care in Northern Kentucky.',
                'rank_math_facebook_title'       => 'Vet in Independence KY | Veterinary Medical Center',
                'rank_math_facebook_description' => 'Local, women-led veterinary care on Madison Pike for Independence and central Northern Kentucky pets.',
                'rank_math_twitter_title'        => 'Vet in Independence KY | Veterinary Medical Center',
                'rank_math_twitter_description'  => 'Local, women-led veterinary care on Madison Pike for Independence and central Northern Kentucky pets.',
            ],
        ],
        [
            'title'    => 'Vet Near Cincinnati',
            'slug'     => 'vet-near-cincinnati',
            'template' => 'template-vet-cincinnati.php',
            'content'  => '<p>Veterinary Medical Center Fort Thomas is a vet near Cincinnati for families who want easy access from downtown, I-471 convenience, and local dog and cat care without a downtown parking hassle. For many drivers, VMC Fort Thomas is about 10 minutes from downtown Cincinnati.</p><p>This page is built for Cincinnati pet owners comparing a nearby veterinarian with local ownership, practical access, and full-service care just across the river.</p>',
            'acf'      => [
                'loc_hero_eyebrow'     => 'Vet Near Cincinnati',
                'loc_hero_heading'     => 'Vet near Cincinnati with easy access from downtown.',
                'loc_hero_body'        => 'Veterinary Medical Center Fort Thomas is a convenient option for Cincinnati pet owners who want local, independently owned veterinary care without the hassles that can come with city parking and downtown traffic. If you are searching for a vet near Cincinnati, our Fort Thomas office is just across the river, right off I-471, and only about 10 minutes from downtown Cincinnati for many drivers.',
                'loc_primary_button'   => 'Request Appointment',
                'loc_secondary_button' => 'Get Directions',
                'loc_panel_heading'    => 'Why Cincinnati families choose VMC Fort Thomas',
                'loc_panel_body'       => 'VMC Fort Thomas is close to downtown Cincinnati via I-471, easier than many city parking experiences, and rooted in locally owned veterinary care.',
                'loc_intro_eyebrow'    => 'Veterinary Care Near Cincinnati',
                'loc_intro_heading'    => 'A vet near Cincinnati without the downtown parking headache.',
                'loc_intro_body'       => 'For Cincinnati pet owners, VMC Fort Thomas offers full-service dog and cat care just across the river with simple access from I-471 and Memorial Parkway.',
                'loc_image'            => $image_base . 'about-fort-thomas.jpg',
                'loc_image_alt'        => 'vet near Cincinnati at Veterinary Medical Center Fort Thomas',
                'loc_image_caption'    => 'A Cincinnati-close veterinary option in Fort Thomas, right off I-471 and Memorial Parkway.',
                'loc_quick_body'       => 'If you are comparing a vet near Cincinnati, these links help you learn why VMC Fort Thomas is a practical, locally owned choice just across the river.',
                'loc_resource_heading' => 'Cincinnati-close veterinary care with a clear next step.',
                'loc_resource_body'    => 'Use this page to compare VMC Fort Thomas, plan a first visit, contact the team, and choose locally owned care without a downtown parking hassle.',
                'loc_seo_body'         => '<p>If you are searching for a vet near Cincinnati, VMC Fort Thomas is designed for families who want excellent access without turning a pet appointment into a downtown parking project. The Fort Thomas office is just across the river, right off I-471, and about 10 minutes from downtown Cincinnati for many drivers. That makes it practical for Cincinnati pet owners who work downtown, live near central neighborhoods, or cross the river regularly.</p><p>Veterinary Medical Center is independently owned and women-led by Dr. Kristi Baker. Dr. Baker lives in Fort Thomas, her children were born and raised there, and her family is part of the local school community. For Cincinnati families comparing a vet near Cincinnati, VMC offers a community-rooted alternative to corporate veterinary care, with full-service medicine, comfort-focused handling, and clear communication.</p><p>To get started, review our <a href="/first-vet-visit-northern-kentucky/">new patient guide</a>, compare <a href="/services/">services</a>, complete <a href="/new-patient-registration-form/">new patient registration</a>, <a href="/contact/">contact VMC</a>, or learn more <a href="/about/">about VMC</a>. Helpful outside references include <a href="https://www.avma.org/resources-tools/pet-owners" target="_blank" rel="noopener">AVMA pet owner resources</a>, <a href="https://fearfreepets.com/resources/directory/" target="_blank" rel="noopener">Fear Free resources</a>, and <a href="https://www.aspca.org/pet-care" target="_blank" rel="noopener">ASPCA pet care guidance</a>.</p>',
            ],
            'rank_math' => [
                'rank_math_focus_keyword'        => 'vet near Cincinnati',
                'rank_math_title'                => 'Vet Near Cincinnati | 7 Smart Reasons Pet Owners Choose VMC in NKY',
                'rank_math_description'          => 'Need a vet near Cincinnati? VMC Fort Thomas is about 10 minutes from downtown via I-471 with easy access and local care.',
                'rank_math_facebook_title'       => 'Vet Near Cincinnati | Veterinary Medical Center Fort Thomas',
                'rank_math_facebook_description' => 'A Cincinnati-close local veterinary option just across the river in Fort Thomas, KY.',
                'rank_math_twitter_title'        => 'Vet Near Cincinnati | Veterinary Medical Center Fort Thomas',
                'rank_math_twitter_description'  => 'A Cincinnati-close local veterinary option just across the river in Fort Thomas, KY.',
            ],
        ],
    ];

    if ( ! get_page_by_path( 'vet-independence-ky', OBJECT, 'page' ) ) {
        $duplicates = get_posts( [ 'post_type' => 'page', 'post_status' => 'any', 'posts_per_page' => -1 ] );
        foreach ( $duplicates as $duplicate ) {
            if ( $duplicate->post_name !== 'vet-fort-thomas-ky' && stripos( $duplicate->post_title, 'Fort Thomas' ) !== false ) {
                wp_update_post( [ 'ID' => $duplicate->ID, 'post_title' => $pages[1]['title'], 'post_name' => $pages[1]['slug'] ] );
                update_post_meta( $duplicate->ID, '_wp_page_template', $pages[1]['template'] );
                break;
            }
        }
    }

    foreach ( $pages as $page ) {
        $post = get_page_by_path( $page['slug'], OBJECT, 'page' );
        if ( ! $post ) {
            $post_id = wp_insert_post( [
                'post_title'   => $page['title'],
                'post_name'    => $page['slug'],
                'post_content' => $page['content'],
                'post_status'  => 'publish',
                'post_type'    => 'page',
            ] );
        } else {
            $post_id = $post->ID;
            wp_update_post( [ 'ID' => $post_id, 'post_title' => $page['title'], 'post_content' => $page['content'] ] );
        }

        if ( ! $post_id || is_wp_error( $post_id ) ) continue;

        update_post_meta( $post_id, '_wp_page_template', $page['template'] );
        foreach ( $page['acf'] as $field_name => $field_value ) {
            vmc_location_update_field( $field_name, $field_value, $post_id );
        }
        foreach ( $page['rank_math'] as $meta_key => $meta_value ) {
            update_post_meta( $post_id, $meta_key, $meta_value );
        }
    }

    update_option( 'vmc_location_pages_migration_v1', true );
}
