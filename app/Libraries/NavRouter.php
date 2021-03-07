<?php
use App\Helpers\Helper;

class NavRouter{
    const GET_QUALFTYPES = "QualfTypes";
    const GET_COMPETENCY = "ComptencyAreas";
    const GET_MEMBERTYPES = "MemberTypes";
    const GET_INSTITUTIONS = "Institutions";
    const GET_SECTORS = "IndustrySectors";
    const GET_COUNTIES = "Counties";
    const GET_GRADELEVELS = "GradeLevels";
    const GET_PARENTINSTITUTIONS = "Parentinstitutions";
    const GET_SUBSCRIPTION_PERIODS = "SubscriptionPeriods";
    const GET_OPENEVENTS = "OpenEvents";
    const GET_EVENTTYPES = "EventTypes";
    const GET_EVENTCOSTS = "EventCosts";
    const GET_EVENTENTRIES = "GetEventEntries";
    const GET_EVENTDELEGATES = "GetEventDelegates";

    const GET_MEMBERS = "Members";
    const GET_MEXPERIENCES = "MemberExperiences";
    const GET_MACADQUALFS = "MemberAcadQualfs";
    const GET_MTRAININGS= "MemberTrainings";
    const GET_MPROFQUALFS = "MemberProfQualfs";
    const GET_MBILLINGS = "MemberBillings";
    const GET_MSUBSCRIPTIONS = "MemberSubscriptions";

    const GET_UNSYNCHEDMEMBERS = "UnSynchedMembers";
    const GET_UNSYNCHEDMEXPERIENCES = "MemberUnsynchedExperiences";
    const GET_UNSYNCHEDMACADQUALFS = "MemberUnsynchedAcadQualfs";
    const GET_UNSYNCHEDMTRAININGS= "MemberUnsynchedTrainings";
    const GET_UNSYNCHEDMPROFQUALFS = "MemberUnsynchedProfQualfs";

    const POST_MEMBER = "InsertMember";
    const POST_MEMBERS = "InsertMembers";
    const POST_MEXPERIENCES = "InsertMemberExperiences";
    const POST_MACADQUALFS = "InsertMemberAcademicQualfs";
    const POST_MPROFQUALFS = "InsertMemberProfQualfs";
    const POST_MTRAININGS = "InsertMemberTrainings";
    const POST_EVENTENTRY = "InsertEventEntry";
    const POST_EVENTDELEGATE = "InsertEventDelegate";

    const UPDATE_MEMBER = "UpdateMember";
    const UPDATE_MEXPERIENCE = "UpdateMemberExperience";
    const UPDATE_MACADQUALF = "UpdateMemberAcadQualf";
    const UPDATE_MTRAINING = "UpdateMemberTraining";
    const UPDATE_MPROFQUALF = "UpdateMemberProfQualf";
    const END_POINT = "http://192.168.1.102:8888/MandolinRouter.Mandolin.svc/Mandolin";

    private static $date_fields =['Date_Created','Application_Date','Date_Of_Birth','Date_Sent_for_Approval', 'Certificate_Date', 'Membership_Date',
        'Last_Renewal_Date', 'Certificate_Time', 'From_Date', 'Last_TimeStamp', 'Date','End_Date', 'Close_Date', 'To_Date', 'From', 'To', 'Start_Date', 'Date_Passed', 'created_at',
        'Certificate_Print_Date', 'Certificate_Collection_Date', 'Cert_No_Gen_Date', 'Card_Print_Date', 'Card_Collection_Date', 'updated_at', 'Review_Date', 'Date_Of_Meeting',
        'Booking_Cut_Off_Date', 'Early_Bird_CutOff_Date',
        ];

//    const END_POINT = "http://kineticssvr/MandolinRouter.Mandolin.svc/Mandolin/";
//    const END_POINT = "http://127.0.0.1:8090/MandolinRouter.Mandolin.svc/Mandolin";
//    const END_POINT = "http://192.168.0.102:8090/Mandolin/MandolinRouter.Mandolin.svc/Mandolin/";

    private  $client;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client(['base_uri' => NavRouter::END_POINT]);
    }

   // posts

    public function postMemberBioData($data)
    {
        return $this->post('InsertMember', $data);

    }

    public function getInstitutions()
    {
        return $this->get('Institutions');
    }

    public function postMemberBioDatas($data)
    {
        return $this->post('InsertMembers', $data);
    }

    public function updateMemberBioData($data)
    {
        return $this->post('UpdateMember', $data);
    }

    public function postMemberExperiences($data)
    {
        return $this->post('InsertMemberExperience', $data);

    }

    public function postMemberAcademicQualfs($data)
    {
        return $this->post('InsertMemberAcademicQualfs', $data);
    }

    public function postMemberTrainings($data)
    {
        return $this->post('InsertMemberTrainings', $data);
    }

    public function postProfQualfs($data)
    {
        return $this->post('InsertMemberProfQualfs', $data);
    }


    public function get($path)
    {
        $url = NavRouter::END_POINT."/".$path;
        $data = array();
        $reponse = $this->client->get( $url);
        $json = $reponse->getBody();
        if($json)
        {
            $json = json_decode($json, true);
            $data = reset($json);
        }
        return $this->convertJSONtoDates($data);

    }

    public function post($path, $data)
    {

        $data = $this->convertDatestoJSON($data);
        echo  json_encode($data);
        $url = NavRouter::END_POINT."/".$path;
        if($data == null || $path == null )
            return array();

        $json = array();
        $json['value'] = $data;
        $reponse = $this->client->request('POST', $url, ['json' => $json]);
        return $reponse->getBody()->getContents();

    }

    public function convertDatestoJSON($datas)
    {
        $is_assosiative = Helper::has_string_keys($datas);
        $new_array = array();
        foreach($datas as $data){
            if($is_assosiative) $data = $datas;
            foreach (NavRouter::$date_fields as $date_field)
            {
                if(isset($data[$date_field]))
                {
                    $data[$date_field] = Helper::convertDateToJSON($data[$date_field]);
                }
            }

            if($is_assosiative) return $data;

            array_push($new_array, $data);
        }
        return $new_array;
    }

    public function convertJSONtoDates($datas)
    {
        $new_datas = array();
        foreach ($datas as $data)
        {
            foreach (NavRouter::$date_fields as $date_field)
            {
                if(isset($data[$date_field]))    $data[$date_field] = Helper::convertJSONToDate($data[$date_field]);
            }
            array_push($new_datas, $data);
        }

        return $new_datas;
    }
}
