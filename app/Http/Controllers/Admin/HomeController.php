<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NewsLetter;
use App\Models\Contact;
use App\Models\CorporateEnquiry;
use App\Models\DealershipBooking;

class HomeController extends Controller
{
    public function index(Request $request)
    {
    	return view('admin.home');
    }

    public function newsletter(Request $request)
    {
    	$data = NewsLetter::orderBy('id','desc')->paginate(10);
    	return view('admin.newsletter.index',compact('data'));
    }

    public function deleteNewsLetter(Request $request)
    {
    	$data = NewsLetter::find($request->id);
    	$data->delete();
    	return back()->with('flash_success', 'News Letter deleted successfully');
    }

    public function contacts(Request $request)
    {
        $data = Contact::orderBy('id','desc')->paginate(10);
        return view('admin.contacts.index',compact('data'));
    }

    public function deleteContacts(Request $request)
    {
        $data = Contact::find($request->id);
        $data->delete();
        return back()->with('flash_success', 'Contact Message deleted successfully');
    }

    public function dealershipBooking()
    {
        $data = DealershipBooking::orderBy('id','desc')->paginate(10);
        return view('admin.dealership-bookings.index',compact('data'));
    }

    public function corporateEnquiry()
    {
        $data = CorporateEnquiry::orderBy('id','desc')->paginate(10);
        return view('admin.corporate-enquiry.index',compact('data'));
    }

    public function deleteDealership(Request $request)
    {
        $data = DealershipBooking::find($request->id)->delete();
        return back()->with('flash_success', 'Record Deleted successfully');
    
    }
    public function deleteCorporate(Request $request)
    {
        $data = CorporateEnquiry::find($request->id)->delete();
        return back()->with('flash_success', 'Record deleted successfully');
    }
}
