<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PageController extends Controller
{
    public function About()
    {
        return Inertia::render('About'); 
    }

    public function contact()
    {
        return Inertia::render('Contact');
    }

    public function contactStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Ekhane database-e save ba email send-er logic likhte paro

        return back()->with('message', 'Your message has been sent successfully!');
    }
}