<x-layout>
    <x-slot:heading>
        Jobs Page
    </x-slot:heading>

    <ul>
        @foreach ($jobs as $job)
            <li>
                <a href="/jobs/{{ $job['id'] }}" class="text-blue-500 hover:underline underline-offset-3">
                    <strong>{{ $job['title'] }} : </strong> {{ $job['salary'] }} per year
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>
