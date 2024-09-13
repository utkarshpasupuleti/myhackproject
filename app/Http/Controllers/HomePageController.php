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

//        dd($profilepicture);
        $firstLetter = $username ? substr($username, 0, 1) : null;

        // Fetch categories with their subcategories
        $categories = Category::with('subcategories.minsubcategories')->get();

        return compact('user', 'username', 'firstLetter', 'categories', 'profilepicture','status');
    }

    public function index()
    {
        $data = $this->getViewData();
        $user = $data['user'];
        $status = $user ? $user->status : null;

//        dd
        // Conditional redirection based on status
        switch ($status) {
            case null:
                return view('home.dashboard', $data);
            case 1:
                return view('home.employee', $data);
            case 4:
                return view('admin.index', $data);
            case 3:

                return view('home.employer', $data);
            default:
                return view('home.dashboard', $data);
        }
    }

    public function dashboard(Request $request)
    {
        $data = $this->getViewData();
        $user = $data['user'];
        $status = $user ? $user->status : null;

//        dd
        // Conditional redirection based on status
        switch ($status) {
            case null:
                return view('home.dashboard', $data);
            case 1:
                return view('home.employee', $data);
            case 4:
                return view('admin.index', $data);
            case 3:
                return view('home.employer', $data);
            default:
                return view('home.dashboard', $data);
        }
    }

    public function purpose(Request $request)
    {
        $data = $this->getViewData();
        $user = $data['user'];

        // Get the purpose query parameter
        $purpose = $request->query('minihkjbjxgv');

        // Update the user's status with the value of purpose
        if ($user) {
            $user->status = $purpose;
            $user->save();
        }

        // Return the view
        return view('home.employee', $data);
    }


    /**
     * Search for gig categories, subcategories, minisubcategories, and gigs based on a query.
     *
     * @param string $query
     * @return array
     */
    private function searchGigs(string $query): array
    {
        // Initialize results array with empty collections
        $gigCategories = collect();
        $gigSubcategories = collect();
        $gigMinisubcategories = collect();
        $gigFiners = collect();  // New collection for finers
        $gigGigs = collect();

        if ($query) {
            // Fetch category IDs if the query matches any category
            $gigCategories = Category::where('name', 'LIKE', '%' . $query . '%')->pluck('id')->toArray();

            // Fetch subcategory IDs if the query matches any subcategory
            $gigSubcategories = Subcategory::where('name', 'LIKE', '%' . $query . '%')->pluck('id')->toArray();

            // Fetch minisubcategory IDs if the query matches any minisubcategory
            $gigMinisubcategories = Minsubcategory::where('name', 'LIKE', '%' . $query . '%')->pluck('id')->toArray();

            // Fetch finer IDs if the query matches any finer
            $gigFiners = Finer::where('name', 'LIKE', '%' . $query . '%')->pluck('id')->toArray();

            // Fetch gigs based on category, subcategory, minisubcategory, and finer IDs
            $gigGigs = Gig::where(function ($q) use ($gigCategories, $gigSubcategories, $gigMinisubcategories, $gigFiners) {
                if (!empty($gigCategories)) {
                    $q->whereIn('category', $gigCategories);
                }
                if (!empty($gigSubcategories)) {
                    $q->orWhereIn('subcategories', $gigSubcategories);
                }
                if (!empty($gigMinisubcategories)) {
                    $q->orWhereIn('minisubcategories', $gigMinisubcategories);
                }
                if (!empty($gigFiners)) {
                    $q->orWhereIn('miniminisubcategories', $gigFiners);
                }
            })->pluck('id')->toArray();  // Ensure to get the correct column from Gig table
        }

        // Return arrays for each category
        return [
            'gigCategories' => $gigCategories,
            'gigSubcategories' => $gigSubcategories,
            'gigMinisubcategories' => $gigMinisubcategories,
            'gigFiners' => $gigFiners,  // Return finers array
            'gigGigs' => $gigGigs,
        ];
    }


    public function search(Request $request)
    {
        // Initialize data array with view data
        $data = $this->getViewData();

        // Get the search query from the request
        $query = $request->query('q');
        $gigresults = $this->searchGigs($query);

        // Add the gigresults to the data array
        $data['gigresults'] = $gigresults;

        // Initialize all relevant data
        $data['subcategories'] = [];
        $data['miniSubcategories'] = [];
        $data['finers'] = [];
        $data['isSubcategory'] = false;
        $data['isMinisubcategory'] = false;

        // Fetch the category based on the search query
        $category = Category::where('name', $query)->first();

        if ($category) {
            // Get the subcategories for the found category
            $subcategories = $category->subcategories;
            $data['subcategories'] = $subcategories;
            $data['isSubcategory'] = false;
            $data['isMinisubcategory'] = false;

        } else {
            // Check if the query corresponds to a subcategory
            $subcategory = Subcategory::where('name', $query)->first();

            if ($subcategory) {
                // Get the mini subcategories for the found subcategory
                $miniSubcategories = $subcategory->minsubcategories;
                $data['miniSubcategories'] = $miniSubcategories;
                $data['isSubcategory'] = true;
                $data['isMinisubcategory'] = false;

            } else {
                // Check if the query corresponds to a mini subcategory
                $minisubcategory = Minsubcategory::where('name', $query)->first();
//                dd($minisubcategory);

                if ($minisubcategory) {
                    // Get the finers for the found mini subcategory
                    $finers = $minisubcategory->finers;
                    $data['finers'] = $finers;
                    $data['isMinisubcategory'] = true;
                }
            }
        }

        // Add the query to the data array
        $data['query'] = $query;
//        dd($data);


        // Return the view with the combined data
        return view('home.search', $data);
    }


    public  function becomefreelancer()
    {
        $data = $this->getViewData();

        return view('home.becomefreelancer', $data);


    }
    /**
     * Update the user data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Find the user by ID
        $user = auth()->user();
//        dd($user);

        // Update the user's data
        $user->full_name = $request->input('fullName');
        $user->display_name = $request->input('displayName');
        $user->description = $request->input('description');
        $user->languages = $request->input('languages');
        $user->checkboxes = json_encode($request->input('checkboxes')); // Ensure this is stored as JSON
        $user->occupation = $request->input('occupation');
        $user->certification = $request->input('certification');
        $user->personal_website = $request->input('personalWebsite');
        $user->status = 1;



//        $user->email = $request->input('email');
//        $user->phone_number = $request->input('phoneNumber');

        // Handle profile picture upload
        if ($request->hasFile('profilePicture')) {
            $file = $request->file('profilePicture');

            // Create a unique filename
            $picFilename = time() . '.' . $file->getClientOriginalExtension();

            // Move the original file to the storage directory
            $file->move('products/profilepicture', $picFilename);

            // Update the profile_picture field in your database
            $user->profile_picture = $picFilename;
        }


        // Save the user
        $user->save();
//        $data = $this->getViewData();
        // Get the currently authenticated user
        $user = auth()->user();

        // Get the existing data from the view
        $data = $this->getViewData();

        // Add user-specific data to the existing data array
        $data['email'] = $user->email;
        $data['email_verified_at'] = $user->email_verified_at;


        return  view('home.security', $data);

    }


    public function security()
    {
        // Get the currently authenticated user
        $user = auth()->user();

        // Get the existing data from the view
        $data = $this->getViewData();

        // Add user-specific data to the existing data array
        $data['email'] = $user->email;
        $data['email_verified_at'] = $user->email_verified_at;

        // Return the view with the combined data
        return view('home.security', $data);
    }
    public function test()
    {
        $data = $this->getViewData();

        return view("home.test", $data);
    }
    public function uploadgig()
    {
        $data = $this->getViewData();


        return view("home.uploadgig", $data);
    }




}
