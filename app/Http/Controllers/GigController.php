<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Category;
use App\Models\Favorites;
use App\Models\Gig;
use App\Models\Minsubcategory;
use App\Models\Package;
use App\Models\Extra;
use App\Models\Faq;
use App\Models\Milestone;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class GigController extends Controller
{
    private function getViewData()
    {
        // Retrieve the authenticated user
        $user = Auth::user();
        $username = $user ? $user->name : null;
        $profilepicture = $user ? $user->profile_picture : null;
        $status = $user ? $user->status : null;
        $displayName = $user ? $user->display_name : null;


//        dd($profilepicture);
        $firstLetter = $username ? substr($username, 0, 1) : null;

        // Fetch categories with their subcategories
        $categories = Category::with('subcategories.minsubcategories')->get();

        return compact('user', 'username', 'firstLetter', 'categories', 'profilepicture','status','displayName');
    }
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'gigdesc' => 'required|string',
            'category' => 'required|integer|exists:categories,id',
            'subcategories' => 'required|array',
            'subcategories.*' => 'string',
            'minisubcategories' => 'required|array',
            'minisubcategories.*' => 'string',
            'searchTags' => 'required|string|max:255',
            'declaration' => 'required|string',
            'gig_description_summary' => 'required|string',
            'additional_details' => 'required|string',
            'video' => 'nullable|file|mimes:mp4,mov,avi|max:20480', // 20 MB max
            'images.*' => 'nullable|file|mimes:jpg,jpeg,png',
            'documents.*' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:20480', // 20 MB max per document

            // Package validation
            'basic-package-name' => 'required|string',
            'basic-short-description' => 'required|string',
            'basic-price' => 'required|numeric',
            'basic-delivery-time' => 'required|integer',
            'basicFeatures' => 'required|string',
            'basic-revisions' => 'nullable|integer',
            'basic-status' => 'required|string',
            'basic-package-visibility' => 'required|string',

            'standard-package-name' => 'required|string',
            'standard-short-description' => 'required|string',
            'standard-price' => 'required|numeric',
            'standard-delivery-time' => 'required|integer',
            'standardFeatures' => 'required|string',
            'standard-revisions' => 'nullable|integer',
            'standard-status' => 'required|string',
            'standard-package-visibility' => 'required|string',

            'premium-package-name' => 'required|string',
            'premium-short-description' => 'required|string',
            'premium-price' => 'required|numeric',
            'premium-delivery-time' => 'required|integer',
            'premiumFeatures' => 'required|string',
            'premium-revisions' => 'nullable|integer',
            'premium-status' => 'required|string',
            'premium-package-visibility' => 'required|string',

            // Extras validation
            'extras.*.package' => 'required|string',
            'extras.*.title' => 'required|string',
            'extras.*.description' => 'required|string',
            'extras.*.price' => 'required|numeric',

            // FAQs validation
            'faqs.*.question' => 'required|string',
            'faqs.*.answer' => 'required|string',

            // Milestones validation
            'milestones.*.title' => 'required|string',
            'milestones.*.description' => 'required|string',
            'milestones.*.price' => 'required|numeric',
        ]);

        // Handle validation failure
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Handle file uploads with unique filenames
        $videoPath = $request->hasFile('video') ? $this->uploadFile($request->file('video'), 'products/videos') : null;
        $imagePaths = $request->hasFile('images') ? array_map(fn($file) => $this->uploadFile($file, 'products/images'), $request->file('images')) : [];
        $documentPaths = $request->hasFile('documents') ? array_map(fn($file) => $this->uploadFile($file, 'products/documents'), $request->file('documents')) : [];

        // Generate new gig_id
        $newGigId = (Gig::max('gig_id') ?? 0) + 1;

        // Create a new Gig record
        $gig = Gig::create([
            'gig_id' => $newGigId,
            'user_id' => Auth::user()->id,
            'title' => $request->input('title'),
            'gigdesc' => $request->input('gigdesc'),
            'category' => $request->input('category'),
            'subcategories' => json_encode($request->input('subcategories')),
            'minisubcategories' => json_encode($request->input('minisubcategories')),
            'searchTags' => $request->input('searchTags'),
            'declaration' => $request->input('declaration'),
            'gig_description_summary' => $request->input('gig_description_summary'),
            'additional_details' => $request->input('additional_details'),
            'video' => $videoPath,
            'images' => json_encode($imagePaths),
            'documents' => json_encode($documentPaths),
        ]);

        // Package data extraction and creation
        $packages = [
            [
                'prefix' => 'basic',
                'revisions' => $request->input('basic-revisions')
            ],
            [
                'prefix' => 'standard',
                'revisions' => $request->input('standard-revisions')
            ],
            [
                'prefix' => 'premium',
                'revisions' => $request->input('premium-revisions')
            ]
        ];

        foreach ($packages as $package) {
            Package::create([
                'gig_id' => $gig->gig_id,
                'name' => $request->input("{$package['prefix']}-package-name"),
                'short_description' => $request->input("{$package['prefix']}-short-description"),
                'price' => $request->input("{$package['prefix']}-price"),
                'delivery_time' => $request->input("{$package['prefix']}-delivery-time"),
                'features' => $request->input("{$package['prefix']}Features"),
                'revisions' => $package['revisions'],
                'status' => $request->input("{$package['prefix']}-status"),
                'visibility' => $request->input("{$package['prefix']}-package-visibility"),
            ]);
        }

        // Handle extras
        $extras = $request->input('extras', []);
        foreach ($extras as $extra) {
            Extra::create([
                'gig_id' => $gig->gig_id,
                'package' => $extra['package'],
                'title' => $extra['title'],
                'description' => $extra['description'],
                'price' => $extra['price'],
            ]);
        }

        // Create a new Card record
        Card::create([
            'gig_id' => $gig->gig_id,
            'title' => $request->input('title'),
            'description' => $request->input('gigdesc'),
            'price' => $request->input('basic-price'),
            'videos' => json_encode([$videoPath]), // Ensure video is stored as an array
            'images' => json_encode($imagePaths),
            'rating' => 5,
        ]);

        // Handle FAQs
        $faqs = $request->input('faqs', []);
        foreach ($faqs as $faq) {
            Faq::create([
                'gig_id' => $gig->gig_id,
                'question' => $faq['question'],
                'answer' => $faq['answer'],
            ]);
        }

        // Handle milestones
        $milestones = $request->input('milestones', []);
        foreach ($milestones as $milestone) {
            Milestone::create([
                'gig_id' => $gig->gig_id,
                'title' => $milestone['title'],
                'description' => $milestone['description'],
                'price' => $milestone['price'],
            ]);
        }

        // Return a success response with the gig_id
        return response()->json([
            'message' => 'Gig created successfully!',
            'gig' => $gig,
            'gig_id' => $gig->gig_id,
        ], 201);
    }

    /**
     * Upload a file with a unique name and return the relative path.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $directory
     * @return string
     */
    protected function uploadFile($file, $directory)
    {
        $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();
        $path = $file->move(public_path($directory), $filename);
        return $directory . '/' . $filename;
    }

    public function show(Request $request)
    {
        $gig_id = $request->query('jsiirhsyyuudiinsgg');
        $favourite = Favorites::where("liked_gig_id", $gig_id)->where( "user_id", Auth::id())->count();
        $gig = Gig::find($gig_id);
        $faqs = Faq::where('gig_id', $gig_id)->get();
        $milestones = Milestone::where('gig_id', $gig_id)->get();
        $packages = Package::where('gig_id', $gig_id)->get();
        $extras = Extra::where('gig_id', $gig_id)->get();

        // Get the image paths and video path
        $imagePaths = json_decode($gig->images);
        $videoPath = $gig->video;

        // Decode the category, subcategories, and minisubcategories
        $categoryIds = json_decode($gig->category);
        $subcategoryIds = json_decode($gig->subcategories);
        $minisubcategoryIds = json_decode($gig->minisubcategories);

        // Retrieve names from Category, Subcategory, and Minisubcategory models
        $categoryNames = Category::where('id', $categoryIds)->pluck('name')->toArray();
        $subcategoryNames = Subcategory::whereIn('id', $subcategoryIds)->pluck('name')->toArray();
        $minisubcategoryNames = Minsubcategory::whereIn('id', $minisubcategoryIds)->pluck('name')->toArray();

        $category = Category::where('id', $categoryIds)->pluck('name')->first();


        // Combine all names into a single flat array
        $allNames = array_merge($categoryNames, $subcategoryNames, $minisubcategoryNames);

        // Additional unrelated view data
        $viewData = $this->getViewData();

        $data = array_merge($viewData, [
            'category' => $category,
            'favourites' => $favourite,
            'gig' => $gig,
            'faqs' => $faqs,
            'milestones' => $milestones,
            'packages' => $packages,
            'extras' => $extras,
            'imagePaths' => $imagePaths,
            'videoPath' => $videoPath,
            'allNames' => $allNames, // Pass the combined names array to the view
        ]);

//        dd($data);

        return view('home.gigdetails', $data);
    }

    public function favourites(Request $request)
    {
        $gig_id = $request->input('gig_id');
        $user_id = Auth::id();

        // Check if the favorite entry already exists for this user and gig_id
        $existingFavorite = Favorites::where('user_id', $user_id)
            ->where('liked_gig_id', $gig_id)
            ->first();

        if (!$existingFavorite) {
            // Create a new favorite if it does not already exist
            $favourite = new Favorites();
            $favourite->user_id = $user_id;
            $favourite->liked_gig_id = $gig_id;
            $favourite->save();
        }

        return redirect()->back();
    }




}
