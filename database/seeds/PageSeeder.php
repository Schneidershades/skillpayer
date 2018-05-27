<?php

use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Page::Create([
        	'name'                      => 'About',
            'title'                  	=> 'About',
          	'slug'                   	=> str_slug('about'),
          	'featured'                  => '0',
          	'details'                   => 

          	'
          	<article class="article-content">
				<h3>About SkillPayer</h3>
				<p><strong>SKILL PAYERS</strong></p>
				<p><strong><a href="http://www.skillpayer.com/wp-content/uploads/2017/05/about_us_banner-1.jpg"><img class="alignnone wp-image-636" src="http://www.skillpayer.com/wp-content/uploads/2017/05/about_us_banner-1-300x90.jpg" alt="" width="683" height="205" srcset="https://www.skillpayer.com/wp-content/uploads/2017/05/about_us_banner-1-300x90.jpg 300w, https://www.skillpayer.com/wp-content/uploads/2017/05/about_us_banner-1-768x230.jpg 768w, https://www.skillpayer.com/wp-content/uploads/2017/05/about_us_banner-1.jpg 1000w" sizes="(max-width: 683px) 100vw, 683px"></a></strong></p>
				<p>The world is no longer a global village but has sporadically become a global bedroom. Now you can stay in the comfort of your bedroom and get many problems solved, create a new world and above all make a lot of money affecting lives in all ramifications.</p>
				<p>SkillPayer is an online application that creates the most comfortable home business for any category of users. It is designed for anyone who can click a button on the computer, use a mobile phone or even with the least of knowledge gadgets. Users can advertise their skills, ideas and businesses for visibility all over the world, they can also recharge their phones (airtime and data) and that of others, pay bills, recharge Cable TV, Exams cards etc earning huge commissions while making a lot of money helping others to succeed in life.</p>
				<p>With SkillPayer, anyone can build an unlimited residual income meaning you make money even while sleeping or holidaying all over the world.&nbsp;This is one of the best breakthroughs in human history; you can’t afford to miss this great opportunity. Simply register, fund your wallet with the community currency, pick a membership package, post your ads and begin to smile to the bank. It is that simple and easy to use. All earnings are withdrawable to the owner’s&nbsp;bank account within 48hours but with a flat withdrawal charge of 100SKC</p>
				<p>With seasoned professionals in different fields sitting on the board of directors,&nbsp;becoming a member of SkillPayer becomes a thing of fun and total financial emancipation.</p>
				<p><strong>COMMUNITY CURRENCY</strong></p>
				<p>All transactions in the community shall be carried out with SkillCoin (SKC) which is equivalent to the local currencies of countries where Skillpayer exists. For instance: 1SKC = 1$, 1SKC = 1N etc.</p>
				<p><strong>FEATURES OF SKILL PAYERS</strong></p>
				<ol>
					<li>Aggregation of all professions in the world including professional or artisan jobs.</li>
					<li>Job and Contract opportunities</li>
					<li>Taxi operations</li>
					<li>Skill Acquisition</li>
					<li>Jobseekers Productions (Movie and Music Productions)</li>
					<li>Unique cryptocurrency (SkillCoin)</li>
					<li>Mobile Recharge (Airtime, Data etc)</li>
					<li>Bill Payment (Dstv, Startimes, Gotv PHCN, WAEC) etc</li>
				</ol>
				<p>SkillPayer is evolutionary and so will continue to expand the platform with much more functionalities as the days go by.</p>
				<div dir="auto">Please visit our blog –&nbsp;<a href="https://www.skillpayerblog.com">https://www.skillpayerblog.com</a></div>
			</article>',
        ]);


		\App\Page::Create([
        	'name'                      => 'How it works',
            'title'                  	=> 'How it works',
          	'slug'                   	=> str_slug('tour'),
          	'featured'                  => '0',
          	'details'                   => 

          	'
          	<article class="article-content">
				<h3>How it Works</h3>
				<p><a href="https://www.skillpayer.com/wp-content/uploads/2017/12/how-it-works-logo-e1440547878568-2.png"><img class="alignnone wp-image-1510" src="https://www.skillpayer.com/wp-content/uploads/2017/12/how-it-works-logo-e1440547878568-2-300x78.png" alt="" width="562" height="146" srcset="https://www.skillpayer.com/wp-content/uploads/2017/12/how-it-works-logo-e1440547878568-2-300x78.png 300w, https://www.skillpayer.com/wp-content/uploads/2017/12/how-it-works-logo-e1440547878568-2.png 479w" sizes="(max-width: 562px) 100vw, 562px"></a></p>
				<div dir="auto">SKILLPAYER is a simple and very easy to use application. The usage takes the following steps:</div>
				<div dir="auto"></div>
				<div dir="auto">STEP 1: REGISTER&nbsp;FREE</div>
				<div dir="auto">STEP 2: Fund your wallet with SkillCoin (SKC) – You can talk to your upline for wallet transfer</div>
				<div dir="auto">STEP 3: CHOOSE A MEMBERSHIP PLAN (Check Packages for details).</div>
				<div dir="auto">STEP 2: Start placing the&nbsp;Ads of your skills or businesses or begin to find a service/product from our Verified Professionals.</div>
				<div dir="auto">STEP 3: Join a Professional or Skill group or create one around your vicinity.</div>
				<div dir="auto">STEP 4: Send AirTime/Cable TV/Data/Electricity/Exams etc, also pay other bills via your Wallet Balance.</div>
				<div dir="auto">STEP 5: Watch Your Wallet grow as new users sign up in your team, using your referral links with our outstanding Referral Program&nbsp; as you also begin to&nbsp;accumulate your PV (Point Value) which will be converted to a monthly salary payment, International Trip, Car Award, House Award etc. Please Check Rewards for details.&nbsp;All earnings are withdrawable to the owner’s&nbsp;bank account within 48hours but with a flat withdrawal charge of 100SKC.</div>
				<div dir="auto">STEP 6: Pronto! Your journey to financial freedom starts! it does not take rocket science.</div>
				<div dir="auto"></div>
				<div dir="auto">Please visit our blog –&nbsp;https://www.skillpayerblog.com</div>
				<div dir="auto"></div>
				<div dir="auto"></div>
				<div dir="auto"></div>
				<div dir="auto"></div>
				<div dir="auto"></div>
				<div dir="auto"></div>
				<div dir="auto"></div>
				<div dir="auto"></div>
				<div dir="auto"></div>
				<div dir="auto"></div>
			</article>',
        ]);

		\App\Page::Create([
        	'name'                      => 'Reward',
            'title'                  	=> 'Reward',
          	'slug'                   	=> str_slug('Reward'),
          	'featured'                  => '0',
          	'details'                   => 

          	'
          	<article class="article-content">
					<h3>Rewards</h3>
								<p><strong>REWARDS AND COMPENSATION PLAN</strong></p>
				<p><a href="http://www.skillpayer.com/wp-content/uploads/2018/01/compen-1.jpg"><img class="alignnone wp-image-641" src="http://www.skillpayer.com/wp-content/uploads/2018/01/compen-1-300x256.jpg" alt="" width="429" height="366" srcset="https://www.skillpayer.com/wp-content/uploads/2018/01/compen-1-300x256.jpg 300w, https://www.skillpayer.com/wp-content/uploads/2018/01/compen-1.jpg 768w" sizes="(max-width: 429px) 100vw, 429px"></a></p>
				<p>When a user registers, he has access to all the functions of the application. He can search for existing professionals closest to him to render any service. He also can be called for jobs if he indicated interest in such at the point of registration.</p>
				<p>The same user can recharge his phone, buy data, recharge Cable TV, buy&nbsp;Electricity token &nbsp;and pay other bills and also sell same with commissions and highly attractive compensation plan.</p>
				<p>Skillpayer members transact with SkillCoin (SKC) which is the unique currency of the community.</p>
				<p>All earnings are withdrawable to the owner’s&nbsp;bank account within 48hours but with a flat withdrawal charge of 100SKC</p>
				<p><strong>REGISTRATION PACKAGES</strong></p>
				<p><strong>&nbsp;</strong>Registration is in Five&nbsp;(5) different categories based on your pocket:</p>
				<ol>
				<li>Dream&nbsp; &nbsp; &nbsp; &nbsp;Free</li>
				<li>Bronze&nbsp; &nbsp; &nbsp; 5,000SKC</li>
				<li>Silver&nbsp; &nbsp; &nbsp; &nbsp; 10,000SKC</li>
				<li>Gold&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 30,000SKC</li>
				<li>Ultimate&nbsp; &nbsp;50,000SKC</li>
				</ol>
				<p><strong>6. WAYS TO EARN IN SKILLPAYER</strong></p>
				<ol>
				<li>Direct referral bonus – (20% for all packages)</li>
				<li>Indirect referral bonus (10% — 1%)</li>
				<li>Leadership bonus</li>
				<li>Award / Incentive</li>
				<li>VTU/Data Recharges/Cable TV/Electricity/Exams etc</li>
				<li>&nbsp;Skill Acquisition</li>
				</ol>
				<p><strong><u>Illustrations</u></strong></p>
				<p><strong>1. &nbsp;DIRECT REFERRAL BONUS</strong></p>
				<p>You get 20% of registration fee of all members you sponsor directly.</p>
				<p><strong>2. &nbsp;INDIRECT REFERRAL BONUS (10% — 1%)</strong></p>
				<p>Dream&nbsp;–&nbsp; &nbsp; &nbsp; (Dream members earn only from their direct referrals in referral bonus)</p>
				<p>Bronze –&nbsp; &nbsp; &nbsp;(Bronze members earn up to 3 generations in referral bonus)</p>
				<p>Silver –&nbsp; &nbsp; &nbsp; &nbsp;(Silver members earn up to 5 generations in referral bonus)</p>
				<p>Gold –&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(Gold members earn up to 7 generations in referral bonus)</p>
				<p>Ultimate&nbsp; &nbsp; (Ultimate members earn up to 10 generations in referral bonus)</p>
				<p>Indirect Down lines are people sponsored by your direct down lines, down to 9th level. Indirect bonus is&nbsp;earned as follows:</p>
				<p>2nd level 10%</p>
				<p>3rd level 3%</p>
				<p>4th level 2%</p>
				<p>5th level 1%</p>
				<p>6th level 1%</p>
				<p>7th level 1%</p>
				<p>8th level 1%</p>
				<p>9th level 1%</p>
				<p>10th&nbsp;level 1%</p>
				<p>3. &nbsp;&nbsp;<strong>LEADERSHIP BONUS</strong></p>
				<p>Every newly registered member of skillpayer is given PV (Point Value) as follows:</p>
				<p>Ultimate&nbsp; &nbsp; &nbsp;200 PV</p>
				<p>Gold&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 100 PV</p>
				<p>Silver. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;50 PV</p>
				<p>Bronze &nbsp; &nbsp; &nbsp; &nbsp;20 PV</p>
				<p>The same referral percentages apply to the earning of PVs by uplines.</p>
				<p><strong>MONTHLY PAY(PAY RANK)</strong></p>
				<p>Any month a member, through newly registered members, accumulates up to 20,000PV,&nbsp;he&nbsp;begins to earn&nbsp;N100,000 Monthly as Activity Allowance in the network. This being reward for exceptional Team building efforts. This is the third way you can make money on Skill payer.</p>
				<p>4. &nbsp;&nbsp;<strong>AWARD / INCENTIVE</strong></p>
				<p>The fourth way you make money from Skillpayer is through winning awards. These are incentives to motivate member to aim high and work hard. Once again, it is based on PVs accumulated from your membership and new entrants to your network (TEAM). They are as follows.</p>
				<p>i. &nbsp; INTERNATIONAL TRIP AWARD to the tune of N500,000<strong> (TRAVEL RANK)</strong></p>
				<p>Accumulate over time 30,000 PV from all registered members in your network and qualify for a Tourism / Vacation trip to Dubai or Receive N500,000 cash.</p>
				<p>ii. &nbsp; CAR AWARD to the tune of 3,000,000SKC&nbsp;&nbsp;<strong>(CAR RANK)</strong></p>
				<p>Accumulate 60,000 PV over time from all registered members of your network (TEAM) and qualify to receive a car or 3millionSKC from the network.</p>
				<p>iii. &nbsp;HOUSE FUNDS to the tune of 5,000,000SKC&nbsp;<strong>(HOUSE RANK)</strong></p>
				<p>Accumulate 100,000 PV from registered members of your Team over time and qualify for a House Fund worth 5millionSKC.</p>
				<p><strong>ACCUMULATION OF PVS</strong></p>
				<p>Every newly registered member of skillpayer is given PV (Point Value) as follows:</p>
				<p>Ultimate registration normally earns 200 PV</p>
				<p>Direct referral &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 20% of 200PV &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 40PV</p>
				<p>2nd level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 10%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 20PV</p>
				<p>3rd level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 6PV</p>
				<p>4th level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 4PV</p>
				<p>5th level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2PV</p>
				<p>6th level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2PV</p>
				<p>7th level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2PV</p>
				<p>8th level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2PV</p>
				<p>9th level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2PV</p>
				<p>10<sup>th</sup> level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2PV</p>
				<p>&nbsp;</p>
				<p>Gold&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 100 PV</p>
				<p>Direct referral &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 20% of 100PV &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 20PV</p>
				<p>2nd level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 10%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 10PV</p>
				<p>3rd level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3PV</p>
				<p>4th level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2PV</p>
				<p>5th level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1PV</p>
				<p>6th level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1PV</p>
				<p>7th level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1PV</p>
				<p>8th level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1PV</p>
				<p>9th level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1PV</p>
				<p>10<sup>th</sup> level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1PV</p>
				<p>&nbsp;</p>
				<p>Silver.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 50 PV</p>
				<p>Direct referral &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 20% of 50PV &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;10PV</p>
				<p>2nd level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 10%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 5PV</p>
				<p>3rd level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1.5PV</p>
				<p>4th level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1PV</p>
				<p>5th level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0.5PV</p>
				<p>6th level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0.5PV</p>
				<p>7th level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0.5PV</p>
				<p>8th level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0.5PV</p>
				<p>9th level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0.5PV</p>
				<p>10<sup>th</sup> level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0.5PV</p>
				<p>&nbsp;</p>
				<p>Bronze&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 20 PV</p>
				<p>Direct referral &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;20% of 20PV &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 4PV</p>
				<p>2nd level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 10%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2PV</p>
				<p>3rd level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0.6PV</p>
				<p>4th level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0.4PV</p>
				<p>5th level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0.2PV</p>
				<p>6th level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0.2PV</p>
				<p>7th level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0.2PV</p>
				<p>8th level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0.2PV</p>
				<p>9th level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0.2PV</p>
				<p>10<sup>th</sup> level &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0.2PV</p>
				<p>5.&nbsp; &nbsp;<b>VTU/DATA RECHARGES/ELECTRICITY/EXAMS ETC</b></p>
				<p>The&nbsp;fifth way you make money in skillpayer is&nbsp;through the dispensing of telecoms products. Nigeria as at today&nbsp;spends nothing less than N500b on phone calls every month, the money only ends up in the pocket of those who are smart and are never afraid of little beginnings. skillpayer offers all members the opportunity to make good money from their daily lifestyles. Listed below are the commissions you earn each time you use any of the products or sell to your contacts:</p>
				<table style="height: 1502px;" width="406">
				<tbody>
				<tr>
				<td width="182"><strong>PRODUCT</strong></td>
				<td width="86"><strong>COMMISSION</strong></td>
				</tr>
				<tr>
				<td width="182">Airtel Airtime</td>
				<td width="86">2.00%</td>
				</tr>
				<tr>
				<td width="182">MTN Airtime</td>
				<td width="86">2.00%</td>
				</tr>
				<tr>
				<td width="182">GLO Airtime</td>
				<td width="86">2.00%</td>
				</tr>
				<tr>
				<td width="182">9mobile Airtime</td>
				<td width="86">2.00%</td>
				</tr>
				<tr>
				<td width="182">DSTV Subscription</td>
				<td width="86">1.00%</td>
				</tr>
				<tr>
				<td width="182">Airtel Data</td>
				<td width="86">2.00%</td>
				</tr>
				<tr>
				<td width="182">MTN Data</td>
				<td width="86">2.00%</td>
				</tr>
				<tr>
				<td width="182">GLO Data</td>
				<td width="86">2.00%</td>
				</tr>
				<tr>
				<td width="182">9mobile Data</td>
				<td width="86">2.00%</td>
				</tr>
				<tr>
				<td width="182">Gotv Payment</td>
				<td width="86">1.00%</td>
				</tr>
				<tr>
				<td width="182">Startimes Subscription</td>
				<td width="86">1.50%</td>
				</tr>
				<tr>
				<td width="182">Ikeja Electric Payment – PHCN</td>
				<td width="86">1.00%</td>
				</tr>
				<tr>
				<td width="182">Eko Electric Payment – PHCN</td>
				<td width="86">1.00%</td>
				</tr>
				<tr>
				<td width="182">WAEC Scratch Card</td>
				<td width="86">30.00SKC</td>
				</tr>
				<tr>
				<td width="182">Abuja Electric – AEDC</td>
				<td width="86">1.00%</td>
				</tr>
				<tr>
				<td width="182">KEDCO – Kano Electric</td>
				<td width="86">1.00%</td>
				</tr>
				<tr>
				<td width="182">PHED – Port Harcourt Electric</td>
				<td width="86">1.00%</td>
				</tr>
				<tr>
				<td width="182">Bank Deposit</td>
				<td width="86">–</td>
				</tr>
				<tr>
				<td width="182">Jos Electric – JED</td>
				<td width="86">1.00%</td>
				</tr>
				<tr>
				<td width="182">SMSclone.com</td>
				<td width="86">2.00%</td>
				</tr>
				</tbody>
				</table>
				<p><strong>TRANSACTION PV EARNINGS (FOR ALL TRANSACTIONS ABOVE 1,000SKC)</strong></p>
				<p>ULTIMATE&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 5PV</p>
				<p>GOLD&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 4PV</p>
				<p>SILVER&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;3PV</p>
				<p>BRONZE&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;2PV</p>
				<p>DREAM&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;1PV</p>
				<p>Apart from the enumerated benefits above, skillpayer holds regular skills training programmes for paid members in different vocations of their choice. In addition, Jobseekers Productions helps creative members of the network to get exposed to the world via their talents. The recording label records their music and shoots the video with no financial commitment from the artiste at an agreed terms.</p>
				<p>Only those who have something to sell, have money to spend. No matter who you are, or your level in life, you will surely find something beneficial in skillpayer network. Join the moving train now as we together put smiles on people’s faces. It is an assignment.</p>
				<div dir="auto">Please visit our blog –&nbsp;<a href="https://www.skillpayerblog.com">https://www.skillpayerblog.com</a></div>
			</article>

			',
        ]);
    }
}
