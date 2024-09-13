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
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/backup.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link rel="icon" href="images/favicon.png">



</head>
<body data-spy="scroll" data-target=".fixed-top">

@include("home.becomefreelancernav")
@guest
    @include("home.authpopup")
@endguest

<!-- Main Content -->
<div class="container mt-5 pt-5">
    <h2>Complete Your Profile</h2>

    <!-- Introduction -->
    <div class="alert alert-warning">
        <p>Now, let’s talk about the things you want to steer clear of. Your success on Ripos is important to us. Avoid the following to keep in line with our community standards:</p>
        <ul>
            <li>Providing any misleading or inaccurate information about your identity.</li>
            <li>Opening duplicate accounts. Remember, you can always create more Gigs.</li>
            <li>Soliciting other community members for work on Ripos.</li>
            <li>Requesting to take communication and payment outside of Ripos.</li>
        </ul>
    </div>



    <!-- Form -->
    <!-- Form -->
    <form id="profileForm" action="{{ route('profileupdate') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Personal Info -->
        <div id="personal-info" class="mb-4">
            <h4>Personal Info</h4>
            <div class="qwela-progress-bar-container">
                <div class="qwela-progress-bar">
                    <div class="qwela-progress-bar-fill" style="width: 25%;"></div>
                    <div class="qwela-progress-bar-text">25%</div>
                </div>
            </div>


            <div class="form-group">
                <label for="fullName">Full Name (Mandatory)</label>
                <input type="text" class="form-control" id="fullName" name="fullName" value="{{$username}}" required >

            </div>
            <div class="form-group">
                <label for="displayName">Display Name (Mandatory)</label>
                <input type="text" class="form-control" id="displayName" name="displayName" required>
            </div>
            <div class="form-group">
                <label for="profilePicture">Profile Picture</label>
                <div class="qwela-profile-picture-container">
                    <img id="profilePicPreview" src="" alt="Profile Picture Preview">
                    <label for="profilePicture" class="qwela-upload-icon"><i class="fa fa-plus"></i></label>
                    <input type="file" id="profilePicture" name="profilePicture" onchange="previewProfilePicture()">
                </div>
            </div>
            <div class="form-group">
                <label for="description">Description (Mandatory)</label>
                <textarea class="form-control" id="description" name="description" rows="3" minlength="150" maxlength="600" required></textarea>
            </div>

            <div class="form-group">
                <label for="languages">Languages</label>
                <div class="qwela-language-input-container">
                    <input type="text" class="form-control" id="languageInput" placeholder="Add a language">
                    <button type="button" class="btn btn-secondary" onclick="addLanguage()">Add</button>
                </div>
                <div id="languageList"></div>
            </div>
            <!-- Hidden Inputs -->
            <input type="hidden" id="hiddenLanguages" name="languages">
            <input type="hidden" id="hiddenCheckboxes" name="checkboxes">
            <div class="qwela-card-body">
                <div class="form-group">
                    <!-- Category Dropdown -->
                    <div class="mb-4">
                        <label for="category-select" class="form-label">Select your skill set</label>
                        <select id="category-select" class="qwela-form-select">
                            <option value="">-- Choose a Category --</option>
                            <!-- Categories will be populated here -->
                        </select>
                    </div>

                    <!-- Dynamic Message -->
                    <div id="dynamic-message" class="mb-4 text-center"></div>

                    <!-- Checkboxes for Subcategories and Minsubcategories -->
                    <div id="checkboxes-container" class="qwela-checkboxes-container">
                        <!-- Checkboxes will be populated here -->
                    </div>
                </div>
            </div>
            <button type="button" id="personalInfoContinue" class="btn btn-primary" disabled onclick="nextSection('professional-info')">Continue</button>
        </div>

        <!-- Professional Info -->
        <div id="professional-info" class="mb-4 d-none">
            <h4>Professional Info</h4>
            <div class="qwela-progress-bar-container">
                <div class="qwela-progress-bar">
                    <div class="qwela-progress-bar-fill" style="width: 50%;"></div>
                    <div class="qwela-progress-bar-text">50%</div>
                </div>
            </div>
            <div class="form-group">
                <label for="occupation">Your Occupation (Mandatory)</label>
                <input type="text" class="form-control" id="occupation" name="occupation" required>
            </div>
            <div class="form-group">
                <label for="certification">Highest level of certification</label>
                <input type="text" class="form-control" id="certification" name="certification" placeholder="Add certification">
            </div>
            <div class="form-group">
                <label for="personalWebsite">Personal Website</label>
                <input type="url" class="form-control" id="personalWebsite" name="personalWebsite" placeholder="https://example.com">
            </div>

            <!-- Checkbox Container -->
            <div id="professional-checkboxes-container" class="qwela-checkboxes-container mb-4"></div>

            <!-- Button Container -->
            <div class="button-container">
                <button type="button" id="professionalInfoBack" class="btn btn-secondary" onclick="previousSection('personal-info')">Back</button>
                <button type="button" id="professionalInfoContinue" class="btn btn-primary" disabled onclick="nextSection('account-security')">Continue</button>
            </div>
        </div>

        <!-- Account Security -->
        <div id="account-security" class="mb-4 d-none">
            <!-- Progress Bar -->
            <div class="qwela-progress-bar-container">
                <div class="qwela-progress-bar">
                    <div class="qwela-progress-bar-fill" style="width: 80%;"></div>
                    <div class="qwela-progress-bar-text">80%</div>
                </div>
            </div>
            <!-- Status Card -->
            <div class="status-card">
                <h6 style="padding-bottom: 30px">Confirm all details are ticked</h6>
                <ul id="statusList">
                    <li><span class="status-icon" id="status-fullName"><i class="fa"></i></span><span class="status-label">Full Name</span></li>
                    <li><span class="status-icon" id="status-displayName"><i class="fa"></i></span><span class="status-label">Display Name</span></li>
                    <li><span class="status-icon" id="status-description"><i class="fa"></i></span><span class="status-label">Description</span></li>
                    <li><span class="status-icon" id="status-languages"><i class="fa"></i></span><span class="status-label">Languages</span></li>
                    <li><span class="status-icon" id="status-occupation"><i class="fa"></i></span><span class="status-label">Occupation</span></li>
                    <li><span class="status-icon" id="status-certification"><i class="fa"></i></span><span class="status-label">Certification</span></li>
                    <li><span class="status-icon" id="status-checkboxes"><i class="fa"></i></span><span class="status-label">Skills</span></li>
                </ul>
            </div>

            <!-- Button Container -->
            <div class="button-container">
                <button type="button" id="accountSecurityBack" class="btn btn-secondary" onclick="previousSection('professional-info')">Back</button>
                <button type="submit" class="btn btn-success" id="submitBtn">Submit</button>
            </div>
        </div>



    </form>


</div>

<!-- Footer Section -->
@include("home.footer")

<!-- Scripts -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        // Populate category dropdown
        const categories = @json($categories);
        const categorySelect = $('#category-select');

        categories.forEach(category => {
            categorySelect.append(`<option value="${category.id}">${category.name}</option>`);
        });

        // Event handler for category selection
        categorySelect.change(function() {
            const selectedCategoryId = $(this).val();
            const selectedCategory = categories.find(cat => cat.id == selectedCategoryId);

            if (selectedCategory) {
                $('#dynamic-message').text(`Choose three to five of your best skills in ${selectedCategory.name}`);

                $('#checkboxes-container').empty();

                selectedCategory.subcategories.forEach(sub => {
                    $('#checkboxes-container').append(`
                    <div class="qwela-form-check">
                        <input class="form-check-input" type="checkbox" id="subcategory-${sub.id}" value="${sub.id}">
                        <label class="form-check-label" for="subcategory-${sub.id}">${sub.name}</label>
                    </div>
                `);

                    sub.minsubcategories.forEach(minsub => {
                        $('#checkboxes-container').append(`
                        <div class="qwela-form-check">
                            <input class="form-check-input" type="checkbox" id="minsubcategory-${minsub.id}" value="${minsub.id}">
                            <label class="form-check-label" for="minsubcategory-${minsub.id}">${minsub.name}</label>
                        </div>
                    `);
                    });
                });

                // Add event listener for checkboxes
                $('#checkboxes-container input[type="checkbox"]').change(checkCheckboxesCompletion);
            } else {
                $('#dynamic-message').empty();
                $('#checkboxes-container').empty();
            }
        });

        // Function to handle section navigation
        window.nextSection = function(sectionId) {
            document.querySelectorAll('div[id]').forEach(div => {
                div.classList.add('d-none');
            });
            document.getElementById(sectionId).classList.remove('d-none');
            scrollToSection(sectionId);
        };

        // Function to handle section navigation backwards
        window.previousSection = function(sectionId) {
            document.querySelectorAll('div[id]').forEach(div => {
                div.classList.add('d-none');
            });
            document.getElementById(sectionId).classList.remove('d-none');
            scrollToSection(sectionId);
        };

        // Function to scroll to the top of a section
        function scrollToSection(sectionId) {
            $('html, body').animate({
                scrollTop: $(`#${sectionId}`).offset().top
            }, 500); // Adjust the duration of the scroll animation as needed
        }

        // Function to preview profile picture
        window.previewProfilePicture = function() {
            const file = document.getElementById('profilePicture').files[0];
            const reader = new FileReader();

            reader.onloadend = function() {
                const img = document.getElementById('profilePicPreview');
                img.src = reader.result;
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        };

        // Function to add language
        window.addLanguage = function() {
            const languageInput = document.getElementById('languageInput');
            const language = languageInput.value.trim();
            if (language === '') return;

            const languageItem = document.createElement('div');
            languageItem.className = 'qwela-language-item';
            languageItem.innerHTML = `
            ${language}
            <button type="button" onclick="removeLanguage(this)">Remove</button>
        `;

            document.getElementById('languageList').appendChild(languageItem);
            languageInput.value = '';

            updateHiddenLanguages();
            checkPersonalInfoCompletion();
        };

        // Function to remove language
        window.removeLanguage = function(button) {
            button.parentElement.remove();
            updateHiddenLanguages();
            checkPersonalInfoCompletion();
        };

        // Function to update hidden languages input
        function updateHiddenLanguages() {
            const languages = Array.from(document.getElementById('languageList').children)
                .map(item => item.textContent.trim().replace('Remove', '').trim());
            document.getElementById('hiddenLanguages').value = JSON.stringify(languages);
        }

        // Function to check personal info completion
        function checkPersonalInfoCompletion() {
            const fullName = document.getElementById('fullName').value.trim();
            const displayName = document.getElementById('displayName').value.trim();
            const description = document.getElementById('description').value.trim();
            const languages = document.getElementById('languageList').children.length;

            const isComplete = fullName && displayName && description.length >= 150 && languages > 0;
            document.getElementById('personalInfoContinue').disabled = !isComplete;

            // Check the checkbox selection
            checkCheckboxesCompletion();
        }

        // Function to check professional info completion
        function checkProfessionalInfoCompletion() {
            const occupation = document.getElementById('occupation').value.trim();
            const certification = document.getElementById('certification').value.trim();

            const isComplete = occupation && certification;
            document.getElementById('professionalInfoContinue').disabled = !isComplete;
        }

        // Function to check if 3 to 5 checkboxes are selected
        function checkCheckboxesCompletion() {
            const checkedCheckboxes = $('#checkboxes-container input[type="checkbox"]:checked');
            const isValid = checkedCheckboxes.length >= 3 && checkedCheckboxes.length <= 5;

            document.getElementById('personalInfoContinue').disabled = !isValid;

            // Update hidden checkboxes input with names
            const checkedValues = checkedCheckboxes.map(function() {
                return $(this).next('label').text(); // Get the name from the label
            }).get();
            document.getElementById('hiddenCheckboxes').value = JSON.stringify(checkedValues);
        }

        // Event listeners for input fields to validate sections
        $('#fullName, #displayName, #description, #languageInput').on('input', checkPersonalInfoCompletion);
        $('#occupation, #certification').on('input', checkProfessionalInfoCompletion);

        // Initial validation for section completion
        checkPersonalInfoCompletion();
    });
    $(document).ready(function() {
        // Function to update the status card
        function updateStatusCard() {
            const fieldsStatus = {
                fullName: $('#fullName').val().trim() !== '',
                displayName: $('#displayName').val().trim() !== '',
                description: $('#description').val().trim().length >= 150,
                languages: $('#languageList').children().length > 0,
                occupation: $('#occupation').val().trim() !== '',
                certification: $('#certification').val().trim() !== '',
                checkboxes: $('#checkboxes-container input[type="checkbox"]:checked').length >= 3
                    && $('#checkboxes-container input[type="checkbox"]:checked').length <= 5
            };

            Object.keys(fieldsStatus).forEach(field => {
                const statusIcon = $(`#status-${field} i`);
                const statusClass = fieldsStatus[field] ? 'fa-check-circle green' : 'fa-times-circle red';
                statusIcon.removeClass('fa-check-circle fa-times-circle green red').addClass(statusClass);
            });

            $('#submitBtn').prop('disabled', !Object.values(fieldsStatus).every(Boolean));
        }

        // Update status card on input changes
        $('#fullName, #displayName, #description, #languageInput, #occupation, #certification').on('input', updateStatusCard);
        $('#checkboxes-container input[type="checkbox"]').on('change', updateStatusCard);

        // Initial update
        updateStatusCard();
    });

</script>
</body>
</html>
