<x-app-layout>
    <x-slot name="header">Anasayfa</x-slot>
    <div
        class="inline-block w-[66%] text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        @foreach($quizzes as $quiz)
            <a href="{{ route('quiz.detail', $quiz->slug) }}"
               class="block py-2 px-4 w-full border-b border-gray-200 cursor-pointer hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
                <h2 class="text-lg font-bold w-[85%]">{{ Str::limit($quiz->title, 63) }}?</h2>
                @if($quiz->finished_at)
                    <span class="float-right mt-[-20px]">{{ $quiz->finished_at->diffForHumans() }} bitiyor</span>
                @endif
                <p>{{ Str::limit($quiz->description, 100) }}</p>
                <p>{{ $quiz->questions_count }} soru</p>
            </a>
        @endforeach

        @if($count > 5)
            <div class="p-3">
                {{ $quizzes->links() }}
            </div>
        @endif
    </div>
    <div
        class="inline-block w-[32%] float-right text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        <div class="pt-3 px-5 border-b bg-gray-200">
            <h3 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Quiz Sonuçları</h3>
        </div>
        <a href="#"
           class="block py-2 px-4 w-full border-b border-gray-200 cursor-pointer hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
            <p><b>01</b> - Demo Soru</p>
        </a>
    </div>
</x-app-layout>
