<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\TenantPost;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator;
use Illuminate\Container\Container;

class InstallationSeeder extends Seeder
{
     /**
     * The current Faker instance.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * Create a new seeder instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

      /**
     * Get a new Faker instance.
     *
     * @return \Faker\Generator
     */
    protected function withFaker()
    {
        return Container::getInstance()->make(Generator::class);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ## Create Tenant
        $tenant = Tenant::create([
            'name' => Str::random(10),
            'token' => Str::random(10),
        ]);

        ## Create Tenant Users
        User::create([
            'email' => Str::random(10).'@gmail.com',
            'tenant_id' => $tenant->id
        ]);

        ## Tenant Posts
        TenantPost::create([
            'tenant_id' => $tenant->id,
            'title' => $this->faker->title(),
            'post' => $this->faker->paragraph(),
        ]);
    }
}
