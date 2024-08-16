<x-layout>
    <x-slot:heading>
        Jobs Page
    </x-slot:heading>

    <div class="space-y-4">
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}"
                class="block border border-gray-200 px-4 py-6 rounded-lg hover:bg-gray-200">
                <div class="font-bold text-blue-400">{{ $job->employer->name }}</div>
                <div>
                    <strong>{{ $job['title'] }} : </strong> {{ $job['salary'] }} per year
                </div>
            </a>
        @endforeach

        <div>
            {{-- This will use default pagination provided by laravel. (This file availables to vendors) --}}
            {{-- To edit default pagination need that files to our views (To do this run this command " php artisan vendor:publish ") --}}
            {{ $jobs->links() }}
        </div>
    </div>
</x-layout>
