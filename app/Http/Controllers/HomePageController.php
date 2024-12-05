<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Finer;
use App\Models\Gig;
use App\Models\Minsubcategory;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log; // Import the Log facade
use Illuminate\Support\HtmlString; // Correct import for HtmlString
use App\Mail\OtpMail; // Import the OtpMail class




class HomePageController extends Controller
{
    // Fetch categories and user data
    private function getViewData()
    {
        // Retrieve the authenticated user
        $user = Auth::user();
        $username = $user ? $user->name : null;
        $profilepicture = $user ? $user->profile_picture : null;
        $status = $user ? $user->status : null;
        $email = $user ? $user->email : null;



//        dd($profilepicture);
        $firstLetter = $username ? substr($username, 0, 1) : null;


        return compact('user', 'username', 'firstLetter', 'profilepicture','status','email');
    }

public function index()
{
    $data = $this->getViewData();
    $user = $data['user'];

    // Check if a user is logged in
    if (!$user) {
        // Return a default view if no user is logged in
        return view('home.dashboard', $data);
    }

    $status = $user->status;

    // Check if the user status is null
    if ($status === null) {
        $fourDigitNumber = rand(1000, 9999); // Generate the number
        $user->status = $fourDigitNumber; // Update the user's status
        $user->save(); // Save changes to the database
    } else {
        $fourDigitNumber = $status; // Use existing status if not null
    }

    $data['fourDigitNumber'] = $fourDigitNumber; // Add the number to the data array

    // Conditional redirection based on status
    switch ($status) {
        case 1:
            return view('home.dashboard', $data);
        case 4:
            return view('admin.dashboard', $data);
        case 3:
            return view('home.dashboard', $data);
        default:
            return view('home.factor', $data);
    }
}

public function dashboard(Request $request)
{
    $data = $this->getViewData();
    $user = $data['user'];

    // Check if a user is logged in
    if (!$user) {
        // Return a default view if no user is logged in
        return view('home.dashboard', $data);
    }

    $status = $user->status;

    // Check if the user status is null
    if ($status === null) {
        $fourDigitNumber = rand(1000, 9999); // Generate the number
        $user->status = $fourDigitNumber; // Update the user's status
        $user->save(); // Save changes to the database
    } else {
        $fourDigitNumber = $status; // Use existing status if not null
    }

    $data['fourDigitNumber'] = $fourDigitNumber; // Add the number to the data array

    // Conditional redirection based on status
    switch ($status) {
        case 1:
            return view('home.dashboard', $data);
        case 4:
            return view('admin.dashboard', $data);
        case 3:
            return view('home.dashboard', $data);
        default:
            return view('home.factor', $data);
    }
}


     public function realTimeChallenges()
     {
        $data = $this->getViewData();


        return view("home.machines", $data);
     }

     public function performanceTracking()
     {
         $data = $this->getViewData(); // Assuming this method is defined elsewhere
     
         // Get users and order by 'total' in descending order
         $data['users'] = User::orderBy('total', 'desc')->get();

        //  dd($data);

        
     
         return view("home.perfomance",$data);
     }

     public function resources()
     {
        $data = $this->getViewData();


        return view("home.resources", $data);


     }
     public function this()
     {


        return view("home.404");

     }

  
     public function tothsmachine(Request $request)
    {
        $data = $this->getViewData(); // Assuming this method is defined elsewhere
     
        // Get users and order by 'total' in descending order
        $data['name'] =$request->input('machine'); // Use input() instead of query()

       //  dd($data);

        return view("home.sso", $data);
    }
    
    public function sendOtp(Request $request)
    {
        Log::info('OTP request initiated.');

        try {
            $request->validate([
                'email' => 'required|email',
            ]);
            Log::info('Email validated: ' . $request->input('email'));

            // Retrieve the logged-in user
            $user = Auth::user();
            $otp = $user->status; // Get the status value from the user
            $email = $request->input('email');

            // Format the OTP message
            $statusMessage = "Your OTP is " . $otp;

            // Send the email using the Mailable class
            Mail::to($email)->send(new OtpMail($statusMessage));

            Log::info('OTP email sent to: ' . $email);
            return response()->json(['message' => 'OTP has been sent to your email.']);
        } catch (\Exception $e) {
            Log::error('Error sending OTP: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to send OTP. Please try again.'], 500);
        }
    }
    public function updateStatus(Request $request)
    {
        $user = Auth::user(); // Get the currently authenticated user
        $user->status = 1; // Set status to 1
        $user->save(); // Save the changes

        return redirect('/'); // Redirect to the root route after updating status

    }
    public function cybersecurity()
    {
        return view("home.cybersecurity");
    }
    public function hacking()
    {
        return view("home.hacking");
    }
}
