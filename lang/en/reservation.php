<?php

return [
    'page-title' => '2026台東博覽會-團體導覽預約申請',
    'steps' => [
        'step1' => [
            'title' => 'Reservation Window',
            'desc' => 'Open 7–14 Days Before Visit',
            'list' => [
                'list-item1' => 'Reservations are available online only. Booking opens 14 days prior to the visit date and closes 7 days before the visit (calendar days).',
            ],
        ],
        'step2' => [
            'title' => 'Online Application',
            'desc' => 'One Contact Person per Group; a Confirmation Email Will Be Sent After Submission',
            'list' => [
                'list-item1' => 'Each group may apply for <span class="highlight">only one guided tour per venue per day</span>. Submitting duplicate applications under different contact names to circumvent this limit is not permitted.Applications submitted under different contact names to bypass limits are not permitted.',
                'list-item2' => 'Capacity limits vary by venue. Available slots are subject to system display. Group size must fall within the capacity range posted for each session.The number of applicants must fall within the stated capacity range for each session.',
            ],
        ],
        'step3' => [
            'title' => 'Review Notification',
            'desc' => 'A Result Notification Email Will Be Sent After Review',
            'list' => [
                'list-item1' => 'After submission, applications will enter the review process. A “Reservation Result Notification Email” will be sent regardless of approval status. Please check your email.',
                'list-item2' => 'For inquiries regarding guided tours (e.g. cancellations), please contact the respective venue. Contact details can be found in the confirmation email or related announcements.',
            ],
        ]
    ],
    'rule' => 'The 2026 Taitung Expo reserves the right of final approval for all group reservations and the right to adjust related rules and policies.',
    'form' => [
        'date' => [
            'title' => 'Reservation Date',
            'errMsg' => 'Please select a reservation date',
            'placeholder' => 'Please select your visit date'
        ],
        'zone' => [
            'title' => 'Exhibition Zone',
            'errMsg' => 'Please select an exhibition zone',
            'placeholder' => 'Please select an exhibition zone'
        ],
        'venue' => [
            'title' => 'Venue',
            'errMsg' => 'Please select a venue',
            'placeholder' => 'Please select a venue'
        ],
        'time' => [
            'title' => 'Time Slot',
            'errMsg' => 'Please select a time slot',
            'placeholder' => 'Please select a time slot'
        ],
        'capacity' => [
            'before' => 'Recommended Group Size for This Session',
            'after' => 'persons'
        ],
        'name' => [
            'title' => 'Contact Name',
            'gender' => [
                'male' => 'Mr.',
                'female' => 'Ms.'
            ],
            'errMsg' => 'Please enter the contact name',
            'placeholder' => 'Please enter the contact person’s name (one representative)'
        ],
        'tel' => [
            'title' => 'Phone Number',
            'errMsg' => 'Please enter a phone number',
            'placeholder' => 'Please enter a contact phone number'
        ],
        'email' => [
            'title' => 'Email Address',
            'valid' => [
                'true' => 'Valid Email',
                'false' => 'Invalid Email'
            ],
            'errMsg' => 'Please enter a valid email address',
            'placeholder' => 'Please enter a valid email address'
        ],
        'org' => [
            'title' => 'Group Name',
            'errMsg' => 'Please enter the group name',
            'placeholder' => 'Please enter the group name'
        ],
        'count' => [
            'title' => 'Expected Number of Participants',
            'errMsg' => 'Please select the number of participants',
            'placeholder' => 'Please select the number of participants'
        ],
        'remark' => [
            'title' => 'Remarks (Optional)',
            'placeholder' => 'Please provide any additional notes for the reviewing unit / venue'
        ],
        'hint' => 'Please complete the application form and review the following notes before scrolling down and clicking the “Submit Application” button.',
        'notices' => [
            'title' => 'Important Notes：',
            'content' => [
                'reminders' => [
                    'title' => 'Check-in & Tour Reminders',
                    'lists' => [
                        'list-item1' => 'Groups must check in according to the reserved schedule. Tours will begin promptly as scheduled; groups are advised to arrive 10–15 minutes in advance.',
                        'list-item2' => 'If a group does not complete check-in on time, the slot may be released depending on on-site conditions. Late arrivals may be accommodated; however, tour content may be adjusted accordingly.',
                        'list-item3' => 'Group size must match the approved number. To maintain tour quality, additional participants will not be accepted on-site.',
                    ]
                ],
                'adjustments' => [
                    'title' => 'Reservation Adjustments',
                    'lists' => [
                        'list-item1' => 'Changes to the reserved date or session after confirmation are difficult due to scheduling arrangements. If adjustments are needed, applicants are advised to cancel and submit a new application.',
                        'list-item2' => 'Tour slots are allocated based on overall application volume; final arrangements are subject to the confirmation notice.',
                    ]
                ],
                'other' => [
                    'title' => 'Other Notes',
                    'lists' => [
                        'list-item1' => 'In case of weather conditions or force majeure, the organizer reserves the right to adjust or cancel the tour and will notify applicants accordingly.',
                        'list-item2' => 'Guided tours are conducted primarily in Mandarin. If other languages are required, please indicate in the application; arrangements will be subject to on-site availability.',
                    ]
                ],
            ]
            
        ],
        'captcha' => [
            'refresh' => '',
            'placeholder' => 'Type the word above'
        ],
        'actions' => [
            'submit' => 'Submit Application'
        ]
    ],
    'complete' => [
        'success' => [
            'p1' => 'Thank you for submitting your group tour reservation application.<br>A copy of your application has been sent to your registered email address.',
            'p2' => 'Please kindly wait for the organizer to complete the review.<br>A “Reservation Result Notification” will be sent separately.',
        ],
        'full' => [
            'p1' => 'The selected time slot is fully booked. Please choose another session.',
        ],
        'closed' => [
            'p1' => 'Registration for the selected time slot has closed. Please choose another date.',
        ],
        'btnText1' => 'Back to Application Page',
        'btnText2' => 'Back to “Overview”',
        'btnText3' => 'Back to “Event Calendar”',
    ],    
];
