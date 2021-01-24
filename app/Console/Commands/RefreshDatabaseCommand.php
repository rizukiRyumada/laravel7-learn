<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class RefreshDatabaseCommand extends Command
{

    /* ----------------------------- Membuat Command ---------------------------- */
    /**
     * masukkan perintah berikut
     *      php artisan make:command RefreshDatabaseCommand
     */

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ryu:database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Useful to refresh The Database and seed The Data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Intro
        $this->line('Migrating to refresh the database...');
        $this->warn('This will remove the older table and replaced it with the new one on this migration');

        // memanggil php artisan migrate:refresh
        $this->call('migrate:refresh');
        $this->line('');

        // memanggil php artisan db:seed dengan argument --class=ClassName
        $command_seeder = 'db:seed';
        $this->warn('Seeding Categories Table...');
        // memanggil command seeder untuk categories saja
        $this->call($command_seeder, ['--class' => 'CategoriesTableSeeder']);

        $this->warn('Seeding Tags Table...');
        // memanggil command seeder untuk tags saja
        $this->call($command_seeder, ['--class' => 'TagTableSeeder']);

        $this->warn('Seeding Users Table...');
        // memanggil command seeder untuk Users saja
        $this->call($command_seeder, ['--class' => 'UsersTableSeeder']);

        $this->line('');

        // Outro
        $this->info('The database was successfuly refreshed');
    }
}
