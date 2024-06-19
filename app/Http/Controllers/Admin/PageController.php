<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Spatie\Navigation\Navigation;

class PageController extends Controller
{
    public function index()
    {
        $num   = 1;
        // Get files
        $path  = resource_path('views/user/pages');
        $files = File::files($path);
        $pages = [];

        foreach ($files as $file) {
            $fileName = pathinfo($file, PATHINFO_FILENAME);
            $fileName = str_replace('.blade', '', $fileName);
            $pages[]  = $fileName;
        }

        // Hiding pages
        $hidePath  = resource_path('views/user/hide');
        $hideFiles = File::files($hidePath);
        foreach ($hideFiles as $file) {
            $fileName = pathinfo($file, PATHINFO_FILENAME);
            $fileName = str_replace('.blade', '', $fileName);
            $hidePages[]  = $fileName;
        }

        return view('admin.pages.pages', compact('num', 'pages', 'hidePages'));
    }

    public function show()
    {
        $num = 1;
        // Get files from the directory
        $path = resource_path('views/user/pages');
        $files = File::files($path);
        $pages = [];

        foreach ($files as $file) {
            $fileName = pathinfo($file, PATHINFO_FILENAME);
            $fileName = str_replace('.blade', '', $fileName);
            $pages[] = $fileName;
        }

        return view("admin.pages.show", compact('num', 'pages'));
    }

    public function create()
    {
        $navigation = app(Navigation::class)->tree();
        return view("admin.pages.addPage", compact('navigation'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);


        $title = $request->title;
        $content = "@extends('user.layout') @section('body')" . $request->content . "@endsection";
        $filePath = resource_path("views/user/pages/{$title}.blade.php");

        File::put($filePath, $content);

        // Generate route
        $this->generateRoute($title);

        return redirect()->route('addPage')->with('success', 'تم اضافة الصفحة بنجاح');
    }
    // Add route with page
    protected function generateRoute($title)
    {
        $routePath = base_path('routes/web.php');
        $routeContent = File::get($routePath);

        $newRoute = "\nRoute::get('/{$title}', function() {
        return view('user.pages.{$title}');
        });\n";

        File::append($routePath, $newRoute);
    }

    public function edit(string $page)
    {
        // Get file
        $path     = resource_path('views/user/pages');
        $filePath = $path . '/' . $page . '.blade.php';

        // Check if exist
        if (File::exists($filePath)) {
            // Get content
            $inFile   = ["@extends('user.layout')", "@section('body')", "@section('title')", "@endsection"];
            $content  = str_replace($inFile, '', File::get($filePath));

            return view('admin.pages.editPages', compact('page', 'content'));
        }

        return redirect()->route('pages')->with('error', 'الصفحة غير موجودة');
    }

    public function update(Request $request, string $page)
    {
        // Validation
        $request->validate([
            'new_name' => 'required|string|max:255',
            'content'  => 'required|string',
        ]);

        // Catch
        $newName = $request->input('new_name');
        $content = "@extends('user.layout') @section('body')" . $request->input('content') . "@endsection";

        // Get file
        $path  = resource_path('views/user/pages');

        $oldFilePath = $path . '/' . $page . '.blade.php';
        $newFilePath = $path . '/' . $newName . '.blade.php';

        // Check if exist
        if (File::exists($oldFilePath)) {
            File::put($oldFilePath, $content);
            File::move($oldFilePath, $newFilePath);

            // Update the route
            $this->updateRoute($page, $newName);

            return redirect()->route('pages')->with('success', 'تمت إعادة تسمية الصفحة بنجاح');
        }

        return redirect()->route('editPages')->with('error', 'الصفحة غير موجودة');
    }
    // Update route with page
    protected function updateRoute($oldName, $newName)
    {
        $routePath = base_path('routes/web.php');
        $routeContent = File::get($routePath);

        // Pattern to match the old route
        $pattern = "/Route::get\('\/{$oldName}', function\(\) \{\s+return view\('user\.pages\.{$oldName}'\);\s+\}\);\n/";

        // Replacement for the new route
        $replacement = "Route::get('/{$newName}', function() {
        return view('user.pages.{$newName}');
        });\n";

        // Replace the old route with the new one
        $newRouteContent = preg_replace($pattern, $replacement, $routeContent);

        // Write the new content back to the file
        File::put($routePath, $newRouteContent);
    }


    public function destroy(string $page)
    {
        // Get file path
        $path = resource_path('views/user/pages');
        $filePath = $path . '/' . $page . '.blade.php';

        // Check if file exists
        if (File::exists($filePath)) {
            // Delete file
            File::delete($filePath);

            // Delete the route
            $this->removeRoute($page);

            return redirect()->route('pages')->with('success', 'تم حذف الصفحة');
        }

        return redirect()->route('pages')->with('error', 'الصفحة غير موجودة');
    }
    // Remove route
    protected function removeRoute($title)
    {
        $routePath = base_path('routes/web.php');
        $routeContent = File::get($routePath);

        // Pattern to match the route
        $pattern = "/Route::get\('\/{$title}', function\(\) \{\s+return view\('user\.pages\.{$title}'\);\s+\}\);\n/";

        // Remove the route from the content
        $newRouteContent = preg_replace($pattern, '', $routeContent);

        // Write the new content back to the file
        File::put($routePath, $newRouteContent);
    }

    // Hide page
    public function hidePage(string $page)
    {
        // Get file path
        $path = resource_path('views/user/pages');
        $filePath = $path . '/' . $page . '.blade.php';

        // Check if file exists
        if (File::exists($filePath)) {
            // New path
            $newPath = resource_path('views/user/hide');
            $newFilePath = $newPath . '/' . $page . '.blade.php';

            // Move file
            File::move($filePath, $newFilePath);

            return redirect()->route('pages')->with('success', 'تم اخفاء الصفحة بنجاح');
        }
        return redirect()->route('pages')->with('error', 'الصفحة غير موجودة');
    }

    // Show hiding page
    public function showPage($page)
    {
        // Hiding path
        $hidePath = resource_path('views/user/hide');
        $hideFilePath = $hidePath . '/' . $page . '.blade.php';

        // Check if file exists
        if (File::exists($hideFilePath)) {
            // New path
            $newPath = resource_path('views/user/pages');
            $newFilePath = $newPath . '/' . $page . '.blade.php';
            // Move file
            File::move($hideFilePath, $newFilePath);

            return redirect()->route('pages')->with('success', 'تم اظهار الصفحة بنجاح');
        }

        return redirect()->route('pages')->with('error', 'الصفحة غير موجودة');
    }
}
