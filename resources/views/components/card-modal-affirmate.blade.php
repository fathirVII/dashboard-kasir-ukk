        @if (session('error'))
            <div class="bg-orange-500 text-white p-2 rounded-md mb-4">{{ session('error') }}</div>
        @endif