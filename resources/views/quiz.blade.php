<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}?</x-slot>

    <div class="pt-3 px-5 border rounded-t bg-blue-100 text-blue-900 grid md:grid-cols-3 text-center">
        <p><b class="text-lg">Soru Sayısı: </b> {{ $quiz->questions_count }}</p>
        <h3 class="mb-2 text-2xl font-bold tracking-tight">Quiz Soruları</h3>
        <p><b class="text-lg">Kalan Süre:</b> 00 sa 00 dk 00 sn</p>
    </div>
    <div class="bg-blue-400 pb-1 rounded-b mt-[-2px]"></div>

    <form method="POST" action="{{ route('quiz.result', $quiz->slug) }}">
        @csrf
        <div class="grid md:grid-cols-2 mt-4 gap-6">
            @foreach($quiz->questions as $key => $question)
                <div
                    class="bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    @if($question->image)
                        <img class="rounded-t-lg w-full max-h-[300px]" src="{{ asset($question->image) }}"
                             alt="quiz resmi">
                    @endif
                    <div class="p-5">
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $loop->iteration }}. SORU:
                        </h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $question->question }}</p>

                        <ul>
                            <li class="flex items-center mb-4">
                                <input id="quiz-{{ $question->id }}1" type="radio" name="{{ $question->id }}"
                                       value="answer1" required
                                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="quiz-{{ $question->id }}1"
                                       class="ml-2 text-sm font-medium text-gray-600 dark:text-gray-300">
                                    A) <span>{{ $question->answer1 }}</span>
                                </label>
                            </li>
                            <li class="flex items-center mb-4">
                                <input id="quiz-{{ $question->id }}2" type="radio" name="{{ $question->id }}"
                                       value="answer2" required
                                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="quiz-{{ $question->id }}2"
                                       class="ml-2 text-sm font-medium text-gray-600 dark:text-gray-300">
                                    B) <span>{{ $question->answer2 }}</span>
                                </label>
                            </li>
                            <li class="flex items-center mb-4">
                                <input id="quiz-{{ $question->id }}3" type="radio" name="{{ $question->id }}"
                                       value="answer3" required
                                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="quiz-{{ $question->id }}3"
                                       class="ml-2 text-sm font-medium text-gray-600 dark:text-gray-300">
                                    C) <span>{{ $question->answer3 }}</span>
                                </label>
                            </li>
                            <li class="flex items-center mb-4">
                                <input id="quiz-{{ $question->id }}4" type="radio" name="{{ $question->id }}"
                                       value="answer4" required
                                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="quiz-{{ $question->id }}4"
                                       class="ml-2 text-sm font-medium text-gray-600 dark:text-gray-300">
                                    D) <span>{{ $question->answer4 }}</span>
                                </label>
                            </li>
                        </ul>

                    </div>
                </div>
            @endforeach
        </div>

        <button type="submit" onclick="return confirm('Quiz\'i sonlandırmak istediğinizden emin misiniz?')"
                class="text-center text-uppercase text-lg w-full block my-5 text-blue-500 border border-blue-500 hover:bg-blue-500 hover:text-white active:bg-blue-600 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
            Quiz'i Bitir
        </button>
    </form>
</x-app-layout>
