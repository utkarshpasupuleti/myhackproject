<?php
namespace App\Http\Controllers;

use App\Models\Card; // Assuming Card is the model for the cards table
use App\Models\Gig;  // Assuming Gig is the model for the gigs table
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CardController extends Controller
{
    public function fetchCards(Request $request)
    {
        $page = $request->input('page', 1);
        $cardsPerPage = 6;

        // Retrieve parameters from the request
        $categories = $request->input('gigCategories', []);
        $subcategories = $request->input('gigSubcategories', []);
        $minisubcategories = $request->input('gigMinisubcategories', []);
        $miniminisubcategories = $request->input('gigminiMinisubcategories', []);


        // Log the received parameters for debugging
        Log::info('Received parameters', [
            'page' => $page,
            'cardsPerPage' => $cardsPerPage,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'minisubcategories' => $minisubcategories,
            'miniminisubcategories' => $miniminisubcategories

        ]);

        // Step 1: Retrieve matching gig IDs from the gigs table
        $gigIdsQuery = Gig::query();

        if (!empty($categories)) {
            $gigIdsQuery->whereIn('category', $categories);
        }

        if (!empty($subcategories)) {
            $gigIdsQuery->where(function ($query) use ($subcategories) {
                foreach ($subcategories as $subcategory) {
                    $query->orWhereJsonContains('subcategories', $subcategory);
                }
            });
        }

        if (!empty($minisubcategories)) {
            $gigIdsQuery->where(function ($query) use ($minisubcategories) {
                foreach ($minisubcategories as $minisubcategory) {
                    $query->orWhereJsonContains('minisubcategories', $minisubcategory);
                }
            });
        }
        if (!empty($miniminisubcategories)) {
            $gigIdsQuery->where(function ($query) use ($miniminisubcategories) {
                foreach ($miniminisubcategories as $miniminisubcategory) {
                    $query->orWhereJsonContains('miniminisubcategories', $miniminisubcategory);
                }
            });
        }

        $matchingGigIds = $gigIdsQuery->pluck('id'); // Get matching gig IDs


        // Step 2: Retrieve cards based on the matching gig IDs
        $queryBuilder = Card::query();

        if ($matchingGigIds->isNotEmpty()) {
            $queryBuilder->whereIn('gig_id', $matchingGigIds);
        } else {
            // If no gig IDs match, return an empty result set or handle accordingly
            $queryBuilder->whereRaw('1 = 0'); // This will ensure no cards are returned
        }

        // Paginate the results
        $cards = $queryBuilder->paginate($cardsPerPage, ['*'], 'page', $page);

        // Transform cards data
        $cardsData = $cards->map(function ($card) {
            return [
                'id' => $card->id,
                'title' => $card->title,
                'description' => $card->description,
                'rating' => $card->rating,
                'price' => $card->price,
                'images' => $card->images,
                'videos' => $card->videos,
                'gig_id' => $card->gig_id
            ];
        });

        // Log the transformed data for debugging
        Log::info('Fetched cards data', ['cards' => $cardsData]);

        // Return the response
        return response()->json([
            'cards' => $cardsData,
            'pagination' => $cards->toArray() // Include pagination data if needed
        ]);
    }
}
