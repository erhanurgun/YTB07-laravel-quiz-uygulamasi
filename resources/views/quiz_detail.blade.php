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
                @if($quiz->my_result)
                    <a href="{{ route('quiz.join', $quiz->slug) }}"
                       class="my-5 hover:text-yellow-500 border hover:border-yellow-500 hover:bg-transparent bg-yellow-500 text-white active:bg-yellow-500 active:text-white font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                        Quiz'i Görüntüle
                    </a>
                @else
                    <a href="{{ route('quiz.join', $quiz->slug) }}"
                       class="my-5 text-blue-500 border border-blue-500 hover:bg-blue-500 hover:text-white active:bg-blue-600 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                        Quiz'e Katıl
                    </a>
                @endif
            </div>
        </div>
    </div>

    <div
        class="inline-block w-[32%] text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        <div class="pt-3 px-5 border-b bg-gray-200">
            <h3 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Quiz Detayları</h3>
        </div>
        <ul class="text-sm font-medium text-gray-900 bg-white rounded border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            @if($quiz->my_result)
                <li class="py-3 px-4 border-b border-gray-200">
                    <span>Alınan Puan</span>
                    <span
                        class="float-right rounded-full py-0.5 px-3 text-blue-800 bg-blue-100">{{ $quiz->my_result->point }}</span>
                </li>
                <li class="py-3 px-4 border-b border-gray-200">
                    <span>Doğru / Yanlış Sayısı</span>
                    <div class="float-right">
                        <span class="float-right rounded-full py-0.5 px-3 text-red-800 bg-red-100"> {{ $quiz->my_result->wrong }} yanlış</span>
                        <span class="float-right rounded-full py-0.5 px-3 text-green-800 bg-green-100 mr-1"> {{ $quiz->my_result->correct }} doğru</span>
                    </div>
                </li>
            @endif
            @if($quiz->finished_at)
                <li class="py-3 px-4 border-b border-gray-200">
                    <span>Son Katılım Tarihi</span>
                    <span title="{{ $quiz->finished_at }}"
                          class="float-right rounded-full py-0.5 px-3 text-gray-800 bg-gray-50">{{ $quiz->finished_at->diffForHumans() }}</span>
                </li>
            @endif
            <li class="py-3 px-4 border-b border-gray-200">
                <span>Soru Sayısı</span>
                <span
                    class="float-right rounded-full py-0.5 px-3 text-gray-800 bg-gray-50">{{ $quiz->questions_count }}</span>
            </li>
            <li class="py-3 px-4 border-b border-gray-200">
                <span>Katılımcı Sayısı</span>
                <span class="float-right rounded-full py-0.5 px-3 text-gray-800 bg-gray-50">
                    {{ $quiz->details['join_count'] ?? '0' }}
                </span>
            </li>
            <li class="py-3 px-4">
                <span>Ortalama Puan</span>
                <span class="float-right rounded-full py-0.5 px-3 text-gray-800 bg-gray-50">
                    {{ $quiz->details['average'] ?? '0' }}
                </span>
            </li>
        </ul>
    </div>


</x-app-layout>
