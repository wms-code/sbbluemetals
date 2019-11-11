<?php

use Illuminate\Database\Seeder;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts_groups')->insert(
            [
                
  array('id' => '1','name' => 'CAPITAL A/C','root' => 'CAPITAL ACCOUNTS','opening_balance' => '0','closing_balance' => '0','total_debits' => '0','total_credits' => '0','sort_by' => '1','status' => '0'),
  array('id' => '2','name' => 'BANK ACCOUNTS','root' => 'CURRENT ASSETS','opening_balance' => '-115432','closing_balance' => '-518286.4','total_debits' => '-1871726','total_credits' => '1468871.6','sort_by' => '2','status' => '1'),
  array('id' => '3','name' => 'CASH IN HAND','root' => 'CURRENT ASSETS','opening_balance' => '0','closing_balance' => '18052.6','total_debits' => '-149349','total_credits' => '167401.6','sort_by' => '3','status' => '1'),
  array('id' => '4','name' => 'DEPOSITS','root' => 'CURRENT ASSETS','opening_balance' => '0','closing_balance' => '0','total_debits' => '0','total_credits' => '0','sort_by' => '4','status' => '0'),
  array('id' => '5','name' => 'LOANS AND ADVANCES','root' => 'CURRENT ASSETS','opening_balance' => '0','closing_balance' => '0','total_debits' => '0','total_credits' => '0','sort_by' => '5','status' => '0'),
  array('id' => '6','name' => 'STOCK IN HAND','root' => 'CURRENT ASSETS','opening_balance' => '0','closing_balance' => '0','total_debits' => '0','total_credits' => '0','sort_by' => '6','status' => '0'),
  array('id' => '7','name' => 'CUSTOMERS','root' => 'CURRENT ASSETS','opening_balance' => '-2355655','closing_balance' => '-1227022','total_debits' => '-1806588','total_credits' => '2935221','sort_by' => '7','status' => '1'),
  array('id' => '8','name' => 'DUTIES AND TAXES','root' => 'CURRENT LIABILITY','opening_balance' => '0','closing_balance' => '0','total_debits' => '0','total_credits' => '0','sort_by' => '0','status' => '0'),
  array('id' => '9','name' => 'PROVISTIONS','root' => 'CURRENT LIABILITY','opening_balance' => '0','closing_balance' => '0','total_debits' => '0','total_credits' => '0','sort_by' => '0','status' => '0'),
  array('id' => '10','name' => 'SUPPLIERS','root' => 'CURRENT LIABILITY','opening_balance' => '1600496','closing_balance' => '877221','total_debits' => '-1360910','total_credits' => '637635','sort_by' => '0','status' => '1'),
  array('id' => '11','name' => 'EXPENSES DIRECT','root' => 'EXPENSES DIRECT','opening_balance' => '0','closing_balance' => '-253503','total_debits' => '-253503','total_credits' => '0','sort_by' => '0','status' => '1'),
  array('id' => '12','name' => 'EXPENSES INDIRECT','root' => 'EXPENSES INDIRECT','opening_balance' => '0','closing_balance' => '-415614','total_debits' => '-415614','total_credits' => '0','sort_by' => '0','status' => '1'),
  array('id' => '13','name' => 'FIXED ASSETS','root' => 'FIXED ASSETS','opening_balance' => '0','closing_balance' => '0','total_debits' => '0','total_credits' => '0','sort_by' => '0','status' => '0'),
  array('id' => '14','name' => 'INCOME DIRECT','root' => 'INCOME DIRECT','opening_balance' => '0','closing_balance' => '35130','total_debits' => '0','total_credits' => '35130','sort_by' => '0','status' => '1'),
  array('id' => '15','name' => 'INCOME INDIRECT','root' => 'INCOME INDIRECT','opening_balance' => '0','closing_balance' => '0','total_debits' => '0','total_credits' => '0','sort_by' => '0','status' => '0'),
  array('id' => '16','name' => 'INVESTMENTS','root' => 'INVESTMENTS','opening_balance' => '0','closing_balance' => '0','total_debits' => '0','total_credits' => '0','sort_by' => '0','status' => '0'),
  array('id' => '17','name' => 'BANK CC A/C','root' => 'LOANS','opening_balance' => '0','closing_balance' => '0','total_debits' => '0','total_credits' => '0','sort_by' => '0','status' => '0'),
  array('id' => '18','name' => 'BANK OD A/C','root' => 'LOANS','opening_balance' => '0','closing_balance' => '0','total_debits' => '0','total_credits' => '0','sort_by' => '0','status' => '0'),
  array('id' => '19','name' => 'SECURED LOANS','root' => 'LOANS','opening_balance' => '0','closing_balance' => '0','total_debits' => '0','total_credits' => '0','sort_by' => '0','status' => '0'),
  array('id' => '20','name' => 'UNSECURED LOANS','root' => 'LOANS','opening_balance' => '0','closing_balance' => '0','total_debits' => '0','total_credits' => '0','sort_by' => '0','status' => '0'),
  array('id' => '21','name' => 'MISC.EXPENSES','root' => 'MISC.EXP','opening_balance' => '0','closing_balance' => '0','total_debits' => '0','total_credits' => '0','sort_by' => '0','status' => '0'),
  array('id' => '22','name' => 'PURCHASE ACCOUNTS','root' => 'PURCHASE ACCOUNTS','opening_balance' => '0','closing_balance' => '-637635','total_debits' => '-637635','total_credits' => '0','sort_by' => '0','status' => '0'),
  array('id' => '23','name' => 'SALES ACCOUNTS','root' => 'SALES ACCOUNTS','opening_balance' => '0','closing_balance' => '1406713','total_debits' => '0','total_credits' => '1406713','sort_by' => '0','status' => '0'),
  array('id' => '24','name' => 'SUSPENSE ACCOUNTS','root' => 'SUSPENSE','opening_balance' => '0','closing_balance' => '0','total_debits' => '0','total_credits' => '0','sort_by' => '0','status' => '0'),
  array('id' => '25','name' => 'TDS ACCOUNTS','root' => 'CURRENT ASSETS','opening_balance' => '0','closing_balance' => '0','total_debits' => '0','total_credits' => '0','sort_by' => '0','status' => '0'),
  array('id' => '26','name' => 'EMPLOYEE A/C','root' => 'EMPLOYEE','opening_balance' => '-7461','closing_balance' => '-259239.2','total_debits' => '-315928.2','total_credits' => '64150','sort_by' => '0','status' => '1'),
  array('id' => '27','name' => 'MACHINES A/C','root' => 'MACHINES','opening_balance' => '0','closing_balance' => '-13757','total_debits' => '-13757','total_credits' => '0','sort_by' => '0','status' => '1'),
  array('id' => '28','name' => 'VEHICLES A/C','root' => 'VEHICLES','opening_balance' => '0','closing_balance' => '-2900','total_debits' => '-2900','total_credits' => '0','sort_by' => '0','status' => '1'),
  array('id' => '29','name' => 'DELIVERY PARTY','root' => 'CURRENT ASSETS','opening_balance' => '0','closing_balance' => '0','total_debits' => '0','total_credits' => '0','sort_by' => '0','status' => '1')
                
             ]
    );
    }
}