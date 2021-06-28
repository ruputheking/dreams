<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // resets the users table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('settings')->truncate();

        DB::table('settings')->insert([
            [
                'name' => 'academic_years',
                'value' => 1
            ],
            [
                'name' => 'currency_symbol',
                'value' => 'Rs'
            ],
            [
                'name' => 'official_email',
                'value' => 'info@dreamsacademy.edu.np'
            ],
            [
                'name' => 'official_phone',
                'value' => '9886314045'
            ],
            [
                'name' => 'facebook',
                'value' => 'https://www.facebook.com/Dreams-Academy-100622115322763'
            ],
            [
                'name' => 'youtube',
                'value' => 'https://www.youtube.com/channel/UCCXaeuXnwegNccLLwoT32vQ'
            ],
            [
                'name' => 'instagram',
                'value' => 'https://www.instagram.com/merodukkan/'
            ],
            [
                'name' => 'title',
                'value' => 'Dreams Academy of Professional Studies'
            ],

            [
                'name' => 'seo_meta_keywords',
                'value' => 'Dreams Academy of Professional Studies'
            ],
            [
                'name' => 'seo_meta_description',
                'value' => 'Dreams Academy of Professional Studies'
            ],
            [
                'name' => 'image',
                'value' => 'logo_meta.png'
            ],
            [
                'name' => 'copyright',
                'value' => '&copy; 2020 Dreams Academy of Professional Studies. All Rights Reserved'
            ],
            [
                'name' => 'welcome_txt',
                'value' => 'Dreams Academy of Professional Studies'
            ],
            [
                'name' => 'favicon',
                'value' => 'fav.png'
            ],
            [
                'name' => 'landline',
                'value' => '01-4471468',
            ],
            [
                'name' => 'map',
                'value' => '<iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d56516.3170884136!2d85.25761376863859!3d27.708954344415954!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19083b8ca841%3A0xa74c32b502e432e!2sNational%20Integrated%20College!5e0!3m2!1sen!2snp!4v1612409209753!5m2!1sen!2snp"
                    width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>'
            ],
            [
                'name' => 'address',
                'value' => 'Prabachan Marg, Old Baneshwor, Kathmandu'
            ],
            [
                'name' => 'office_email',
                'value' => 'info@dreamsacademy.edu.np'
            ],
            [
                'name' => 'from_name',
                'value' => 'Dreams Academy of Professional Studies'
            ],
            [
                'name' => 'from_email',
                'value' => 'info@dreamsacademy.edu.np'
            ],
            [
                'name' => 'mail_type',
                'value' => 'smtp',
            ],
            [
                'name' => 'smtp_host',
                'value' => 'mail.dreamsacademy.edu.np'
            ],
            [
                'name' => 'smtp_port',
                'value' => '465'
            ],
            [
                'name' => 'smtp_username',
                'value' => 'info@dreamsacademy.edu.np'
            ],
            [
                'name' => 'smtp_password',
                'value' => 'gT}q%$2j41dH'
            ],
            [
                'name' => 'smtp_encryption',
                'value' => 'ssl'
            ],
            [
                'name' => 'logo',
                'value' => 'logo.png'
            ],
            [
                'name' => 'esewa_active',
                'value' => 'Yes'
            ],
            [
                'name' => 'esewa_id',
                'value' => '9880227545 / info@dreamsacademy.com'
            ],
            [
                'name' => 'esewa_payee',
                'value' => 'Dreams Academy'
            ],
            [
                'name' => 'introduction',
                'value' => '<h3 class="text-uppercase mt-0">About <span class="text-theme-colored2">Dreams Academy of Professional Studies</span></h3>
                <div class="double-line-bottom-theme-colored-2"></div>
                <p class="mt-20">Dreams Academy of Professional Studies (DAPS) is established in 2020 AD in Association with CMC, Singapore. It Is Located at Mid-Baneshwor, Kathmandu, Nepal. Dreams Academy of Professional Studies (DAPS) is an
                    autonomous organization to import Vocational skill Market oriented training having national as well as international standard in the field of Hotel / Restaurant and Hospitality Management to the enthusiastic students .DAPS
                    lead a bridge to a bright future by providing the opportunity to acquire the knowledge, skill and attitude regarding hospitality management sector to contend success in the national and international market. we offers
                    various courses in Food Production, F & B Service, Housekeeping, Front Office, Salesmanship, Secretarial practice, Care givers, Waiter / Waitress, Barman training for people going to foreign strand. Our courses range from
                    one month to sixteen months. We are in hospitality industry for the development of human resource through professional skills and knowledge and balancing skills and jobs through planning, coordination and implementation.
                    We are also responsible for development of candidates regarding their abilities and deploy them into right opportunities at the right time. Our main focus is to provide high level of quality with apprenticeship based
                    education. We are doing well at providing special facilities to the people who are from rural areas. We have been providing Scholarship to the desired candidates. Priority to the rural people and Scholarship to desired
                    candidates.
                </p>'
            ],
            [
                'name' => 'message-from-director',
                'value' => '<h3 class="text-uppercase mt-0">Message <span class="text-theme-colored2">From the Director</span></h3>
                <div class="double-line-bottom-theme-colored-2"></div>
                <p class="mt-20">Our students are the pillars of our academy they are reflection of our values, norms and principles in the hospitality business industry. On behalf of Dreams Academy of Professional Studies (DAPS) family I
                    extend a very warm welcome in joining us for structuring your career.
                </p>
                <p>Dreams Academy of Professional Studies (DAPS) is an organization where people are nurtured constantly through permanent learning & skills improvement to achieve international standards and are respected, heard, and
                    encouraged to do their best.</p>
                <p>We all must work together to create a clear vision and strong ethos of student achievement and when we do teaching and learning becomes a partnership among administration, teachers, parents and students. This in turn leads
                    to a successful academic organization strongly rooted in a shared vision and a common sense of mission and purpose. We Must: Teach meaningful ' . " ' " . 'stuff ‘, Listen to our students, Be interesting, Be inspiring, Be passionate,
                    Be caring, Be civilized, and Model respect and good behavior.</p>
                <p>We always want to make education as a tool for candidate' . " ' " . 's betterment and to provide equal axis for making knowledge and higher education for students who are being part of DAPS. It is always our motive and vision to
                    develop self-confidence and positive thoughts which help them to gain every success in their life later. </p>
                <p>Hospitality Career Strategists, who serve to combine behavioral attributes, service orientation, emotional intelligence and other soft talents along with professional’s knowledge and skills. </p>
                <br>
                <p><strong>
                        With Regards,<br>
                        Girish Dhungel <br>
                        Director

                    </strong>
                </p>'
            ],
            [
                'name' => 'our-objective-mission-and-vision',
                'value' => '<h3 class="text-uppercase mt-0">Our <span class="text-theme-colored2">Objectives</span></h3>
                <div class="double-line-bottom-theme-colored-2"></div>
                <p class="mt-20">
                <ul>
                    <li>
                        To impart the international standard education in hospitality management with roleplay.
                    </li>
                    <li>
                        To strive towards imparting sound knowledge, nurturing talent and making dynamic leaders for the future.
                    </li>
                    <li>
                        Imbibing the functional skills in students to cater to the requirements of the hospitality industry.
                    </li>
                </ul>
                </p>
                <br>
                <h3 class="text-uppercase mt-0">Our <span class="text-theme-colored2">Mission</span></h3>
                <div class="double-line-bottom-theme-colored-2"></div>
                <p class="mt-20">
                    Foster each individuals with a conducive environment and promote lifelong learning in an open and caring atmosphere that motivates to reach constructive maturity, challenge one’s strengths, grow, progress and maximize
                    one’s innate potential to excel and lead a harmonious life.
                </p>
                <br>
                <h3 class="text-uppercase mt-0">Our <span class="text-theme-colored2">Vision</span></h3>
                <div class="double-line-bottom-theme-colored-2"></div>
                <p class="mt-20">
                    Empower students with creative learning practices to value knowledge and skills, become confident mentally, physically, intellectually, morally ,spiritually and create a world in which everyone blossoms to be a responsible
                    individuals capable of coping with the changing world having right accompaniment of professionalism and excellence.
                </p>'
            ],
            [
                'name' => 'facility-and-resource',
                'value' => '<h3 class="text-uppercase mt-0">Facility & <span class="text-theme-colored2">Resources</span></h3>
                <div class="double-line-bottom-theme-colored-2"></div>
                <p class="mt-20">
                    DAPS offers ample envelopes of quality training environment. Our desperate effort and dedication is not only to produce certificate holders but also form capabilities of embellish new opportunities, refined
                    outcome and facilities that justify the growing demand of the hospitality arena. Other services are listed below:
                </p>
                <p>
                <ul>
                    <li>
                        Multimedia classroom
                    </li>
                    <li>
                        Downtown location
                    </li>
                    <li>
                        Modernized and efficient practical lab
                    </li>
                    <li>
                        Reasonable fee structure
                    </li>
                    <li>
                        International teaching methodology
                    </li>
                    <li>
                        Free Internet facilities
                    </li>
                    <li>
                        Free tools and kits
                    </li>
                    <li>
                        Free notes and handouts
                    </li>
                    <li>
                        Free Demo and Observation
                    </li>
                    <li>
                        Sports activities
                    </li>
                    <li>
                        Scout membership and trainings
                    </li>
                    <li>
                        Job Placement
                    </li>
                    <li>
                        Industrial Training
                    </li>
                    <li>
                        Hotel Visit
                    </li>
                    <li>
                        Event Management
                    </li>
                    <li>
                        Life skill oriented counselling’s
                    </li>
                </ul>
                </p>'
            ],
            [
                'name' => 'placement-and-support-unit',
                'value' => '<h3 class="text-uppercase mt-0">Placement <span class="text-theme-colored2">Support</span> Unit</h3>
                <div class="double-line-bottom-theme-colored-2"></div>
                <p class="mt-20">
                    The Department of Placement is the backbone of any institution. We have separate placement support unit (PSU) for the support of our students. From the very beginning the institute lays greater emphasis on placement of
                    students. The Placement unit of the institute centrally assists students throughout foreign placement as well as domestic placement. The placement unit provides complete support to face interview. The unit trains the
                    students with placement readiness programs which include effective communication and skill for employment training.
                </p>
                <strong>Objective</strong>
                <p>
                <ul>
                    <li>
                        Developing the student’s knowledge and skills to meet the recruitment process.
                    </li>
                    <li>
                        To develop the interpersonal skills required to enable them to work efficiently as a member of a team trying to achieve organizational goals.
                    </li>
                    <li>
                        To motivate students to develop their overall personality in terms of career planning and goal setting.
                    </li>
                    <li>
                        To organize students so that they can receive, quickly understand and carry out instructions to the satisfaction of their employer as a means of developing towards the completion of more responsible work.
                    </li>
                    <li>
                        To act as a link between students and the employment community.
                    </li>
                    <li>
                        To achieve 100 % Placements for Eligible Students.
                    </li>
                </ul>
                </p>
                <p>
                    <strong>Countries of Placement</strong><br>
                    China, Macau, Bahrain, UAE, Saudi Arabia, Oman, Malaysia etc <br>
                    <strong>Some data of our past students who are working in abroad as well as inside Nepal</strong>
                <ul>
                    <li>
                        Shankar Subedi, our 5th batch student working in Park and Resort Hotel, Dubai.
                    </li>
                    <li>
                        Amrit Shrestha, our 5th Batch student working in Marriot Hotel, Kathmandu, Nepal.
                    </li>
                    <li>
                        Bibek Adhikari, our 5th Batch student working in Dubai.
                    </li>
                    <li>
                        Manish K.C , our 4th Batch Student working in Radisson Hotel , Kathmandu Nepal.
                    </li>
                    <li>
                        Rabina Karki, our 4th batch student working in Dubai.
                    </li>
                </ul>
                </p>'
            ],
            [
                'name' => 'popular-courses',
                'value' => 'DAPS offers Barista, DHM, ADHM, Barman'
            ],
            [
                'name' => 'modern-book-library',
                'value' => 'DAPS prefers Modern Book to our students for their betterment.'
            ],
            [
                'name' => 'qualified-teacher',
                'value' => 'DAPS have better qualified teacher.'
            ],
            [
                'name' => 'update-notification',
                'value' => 'DAPS notify you about our latest news, courses, events through our application as soon as possible.'
            ],
            [
                'name' => 'entertainment-facilities',
                'value' => 'DAPS offers ample envelopes of quality training environment. Our desperate effort and dedication is not only to produce certificate holders but also form capabilities of embellish new opportunities, refined
                    outcome and facilities that justify the growing demand of the hospitality arena.'
            ],
            [
                'name' => 'online-support',
                'value' => 'DAPS provides online payment system alongwith private accounts for their payment details, notification and mailing.'
            ],
            [
                'name' => 'starting_time',
                'value' => '7.00 am'
            ],
            [
                'name' => 'ending_time',
                'value' => '3.00 pm'
            ],
            [
                'name' => 'secondary_email',
                'value' => 'infodreamsacademy@gmail.com'
            ],
            [
                'name' => 'why-choose-us',
                'value' => 'new-image.jpg'
            ],
            [
                'name' => 'journey-title',
                'value' => 'In 2020 We Start Our Journey'
            ],
            [
                'name' => 'journey-details',
                'value' => '<h3 class="font-weight-500 font-30 font- mt-10">Make <span class="text-theme-colored">Your Dream Education</span> </h3>
                <p>Dreams Academy of Professional Studies (DAPS) is an autonomous organization to import Vocational skill Market oriented training having national as well as international standard in the field of Hotel / Restaurant and
                    Hospitality Management to the enthusiastic students.</p>'
            ],
            [
                'name' => 'journey-youtube',
                'value' > 'https://www.youtube.com/watch?v=_pFiWy2m4gI'
            ],
            [
                'name' => 'journey-poster',
                'value' => 'team.jpg'
            ],
            [
                'name' => 'bank_id',
                'value' => '09200800319878000001'
            ],
            [
                'name' => 'bank_name',
                'value' => 'Shangri-la Development Bank'
            ],
            [
                'name' => 'bank_branch',
                'value' => 'Ason,Kathmandu'
            ],
            [
                'name' => 'bank_account_name',
                'value' => 'Dreams Academy of Professional Studies'
            ]
        ]);
    }
}
