<?php

return [
    'page-title' => '團體導覽預約申請',
    'steps' => [
        'step1' => [
            'title' => 'Reservation Window',
            'desc' => 'Open 7–14 Days Before Visit',
            'list' => [
                'list-item1' => 'Reservations are available online only. Booking opens 14 days prior to the visit date and closes 7 days before the visit (calendar days)',
            ],
        ],
        'step2' => [
            'title' => 'Online Application',
            'desc' => 'One Contact Person per Group; a Confirmation Email Will Be Sent After Submission',
            'list' => [
                'list-item1' => 'Each group may apply for <span class="highlight">only one guided tour per venue per day</span>. Applications submitted under different contact names to bypass limits are not permitted.',
                'list-item2' => 'Capacity limits vary by venue. Available slots are subject to system display. The number of applicants must fall within the stated capacity range for each session.',
                'list-item3' => 'Government agency visits: please contact the dedicated hotline: <span class="highlight">XXXXXX.</span>',
            ],
        ],
        'step3' => [
            'title' => 'Review Notification',
            'desc' => 'A Result Notification Email Will Be Sent After Review All applications will undergo a review process. A “Reservation Result Notification Email” will be sent upon completion, regardless of approval status. Please check your email for updates.',
            'list' => [
                'list-item1' => 'After submission, applications will enter the review process. A “Reservation Result Notification Email” will be sent regardless of approval status. Please check your email.',
                'list-item2' => 'For inquiries regarding guided tours (e.g. cancellations), please contact the respective venue. Contact details can be found in the confirmation email or related announcements.',
            ],
        ]
    ],
    'rule' => 'The 2026 Taitung Expo reserves the right of final approval for all group reservations and the right to adjust related regulations.',
    'form' => [
        'date' => [
            'title' => 'Reservation Date',
            'errMsg' => ''
        ],
        'zone' => [
            'title' => 'Exhibition Zone',
            'errMsg' => ''
        ],
        'venue' => [
            'title' => 'Venue',
            'errMsg' => ''
        ],
        'time' => [
            'title' => 'Time Slot',
            'errMsg' => ''
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
            'errMsg' => ''
        ],
        'tel' => [
            'title' => 'Phone Number',
            'errMsg' => ''
        ],
        'email' => [
            'title' => 'Email Address',
            'valid' => [
                'true' => 'Valid Email',
                'false' => 'Invalid Email'
            ],
            'errMsg' => ''
        ],
        'org' => [
            'title' => 'Group Name',
            'errMsg' => ''
        ],
        'count' => [
            'title' => 'Expected Number of Participants',
            'errMsg' => ''
        ],
        'remark' => [
            'title' => 'Remarks (Optional)',
            'errMsg' => ''
        ],
        'hint' => 'Please complete the application form and review the following notes before scrolling down and clicking the “Submit Application” button.',
        'notices' => [
            'title' => 'Important Notes：',
            'lists' => [
                'list-item1' => 'Groups must arrive on time according to the reserved schedule. If a group fails to check in on time, the organizer may release the slot depending on on-site conditions.',
                'list-item2' => 'Tours will begin promptly. Late arrivals will be accommodated subject to on-site conditions, and full tour content cannot be guaranteed.',
                'list-item3' => 'The number of participants must match the approved quota. Additional participants will not be accepted on-site. If fewer participants attend, the original booking will still apply.',
                'list-item4' => 'Changes to date or session are not allowed after confirmation. If adjustments are needed, please cancel and submit a new application.',
                'list-item5' => 'Allocation of slots will be arranged based on overall application conditions and is not guaranteed on a first-come, first-served basis.',
                'list-item6' => ' In case of weather conditions or force majeure, the organizer reserves the right to adjust or cancel the tour and will notify applicants accordingly.',
                'list-item7' => 'Guided tours are conducted primarily in Mandarin. If other languages are required, please indicate in the application. Availability will depend on on-site resources.',
            ]
        ],
        'captcha' => [
            'refresh' => '',
            'placeholder' => 'Type the word above'
        ],
        'actions' => [
            'submit' => 'Submit Application'
        ]
    ]
];
