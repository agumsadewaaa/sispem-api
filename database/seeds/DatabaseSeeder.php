<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

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
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        App\Role::truncate();
        $roles = [
        'admin' => 'Admin',
        'wr2' => 'Wakil Rektor II' ,
        'kbsd' => 'Kepala Biro Umum Sumber Daya',
        'kbu' => 'Kepala Bagian Umum',
        'ksbrt'=> 'Kepala Sub Bagian Rumah Tangga',
        'user' => 'Pengguna'
      ];
        foreach ($roles as $key => $value) {
            $role = new App\Role();
            $role->role = $key;
            $role->description = $value;
            $role->save();
        }

        $roleAdmin = App\Role::where('role', 'admin')->first()->id;
        $roleKbsd = App\Role::where('role', 'kbsd')->first()->id;
        $roleKsbu = App\Role::where('role', 'kbu')->first()->id;
        $roleWr = App\Role::where('role', 'wr2')->first()->id;
        $roleKsbrt = App\Role::where('role', 'ksbrt')->first()->id;

        App\User::truncate();
        $admin = new App\User();
        $admin->name = "Ilham Pratama";
        $admin->nip_nim = "1311521038";
        $admin->email = "ilham@pratama.com";
        $admin->role_id = $roleAdmin;
        $admin->status = 1;
        $admin->password = bcrypt('secret');
        $admin->save();

        $admin = new App\User();
        $admin->name = "Ilham Pratamo";
        $admin->nip_nim = "1311521037";
        $admin->email = "ilham@pratamo.com";
        $admin->role_id = $roleWr;
        $admin->status = 1;
        $admin->password = bcrypt('secret');
        $admin->save();

        $admin = new App\User();
        $admin->name = "Ilham Pratami";
        $admin->nip_nim = "1311521039";
        $admin->email = "ilham@pratami.com";
        $admin->role_id = $roleKbsd;
        $admin->password = bcrypt('secret');
        $admin->status = 1;
        $admin->save();

        $admin = new App\User();
        $admin->name = "Ilham Pratamu";
        $admin->nip_nim = "1311521040";
        $admin->email = "ilham@pratamu.com";
        $admin->role_id = $roleKsbu;
        $admin->password = bcrypt('secret');
        $admin->status = 1;
        $admin->save();

        $admin = new App\User();
        $admin->name = "Ilham Pr";
        $admin->nip_nim = "1311521002";
        $admin->email = "ilham@pratam.com";
        $admin->role_id = $roleKsbrt;
        $admin->password = bcrypt('secret');
        $admin->status = 1;
        $admin->save();
        factory(App\User::class, 10)->create();

        $r = [
          "Ruangan Tengah PKM",
          "G. Seminar E LT. 2",
          "Seminar PKM lT. 1",
          "G. Seminar F",
          "Convention Hall",
          "Aula Jati",
          "Lapangan Bola Kaki",
          "Mess Uanand",
          "Lap. Basket/Volley",
          "R. Rapat Senat Audit.",
          "Parkir/Lobi PKM",
          "Ruang Studio LT. 2 PKM",
          "G. Kuliah G/H",
          "G. Kuliah A/B",
          "G. Kuliah E/F",
          "G. Kuliah C/D",
          "G. Kuliah I",
          "Pustaka LT. 6",
          "Auditorium",
        ];


        App\Models\Penjaga::truncate();
        App\Models\Ruangan::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $faker = new Faker();
        foreach ($r as $key => $value) {
            $ruangan = new \App\Models\Ruangan();
            $ruangan->nama_ruangan = $value;
            if ($value == "Convention Hall") {
                $ruangan->need_wr_conf = 1;
            }
            $ruangan->kapasitas = rand(50, 300);
            factory(App\Models\Penjaga::class, 1)->create();
            $p = \App\Models\Penjaga::all()->last()->id;
            $ruangan->penjaga_id = $p;
            $ruangan->save();
        }
    }
}
