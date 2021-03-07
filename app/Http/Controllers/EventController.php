<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Support\Facades\Auth;
use App\MemberBioData;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Event;
use Illuminate\Support\Facades\DB;
use App\EventBookingEntry;
use App\EventBookingEntryDelegates;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class EventController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth')->only('memberRegistration');
    }

    public function index()
    {
        $current_date = \DateTime::createFromFormat('Y-m-d H:i:s.u', date("Y-m-d H:i:s.u"));
        $eventbookingentry = new Event();
        $events = Event::orderBy("Start_Date", "asc")->where('Status',1)->paginate(5);
        // echo ($events->Eventpricing);
        return view('/events/event')->with('records', $events);
    }

    public function admin() {
        if(!Auth::user()->Admin)
        {
            return redirect('/events');
        }
        $current_date = \DateTime::createFromFormat('Y-m-d H:i:s.u', date("Y-m-d H:i:s.u"));
        $eventbookingentry = new Event();
        $events = Event::orderBy("From_Date", "desc")->where('From_date', '>=', $current_date)->paginate(5);
        return view('events/admin/dashboard')->with('records', $events);
    }

    public function getRegEventView($id, Request $request)
    {
        $data = array();
        $member = new \App\MemberBioData();
        $data['member'] = $member;
        switch ($request->type) {
            case "member":
                $member = Auth::user()->member;
                break;
        }
        return view('/events/reg_view/' . $id)->with('data', $data);
    }

    public function show($id)
    {    $upcomming=Event::take(3)->orderBy('Start_Date','ASC')->where('Status',1)->get();
   
        $data = Event::find($id);
        return view('events/read_more')->with('data', $data)->with('upcomming',$upcomming);
    }

    public function category($id)
    {
        $current_date = \DateTime::createFromFormat('Y-m-d H:i:s.u', date("Y-m-d H:i:s.u"));
        $records = Event::where('Type', $id)->where('Start_Date', '>=', $current_date)->orderBy("End_Date", "desc")->paginate(5);
        return view('events/event')->with('records', $records);
    }

    public function admincategory($id)
    {
        $current_date = \DateTime::createFromFormat('Y-m-d H:i:s.u', date("Y-m-d H:i:s.u"));
        $records = Event::where('Type', $id)->where('Start_Date', '>=', $current_date)->orderBy("End_Date", "desc")->paginate(5);
        return view('events/admin/dashboard')->with('records', $records);
    }

    public function eventbookingshistory()
    {
        if(!Auth::user())
        {
            return redirect('events');
        }
    $memberno=Auth::user()->member->Member_No;
    $history =EventBookingEntry::where('Member_No',$memberno)->where('Confirmed',TRUE)->get();
    
    return view('events/eventbookinghistory')->with('history',$history);   
        
    }


    public function registration($id, Request $request)
    {

        $data = array();
        $member = new \App\MemberBioData();
        $data['member'] = $member;
        $data['event'] = Event::find($id);
        $data['type'] = $request->type;
        return view('events/reg_view/registration_form_0')->with('data', $data)->with('event_id', Session::get('Event_Id'));
    }

    public function memberRegistration($id, Request $request)
    {    
        $data = array();
        $data['member'] = Auth::user()->member;
        if (!Auth::user()->member)
            return redirect('events/registration/'.$id);
        
        if (Auth::user()->member->Is_Company == false) {
            $data['type'] = 'Individual';
        } else {
            $data['type'] = 'Company';
        }
        $data['event'] = Event::find($id);

        if (Auth::user()->member) {
            redirect('billing');
        }


        return view('events/reg_view/registration_form_0')->with('data', $data)->with('event_id', Session::get('Event_Id'));
    }
    public function finish($id)
    {
        $id1=  \Illuminate\Support\Facades\Crypt::decrypt($id);
        $eventbookingentry = EventBookingEntry::find($id1);
        $eventbookingentry->Confirmed=True;
        $eventbookingentry->save();
        
        return redirect('/events');
    }

    public function pdf($id ,Request $request) {
        
        $id1=  \Illuminate\Support\Facades\Crypt::decrypt($id);


        $eventbookingentry = EventBookingEntry::find($id1);
        
        $eventbookingentry->Confirmed=True;
        $eventbookingentry->save();
        $currency = $eventbookingentry->Event->EventPricing->where('Membership_Type', 0)->first()->Currency;
        $total_cost = $this->getTotal($eventbookingentry);
       $earlybird=$eventbookingentry->Event->EventPricing->where('Training_Event_Code', $eventbookingentry->Event_Id)->first()->Early_Bird_CutOff_Date;
       $earlybird = date_create($earlybird);
       $data['amount_in_words'] =$this->convert_number_to_words($total_cost+($total_cost*(16/100)));
       $data['earlybird']=$earlybird;
       $data['delegates'] = $eventbookingentry;
        $data['currency'] = $currency;
        $data['total'] = $total_cost;
        $pdf = \PDF::loadView('eventinvoice', $data);

        $download="/events/invoicepdf/".$id;
        $cancel="/events/cancel/".$id1."? token=".$eventbookingentry->Cancelled_token;
         
//    Mail::send('events.event_table.invoice_table',['cancel'=>$cancel,'download'=>$download,'token' => $eventbookingentry->Cancelled_token,'delegates'=>$eventbookingentry,'currency' =>$currency,'total'=>$total_cost ],
//            function($message) use ($eventbookingentry, $pdf) 
//       {
//                    $message->to($eventbookingentry->Contact_Email,$eventbookingentry->Contact_Person)->subject('Kism Events Portal');
//            
//                    
//                    
//       });
       return $pdf->stream('temp.pdf');
    }

   private function convert_number_to_words($number) {

    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . $this->convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = $this->convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= $this->convert_number_to_words($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return $string;
}
    
    public function cancel($id,Request $request)
    {
     $token=$request->token;
     $eventbookingentry=EventBookingEntry::where('id',$id)->where('Cancelled_token',$token)->first();
     $eventbookingentry->Confirmed=FALSE;
     $eventbookingentry->save();
     
     return redirect("/events");
    }

    public function eventregistration(Request $request)
    {
        $reg_no=\App\Helpers\Helper::UUID();
        $eventbookingentry = new EventBookingEntry();
        $eventbookingentry->fill($request->event_entry);
        $eventbookingentry->Registration_No=$reg_no;
        $eventbookingentry->save();
       
        $id = $eventbookingentry->Registration_No;
        $cancelled_token=  \Illuminate\Support\Facades\Crypt::encrypt($eventbookingentry->id
                .time());
        
          $eventbookingentry1 = EventBookingEntry::where('Registration_No',$id)->first();
          $eventbookingentry1->Cancelled_token=$cancelled_token;
          $eventbookingentry1->save();

        
        
        
        if ($request->attendees) {
            foreach ($request->attendees as $x) {
                $eventdelegateentry = new EventBookingEntryDelegates();
                $eventdelegateentry->Registration_No = $id;
                if (isset($x['Member_No'])) {
                    $member = MemberBioData::where('Member_No', $x['Member_No'])->first();
                    if (!$member)
                        continue;
                    $eventdelegateentry->ID_Number = $member->ID_Number;
                    $eventdelegateentry->E_mail = $member->E_mail;
                    $eventdelegateentry->Member_No = $member->Member_No;
                    $eventdelegateentry->PIN_Registration_No = $member->PIN_Registration_No;
                    $eventdelegateentry->Phone_No = $member->Phone_No;
                    $eventdelegateentry->Names = $x['Names'];
                    $eventdelegateentry->Comments = "Member";
                    $eventdelegateentry->save();
                } else {
                    $eventdelegateentry->fill($x);
                    $eventdelegateentry->save();
                }
            }
        } elseif (!$request->attendess || count($request->attendees) == 0) {
            $member_no = $request->event_entry['Member_No'];
            $member = MemberBioData::where('Member_No', $member_no)->first();
            $eventdelegateentry = new EventBookingEntryDelegates();
            $eventdelegateentry->Registration_No = $id;

            if (!$member_no) {
                $eventdelegateentry->ID_Number = $request->event_entry['PIN_Registration_No'];
                $eventdelegateentry->E_mail = $request->event_entry['E_mail'];
                $eventdelegateentry->Member_No = "";
                $eventdelegateentry->Phone_No = $request->event_entry['Phone_No'];
                $eventdelegateentry->Names = $request->event_entry['Contact_Person'];
                $eventdelegateentry->save();
            } else {
                $eventdelegateentry->Id_Number = $member->ID_Number;
                $eventdelegateentry->E_mail = $member->E_mail;
                $eventdelegateentry->Member_No = $member->Member_No;
                $eventdelegateentry->Mobile = $member->Mobile_No;
                $eventdelegateentry->Names = $member->Other_Names . $member->Sirname;
                $eventdelegateentry->Comments = "Member";
                $eventdelegateentry->save();
            }
        }
        
       
       $currency = $eventbookingentry->Event->EventPricing->first()->Currency;
       
       
        $total_cost = $this->getTotal($eventbookingentry);
       $save_total_for_entry= EventBookingEntry::find($id);
       $save_total_for_entry->Gross_total=$total_cost;
       $net_total=$total_cost+($total_cost*(16/100));
       $save_total_for_entry->Net_total=$net_total;
       $save_total_for_entry->save();
       return view('events/reg_view/invoice')->with('total', $total_cost)->with('delegates', $eventbookingentry)->with('currency', $currency);

    }

    private function getTotal($eventbookingentry)
    {
        $event_pricing = $eventbookingentry->Event->EventPricing->first();
        $early_bird_date = $event_pricing->Early_Bird_Booking_Cutoff;
        $current_date = \DateTime::createFromFormat('Y-m-d H:i:s.u', date("Y-m-d H:i:s.u"));
        $early_date = \DateTime::createFromFormat('Y-m-d H:i:s.u', $early_bird_date);
        $currency = $eventbookingentry->Event->EventPricing->where('Early_Bird', "1")->where('Type', 'member')->first()->Currency;
        $early_bird_rate_member = (float)$eventbookingentry->Event->EventPricing->where('Early_Bird', "1")->where('Type', 'member')->first()->Price;
        $early_bird_rate_non_member = (float)$eventbookingentry->Event->EventPricing->where('Early_Bird', "1")->where('Type', 'non_member')->first()->Price;
        $normal_rate_member = (float)$eventbookingentry->Event->EventPricing->where('Early_Bird', "0")->where('Type', 'member')->first()->Price;
        $normal_rate_non_member = (float)$eventbookingentry->Event->EventPricing->where('Early_Bird', "0")->where('Type', 'non_member')->first()->Price;

        $non_member = true;
        $total_cost = 0;
        if ($eventbookingentry->Member_No == Null) {
            foreach ($eventbookingentry->Delegates as $a) {
                if ($a->Member_No == Null) {
                    $total_cost = $total_cost + $early_bird_rate_non_member;
                    $a->Cost = $early_bird_rate_non_member;
                } else {
                    $total_cost = $total_cost + $early_bird_rate_member;
                    $a->Cost = $early_bird_rate_member;
                }
            }
        } else {
            foreach ($eventbookingentry->Delegates as $y) {
                $total_cost = $total_cost + $early_bird_rate_member;
                $y->Cost = $early_bird_rate_member;
            }
        }
        return $total_cost;
    }

    public function event_edit($id)
    {
         if(!Auth::user()->Admin)
        {
            return redirect('/events');
        }
        $data = Event::find($id);

        return view('events/editevent')->with('data', $data);
    }

    public function save_edit(Request $request, $id)
    {
         if(!Auth::user()->Admin)
        {
            return redirect('/events');
        }
        
        $Event = Event::find($id);
        $Event->Event_Description = $request->editdesc;
        $Event->save();
        return back()->with('data', $Event);
    }

    public function postpicture(Request $request, $id)
    {
        $file = $request->file('picture');
        $filename = $file->getClientOriginalName();
        $path = "assets/images/events/" . $filename;
        // Storage::disk('public')->put($path,  file_get_contents($file));
        Storage::disk('local')->put($path, file_get_contents($file));
        $Event = Event::find($id);
        $Event->Venue_Image = $filename;
        $Event->save();
        return back()->with('data', $Event);
    }

    public function postpictures(Request $request, $id)
    {
        $file = $request->file('picture');
        $filename = $file->getClientOriginalName();
        $path = "assets/images/events/".$id."/".$filename;
        // Storage::disk('public')->put($path,  file_get_contents($file));
        Storage::disk('local')->put($path, file_get_contents($file));
        return url("/eventimage/")."/".$id."?name=".$filename;
    }

    public function getImage($id, Request $request)
    {
        if($request->name)
            $file = File::get(storage_path('app/assets/images/events/' . $id.'/'.$request->name));
        else
            $file = File::get(storage_path('app/assets/images/events/' . $id));
        $response = Response::make($file, 200);
        $response->header('Content-Type', 'image');
        $response->header('Content-Disposition', 'attachment;filename="' . $id . '"');
        return $response;
        return response()->download();
    }

    public function nonmember($id)
    {
        $data = Event::find($id);
        // return view('events/read_more')->with('data', $data);
        return view('events/reg_view/nonmember')->with('x', $data);
    }
 
}
