<?php

use Illuminate\Database\Seeder;

class ServiceProvidedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Products\ServiceSetting::Create([
            'title'                           => 'SMS',
            'code'                            => 'sms',
            'type'                            => 'sms',
            'service_charge'                  => 0,
            'minimum_value'                   => 1,
            'maximum_value'                   => 200000,
            'api_provider'                    => 'skillpyersms.com',
            'enable'                          =>  'Yes',
            'percentage_commission'           => 0.01,
        ]);

        \App\Models\Products\ServiceSetting::Create([
        	'title'                           => 'MTN',
        	'code'                            => 'MTN',
        	'type'                            => 'Airtime',
        	'service_charge'                  => 0,
        	'minimum_value'                   => 50,
        	'maximum_value'                   => 100000,
        	'api_provider'                    => 'irecharge',
        	'enable'                    	=> 'Yes',
        	'percentage_commission'           => 0.01,
        ]);


        \App\Models\Products\ServiceSetting::Create([
        	'title'                           => 'GLO',
        	'code'                            => 'Glo',
        	'type'                            => 'Airtime',
        	'service_charge'                  => 0,
        	'minimum_value'                   => 50,
        	'maximum_value'                   => 100000,
        	'api_provider'                    => 'irecharge',
        	'enable'                    	=> 'Yes',
        	'percentage_commission'           => 0.01,
        ]);

        \App\Models\Products\ServiceSetting::Create([
        	'title'                           => 'Airtel',
        	'code'                            => 'Airtel',
        	'type'                            => 'Airtime',
        	'service_charge'                  => 0,
        	'minimum_value'                   => 50,
        	'maximum_value'                   => 100000,
        	'api_provider'                    => 'irecharge',
        	'enable'                    	=> 'Yes',
        	'percentage_commission'           => 0.01,
        ]);

        \App\Models\Products\ServiceSetting::Create([
        	'title'                           => 'Etisalat',
        	'code'                            => 'Etisalat',
        	'type'                            => 'Airtime',
        	'service_charge'                  => 0,
        	'minimum_value'                   => 50,
        	'maximum_value'                   => 100000,
        	'api_provider'                    => 'irecharge',
        	'enable'                    	=> 'Yes',
        	'percentage_commission'           => 0.01,
        ]);

        \App\Models\Products\ServiceSetting::Create([
        	'title'                           => 'MTN Data',
        	'code'                            => 'MTN',
        	'type'                            => 'Data',
        	'service_charge'                  => 0,
        	'minimum_value'                   => 50,
        	'maximum_value'                   => 100000,
        	'api_provider'                    => 'irecharge',
        	'enable'                    	=> 'Yes',
        	'percentage_commission'           => 0.01,
        ]);


        \App\Models\Products\ServiceSetting::Create([
        	'title'                           => 'GLO Data',
        	'code'                            => 'Glo',
        	'type'                            => 'Data',
        	'service_charge'                  => 0,
        	'minimum_value'                   => 50,
        	'maximum_value'                   => 100000,
        	'api_provider'                    => 'irecharge',
        	'enable'                    	=> 'Yes',
        	'percentage_commission'           => 0.01,
        ]);

        \App\Models\Products\ServiceSetting::Create([
        	'title'                           => 'Airtel Data',
        	'code'                            => 'Airtel',
        	'type'                            => 'Data',
        	'service_charge'                  => 0,
        	'minimum_value'                   => 50,
        	'maximum_value'                   => 100000,
        	'api_provider'                    => 'irecharge',
        	'enable'                    	=> 'Yes',
        	'percentage_commission'           => 0.01,
        ]);

        \App\Models\Products\ServiceSetting::Create([
        	'title'                           => 'Etisalat Data',
        	'code'                            => 'Etisalat',
        	'type'                            => 'Data',
        	'service_charge'                  => 0,
        	'minimum_value'                   => 50,
        	'maximum_value'                   => 100000,
        	'api_provider'                    => 'irecharge',
        	'enable'                    	=> 'Yes',
        	'percentage_commission'           => 0.01,
        ]);

        \App\Models\Products\ServiceSetting::Create([
        	'title'                           => 'Smile',
        	'code'                            => 'smile',
        	'type'                            => 'Data',
        	'service_charge'                  => 0,
        	'minimum_value'                   => 50,
        	'maximum_value'                   => 100000,
        	'api_provider'                    => 'irecharge',
        	'enable'                    	=> 'Yes',
        	'percentage_commission'           => 0.01,
        ]);


        \App\Models\Products\ServiceSetting::Create([
        	'title'                           => 'Spectranet',
        	'code'                            => 'spectranet',
        	'type'                            => 'Data',
        	'service_charge'                  => 0,
        	'minimum_value'                   => 50,
        	'maximum_value'                   => 100000,
        	'api_provider'                    => 'irecharge',
        	'enable'                    	=> 'Yes',
        	'percentage_commission'           => 0.01,
        ]);

        \App\Models\Products\ServiceSetting::Create([
        	'title'                           => 'GOTV',
        	'code'                            => 'gotv',
        	'type'                            => 'Tv',
        	'service_charge'                  => 0,
        	'minimum_value'                   => 50,
        	'maximum_value'                   => 100000,
        	'api_provider'                    => 'irecharge',
        	'enable'                    	=> 'Yes',
        	'percentage_commission'           => 0.01,
        ]);


        \App\Models\Products\ServiceSetting::Create([
        	'title'                           => 'DSTV',
        	'code'                            => 'dstv',
        	'type'                            => 'Tv',
        	'service_charge'                  => 0,
        	'minimum_value'                   => 50,
        	'maximum_value'                   => 100000,
        	'api_provider'                    => 'irecharge',
        	'enable'                    	=> 'Yes',
        	'percentage_commission'           => 0.01,
        ]);

        \App\Models\Products\ServiceSetting::Create([
        	'title'                           => 'AEDC PREPAID',
        	'code'                            => 'AEDC',
        	'type'                            => 'Power',
        	'service_charge'                  => 0,
        	'minimum_value'                   => 50,
        	'maximum_value'                   => 100000,
        	'api_provider'                    => 'irecharge',
        	'enable'                    	=> 'Yes',
        	'percentage_commission'           => 0.01,
        ]);


        \App\Models\Products\ServiceSetting::Create([
        	'title'                           => 'AEDC POSTPAID',
        	'code'                            => 'AEDC_Postpaid',
        	'type'                            => 'Power',
        	'service_charge'                  => 0,
        	'minimum_value'                   => 50,
        	'maximum_value'                   => 100000,
        	'api_provider'                    => 'irecharge',
        	'enable'                    	=> 'Yes',
        	'percentage_commission'           => 0.01,
        ]);

        \App\Models\Products\ServiceSetting::Create([
        	'title'                           => 'Kaduna Eletric Prepaid',
        	'code'                            => 'Kaduna_Electricity_Disco_Postpaid',
        	'type'                            => 'Power',
        	'service_charge'                  => 0,
        	'minimum_value'                   => 50,
        	'maximum_value'                   => 100000,
        	'api_provider'                    => 'irecharge',
        	'enable'                    	=> 'Yes',
        	'percentage_commission'           => 0.01,
        ]);

        \App\Models\Products\ServiceSetting::Create([
        	'title'                           => 'Kaduna Eletric PostPaid',
        	'code'                            => 'Kaduna_Electricity_Disco',
        	'type'                            => 'Power',
        	'service_charge'                  => 0,
        	'minimum_value'                   => 50,
        	'maximum_value'                   => 100000,
        	'api_provider'                    => 'irecharge',
        	'enable'                    	=> 'Yes',
        	'percentage_commission'           => 0.01,
        ]);

        \App\Models\Products\ServiceSetting::Create([
        	'title'                           => 'Jos Eletric PrePaid',
        	'code'                            => 'Jos_Disco',
        	'type'                            => 'Power',
        	'service_charge'                  => 0,
        	'minimum_value'                   => 50,
        	'maximum_value'                   => 100000,
        	'api_provider'                    => 'irecharge',
        	'enable'                    	=> 'Yes',
        	'percentage_commission'           => 0.01,
        ]);

        \App\Models\Products\ServiceSetting::Create([
        	'title'                           => 'Kano Eletric PrePaid',
        	'code'                            => 'Kano_Electricity_Disco',
        	'type'                            => 'Power',
        	'service_charge'                  => 0,
        	'minimum_value'                   => 50,
        	'maximum_value'                   => 100000,
        	'api_provider'                    => 'irecharge',
        	'enable'                    	=> 'Yes',
        	'percentage_commission'           => 0.01,
        ]);

        \App\Models\Products\ServiceSetting::Create([
        	'title'                           => 'Eko Prepaid',
        	'code'                            => 'Eko_Prepaid',
        	'type'                            => 'Power',
        	'service_charge'                  => 0,
        	'minimum_value'                   => 50,
        	'maximum_value'                   => 100000,
        	'api_provider'                    => 'irecharge',
        	'enable'                    	=> 'Yes',
        	'percentage_commission'           => 0.01,
        ]);

        \App\Models\Products\ServiceSetting::Create([
        	'title'                           => 'Eko Postpaid',
        	'code'                            => 'Eko_Postpaid',
        	'type'                            => 'Power',
        	'service_charge'                  => 0,
        	'minimum_value'                   => 50,
        	'maximum_value'                   => 100000,
        	'api_provider'                    => 'irecharge',
        	'enable'                    	=> 'Yes',
        	'percentage_commission'           => 0.01,
        ]);

        \App\Models\Products\ServiceSetting::Create([
        	'title'                           => 'Ikeja Electric Bill Payment',
        	'code'                            => 'Ikeja_Electric_Bill_Payment',
        	'type'                            => 'Power',
        	'service_charge'                  => 0,
        	'minimum_value'                   => 50,
        	'maximum_value'                   => 100000,
        	'api_provider'                    => 'irecharge',
        	'enable'                    	=> 'Yes',
        	'percentage_commission'           => 0.01,
        ]);

        \App\Models\Products\ServiceSetting::Create([
        	'title'                           => 'Ikeja Token Purchase',
        	'code'                            => 'Ikeja_Electric_Bill_Payment',
        	'type'                            => 'Power',
        	'service_charge'                  => 0,
        	'minimum_value'                   => 50,
        	'maximum_value'                   => 100000,
        	'api_provider'                    => 'irecharge',
        	'enable'                    	=> 'Yes',
        	'percentage_commission'           => 0.01,
        ]);

        \App\Models\Products\ServiceSetting::Create([
        	'title'                           => 'Ibadan Disco Prepaid',
        	'code'                            => 'Ibadan_Disco_Prepaid',
        	'type'                            => 'Power',
        	'service_charge'                  => 0,
        	'minimum_value'                   => 50,
        	'maximum_value'                   => 100000,
        	'api_provider'                    => 'irecharge',
        	'enable'                    	=> 'Yes',
        	'percentage_commission'           => 0.01,
        ]);

        \App\Models\Products\ServiceSetting::Create([
        	'title'                           => 'Port Harcourt Electricity Distribution Company',
        	'code'                            => 'PhED_Electricity',
        	'type'                            => 'Power',
        	'service_charge'                  => 0,
        	'minimum_value'                   => 50,
        	'maximum_value'                   => 100000,
        	'api_provider'                    => 'irecharge',
        	'enable'                    	=> 'Yes',
        	'percentage_commission'           => 0.01,
        ]);
    }
}
