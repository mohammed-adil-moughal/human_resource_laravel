<?php

namespace App\Console;

use App\AcademicQualification;
use App\CompetencyArea;
use App\County;
use App\Helpers\NavRoutines;
use App\IndustrySector;
use App\Institution;
use App\MemberBioData;
use App\MemberExperience;
use App\MembershipTypes;
use App\MemberTraining;
use App\ProfQualifications;
use App\QualificationType;
use Mockery\CountValidator\Exception;
use NavRouter;
use DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $this->updateDB();
        })->everyMinute();
    }

    private function updateDB()
    {
        NavRoutines::run();
    }
}
