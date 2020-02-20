<?php

return [
	"labels"	=> [
        'fullname' => 'Name, Surname',   
	'birth_date' => 'Date of birth',
        'work_place' => 'Current job',
        'birth_place' => 'Place of birth (country, city)',
        'register_place' => 'Home address (country, city, street, house/apartment number)',
        'real_place' => 'Post address (country, city, street, house/apartment number)',
        'citizenship' =>  'Citizenship',
        'phone' => 'Phone number',
        'accountant' => 'Position',
        'contacts' => 'Contacts',
        'Education time' => 'Education period',
        'education' => 'Education',
        'certs' => 'Certificates',
        'langs_know' => 'Language skills',    
        'From' => 'From',
        'To' => 'To',
        'experience' => 'Experience',
        'skills' => 'Skills',
        'step' => 'Step',
        'plus_experience' => 'Add a workplace',    
        'save_go_next' => 'Save and go next',
        'still_learn' => 'Learning still',
        'school_name' => 'University',
        'save' => 'Save',    
        'Education_description' => 'A number of positions require a work permit, which can only be issued if higher education is available.',
        'langs_desc' => 'To work with European companies, it is preferable to speak one or more European languages. You can take special courses from our partners.',
        'remote_work' => 'Remote work',
        'yes' => 'Yes',
        'no' => 'No',
        'shift_work' => 'Shift work',
        'part_time_employment' => 'Part time',
        'office' => 'Office',
        'full_time' => 'Full time',
        'relocate'=> 'Ready to relocate',
        'step' => 'Step',
        'exp_desc' => 'Short description of work, implemented projects and achieved results',
        'period_work' => 'Period of work',
        'from:' => 'from',
        'to:' => ' to',
        'continue_working' => 'Keep working',
        'lang' => 'Language',
        'level' => 'Level',
        'sertificate_name' => 'Certificates',
        'issued_by' => 'Issued by',
        'organization_type' => 'Type of organisation',
        'download_sertificate' => 'Download sertificate',
        'download_diploma' => 'Download diploma',
        'or_image' => 'or download image',
        'save_current_step' => 'Save current step'
	],
    'placeholders' =>[
        'real_place' => 'Please leave the field blank if the postal address matches the home address',
        'register_place' => 'Country, city, street, house/apartment number',
        'birth_place' => 'Country, city, street, house/apartment number',
        'skills_place' => 'Please list your skills separated by comma',
        'exp_place' => 'Design websites and mobile applications…',
    ], 
    'titles' => [
        'General_options' => 'General information',
        'Contacts' => 'Contacts',
        'Skills' => 'Skills',
        'Education' => 'Education',
        'Certificates' => 'Certificates',
        'Language knowlidge' => 'Language knowledge',
        'Expectations' => 'Expectations',
        'Position' => 'Position',
        'Salary_expectations' => 'Salary expectations',
        'Priorities_work' => 'Priorities at work'
        
        
    ], 
    'options' => [
        'from' => 'From',
        'to' => 'To',
        'no' => 'No',
        'yes' => 'Yes',
        'languages' => ['Native','Beginner',' Intermediate','Advanced'],
        'periods' => [
            'year'  => 'Year',
            'month' => 'Month',
            'day'   => 'Day'
            ],
        'gender' => [
            'mr' => 'male',
            'ms' => 'female',
        ],
        'organization_type_online' => 'Online',
        'organization_type_full_time' => 'Full time',
        'organization_type_correspondence' => 'Remote work',
        'education_full' => 'University degree',
        'education_incomplete' => 'Incomplete higher education'
    ],
    
    'validation' => [
        'citizenship' => ['required' => 'The "Citizenship" field is obligatory'],
        'birth_date' => ['required' => 'The "Date of birth" field is obligatory'],
        'education' => ['from' => ['numeric' => 'Please enter the year of education in numbers']],
        'name' => ['required' => 'The "Name" field is obligatory'],
        'email' => [
            'required' => 'The "E-mail" field is obligatory',
            'email' => ''
            ],
    ]
    
];