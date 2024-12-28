<?php

namespace App\Console\Commands;

use App\Models\Page;
use App\Models\User;
use App\Models\Setting;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ProjectPrepare extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:prepare';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'prepare required commands for project';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //add superadmin account if admins empty
        if (User::count() <= 0) {
            Artisan::call('db:seed', ['--class' => 'AdminSeeder']);
        }

        //add settings if setting empty
        if (Setting::count() <= 0) {
            Artisan::call('db:seed', ['--class' => 'SettingSeeder']);
        }

        //add pages if pages empty
        if (Page::count() <= 0) {
            Artisan::call('db:seed', ['--class' => 'PagesSeeder']);
        }

        Artisan::call('storage:link');
        echo 'Prebare Done';
    }
}
