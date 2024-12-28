<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactMessageRequest;
use App\Models\Product;
use App\Models\Product_categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\ContactMail;
use App\Models\Address;
use App\Models\Contact;
use App\Models\Page;
use App\Models\Partener;
use App\Models\Section;
use App\Models\Slider;
use App\Models\Service;
use App\Models\Team;

class HomeController extends Controller
{

    public function index()
    {
        $pageExist = Page::Active()->MainPages()->where('id', 1)->first();
        $slides = Slider::orderBy('order', 'asc')->get();
        $teams = Team::all();
        $parteners = Partener::all();
        $sections = Section::Active()->whereHas('page', function ($query) {
            return $query->where('name', 'home');
        })->orderBy('order')->get();

        // Specify the exact path to the view
        return view('website.eei.pages.home')->with([
            'page' => $pageExist,
            'slides' => $slides,
            'parteners' => $parteners,
            'teams' => $teams,
            'sections' => $sections
        ]);
    }

    // public function getCategories(){
    //     $categories = Product_categories::get();
    //     return view('website.eei.partial.header')->with('categories', $categories);
    // }
    public function page($page)
    {
        $pageExist = Page::Active()->MainPages()->WithoutHome()->where('link', $page)->first();
        return $pageExist
            ? view('website.' . config('dashboard.theme_name') . '.pages.' . $page)->with([
                'page' => $pageExist,
                'sections' => Section::Active()->where('page_id', $pageExist->id)->orderBy('order')->get(),
                'teams' => Team::all(),
                'services' => Service::get(),
            ])
            : abort('404');
    }

    public function contact()
    {
        $new_address = Address::first();
        return view('website.' . config('dashboard.theme_name') . '.pages.contact')->with('new_address', $new_address);
    }

    public function contactMessage(StoreContactMessageRequest $request)
    {
        try {
            DB::beginTransaction();
            $new = Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'subject' => $request->subject,
                'message' => $request->message
            ]);
            DB::commit();
            // $site_email = config('settings.email');
            // try {
            //     Mail::to($site_email)->send(new ContactMail($request->name, $request->email, $request->phone, $request->subject, $request->message));
            // } catch (\Exception $e) {
            //     Session::flash('error', 'something went wrong for sending email');
            // }
            Session::flash('success', 'Message sent successfully');
        } catch (\Exception $e) {
            Session::flash('error', 'something went wrong');
        }

        return Redirect::back();
    }

    public function serviceDetails($serviceId)
    {
        $service = Service::where('id', $serviceId)->first();

        return $service
            ? view('website.' . config('dashboard.theme_name') . '.pages.service-details')->with(['service' => $service])
            : abort('404');
    }
}
