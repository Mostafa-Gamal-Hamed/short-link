<?php

namespace App\Http\Controllers;

use App\Models\Admin\Ads;
use App\Models\Admin\WebsiteName;
use App\Models\ContactUs;
use App\Models\Url;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Spatie\Analytics\Facades\Analytics;
use Spatie\Analytics\Period;
use Carbon\Carbon;



class HomeController extends Controller
{
    public function home()
    {
        if (Auth::user() && Auth::user()->role == 'admin') {
            // Count
            $num = 1;
            // Site name
            $siteName = WebsiteName::all();

            //// Pages
            // Show pages
            $path  = resource_path('views/user/pages');
            $files = File::files($path);
            foreach ($files as $file) {
                $fileName = pathinfo($file, PATHINFO_FILENAME);
                $fileName = str_replace('.blade', '', $fileName);
                $pageName[]  = $fileName;
            }
            $pageMax = array_slice($pageName, 0, 10);
            // Hiding pages
            $hidePath  = resource_path('views/user/hide');
            $hideFiles = File::files($hidePath);
            if (File::files($hidePath) != NULL) {
                foreach ($hideFiles as $file) {
                    $fileName = pathinfo($file, PATHINFO_FILENAME);
                    $fileName = str_replace('.blade', '', $fileName);
                    $hidePageName[]  = $fileName;
                }
                $hidePageMax = array_slice($hidePageName, 0, 10);
            } else {
                $hidePageMax = [];
            }

            // Pages count
            $showPageCount = count($files);
            $hidePageCount = count($hideFiles);
            $pagesCount    = $showPageCount + $hidePageCount;

            // Users
            $users = User::where('role', 'user')->take(10)->get();

            // Users count
            $usersCount = User::where("role", "user")->count();

            // Messages
            $messages = ContactUs::take(10)->get();

            // Ads
            $ads = Ads::take(10)->get();
            // Ads count
            $adsCount = Ads::count();

            // Google analytics
            $startDate = Carbon::now()->subYear();
            $endDate = Carbon::now();
            $visitors = Analytics::fetchVisitorsAndPageViews(Period::create($startDate, $endDate));

            return view('admin.الرئيسية', compact("pagesCount", "usersCount", "adsCount", "users", "ads", "messages",
            "num", "siteName", "pageMax", "hidePageMax", "visitors"));
        } else if (Auth::user()) {
            // Site name
            $siteName = WebsiteName::first();
            $count = Url::where("user_id", Auth::user()->id)->count();
            return view('user.الرئيسية', compact("siteName","count"));
        } else {
            return redirect()->back();
        }
    }
}
