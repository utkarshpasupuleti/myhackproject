<style>
    /* Ensure the body and html take up the full viewport */
    html, body {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        overflow-x: hidden; /* Prevent horizontal scrolling */
    }

    /* Full-width card container */
    .mbeta-card-container {
        width: 100vw; /* Full viewport width */
        display: flex;
        justify-content: center; /* Center the card horizontally */
        padding: 0 20px; /* Optional: Add padding for smaller screens */
        box-sizing: border-box; /* Ensure padding is included in width calculation */
    }

    /* Style the card */
    .mbeta-card {
        max-width: 1200px; /* Increase the maximum width as needed */
        width: 100%; /* Full width up to the max-width */
        padding: 20px; /* Adjust padding as needed */
        text-align: center;
        color: white;
        font-size: 18px;
        font-weight: bold;
        background: linear-gradient(135deg, #00ffae, #ff7e5f); /* Default gradient */
        transition: background 0.5s ease-in-out; /* Smooth transition */
        border-radius: 20px; /* Rounded edges with a 20px radius */

    }

    /* Italicize the text */
    .italic-side {
        font-style: italic;
    }

</style>


<!-- Main Content -->
<section class="cheki subcategory-cards">
    <div class="container">
        <div class="cheki-card-slider">
            <div class="cheki-card-container">
                @php
                    // Determine which items to display based on context
                    if ($isMinisubcategory && !empty($finers)) {
                        $allItems = $finers;
                        $contextType = 'finer';
                    } else if ($isSubcategory) {
                        $allItems = $miniSubcategories;
                        $contextType = 'miniSubcategory';
                    } else {
                        $allItems = $subcategories;
                        $contextType = 'subcategory';
                    }

                    $allItemsArray = $allItems ? $allItems->all() : [];
                    $chunks = array_chunk($allItemsArray, 3);
                @endphp

                @if(count($chunks) > 0)
                    @foreach($chunks as $chunk)
                        <div class="cheki-card-stack">
                            @foreach($chunk as $item)
                                <div class="cheki-card" data-name="{{ $item->name }}">
                                    <div class="cheki-card-body">
                                        <h5 class="cheki-card-title">{{ $item->name }}</h5>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                @else
{{--                    <p>No {{ $contextType }}s available right now, <i>Check back later</i>.</p>--}}
                @endif
            </div>
        </div>
    </div>
</section>
