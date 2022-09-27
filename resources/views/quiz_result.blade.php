<x-app-layout>
    <x-slot name="header">Sonuç - {{ $quiz->title }}?</x-slot>

    <div class="pt-3 px-5 border rounded-t bg-blue-100 text-blue-900 grid md:grid-cols-3 text-center">
        <p><b class="text-lg">Soru Sayısı: </b> {{ $quiz->questions_count }}</p>
        <h3 class="mb-2 text-2xl font-bold tracking-tight">Quiz Sonuçları</h3>
        <p><b class="text-lg">Kalan Süre:</b> 00 sa 00 dk 00 sn</p>
    </div>
    <div class="bg-blue-400 pb-1 rounded-b mt-[-2px]"></div>

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
                        @if($question->correct_answer == $question->my_answer->answer)
                            <i class="fa fa-check text-green-500"></i>
                        @else
                            <i class="fa fa-close text-red-500"></i>
                        @endif
                    </h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $question->question }}</p>

                    <ul>
                        <li class="flex items-center mb-4">
                            <label for="quiz-{{ $question->id }}1" class="ml-2 text-sm font-medium
                                   {{ $question->correct_answer == 'answer1' ? 'text-green-600' : '' }}
                                   {{ $question->my_answer->answer == 'answer1' ? 'text-red-600' : 'text-gray-600' }}">
                                A) <span>{{ $question->answer1 }}</span>
                            </label>
                        </li>
                        <li class="flex items-center mb-4">
                            <label for="quiz-{{ $question->id }}2" class="ml-2 text-sm font-medium
                                   {{ $question->correct_answer == 'answer2' ? 'text-green-600' : '' }}
                                   {{ $question->my_answer->answer == 'answer2' ? 'text-red-600' : 'text-gray-600' }}">
                                B) <span>{{ $question->answer2 }}</span>
                            </label>
                        </li>
                        <li class="flex items-center mb-4">
                            <label for="quiz-{{ $question->id }}3" class="ml-2 text-sm font-medium
                                   {{ $question->correct_answer == 'answer3' ? 'text-green-600' : '' }}
                                   {{ $question->my_answer->answer == 'answer3' ? 'text-red-600' : 'text-gray-600' }}">
                                C) <span>{{ $question->answer3 }}</span>
                            </label>
                        </li>
                        <li class="flex items-center mb-4">
                            <label for="quiz-{{ $question->id }}4" class="ml-2 text-sm font-medium
                                   {{ $question->correct_answer == 'answer4' ? 'text-green-600' : '' }}
                                   {{ $question->my_answer->answer == 'answer4' ? 'text-red-600' : 'text-gray-600' }}">
                                D) <span>{{ $question->answer4 }}</span>
                            </label>
                        </li>
                    </ul>

                </div>
            </div>
    @endforeach
</x-app-layout>
