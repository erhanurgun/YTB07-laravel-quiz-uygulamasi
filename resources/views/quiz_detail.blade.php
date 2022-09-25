<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}?</x-slot>

    <div
        class="inline-block w-[66%] float-right text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        <div class="pt-3 px-5 border-b bg-gray-200">
            <h3 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Quiz Hakkında</h3>
        </div>
        <div class="py-2 px-4 w-full border-b border-gray-200">
            <p>{{ $quiz->description }}</p>
            <div class="my-4">
                <a href="{{ route('quiz.join', $quiz->slug) }}"
                   class="my-5 text-blue-500 border border-blue-500 hover:bg-blue-500 hover:text-white active:bg-blue-600 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                    Quiz'e Katıl
                </a>
            </div>
        </div>
    </div>

    <div
        class="inline-block w-[32%] text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        <div class="pt-3 px-5 border-b bg-gray-200">
            <h3 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Quiz Detayları</h3>
        </div>
        <ul class="text-sm font-medium text-gray-900 bg-white rounded border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            @if($quiz->finished_at)
                <li class="py-3 px-4 border-b border-gray-200">
                    <span>Son Katılım Tarihi</span>
                    <span title="{{ $quiz->finished_at }}"
                          class="float-right rounded-full py-0.5 px-3 bg-gray-100">{{ $quiz->finished_at->diffForHumans() }}</span>
                </li>
            @endif
            <li class="py-3 px-4 border-b border-gray-200">
                <span>Soru Sayısı</span>
                <span class="float-right rounded-full py-0.5 px-3 bg-red-100">{{ $quiz->questions_count }}</span>
            </li>
            <li class="py-3 px-4 border-b border-gray-200">
                <span>Katılımcı Sayısı</span>
                <span class="float-right rounded-full py-0.5 px-3 bg-yellow-100">000</span>
            </li>
            <li class="py-3 px-4">
                <span>Ortalama Puan</span>
                <span class="float-right rounded-full py-0.5 px-3 bg-green-100">00</span>
            </li>

        </ul>
    </div>


</x-app-layout>
