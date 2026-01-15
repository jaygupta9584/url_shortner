<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            My Short URLs
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">

                {{-- Success Message --}}
                @if (session('success'))
                    <div class="mb-4 text-green-600">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Create Form --}}
                <form method="POST" action="/short-urls" class="flex gap-2">
                    @csrf
                    <input
                        type="text"
                        name="original_url"
                        required
                        placeholder="example.com or https://example.com"
                        class="flex-1 rounded border-gray-300 focus:ring focus:ring-indigo-200"
                    >
                    <button
                        class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700"
                    >
                        Create
                    </button>
                </form>

                {{-- URLs Table --}}
                <table class="w-full mt-6 border-collapse">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left py-2">Short URL</th>
                            <th class="text-left py-2">Original URL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($urls as $url)
                            <tr class="border-b">
                                <td class="py-2 text-indigo-600">
                                    <a href="{{ url($url->short_code) }}" target="_blank">
                                        {{ url($url->short_code) }}
                                    </a>
                                </td>
                                <td class="py-2 text-gray-600 break-all">
                                    {{ $url->original_url }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="py-4 text-center text-gray-500">
                                    No short URLs created yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</x-app-layout>
