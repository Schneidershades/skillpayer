<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::Create([
        'site_name'                            => 'Skill Payer',
          'site_url'                             => 'https://www.skillpayer.com',
          'site_logo_header'                     => '/assets/images/logo2.png',
          'site_logo_footer'                     => '/assets/images/logo2.png',
          'site_slogan'                          => ' ...the peoples senate!',
        	'site_state_country'                   => 'Abuja-Nigeria',
          'site_main_number'                     => '+(234) 803 311 6403 ',
          'site_whatsapp_number'                    => '+234 803 311 6403',
          'site_international_number'            => '+1469-880-5410',
        	'site_email'                           => 'info@thepeoplessenate.com',
        	'site_facebook'                        => 'thepeoplessenateng',
        	'site_twitter'                         => 'thepeoplessenate',
        	'site_instagram'                       => '#',
          'site_youtube'                         => '#',
          'site_pinterest'                       => '#',

            'site_about'                    => 

            'Building a movement of Nigerian youths to participate in politics and nation building. Creating a platform to share ideas with counterparts across the nation and the world in general. Creating an irreversible consciousness in the Nigerian people through education, debates, interaction and information gathering to permanently guarantee a Nigeria where every voice has a genuine hope of being heard.<br>All members of The Peoples\' Senate are referred to as Senators.',

            'site_mission'                    => 'Create an irreversible consciousness in the Nigerian people through education, debates, interaction and information gathering to permanently guarantee a Nigeria where every voice has a genuine hope of being heard.',

            'site_vision'                    => 'A truly politically conscious and informed Nigeria where everyone is a guardian of our national identity and prosperity ',

            'site_overview'                    => '

                                                  1.  Build a movement of Nigerian youths to participate in politics and nation building <br>
                                                  2.  Debate national issues and advice the Federal, State and Local Governments the temperament of the people at all times.<br>
                                                  3.  Energize and inspire the Nigerian youth to positive national action<br>
                                                  4.  Conduct opinion pools on issues that touch on all aspects of our national lives <br>
                                                  5.  Facilitate information sharing amongst all stakeholders in the Nigeria state<br>.
                                                  6.  Facilitate a transition of power from one generation to the other<br> 
                                                  7.  Create a platform to share ideas with counterparts across the globe<br> 
                                                  8.  Create a platform for cross-fertilization of ideas amongst the people<br>',

            'site_client_description'          => 'To Create an irreversible consciousness in the Nigerian people through education, debates, interaction and information gathering to permanently guarantee a Nigeria where every voice has a genuine hope of being heard.',


            'site_work_days'              => 'Every Day',


            'site_featured_image'                  => '/assets/images/logo-white.png',
            'site_full_address_local'              => 'No. 10 Gimbiya Street, Area 11, Garki. Abuja, Nigeria',
            'site_full_address_international'      => 'No. 10 Gimbiya Street, Area 11, Garki. Abuja, Nigeria.'
        ]);
    }
}
