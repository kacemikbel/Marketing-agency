<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recruitment Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @keyframes slideInFromLeft {
            0% {
                transform: translateX(-100%);
                opacity: 0;
            }
            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 h-screen flex items-center justify-center">
    <div class="w-full max-w-lg bg-white rounded-lg shadow-2xl p-8 m-4 animate__animated animate__fadeIn" style="animation: slideInFromLeft 1s ease-out;">
        <h2 class="text-3xl font-bold mb-10 text-gray-800 text-center">Join Our Team</h2>
        <form method="post" action="./php/recruit.php" enctype="multipart/form-data" class="space-y-6">
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email Address</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" id="email" type="email" placeholder="you@example.com">
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">Phone Number</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="phone" id="phone" type="text" placeholder="+1234567890">
            </div>
          
            <div class="flex items-center justify-center bg-grey-lighter">
                <label id="cvLabel" class="w-full flex flex-col items-center px-4 py-6 bg-white text-blue-500 rounded-lg shadow-lg tracking-wide uppercase border border-blue-500 cursor-pointer hover:bg-blue-500 hover:text-white transition duration-300 ease-in-out" style="animation: fadeIn 2s;">
                   
                    <span class="mt-2 text-base leading-normal font-semibold">Upload CV</span>
                    <input id="cvInput" type='file' name="file" class="hidden" accept=".pdf,.doc,.docx"/>
                </label>
            </div>

        
            <div class="flex items-center justify-center bg-grey-lighter mt-4">
                <label id="imageLabel" class="w-full flex flex-col items-center px-4 py-6 bg-white text-green-500 rounded-lg shadow-lg tracking-wide uppercase border border-green-500 cursor-pointer hover:bg-green-500 hover:text-white transition duration-300 ease-in-out" style="animation: fadeIn 2.5s;">
                 
                    <span class="mt-2 text-base leading-normal font-semibold">Upload Image/Avatar</span>
                    <input id="imageInput" type='file' name="image" class="hidden" accept="image/png, image/jpeg"/>
                </label>
            </div>

      
            <div class="flex items-center justify-between">
                <button id="submitButton" type="submit" class="w-full bg-gradient-to-r from-blue-400 to-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline hover:from-blue-500 hover:to-blue-700 transition duration-300 ease-in-out transform hover:-translate-y-1" type="submit">
                    Submit Application
                </button>
            </div>
        </form>
    </div>
    <script>
        const cvInput = document.getElementById('cvInput');
        const imageInput = document.getElementById('imageInput');
        const cvLabel = document.getElementById('cvLabel');
        const imageLabel = document.getElementById('imageLabel');
        const submitButton = document.getElementById('submitButton');

        cvInput.addEventListener('change', () => {
            if (cvInput.files.length > 0) {
                cvLabel.classList.remove('bg-white', 'text-blue-500', 'border-blue-500');
                cvLabel.classList.add('bg-red-500', 'text-white', 'border-red-500');
            } else {
                cvLabel.classList.remove('bg-red-500', 'text-white', 'border-red-500');
                cvLabel.classList.add('bg-white', 'text-blue-500', 'border-blue-500');
            }
        });

        imageInput.addEventListener('change', () => {
            if (imageInput.files.length > 0) {
                imageLabel.classList.remove('bg-white', 'text-green-500', 'border-green-500');
                imageLabel.classList.add('bg-red-500', 'text-white', 'border-red-500');
            } else {
                imageLabel.classList.remove('bg-red-500', 'text-white', 'border-red-500');
                imageLabel.classList.add('bg-white', 'text-green-500', 'border-green-500');
            }
        });

        submitButton.addEventListener('click', () => {
          
        });
    </script>
</body>
</html>
