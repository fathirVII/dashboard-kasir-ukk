      @if (session('alert'))
            <div class="bg-yellow-500 text-black p-2 rounded-md mb-4">{{ session('alert') }}</div>
        @endif