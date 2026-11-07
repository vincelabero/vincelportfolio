<?php

/*
|--------------------------------------------------------------------------
| Portfolio Content
|--------------------------------------------------------------------------
|
| All portfolio content lives here so it can be updated without touching
| the Blade views. This project is intentionally static: no database,
| migrations, or Eloquent models are used.
|
*/

return [
    'name' => 'Marc Vincel A. Abero',
    'first_name' => 'Marc Vincel',
    'initials' => 'MA',
    'role' => 'Bachelor of Science in Information Technology — 4th Year',
    'headline' => 'Building clean web experiences, one project at a time.',
    'bio' => 'I am a fourth-year Bachelor of Science in Information Technology student at Data Center College of Bangued - Abra. I enjoy turning ideas into clean, practical web experiences, and I use this portfolio to document my education, my progress, and the projects I am preparing to share.',
    'location' => 'Bangued, Abra, Philippines',
    'email' => 'vincelabero491@gmail.com',
    'phone' => '09959818303',
    'phone_link' => '+639959818303',
    'photo' => 'images/profile.svg',
    'status' => 'BSIT 4th Year • Portfolio 2026',

    'github' => [
        'username' => 'vincelabero',
        'url' => 'https://github.com/vincelabero',
        'repo_name' => 'vincelabero/vincelportfolio',
        'repo_url' => 'https://github.com/vincelabero/vincelportfolio',
    ],

    'education' => [
        [
            'level' => 'Elementary',
            'school' => 'Divine Word College of Bangued',
            'year' => '2016',
            'status' => 'Completed',
            'description' => 'Completed my elementary education and built the early foundations of my academic journey.',
        ],
        [
            'level' => 'Secondary',
            'school' => 'Divine Word College of Bangued',
            'year' => '2020',
            'status' => 'Completed',
            'description' => 'Completed junior and senior high school before moving on to information technology in college.',
        ],
        [
            'level' => 'College',
            'school' => 'Data Center College of Bangued - Abra',
            'year' => 'Up to Present',
            'status' => 'In progress',
            'description' => 'Currently in my fourth year of the Bachelor of Science in Information Technology program.',
        ],
    ],

    'skills' => [
        [
            'title' => 'Web Development',
            'icon' => 'code',
            'description' => 'Building responsive, accessible interfaces with modern HTML, CSS, and JavaScript.',
            'skills' => [
                ['name' => 'HTML5 & CSS3', 'level' => 90],
                ['name' => 'Tailwind CSS', 'level' => 88],
                ['name' => 'JavaScript', 'level' => 78],
                ['name' => 'Laravel Blade', 'level' => 84],
            ],
        ],
        [
            'title' => 'Backend & Databases',
            'icon' => 'server',
            'description' => 'Writing server-side logic and organizing data with PHP and SQL.',
            'skills' => [
                ['name' => 'PHP', 'level' => 82],
                ['name' => 'Laravel', 'level' => 80],
                ['name' => 'MySQL', 'level' => 76],
                ['name' => 'Java', 'level' => 70],
            ],
        ],
        [
            'title' => 'Tools & Workflow',
            'icon' => 'wrench',
            'description' => 'Using version control, editors, and design tools to ship clean, consistent work.',
            'skills' => [
                ['name' => 'Git & GitHub', 'level' => 82],
                ['name' => 'VS Code', 'level' => 90],
                ['name' => 'Figma', 'level' => 72],
                ['name' => 'UI/UX fundamentals', 'level' => 75],
            ],
        ],
    ],

    'certifications' => [
        [
            'title' => 'Understanding Startups: Getting Your Idea Ready for the Philippine Startup Challenge XI',
            'issuer' => 'Department of Information and Communications Technology (DICT)',
            'type' => 'Workshop',
            'date' => 'September 7, 2026',
            'format' => 'via Zoom',
            'description' => 'A workshop on shaping startup ideas for the Philippine Startup Challenge XI.',
            'image' => 'images/certifications/startup-challenge-xi.jpg',
        ],
        [
            'title' => 'Startup Now Cordillera: Exploring Programs, Funding, and Opportunities for Aspiring Startups',
            'issuer' => 'Department of Science and Technology (DOST) — Cordillera Administrative Region',
            'type' => 'Forum',
            'date' => 'September 2, 2026',
            'format' => 'via Zoom',
            'description' => 'A forum on DOST programs, funding, and opportunities for aspiring startups in the Cordillera region.',
            'image' => 'images/certifications/startup-now-cordillera.jpg',
        ],
        [
            'title' => 'Online Safety Through Netiquette',
            'issuer' => 'Department of Information and Communications Technology (DICT) — Region II',
            'type' => 'Webinar',
            'date' => 'July 23, 2026',
            'format' => 'via Google Meet',
            'description' => 'A webinar on responsible, ethical, and secure use of technology.',
            'image' => 'images/certifications/online-safety-netiquette.jpg',
        ],
    ],

    'projects' => [
        [
            'slug' => 'students-document-request-system',
            'title' => 'Students Document Request System for DCCP - Bangued',
            'description' => 'An online document request system built for Data Center College of the Philippines - Bangued. Students can request school documents without lining up, while staff process and track every request from a single dashboard.',
            'tags' => ['Laravel', 'PHP', 'MySQL', 'Tailwind CSS'],
            'repo' => null,
            'demo' => null,
            'year' => '2026',
            'cover' => 'images/projects/students-document-request-system/screenshot-1.png',
            'images' => [
                [
                    'src' => 'images/projects/students-document-request-system/screenshot-1.png',
                    'caption' => 'Students Document Request System - screen 1',
                ],
                [
                    'src' => 'images/projects/students-document-request-system/screenshot-2.png',
                    'caption' => 'Students Document Request System - screen 2',
                ],
                [
                    'src' => 'images/projects/students-document-request-system/screenshot-3.png',
                    'caption' => 'Students Document Request System - screen 3',
                ],
                [
                    'src' => 'images/projects/students-document-request-system/screenshot-4.png',
                    'caption' => 'Students Document Request System - screen 4',
                ],
            ],
        ],
    ],

    'stats' => [
        [
            'label' => 'Year level',
            'value' => '4th Year',
            'detail' => 'BSIT program',
        ],
        [
            'label' => 'Education records',
            'value' => '3',
            'detail' => 'Elementary to college',
        ],
        [
            'label' => 'Certifications',
            'value' => '3',
            'detail' => 'Seminars & webinars',
        ],
        [
            'label' => 'Projects',
            'value' => '1',
            'detail' => 'Document request system',
        ],
    ],

    'readiness' => [
        ['label' => 'Basic information', 'value' => 100],
        ['label' => 'Educational background', 'value' => 100],
        ['label' => 'Skills & tools', 'value' => 100],
        ['label' => 'Certifications & seminars', 'value' => 100],
        ['label' => 'GitHub links', 'value' => 100],
        ['label' => 'Projects', 'value' => 100],
    ],
];
