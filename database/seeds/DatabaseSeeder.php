<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        Eloquent::unguard();

        //call uses table seeder class
        $this->call(CustomersTableSeeder::class);
        //this message shown in your terminal after running db:seed command
        $this->command->info("Customers table seeded :)");
//        $this->call(StocksTableSeeder::class);
//        $this->command->info("Stocks table seeded :)");
//        $this->call(InvestmentsTableSeeder::class);
//        $this->command->info("Investments table seeded :)");
    }
}

class CustomersTableSeeder extends Seeder {

    public function run()
    {
        //delete users table records
        DB::table('customers')->delete();
        //insert some dummy records
        DB::table('customers')->insert(array(
            array('cust_number'=>'12056','name'=>'Katherine McClusky','email'=>'katherinemc@gmail.com','address'=>'6782 Miles Street',
                'city'=>'Ames','state'=>'IA','zip'=>'69129','home_phone'=>'515-554-1024','cell_phone'=>'515-554-3499'),
            array('cust_number'=>'50712','name'=>'Gary Bennet','email'=>'geryb@yahoo.com','address'=>'3478 North 10th Street',
                'city'=>'Omaha','state'=>'NE','zip'=>'68124','home_phone'=>'402-399-0956','cell_phone'=>'402-399-0956'),
            array('cust_number'=>'35109','name'=>'Joseph Patil','email'=>'jpatil@outlook.com','address'=>'7559 North 121st Street',
                'city'=>'Omaha','state'=>'NE','zip'=>'68167','home_phone'=>'402-991-8915','cell_phone'=>'402-739-1110'),
        ));
    }
}

class StocksTableSeeder extends Seeder {

    public function run()
    {
        //delete users table records
        DB::table('stocks')->delete();
        //insert some dummy records
        DB::table('stocks')->insert(array(
            array('symbol'=>'msft','name'=>'Microsoft','shares'=>'410','purchase_price'=>'31.78','purchased'=>'2005-02-03','customer_id'=>'12056'),
            array('symbol'=>'goog','name'=>'Google','shares'=>'200','purchase_price'=>'210','purchased'=>'2004-03-03','customer_id'=>'12056'),
            array('symbol'=>'sbux','name'=>'Starbucks','shares'=>'100','purchase_price'=>'40.08','purchased'=>'2013-05-08','customer_id'=>'12056'),
            array('symbol'=>'T','name'=>'AT&T','shares'=>'250','purchase_price'=>'42.78','purchased'=>'2004-01-15','customer_id'=>'12056'),
            array('symbol'=>'vz','name'=>'Verizon','shares'=>'200','purchase_price'=>'52','purchased'=>'2012-01-07','customer_id'=>'12056'),
            array('symbol'=>'csco','name'=>'Cisco','shares'=>'100','purchase_price'=>'28','purchased'=>'2016-07-06','customer_id'=>'12056'),
            array('symbol'=>'ibm','name'=>'IBM Corp','shares'=>'550','purchase_price'=>'72.87','purchased'=>'2002-05-18','customer_id'=>'50712'),
            array('symbol'=>'aapl','name'=>'Apple','shares'=>'1360','purchase_price'=>'91','purchased'=>'2011-06-06','customer_id'=>'50712'),
            array('symbol'=>'yhoo','name'=>'Yahoo','shares'=>'800','purchase_price'=>'31.05','purchased'=>'2004-04-22','customer_id'=>'35109'),
            array('symbol'=>'GM','name'=>'General Motors','shares'=>'450','purchase_price'=>'56.92','purchased'=>'2004-04-02','customer_id'=>'35109'),
        ));
    }
}

class InvestmentsTableSeeder extends Seeder {

    public function run()
    {
        //delete users table records
        DB::table('investments')->delete();
        //insert some dummy records
        DB::table('investments')->insert(array(
            array('category'=>'401K','description'=>'401K with Iowa State University','acquired_value'=>'0','acquired_date'=>'1997-08-23',
                'recent_value'=>'609000','recent_date'=>'2016-05-05','customer_id'=>'12056'),
            array('category'=>'fund','description'=>'Oppenheimer Growth Mutual Fund','acquired_value'=>'15000','acquired_date'=>'2006-01-09',
                'recent_value'=>'28500','recent_date'=>'2016-05-15','customer_id'=>'12056'),
            array('category'=>'property','description'=>'Home with No Motgage','acquired_value'=>'110000','acquired_date'=>'1993-02-01',
                'recent_value'=>'180000','recent_date'=>'2016-05-05','customer_id'=>'12056'),
            array('category'=>'401K','description'=>'401K with Mutual of Omaha','acquired_value'=>'0','acquired_date'=>'1997-07-08',
                'recent_value'=>'520000','recent_date'=>'2016-05-01','customer_id'=>'50712'),
            array('category'=>'property','description'=>'condominium','acquired_value'=>'80000','acquired_date'=>'2001-03-03',
                'recent_value'=>'134000','recent_date'=>'2016-05-01','customer_id'=>'50712'),
            array('category'=>'fund','description'=>'Janus Venture Fund','acquired_value'=>'140000','acquired_date'=>'2005-01-15',
                'recent_value'=>'192000','recent_date'=>'2016-03-15','customer_id'=>'35109'),
            array('category'=>'401K','description'=>'401K with OPPD','acquired_value'=>'0','acquired_date'=>'1993-07-09',
                'recent_value'=>'134000','recent_date'=>'2016-05-05','customer_id'=>'35109'),
        ));
    }
}
