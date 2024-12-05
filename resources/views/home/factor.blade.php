<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request OTP Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-md rounded-lg p-6 max-w-md w-full">
        <h2 class="text-xl font-bold mb-6 text-center">OTP Verification</h2>

        <!-- Request OTP Section -->
        <div class="mb-6">
            <label for="requestEmail" class="block text-sm font-medium text-gray-700">Enter your email to request OTP:</label>
            <input type="email" id="requestEmail" name="request_email" required class="mt-1 p-2 border border-gray-300 rounded-md w-full" value="{{ $email }}">
            <button type="button" onclick="requestOtp()" class="mt-2 w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-500 transition duration-200">Request OTP</button>
        </div>

        <!-- Enter OTP Section -->
        <div>
            <label for="otpInput" class="block text-sm font-medium text-gray-700">Enter the OTP received in your email:</label>
            <input type="text" id="otpInput" name="otp" required class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Enter OTP">
            <button type="button" onclick="submitOtp()" class="mt-2 w-full bg-green-600 text-white py-2 rounded-md hover:bg-green-500 transition duration-200">Submit OTP</button>
        </div>
    </div>

    <form id="statusUpdateForm" method="POST" action="{{ route('update.status') }}" style="display: none;">
        @csrf
        <input type="hidden" name="four_digit_number" id="fourDigitNumber" value="{{ $fourDigitNumber }}">
    </form>

    <script>
        let expectedOtp = '{{ $fourDigitNumber }}'; // Set expected OTP to the passed 4-digit number

        function requestOtp() {
            const email = document.getElementById('requestEmail').value;

            $.ajax({
                url: '/request-otp',
                type: 'POST',
                data: {
                    email: email,
                    _token: '{{ csrf_token() }}' // CSRF token for Laravel
                },
                success: function(response) {
                    alert(response.message);
                    // Assuming OTP is generated and sent via email
                    console.log('Expected OTP:', expectedOtp); // Log the expected OTP
                },
                error: function(xhr) {
                    alert('Error: ' + xhr.responseJSON.message);
                }
            });
        }

        function submitOtp() {
            const enteredOtp = document.getElementById('otpInput').value.trim(); // Trim any whitespace
            console.log('Entered OTP:', enteredOtp); // Log the entered OTP

            // Compare entered OTP with the expected OTP
            if (String(enteredOtp) === String(expectedOtp)) {
                // If the OTP matches, submit the hidden form to update user status
                document.getElementById('statusUpdateForm').submit();
            } else {
                alert('Invalid OTP. Please try again.');
            }
        }
    </script>
</body>
</html>
