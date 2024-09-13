<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Your description">
    <meta name="author" content="Your name">
    <title>Ripos</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&family=Poppins:wght@600&display=swap" rel="stylesheet">
    @include("home.styles")

    <link rel="icon" href="images/favicon.png">

    <style>
        .gigsection{
            color: #24262a;
            font-weight: 700;
            font-size: 1rem;
            line-height: 1.375rem;
            font-family: "Poppins"
        }
    </style>

</head>
<body>
@include("home.becomefreelancernav")
<div style="padding-top: 70px"></div>

<div class="container">
    <form action="{{ route('gigs') }}" method="POST" enctype="multipart/form-data" >
        @csrf
    <div class="card" id="overview-card">
        {{--        <h2>1. Overview</h2>--}}
        <div class="section">
            <label class="gigsection" for="gig-title">Gig Title:</label>
            <input name="title" type="text" id="gig-title" placeholder="Your title should include keywords relevant to your service.">

            <label for="gig-description">Description:</label>
            <textarea name="gigdesc" id="gig-description" placeholder="Description of what you are offering"></textarea>

            <label class="gigsection"  for="category">Category:</label>
            <select name="category" id="category">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option  value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <label class="gigsection" >Subcategories:</label>
            <div id="subcategories" class="checkbox-grid">
                <!-- Subcategories will be loaded here -->
            </div>

            <label class="gigsection" >Minisubcategories:</label>
            <div id="minisubcategories" class="checkbox-grid">
                <!-- Minisubcategories will be loaded here -->
            </div>

            <!-- Hidden inputs to store selected values -->
            <input class="visible"  id="selectedSubcategories" name="selectedSubcategories">
            <input class="visible"  id="selectedMinisubcategories" name="selectedMinisubcategories">



            <label class="gigsection"  for="search-tag-input">Search Tags:</label>
            <input type="text" id="search-tag-input" placeholder="Add search tag">
            <button type="button" id="add-tag-btn" class="btn">Add Tag</button>
            <div id="tag-container"></div>

            <!-- Hidden input to store tags -->
            <input class="visible" id="searchTags" name="searchTags">
            <label>
                <input name="declaration" type="checkbox" id="license-declaration"> I confirm that I have obtained all necessary licenses to offer this service under applicable laws.
            </label>
        </div>
    </div>

    <div class="card" id="scope-pricing-card">
        <div class="section">
            <div id="packages-container">
                <!-- Buttons for paype="hidden"ckage selection -->
                <button type="button" class="btn" onclick="showPackage('basic')">Basic </button>
                <button type="button" class="btn" onclick="showPackage('standard')">Standard </button>
                <button type="button" class="btn" onclick="showPackage('premium')">Premium </button>
            </div>

            <!-- Basic Package Form -->
            <div class="package-form" id="basic-package-form">
                <h4>Basic Package</h4>
                <div class="info-container">
                    <label class="gigsection"  for="basic-package-name">Package Name:</label>
                    <input name="basic-package-name" type="text" id="basic-package-name" value="Basic">
                </div>
                <div class="info-container">
                    <label class="gigsection"  for="basic-short-description">Short Description:</label>
                    <textarea name="basic-short-description" id="basic-short-description"></textarea>
                </div>
                <div class="info-container">
                    <label class="gigsection"  for="basic-price">Price:</label>
                    <input name="basic-price" type="number" id="basic-price">
                </div>

                <div class="info-container">
                    <label class="gigsection"  for="basic-delivery-time">Delivery Time (days):</label>
                    <input name="basic-delivery-time" type="number" id="basic-delivery-time">
                </div>
                <div class="info-container">
                    <label class="gigsection"  for="basic-new-feature">Included Features (Basic Package):</label>
                    <div class="feature-input-container">
                        <textarea id="basic-new-feature" placeholder="Enter new feature"></textarea>
                        <button  class="mysigninbutton" type="button" onclick="addFeature('basic')">Add</button>
                    </div>
                    <div id="basic-feature-list" class="feature-list-container"></div>
                    <input class="visible"  id="basic-features" name="basicFeatures">
                </div>

                <div class="info-container">
                    <label class="gigsection"  for="basic-revisions">Number of Revisions:</label>
                    <input type="number" id="basic-revisions" name="basic-revisions">
                </div>
                <div class="info-container">
                    <label class="gigsection"  for="basic-custom-options">Custom Options/Add-Ons:</label>
                    <div id="basic-custom-options"></div>
                </div>
                <div class="visible">
                    <label class="gigsection"  for="basic-package-id">Package ID:</label>
                    <input name="standard-package-id" type="text" id="basic-package-id" disabled>
                </div>
                <div class="info-container">
                    <label class="gigsection"  for="basic-status">Status:</label>
                    <select name="basic-status" id="basic-status">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div class="info-container">
                    <label class="gigsection"  for="basic-package-visibility">Package Visibility:</label>
                    <select name="basic-package-visibility" id="basic-package-visibility">
                        <option value="public">Public</option>
                        <option value="private">Private</option>
                    </select>
                </div>
            </div>

            <!-- Standard Package Form -->
            <div class="package-form" id="standard-package-form">
                <!-- Structure similar to Basic Package, with IDs updated for Standard -->
                <h4>Standard Package</h4>
                <div class="info-container">
                    <label class="gigsection"  for="standard-package-name">Package Name:</label>
                    <input name="standard-package-name" type="text" id="standard-package-name" value="Standard">
                </div>
                <div class="info-container">
                    <label class="gigsection"  for="standard-short-description">Short Description:</label>
                    <textarea name="standard-short-description" id="standard-short-description"></textarea>
                </div>
                <div class="info-container">
                    <label class="gigsection"  for="standard-price">Price:</label>
                    <input name="standard-price" type="number" id="standard-price">
                </div>

                <div class="info-container">
                    <label class="gigsection"  for="standard-delivery-time">Delivery Time (days):</label>
                    <input name="standard-delivery-time" type="number" id="standard-delivery-time">
                </div>
                <div class="info-container">
                    <label class="gigsection"  for="standard-new-feature">Included Features (Standard Package):</label>
                    <div class="feature-input-container">
                        <textarea type="text" id="standard-new-feature" placeholder="Enter new feature"></textarea>
                        <button class="mysigninbutton" type="button" onclick="addFeature('standard')">Add</button>
                    </div>
                    <div id="standard-feature-list" class="feature-list-container"></div>
                    <input class="visible" id="standard-features" name="standardFeatures">
                </div>

                <div  class="info-container">
                    <label class="gigsection"  for="standard-revisions">Number of Revisions:</label>
                    <input name="standard-revisions" type="number" id="standard-revisions">
                </div>
                <div class="info-container">
                    <label class="gigsection"  for="standard-custom-options">Custom Options/Add-Ons:</label>
                    <div id="standard-custom-options"></div>
                </div>
                <div class="visible">
                    <label class="gigsection"  for="standard-package-id">Package ID:</label>
                    <input name="standard-package-id" type="text" id="standard-package-id" disabled>
                </div>
                <div class="info-container">
                    <label class="gigsection"  for="standard-status">Status:</label>
                    <select name="standard-status" id="standard-status">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div class="info-container">
                    <label class="gigsection"  for="standard-package-visibility">Package Visibility:</label>
                    <select name="standard-package-visibility" id="standard-package-visibility">
                        <option value="public">Public</option>
                        <option value="private">Private</option>
                    </select>
                </div>
            </div>

            <!-- Premium Package Form -->
            <div class="package-form" id="premium-package-form">
                <!-- Structure similar to Basic Package, with IDs updated for Premium -->
                <h4>Premium Package</h4>
                <div class="info-container">
                    <label class="gigsection"  for="premium-package-name">Package Name:</label>
                    <input name="premium-package-name" type="text" id="premium-package-name" value="Premium">
                </div>
                <div class="info-container">
                    <label class="gigsection"  for="premium-short-description">Short Description:</label>
                    <textarea name="premium-short-description" id="premium-short-description"></textarea>
                </div>
                <div class="info-container">
                    <label class="gigsection"  for="premium-price">Price:</label>
                    <input name="premium-price" type="number" id="premium-price">
                </div>

                <div class="info-container">
                    <label class="gigsection"  for="premium-delivery-time">Delivery Time (days):</label>
                    <input name="premium-delivery-time" type="number" id="premium-delivery-time">
                </div>
                <div class="info-container">
                    <label class="gigsection"  for="premium-new-feature">Included Features (Premium Package):</label>
                    <div class="feature-input-container">
                        <textarea type="text" id="premium-new-feature" placeholder="Enter new feature"></textarea>
                        <button class="mysigninbutton" type="button" onclick="addFeature('premium')">Add</button>
                    </div>
                    <div id="premium-feature-list" class="feature-list-container"></div>
                    <input class="visible"  id="premium-features" name="premiumFeatures">
                </div>
                <div class="info-container">
                    <label class="gigsection"  for="premium-revisions">Number of Revisions:</label>
                    <input name="premium-revisions" type="number" id="premium-revisions">
                </div>
                <div class="info-container">
                    <label class="gigsection"  for="premium-custom-options">Custom Options/Add-Ons:</label>
                    <div  id="premium-custom-options"></div>
                </div>
                <div class="visible">
                    <label class="gigsection"  for="visible">Package ID:</label>
                    <input name="Package ID" type="text" id="premium-package-id" disabled>
                </div>
                <div class="info-container">
                    <label class="gigsection"  for="premium-status">Status:</label>
                    <select name="premium-status" id="premium-status">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div class="info-container">
                    <label class="gigsection"  for="premium-package-visibility">Package Visibility:</label>
                    <select name="premium-package-visibility" id="premium-package-visibility">
                        <option value="public">Public</option>
                        <option value="private">Private</option>
                    </select>
                </div>
            </div>

        </div>

        <button type="button" class="btn toggle-btn" id="toggle-extras">Add Extra Services</button>
        <div id="extras-section">
            <h3>Add Extras:</h3>
            <div id="extras-container"></div>
            <button type="button" class="btn" onclick="addExtra()">Add Extra</button>
        </div>

    </div>

    <div class="card" id="description-faq-card">
        {{--        <h2>3. Description & FAQ</h2>--}}
        <div class="section">
            <label for="gig-description-summary">Briefly Describe Your Gig:</label>
            <textarea name="gig_description_summary" id="gig-description-summary" placeholder="Provide a brief overview of what your Gig offers"></textarea>

            <h3>Frequently Asked Questions (FAQ):</h3>
            <div id="faq-container"></div>
            <button type="button" class="btn" onclick="addFAQ()">Add FAQ</button>
        </div>
    </div>

    <div class="card" id="requirements-card">
{{--        <h2>4. Requirements</h2>--}}
        <div class="section">

            <label class="gigsection"  for="additional-details">Your Questions:</label>
            <textarea name="additional_details" id="additional-details" placeholder="Any specific details you need from buyers to complete the order"></textarea>
        </div>
    </div>

            <div class="card" id="gallery-card">
                <h2>5. Gallery</h2>
                <p><strong>Gig Image Guidelines:</strong> Requirements for images used in your Gig.</p>
                <p><strong>Video:</strong> Upload a video showcasing your service (maximum 75 seconds, 50MB).</p>
                <div class="file-upload">
                    <div class="drag-drop-area" id="video-drop-area">
                        Click to Upload Video (maximum 75 seconds, 50MB)
                        <!-- File input for video is hidden -->
                        <input type="file" accept="video/*" id="video-upload" name="video" style="display: none;" onchange="previewVideo(event)">
                    </div>
                    <video id="video-preview" class="preview-container" controls style="display: none;">
                        <source id="video-source" src="" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>

                <p><strong>Images:</strong> Upload up to 3 images to showcase your services.</p>
                <div class="file-upload">
                    <div class="drag-drop-area" id="image-drop-area-1">
                        Click to Upload Image
                        <!-- File input for images is hidden -->
                        <input type="file" accept="image/*" id="image-upload-1" name="images[]" style="display: none;" onchange="previewImage(event, 'image-preview-1')">
                        <img class="preview-container" id="image-preview-1" src="" alt="Image Preview" style="display: none;">
                    </div>
                    <div class="drag-drop-area" id="image-drop-area-2">
                        Click to Upload Image
                        <!-- File input for images is hidden -->
                        <input type="file" accept="image/*" id="image-upload-2" name="images[]" style="display: none;" onchange="previewImage(event, 'image-preview-2')">
                        <img class="preview-container" id="image-preview-2" src="" alt="Image Preview" style="display: none;">
                    </div>
                    <div class="drag-drop-area" id="image-drop-area-3">
                        Click to Upload Image
                        <!-- File input for images is hidden -->
                        <input type="file" accept="image/*" id="image-upload-3" name="images[]" style="display: none;" onchange="previewImage(event, 'image-preview-3')">
                        <img class="preview-container" id="image-preview-3" src="" alt="Image Preview" style="display: none;">
                    </div>
                </div>

                <p><strong>Documents:</strong> Upload up to 2 documents (PDFs only) to show examples of your work.</p>
                <div class="file-upload">
                    <div class="drag-drop-area" id="pdf-drop-area-1">
                        Click to Upload PDF
                        <!-- File input for PDFs is hidden -->
                        <input type="file" accept="application/pdf" id="pdf-upload-1" name="documents[]" style="display: none;" onchange="previewPDF(event, 'pdf-preview-1')">
                        <div id="pdf-preview-1" class="preview-container" style="display: none;">
                            <iframe src="" frameborder="0"></iframe>
                        </div>
                    </div>
                    <div class="drag-drop-area" id="pdf-drop-area-2">
                        Click to Upload PDF
                        <!-- File input for PDFs is hidden -->
                        <input type="file" accept="application/pdf" id="pdf-upload-2" name="documents[]" style="display: none;" onchange="previewPDF(event, 'pdf-preview-2')">
                        <div id="pdf-preview-2" class="pdf-preview" style="display: none;">
                            <iframe src="" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>


    <div class="card" id="milestone-workflow-card">
        {{--        <h2>7. Milestone Workflow</h2>--}}
        <div class="section">
            <h3>Add Milestones:</h3>
            <div id="milestones-container"></div>
            <button type="button" class="btn" onclick="addMilestone()">Add Milestone</button>
        </div>
    </div>

    <div class="section-buttons">
        <button type="button" class="btn" id="prev-btn">Previous</button>
        <button type="button" class="btn" id="next-btn">Next</button>
    </div>
    <div class="card" id="publish-card">
        <h2>6. Publish</h2>
        <div class="section">
            <button type="submit" class="btn">Publish Your Gig</button>
        </div>
    </div>
    </form>


</div>
<div style="padding-top: 70px"></div>

@include("home.footer")
<script>
    function showPackage(packageType) {
        // Hide all package forms
        document.querySelectorAll('.package-form').forEach(form => {
            form.style.display = 'none';
        });

        // Show the selected package form
        document.getElementById(`${packageType}-package-form`).style.display = 'block';
    }

    document.addEventListener('DOMContentLoaded', function() {
        const features = {
            standard: [],
            premium: [],
            basic: []
        };

        window.addFeature = function(packageType) {
            const featureInput = document.getElementById(`${packageType}-new-feature`);
            const featureText = featureInput.value.trim();

            if (featureText) {
                const featureList = document.getElementById(`${packageType}-feature-list`);

                // Create a new feature item element
                const featureDiv = document.createElement('div');
                featureDiv.classList.add('feature-item');

                // Create and append a span to show the feature text
                const featureSpan = document.createElement('span');
                featureSpan.textContent = featureText;

                // Create and append a remove button
                const removeButton = document.createElement('button');
                removeButton.textContent = 'Remove';
                removeButton.onclick = () => removeFeature(packageType, featureDiv, featureText);

                // Append the span and button to the feature item
                featureDiv.appendChild(featureSpan);
                featureDiv.appendChild(removeButton);

                // Append the new feature item to the feature list
                featureList.appendChild(featureDiv);

                // Add the feature to the features array
                features[packageType].push(featureText);
                updateHiddenInput(packageType);

                // Clear the input field
                featureInput.value = '';
            } else {
                alert('Please enter a feature.');
            }
        }

        function removeFeature(packageType, featureDiv, featureText) {
            // Remove the feature from the features array
            features[packageType] = features[packageType].filter(feature => feature !== featureText);
            updateHiddenInput(packageType);

            // Remove the feature item from the display
            featureDiv.remove();
        }

        function updateHiddenInput(packageType) {
            const hiddenInput = document.getElementById(`${packageType}-features`);
            hiddenInput.value = features[packageType].join(',');
        }
    });


    document.addEventListener('DOMContentLoaded', function() {
        const categorySelect = document.getElementById('category');
        const subcategoriesDiv = document.getElementById('subcategories');
        const minisubcategoriesDiv = document.getElementById('minisubcategories');
        const selectedSubcategoriesInput = document.getElementById('selectedSubcategories');
        const selectedMinisubcategoriesInput = document.getElementById('selectedMinisubcategories');

        let categories = @json($categories);
        let selectedSubcategories = new Set();

        categorySelect.addEventListener('change', function() {
            const categoryId = categorySelect.value;
            updateSubcategories(categoryId);
        });

        subcategoriesDiv.addEventListener('change', function(event) {
            if (event.target.type === 'checkbox') {
                const subcategoryId = event.target.dataset.subcategoryId;
                if (event.target.checked) {
                    selectedSubcategories.add(subcategoryId);
                } else {
                    selectedSubcategories.delete(subcategoryId);
                }
                updateMinisubcategories();
                updateHiddenInputs();
            }
        });

        minisubcategoriesDiv.addEventListener('change', function(event) {
            if (event.target.type === 'checkbox') {
                updateHiddenInputs();
            }
        });

        function updateSubcategories(categoryId) {
            subcategoriesDiv.innerHTML = '';
            minisubcategoriesDiv.innerHTML = ''; // Clear minisubcategories

            const category = categories.find(c => c.id == categoryId);
            if (category) {
                category.subcategories.forEach(sub => {
                    const label = document.createElement('label');
                    const checkbox = document.createElement('input');
                    checkbox.type = 'checkbox';
                    checkbox.dataset.subcategoryId = sub.id;
                    checkbox.id = `subcategories${sub.id}`;
                    checkbox.name = 'subcategories[]';
                    checkbox.value = sub.id;
                    label.appendChild(checkbox);
                    label.appendChild(document.createTextNode(sub.name));
                    subcategoriesDiv.appendChild(label);
                });
            }
        }

        function updateMinisubcategories() {
            minisubcategoriesDiv.innerHTML = ''; // Clear existing minisubcategories

            let minisubcategories = new Set();

            selectedSubcategories.forEach(subcategoryId => {
                const subcategory = categories.flatMap(c => c.subcategories).find(s => s.id == subcategoryId);
                if (subcategory) {
                    subcategory.minsubcategories.forEach(mini => {
                        minisubcategories.add(mini); // Using Set to avoid duplicates
                    });
                }
            });

            minisubcategories.forEach(mini => {
                const label = document.createElement('label');
                const checkbox = document.createElement('input');
                checkbox.type = 'checkbox';
                checkbox.id = `minisubcategories${mini.id}`;
                checkbox.name = 'minisubcategories[]';
                checkbox.value = mini.id;
                label.appendChild(checkbox);
                label.appendChild(document.createTextNode(mini.name));
                minisubcategoriesDiv.appendChild(label);
            });
        }

        function updateHiddenInputs() {
            // Update hidden input for selected subcategories
            selectedSubcategoriesInput.value = Array.from(selectedSubcategories).join(',');

            // Update hidden input for selected minisubcategories
            const selectedMinisubcategories = Array.from(minisubcategoriesDiv.querySelectorAll('input:checked'))
                .map(checkbox => checkbox.value)
                .join(',');
            selectedMinisubcategoriesInput.value = selectedMinisubcategories;
        }
    });
    let currentSection = 0;
    const sections = document.querySelectorAll('.card');
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');

    function showSection(index) {
        sections.forEach((section, i) => {
            section.classList.remove('active');
            if (i === index) {
                section.classList.add('active');
                section.style.opacity = 1;
            } else {
                section.style.opacity = 0;
            }
        });
        prevBtn.classList.toggle('disabled', index === 0);
        nextBtn.classList.toggle('disabled', index === sections.length - 1);
    }

    function scrollToTop() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function prevSection() {
        if (currentSection > 0) {
            currentSection--;
            showSection(currentSection);
            scrollToTop();
        }
    }

    function nextSection() {
        if (currentSection < sections.length - 1) {
            currentSection++;
            showSection(currentSection);
            scrollToTop();
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const addTagButton = document.getElementById('add-tag-btn');
        const tagInput = document.getElementById('search-tag-input');
        const tagContainer = document.getElementById('tag-container');
        const searchTagsInput = document.getElementById('searchTags');

        let tags = [];

        addTagButton.addEventListener('click', function() {
            const tagValue = tagInput.value.trim();
            if (tagValue && !tags.includes(tagValue)) {
                tags.push(tagValue);
                updateTagDisplay();
                updateHiddenInput();
                tagInput.value = '';
            }
        });

        function removeTag(button) {
            const tagValue = button.parentElement.textContent.trim().slice(0, -1).trim();
            tags = tags.filter(tag => tag !== tagValue);
            updateTagDisplay();
            updateHiddenInput();
        }

        function updateTagDisplay() {
            tagContainer.innerHTML = '';
            tags.forEach(tag => {
                const tagElement = document.createElement('div');
                tagElement.className = 'tag';
                tagElement.innerHTML = `${tag} <button onclick="removeTag(this)">×</button>`;
                tagContainer.appendChild(tagElement);
            });
        }

        function updateHiddenInput() {
            searchTagsInput.value = tags.join(',');
        }

        window.removeTag = removeTag; // Expose removeTag function to global scope
    });


    let extraCount = 0; // Track the number of extras added

    function addExtra() {
        extraCount++;
        const extrasContainer = document.getElementById('extras-container');
        const extraElement = document.createElement('div');
        extraElement.className = 'section';
        extraElement.innerHTML = `
        <label for="package-select-${extraCount}">Select Package:</label>
        <select id="package-select-${extraCount}" name="extras[${extraCount}][package]" class="package-select">
            <option value="basic">Basic</option>
            <option value="standard">Standard</option>
            <option value="premium">Premium</option>
        </select>

        <label for="extra-title-${extraCount}">Extra Title:</label>
        <input name="extras[${extraCount}][title]" type="text" id="extra-title-${extraCount}" class="extra-title" placeholder="Title for the extra service">

        <label for="extra-description-${extraCount}">Description:</label>
        <textarea name="extras[${extraCount}][description]" id="extra-description-${extraCount}" class="extra-description textarea-large" placeholder="Describe the extra service"></textarea>

        <label for="extra-price-${extraCount}">Price:</label>
        <input name="extras[${extraCount}][price]" type="number" id="extra-price-${extraCount}" class="extra-price" placeholder="Price for this extra">

        <button type="button" class="btn" onclick="removeExtra(this)">Remove Extra</button>
        <hr>
    `;
        extrasContainer.appendChild(extraElement);
    }

    function removeExtra(button) {
        const extraElement = button.parentElement;
        extraElement.remove();
    }


    let faqCount = 0; // Track the number of FAQs added

    function addFAQ() {
        faqCount++;
        const faqContainer = document.getElementById('faq-container');
        const faqElement = document.createElement('div');
        faqElement.className = 'faq-section';
        faqElement.innerHTML = `
        <label for="faq-question-${faqCount}">Question:</label>
        <input type="text" id="faq-question-${faqCount}" name="faqs[${faqCount}][question]" class="faq-question" placeholder="Enter FAQ question">

        <label for="faq-answer-${faqCount}">Answer:</label>
        <textarea id="faq-answer-${faqCount}" name="faqs[${faqCount}][answer]" class="faq-answer textarea-large" placeholder="Enter FAQ answer"></textarea>

        <button type="button" class="btn" onclick="removeFAQ(this)">Remove FAQ</button>
        <hr>
    `;
        faqContainer.appendChild(faqElement);
    }

    function removeFAQ(button) {
        button.parentElement.remove();
    }
    let milestoneCount = 0; // Track the number of milestones added

    function addMilestone() {
        milestoneCount++;
        const milestonesContainer = document.getElementById('milestones-container');
        const milestoneElement = document.createElement('div');
        milestoneElement.className = 'section';
        milestoneElement.innerHTML = `
        <label for="milestone-title-${milestoneCount}">Milestone Title:</label>
        <input name="milestones[${milestoneCount}][title]" type="text" id="milestone-title-${milestoneCount}" class="milestone-title" placeholder="Title for the milestone" required>

        <label for="milestone-description-${milestoneCount}">Description:</label>
        <textarea name="milestones[${milestoneCount}][description]" id="milestone-description-${milestoneCount}" class="milestone-description textarea-large" placeholder="Describe the milestone" required></textarea>

        <label for="milestone-price-${milestoneCount}">Price:</label>
        <input name="milestones[${milestoneCount}][price]" type="number" id="milestone-price-${milestoneCount}" class="milestone-price" placeholder="Price for this milestone" required>

        <button type="button" class="btn" onclick="removeMilestone(this)">Remove Milestone</button>
        <hr>
    `;
        milestonesContainer.appendChild(milestoneElement);
    }

    function removeMilestone(button) {
        button.parentElement.remove();
    }


    prevBtn.addEventListener('click', prevSection);
    nextBtn.addEventListener('click', nextSection);


    document.getElementById('toggle-extras').addEventListener('click', () => {
        document.getElementById('extras-section').style.display = document.getElementById('extras-section').style.display === 'none' ? 'block' : 'none';
    });

    showSection(currentSection);
    // Function to preview images
    function previewImage(event, previewId) {
        const file = event.target.files[0];
        const preview = document.getElementById(previewId);
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            preview.style.display = 'none';
        }
    }

    // Function to preview videos
    function previewVideo(event) {
        const file = event.target.files[0];
        const video = document.getElementById('video-preview');
        const source = document.getElementById('video-source');
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                source.src = e.target.result;
                video.style.display = 'block';
                video.load();
            }
            reader.readAsDataURL(file);
        } else {
            video.style.display = 'none';
        }
    }

    // Function to preview PDFs
    function previewPDF(event, previewId) {
        const file = event.target.files[0];
        const preview = document.getElementById(previewId).querySelector('iframe');
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                document.getElementById(previewId).style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            document.getElementById(previewId).style.display = 'none';
        }
    }

    // Handle drag over event
    function handleDragOver(event) {
        event.preventDefault();
        event.stopPropagation();
        event.target.classList.add('dragging');
    }

    // Handle drag leave event
    function handleDragLeave(event) {
        event.preventDefault();
        event.stopPropagation();
        event.target.classList.remove('dragging');
    }

    // Handle file drop event
    function handleDrop(event, inputId, previewId) {
        event.preventDefault();
        event.stopPropagation();
        event.target.classList.remove('dragging');

        const file = event.dataTransfer.files[0];
        if (file) {
            const input = document.getElementById(inputId);
            input.files = event.dataTransfer.files;
            input.dispatchEvent(new Event('change'));

            if (file.type.startsWith('image/')) {
                previewImage({ target: input }, previewId);
            } else if (file.type.startsWith('video/')) {
                previewVideo({ target: input });
            } else if (file.type === 'application/pdf') {
                previewPDF({ target: input }, previewId);
            }
        }
    }

    // Attach event listeners to drag-and-drop areas
    document.querySelectorAll('.drag-drop-area').forEach(area => {
        area.addEventListener('click', function() {
            const inputId = this.id.replace('drop-area', 'upload');
            const fileInput = document.getElementById(inputId);
            fileInput.click(); // Trigger file dialog
        });

        area.addEventListener('dragover', function(event) {
            handleDragOver(event);
        });

        area.addEventListener('dragleave', function(event) {
            handleDragLeave(event);
        });

        area.addEventListener('drop', function(event) {
            const inputId = this.id.replace('drop-area', 'upload');
            const previewId = this.id.replace('drop-area', 'preview');
            handleDrop(event, inputId, previewId);
        });
    });



</script>
</body>
</html>

