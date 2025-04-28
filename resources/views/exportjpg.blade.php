{{-- resources/views/export.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Canvas</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/export.js'])

</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center py-10">

    <div class="flex space-x-4 mb-6">
        <button id="download-image" class="px-4 py-2 bg-blue-600 text-white rounded">Download as Image</button>
        <button id="download-pdf" class="px-4 py-2 bg-green-600 text-white rounded">Download as PDF</button>
    </div>

    <div id="canvas" class="w-[30rem] bg-white p-6 rounded shadow-md">
        <h1 class="text-2xl font-bold mb-4 text-center">Export Me!</h1>
        <p class="text-gray-700">
            This is a test content to export as image or pdf using html2canvas and jsPDF in Laravel project.
        </p>
    </div>

</body>
</html>
