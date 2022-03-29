<?php
//This is the MAIN SEEDER

use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\DB;
//use File;
use Faker\Factory as Faker;
use Spatie\Permission\Models\Role;       //Spatie RBAC built-in model
use Spatie\Permission\Models\Permission; //Spatie RBAC built-in model
use App\User;

class DatabaseSeeder extends Seeder
{
	
	
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		//specify what data to run		
		$this->call('Users_Seeder');  //fill DB table {users} with data
        $this->call('Spatie_Seeder');  //assign Spatie permisssions, roles, fill DB tables {model_has_permissions, model_has_roles, role_has_permissions, role, permission} with data
		$this->call('Wpressimage_category_Seeder');      //fill DB table { wpressimage_category} with data
		$this->call('WpressImages_blog_Post_Seeder');    //fill DB table {	wpressimages_blog_post} with data
        $this->call('WpressImages_ImagesStock_Seeder');  //fill DB table {	wpressimage_imagesstock} with data
		$this->command->info('Seedering action was successful!');
    }
}
//------------------- ALL SEEDERS CLASS -----------------------------------




//fill DB table {users} with data 
class Users_Seeder extends Seeder {
    public function run()
    {
        DB::table('users')->delete();  //whether to Delete old materials
        DB::table('users')->insert(['id' => 1, 'name' => 'Admin',  'email' => 'admin@ukr.net',      'password' => bcrypt('adminadmin') ]);
	    DB::table('users')->insert(['id' => 2, 'name' => 'Dima',   'email' => 'dimmm931@gmail.com', 'password' => bcrypt('dimadima')   ]);
	    DB::table('users')->insert(['id' => 3, 'name' => 'Olya',   'email' => 'olya@gmail.com',     'password' => bcrypt('olyaolya')   ]);
		DB::table('users')->insert(['id' => 4, 'name' => 'Admin',  'email' => 'test@gmail.com',     'password' => bcrypt('testtest')   ]);
    }
}



// Spatie permisssions Seeder==============================
//assign Spatie permisssions, roles, fill DB tables {model_has_permissions, model_has_roles, role_has_permissions, role, permission} with data

class Spatie_Seeder extends Seeder {
    public function run()
    {
        $all_roles_in_database      = Role::all()->pluck('name');       //get all existsing roles (in DB Role)
        $all_permission_in_database = Permission::all()->pluck('name'); //get all existsing permisssions (in DB)
        
        //My manual check if role "AdminX" already exists
        $flag_role_exist = false;
        
        foreach($all_roles_in_database as $roleX){
            if($roleX == "AdminX"){
                //dd("AdminX already Exists");
                $flag_role_exist = true;
            }
        }
        
        if($flag_role_exist == false){
            $role             = Role::create(['name' => 'AdminX']); //create role
            $permissionEdit   = Permission::create(['name' => 'edit articles']); //create permisssion 'edit articles'
            $permissionDelete = Permission::create(['name' => 'delete articles']); //create permisssion 'delete articles'
            $role->givePermissionTo($permissionEdit); //assign permission to role 
            $role->givePermissionTo($permissionDelete); //assign permission to role 
            
            //$userX = auth()->user(); //current user
			//Assign Admin access to user with id 2
            $userX =  User::where('id', '=', 2)->first();
            $userX->givePermissionTo($permissionEdit); //$user->givePermissionTo('edit articles'); //give the user certain permission
            $userX->givePermissionTo($permissionDelete);
			
			//Assign Admin access to user with id 4 (test user)
            $userX =  User::where('id', '=', 4)->first();
            $userX->givePermissionTo($permissionEdit); 
            $userX->givePermissionTo($permissionDelete);
        }
    }
}
    


//Wpress with Images ====================================
//fill DB table {wpressimage_category} with data.

class Wpressimage_category_Seeder extends Seeder {
    public function run()
    {
	    DB::table('wpressimage_category')->delete();  //whether to Delete old materials
        DB::table('wpressimage_category')->insert(['wpCategory_id' => 1, 'wpCategory_name' => 'News' ]);
		DB::table('wpressimage_category')->insert(['wpCategory_id' => 2, 'wpCategory_name' => 'Art' ]);
		DB::table('wpressimage_category')->insert(['wpCategory_id' => 3, 'wpCategory_name' => 'Sport' ]);
		DB::table('wpressimage_category')->insert(['wpCategory_id' => 4, 'wpCategory_name' => 'Geeks' ]);
		DB::table('wpressimage_category')->insert(['wpCategory_id' => 5, 'wpCategory_name' => 'Drops' ]);
    } 
} 


//fill DB table {	wpressimages_blog_post} with data.
class WpressImages_blog_Post_Seeder extends Seeder {
	public $NUMBER_OF_ARTICLES = 10;
    public function run()
    {
	    //DB::table('wpressimages_blog_post')->delete();  //whether to Delete old materials
		DB::statement('SET FOREIGN_KEY_CHECKS=0');       //way to set auto increment back to 1 before seeding a table (instead of ->delete())
        DB::table('wpressimages_blog_post')->truncate(); //way to set auto increment back to 1 before seeding a table

		$NUMBER_OF_CATEGORIES = 5;
        $faker = Faker::create();
        $gender = $faker->randomElement(['male', 'female']);

    	foreach (range(1, $this->NUMBER_OF_ARTICLES) as $index) {
            DB::table('wpressimages_blog_post')->insert([
                'wpBlog_title'    => $faker->name, //$faker->name($gender),
                'wpBlog_text'     =>  $faker->realText($maxNbChars = 200, $indexSize = 2), //$faker->text,
                'wpBlog_author'   => 1, //$faker->username,
				'wpBlog_category' => rand(1, $NUMBER_OF_CATEGORIES), //random string between min and max numbe
                //'wpBlog_status' => $faker->date($format = 'Y-m-d', $max = 'now'),
				//'image' => $faker->image(public_path('images/students'),400,300, null, false), //saving images to 'public/images/students. Takes much time
                //'image' => 'http://loremflickr.com/400/300?random='.rand(1, 100),
            ]);
        }   
    } 
}


//fill DB table {wpressimage_imagesstock} with data.
class WpressImages_ImagesStock_Seeder extends Seeder {
    public function run()
    {
	    DB::table('wpressimage_imagesstock')->delete();  //whether to Delete old materials
		//$NUMBER_OF_ARTICLES = 10;
        $faker = Faker::create();
        $gender = $faker->randomElement(['male', 'female']);
        
        DB::table('wpressimage_imagesstock')->insert(['wpImStock_postID' => 1,  'wpImStock_name' => 'product1.png' ]);
        DB::table('wpressimage_imagesstock')->insert(['wpImStock_postID' => 2,  'wpImStock_name' => 'product2.png' ]);
        DB::table('wpressimage_imagesstock')->insert(['wpImStock_postID' => 3,  'wpImStock_name' => 'product3.png' ]);
        DB::table('wpressimage_imagesstock')->insert(['wpImStock_postID' => 4,  'wpImStock_name' => 'product4.png' ]);
        DB::table('wpressimage_imagesstock')->insert(['wpImStock_postID' => 5,  'wpImStock_name' => 'product5.png' ]);
        DB::table('wpressimage_imagesstock')->insert(['wpImStock_postID' => 6,  'wpImStock_name' => 'product6.png' ]);
        DB::table('wpressimage_imagesstock')->insert(['wpImStock_postID' => 7,  'wpImStock_name' => 'product7.jpg' ]);
        DB::table('wpressimage_imagesstock')->insert(['wpImStock_postID' => 8,  'wpImStock_name' => 'product8.jpg' ]);
        DB::table('wpressimage_imagesstock')->insert(['wpImStock_postID' => 9,  'wpImStock_name' => 'product9.jpg' ]);
        DB::table('wpressimage_imagesstock')->insert(['wpImStock_postID' => 10, 'wpImStock_name' => 'product10.jpg' ]);
        
        //Working Seeder, just reassing from random images to preloaded(for better UI -))))
        /*
    	foreach (range(1,10) as $index) {
            DB::table('wpressimage_imagesstock')->insert([
                //assign random images via Faker. Working
                'wpImStock_name'   => $faker->image(public_path('images/wpressImages'),400,300, null, false), //saving images to 'public/images/students. Takes much time
                'wpImStock_postID' =>  rand(1, $NUMBER_OF_ARTICLES), //random string between min and max number
				//'image' => $faker->image(public_path('images/students'),400,300, null, false), //saving images to 'public/images/students. Takes much time
                //'image' => 'http://loremflickr.com/400/300?random='.rand(1, 100),
            ]);
        } 
        */        
    } 
}
