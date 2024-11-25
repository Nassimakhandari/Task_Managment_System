
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white border border-[#8E7AB5] rounded-lg shadow-lg p-8 max-w-lg w-full text-center">
        <h1 class="text-2xl font-bold text-[#8E7AB5] mb-4">You're Invited!</h1>
        <p class="text-gray-700 mb-6">
            You have received an invitation. Please choose to accept or reject below:
        </p>
        <div class="flex justify-center gap-4">
            <a href="{{ $acceptUrl }}"
                class="px-6 py-2 bg-[#8E7AB5] text-white rounded-lg hover:bg-[#735ea0] transition">
                Accept Invitation
            </a>
            <a href="{{ $rejectUrl }}"
                class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition">
                Reject Invitation
            </a>
        </div>
    </div>
</body>
</html>

 

