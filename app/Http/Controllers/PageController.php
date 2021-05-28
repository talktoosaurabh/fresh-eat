<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CorporateEnquiry;
use App\Models\DealershipBooking;
use App\Models\Contact;
use Mail;

class PageController extends Controller
{
    public function about()
    {
        $title = "About | Fresh Eat";
        $desc = "About | Fresh Eat";
    	return view('pages.about',compact('title','desc'));
    }
	 public function corporateEnquiry()
    {
        $title = "Corporate Enquiry | Fresh Eat";
        $desc = "Corporate Enquiry | Fresh Eat";
    	return view('pages.corporate-enquiry',compact('title','desc'));
    }
	 public function dealershipBooking()
    {
        $title = "Dealership Booking | Fresh Eat";
        $desc = "Dealership Booking | Fresh Eat";
    	return view('pages.dealership-booking',compact('title','desc'));
    }
    public function contact()
    {
        $title = "Contact | Fresh Eat";
        $desc = "Contact | Fresh Eat";
    	return view('pages.contact',compact('title','desc'));
    }

    public function blogs(){
        $title = "Blogs | Fresh Eat";
        $desc = "Blogs | Fresh Eat";
        return view('pages.blogs',compact('title','desc')); 
    }
	
	public function returnpolicy(){
        $title = "Return Policy | Fresh Eat";
        $desc = "Return Policy | Fresh Eat";
        return view('pages.return_policy',compact('title','desc')); 
    }

    public function privacyPolicy()
    {
        $title = "Privacy Policy | Fresh Eat";
        $desc = "Privacy Policy | Fresh Eat";
    	return view('pages.privacy-policy',compact('title','desc'));
    }

    public function termsCondtion()
    {
        $title = "Terms and Condition | Fresh Eat";
        $desc = "Terms and Condition | Fresh Eat";
    	return view('pages.terms-condition',compact('title','desc'));
    }

    public function saveDealershipBooking(Request $request)
    {
        $contact = new DealershipBooking;
        $contact->firstname = $request->firstname;
        $contact->lastname = $request->lastname;
        $contact->company_name = $request->company_name;
        $contact->address = $request->address;
        $contact->city = $request->city;
        $contact->state = $request->state;
        $contact->contact_number = $request->contact_number;
        $contact->email_address = $request->email_address;
        $contact->business_desc = $request->business_desc;
        $contact->save();
        return back()->with('flash_success_conact', 'Thank You We will get back to you');
    }
	
	public function saveContactEnquiry(Request $request){
        $this->validate($request, [
            'name' => 'required|string',
            'phone' => 'required',
            'subject' => 'required',
            'email' => 'required'
        ]);
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();
        $data = ['header_message' => $request->name.' has been contacted you.',
                'email' => $request->email,
                'name' => $request->name,
                'phone' => $request->phone,
                'subject' => $request->subject,
                'send_message' => $request->message,
                'send_mail' => env('ADMIN_EMAIL'),
				'address' => 'info@fresheat.in',
				'site_name' => 'Fresh Eat',];
		
        $send_mail = env('ADMIN_EMAIL');
        Mail::send('mail.contact_email',$data,function($message)use($data){
            $message->from($data['address'], $data['site_name'])->subject($data['header_message']);
            $message->to($data['send_mail']);
        });
        return back()->with('flash_success', 'Thank You We will get back to you');

    }

    public function saveCorporateEnquiry(Request $request)
    {
        $contact = new CorporateEnquiry;
        $contact->firstname = $request->firstname;
        $contact->lastname = $request->lastname;
        $contact->company_name = $request->company_name;
        $contact->address = $request->address;
        $contact->city = $request->city;
        $contact->state = $request->state;
        $contact->contact_number = $request->contact_number;
        $contact->email_address = $request->email_address;
        $contact->business_desc = $request->business_desc;
        $contact->save();
        return back()->with('flash_success_conact', 'Thank You We will get back to you');
    }
	
	public function shipping_policies(){
		$title = "Shipping policy | Fresh Eat";
        $desc = "Shipping policy | Fresh Eat";
    	return view('pages.shipping_policy',compact('title','desc'));
	}
}
