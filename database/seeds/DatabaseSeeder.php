<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		 $this->call('customersTableSeeder');
	}

}


class customersTableSeeder extends Seeder {

    public function run()
    {
    

        Customer::create([
   			'company' => 'Norje turism',
   			'city' => 'Sölvesborg',
   			'adress' => 'Exempelvägen 12A',
   			'phone' => '0456-4575410',
   			'mail' => 'Exempelglass@mail.com',
   			'orgnr' => '11111',
   			'owner' => 'Anna Bengtsson',
   			'callupCustomer' => '0',
   			'orderCustomer' => '0',
   			'routes_id' => '4',
   			'sort' => '1',
   			]);
    }

}
