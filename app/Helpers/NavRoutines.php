<?php

namespace App\Helpers;
use App\AcademicQualification;
use App\EventType;
use App\CompetencyArea;
use App\County;
use App\Event;
use App\GradeLevel;
use App\IndustrySector;
use App\Institution;
use App\MemberBilling;
use App\MemberBioData;
use App\MemberExperience;
use App\MembershipTypes;
use App\MemberSubscription;
use App\MemberTraining;
use App\ParentInstitution;
use App\ProfQualifications;
use App\QualificationType;
use App\SubscriptionPeriod;
use App\EventPricing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class NavRoutines{
    private static $router;
    public static function run()
    {
        
        

        $router = new \NavRouter();
        
        NavRoutines::postEventModel($router, \App\EventBookingEntry::class, \NavRouter::POST_EVENTENTRY);
        NavRoutines::postEventModel($router, \App\EventBookingEntryDelegates::class, \NavRouter::POST_EVENTDELEGATE);
        if(County::all()->count()  == 0) NavRoutines::getStaticData($router, County::class, \NavRouter::GET_COUNTIES );
        if(QualificationType::all()->count()  == 0) NavRoutines::getStaticData($router, QualificationType::class, \NavRouter::GET_QUALFTYPES );
        if(CompetencyArea::all()->count()  == 0)NavRoutines::getStaticData($router, CompetencyArea::class, \NavRouter::GET_COMPETENCY );
        if(MembershipTypes::all()->count()  == 0)NavRoutines::getStaticData($router, MembershipTypes::class, \NavRouter::GET_MEMBERTYPES );
        if(IndustrySector::all()->count()  == 0)NavRoutines::getStaticData($router, IndustrySector::class, \NavRouter::GET_SECTORS );
        if(ParentInstitution::all()->count()  == 0)NavRoutines::getStaticData($router, ParentInstitution::class, \NavRouter::GET_PARENTINSTITUTIONS );
        if(SubscriptionPeriod::all()->count()  == 0)NavRoutines::getStaticData($router, SubscriptionPeriod::class, \NavRouter::GET_SUBSCRIPTION_PERIODS );
        if(GradeLevel::all()->count()  == 0)NavRoutines::getStaticData($router, GradeLevel::class, \NavRouter::GET_GRADELEVELS );
        if(EventType::all()->count()  == 0)NavRoutines::getStaticData($router, EventType::class, \NavRouter::GET_EVENTTYPES );
        NavRoutines::getStaticData($router, EventPricing::class, \NavRouter::GET_EVENTCOSTS);
        NavRoutines::getStaticData($router, Event::class, \NavRouter::GET_OPENEVENTS);

        if(MemberBioData::all()->count()  == 0) NavRoutines::getMemberModel($router, MemberBioData::class, \NavRouter::GET_MEMBERS, \NavRouter::UPDATE_MEMBER);
        else NavRoutines::getMemberModel($router, MemberBioData::class, \NavRouter::GET_UNSYNCHEDMEMBERS, \NavRouter::UPDATE_MEMBER);

        if(MemberExperience::all()->count() == 0)NavRoutines::getMemberModel($router, MemberExperience::class, \NavRouter::GET_MEXPERIENCES, \NavRouter::UPDATE_MEXPERIENCE);
        else NavRoutines::getMemberModel($router, MemberExperience::class, \NavRouter::GET_UNSYNCHEDMEXPERIENCES, \NavRouter::UPDATE_MEXPERIENCE);

        if(AcademicQualification::all()->count() == 0)NavRoutines::getMemberModel($router, AcademicQualification::class, \NavRouter::GET_MACADQUALFS, \NavRouter::UPDATE_MACADQUALF);
        NavRoutines::getMemberModel($router, AcademicQualification::class, \NavRouter::GET_UNSYNCHEDMACADQUALFS, \NavRouter::UPDATE_MACADQUALF);

        if(ProfQualifications::all()->count() == 0)NavRoutines::getMemberModel($router, ProfQualifications::class, \NavRouter::GET_MPROFQUALFS, \NavRouter::UPDATE_MPROFQUALF);
        NavRoutines::getMemberModel($router, ProfQualifications::class, \NavRouter::GET_UNSYNCHEDMPROFQUALFS, \NavRouter::UPDATE_MPROFQUALF);

        if(MemberTraining::all()->count() == 0)NavRoutines::getMemberModel($router, MemberTraining::class, \NavRouter::GET_MTRAININGS, \NavRouter::UPDATE_MTRAINING);
        NavRoutines::getMemberModel($router, MemberTraining::class, \NavRouter::GET_UNSYNCHEDMTRAININGS, \NavRouter::UPDATE_MTRAINING);


        NavRoutines::postMembers($router);
        NavRoutines::postMemberModel($router, AcademicQualification::class, \NavRouter::POST_MACADQUALFS);
        NavRoutines::postMemberModel($router, MemberExperience::class, \NavRouter::POST_MEXPERIENCES);
        NavRoutines::postMemberModel($router, ProfQualifications::class, \NavRouter::POST_MPROFQUALFS);
        NavRoutines::postMemberModel($router, MemberTraining::class, \NavRouter::POST_MTRAININGS);

        NavRoutines::updateMemberModel($router, AcademicQualification::class, \NavRouter::UPDATE_MACADQUALF);
        NavRoutines::updateMemberModel($router, MemberExperience::class, \NavRouter::UPDATE_MEXPERIENCE);
        NavRoutines::updateMemberModel($router, ProfQualifications::class, \NavRouter::UPDATE_MPROFQUALF);
        NavRoutines::updateMemberModel($router, MemberTraining::class, \NavRouter::UPDATE_MTRAINING);

        NavRoutines::updateMembers($router);

        NavRoutines::getStaticData($router, MemberSubscription::class, \NavRouter::GET_MSUBSCRIPTIONS);
        NavRoutines::getStaticData($router, MemberBilling::class, \NavRouter::GET_MBILLINGS);


        NavRoutines::getInstitutions($router);



    }

    public static function getInstitutions(\NavRouter $router)
    {
        $institutions = $router->getInstitutions();

        foreach ($institutions as $x)
        {
            if($x['Code'] == null || $x['Code'] == "" || $x['Name'] == null )
                continue;
            $institution = new Institution();
            $institution->code = $x['Code'];
            $institution->name = $x['Name'];
            $institution->save();
        }
    }
    public static function getStaticData(\NavRouter $router,  $model, $path )
    {
        try{
            $datas = $router->get($path);
            foreach ($datas as $data)
            {
                try{

                    print_r($data);
                    $array = array();
                    array_push($array, $data);
                    $model::insert($array);
                }
                catch (\Exception $e)
                {
                    echo $e->getMessage();
                }
            }
        }
        catch (\Exception $e)
        {
            echo $e->getMessage();
        }

    }
    public static function postMemberModel(\NavRouter $router, $model, $path)
    {
        $datas = $model::where('Synched_Web', true)->whereNull('Last_TimeStamp')->get();
        foreach ($datas as $data){
            $array = array();
            array_push($array, $data->toArray());

            try{
                print_r( $router->post($path, $array));
                $data->Last_TimeStamp = date("Y-m-d H:i:s");
                $data->websave(false);
            }
            catch (\Exception $e)
            {
                $message = 'Function - postMemberModel('.$model.'): '.$e->getMessage();
                echo $message;
            }

        }
    }

    public static function updateMemberModel(\NavRouter $router, $model, $path)
    {
        $datas = $model::where('Synched_Web', true)->whereNotNull('Last_TimeStamp')->get();
        foreach ($datas as $data){
            $array = array();
            array_push($array, $data->toArray());
            try{
                print_r( $router->post($path, $array));
                $data->Last_TimeStamp = date("Y-m-d H:i:s");
                $data->websave(false);
            }
            catch (\Exception $e)
            {
                $message = 'Function - updateMemberModel('.$model.'): '.$e->getMessage();
                echo $message;
            }

        }
    }
    public static function getMemberModel(\NavRouter $router, $model, $path, $update_path)
    {
        try{
            //get all the data
            $datas = $router->get($path);

            // insert each data
            foreach ($datas as $data)
            {
                $new_array = [ $data ];
                print_r($data);
                try{

                    if(isset($data["NavRecID"]) && isset($data["Line_No"]) && $existing = $model::where(["NavRecID" => $data["NavRecID"], "Line_No" => $data["Line_No"]])->first() )
                    {
                        $existing->fill($data);
                        $existing->save();
                    }
                    elseif(isset($data["NavRecID"]) && isset($data["Line_no"]) && $existing = $model::where(["NavRecID" => $data["NavRecID"], "Line_no" => $data["Line_no"]])->first() )
                    {
                        $existing->fill($data);
                        $existing->save();
                    }
                    else{
                        $model::insert($new_array);
                    }
                }
                catch (\Exception $e)
                {
                    $message = 'Function - getMemberModel('.$model.'): \''.$e->getMessage();
                    Log::error($message);
                    echo $message;
                }
            }

            foreach ($datas as $data)
            {
                $data['Synched_Nav'] = "0";
                array_push($new_array, $data);
                $router->post($update_path, $data);
            }
        }
        catch (\Exception $e)
        {
            $message = 'Function - getMemberModel('.$model.'): \''.$e->getMessage();
            Log::error($message);
            echo $message;
        }
    }
    public static function postMembers(\NavRouter $router){
        try{
            $datas = MemberBioData::where('Synched_Web', true)->whereNull('Last_TimeStamp')->get();
            echo $datas;

            foreach ($datas as $data)
            {
               $router->postMemberBioData($data->toArray());
            }
            foreach ($datas as $data)
            {
                $data->Last_TimeStamp = date("Y-m-d H:i:s");
                $data->websave(false);
            }
        }
        catch (\Exception $e)
        {
            $message = 'Function - postMembers('.$e.'): \''.$e->getMessage();
            Log::error($message);
            echo $message;
        }
    }

    public static function updateMembers(\NavRouter $router){
        try{
            $datas = MemberBioData::where('Synched_Web', true)->whereNotNull('Last_TimeStamp')->get();
            foreach ($datas as $data)
            {
                echo $data;
                echo $router->post(\NavRouter::UPDATE_MEMBER, $data->toArray());
            }
            foreach ($datas as $data)
            {
                $data->Last_TimeStamp = date("Y-m-d H:i:s");
                $data->websave(false);
            }
        }
        catch (\Exception $e)
        {
            $message = 'Function - postMembers('.$e.'): \''.$e->getMessage();
            Log::error($message);
            echo $message;
        }
    }
    
    public static function postEventModel(\NavRouter $router, $model, $path)
    {
        try{
            $datas = $model::where('Synched_Web', true)->get();
            foreach ($datas as $data)
            {
                try{
                    echo $data;
                    echo $router->post($path, $data->toArray());
                } catch (Exception $ex) {

                }
            }
            foreach ($datas as $data)
            {
                $data->Synched_Web = false;
                $data->save();
            }
        }
        catch (\Exception $e)
        {
            $message = 'Function - postMemberModel('.$model.'): \''.$e->getMessage();
            Log::error($message);
            echo $message;
        }
    }
}
