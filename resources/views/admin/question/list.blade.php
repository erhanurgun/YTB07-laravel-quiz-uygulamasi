<x-app-layout>
    <x-slot name="header">
        {{ $quiz->title }} - Quizine ait sorular
    </x-slot>

    <div
        class="block p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <a href="{{ route('questions.create', $quiz->id) }}"
           class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            <i class="fa fa-plus"></i> Soru Oluştur
        </a>

        <div class="overflow-x-auto relative mt-5">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mb-3">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6"><i class="fa fa-image"></i> Fotoğraf</th>
                    <th scope="col" class="py-3 px-6"><i class="fa fa-question-circle"></i> Soru</th>
                    <th scope="col" class="py-3 px-6"><i class="fa fa-dot-circle"></i> Doğru Cevap</th>

                    <th scope="col" class="py-3 px-6 float-right"><i class="fa fa-puzzle-piece"></i> İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @foreach($quiz->questions as $question)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="py-4 px-6">
                            @if($question->image)
                                <a class="text-blue-600 font-bold" href="{{ asset($question->image) }}" target="_blank">Görüntüle</a>
                            @else
                                <i class="text-gray-300">{{ __('Resim Yok!') }}</i>
                            @endif
                        </td>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <strong>{{ $question->question }}</strong>
                        </th>
                        <td class="py-4 px-6 text-green-600">
                            {{ substr($question->correct_answer, -1) }}. Cevap
                        </td>
                        <td class="py-4 px-6 float-right">
                            <a href="{{ route('questions.edit', [$quiz->id, $question->id]) }}" title="Düzenle"
                               class="bg-green-500 hover:bg-green-600 text-gray-50 p-2 rounded !hover:underline">
                                <i class="fa fa-pen"></i>
                            </a>&nbsp;
                            <a href="{{ route('questions.destroy', [$quiz->id, $question->id]) }}" title="Sil"
                               onclick="return confirm('Silme işlemini onaylıyor musunuz?');"
                               class="bg-red-500 hover:bg-red-600 text-gray-50 p-2 rounded !hover:underline">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>

</x-app-layout>
