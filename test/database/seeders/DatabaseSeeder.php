<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ContractModel;
use App\Models\group_sim;
use App\Models\SimModel;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\countOf;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            User::factory()
                    ->create([
                        'name' => 'admin' . $i,
                        'email' => 'admin' . $i . '@mail.ru',
                        'password' => Hash::make('adminpass'),
                        'is_admin' => 1
                    ]);
        }
        $users = User::factory(40)->create();
        $contracts = ContractModel::factory(10)->create()->each(function ($contract) {
            $contract->sims()->saveMany(SimModel::factory(20)->make());
        });
        foreach ($contracts as $contract) {
                $usersIds = $users->random(2)->pluck('id');
                $contract->users()->attach($usersIds);
        }
        $group_sim = group_sim::factory(20)->create();
        $sims = SimModel::all();
        foreach ($sims as $sim) {
                $gruopsIds = $group_sim->random(3)->pluck('id');
                $sim->groups()->attach($gruopsIds);
        }
        // User::factory()->create([
        //         'name' => 'Кирилл',
        //         'email' => 'artk_007@mail.ru',
        //         'email_verified_at' => null,
        //         'password' => '$2y$10$qQ6a98TSYTX1F8Hi4EqXi.Gpbhq9EBei7oMC60DnOCIWN67SZfQ4.',
        //         'remember_token' => null,
        //         'is_admin' => 1
        //     ])->each(function ($user) {
        //         $user->contracts()->saveMany($contract = ContractModel::factory(1)->make());
        //         $contract[0]->sim()->save(SimModel::factory()->make());
        //     });
        // $users = User::factory(10)->create()->each(function ($user) {
        //     $user->contracts()->saveMany($contract = ContractModel::factory(1)->make());
        //     $contract[0]->sim()->save(SimModel::factory()->make());
        // });
        // $group_sim = group_sim::factory(20)->create();
        // $sims = SimModel::all();
        // foreach ($sims as $sim) {
        //     $gruopsIds = $group_sim->random(3)->pluck('id');
        //     $sim->group()->attach($gruopsIds);
        // }
    }
}
