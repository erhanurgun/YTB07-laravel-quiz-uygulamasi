<x-app-layout>
    <x-slot name="header">Quizler</x-slot>


    <div
        class="block p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <a href="{{ route('quizzes.create') }}"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            <i class="fa fa-plus"></i> Quiz Oluştur
        </a>

        <div class="overflow-x-auto relative mt-5">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mb-3">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">Quiz</th>
                    <th scope="col" class="py-3 px-6">Bitiş Tarihi</th>
                    <th scope="col" class="py-3 px-6">Durum</th>
                    <th scope="col" class="py-3 px-6">İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @foreach($quizzes as $quiz)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <strong>{{ $quiz->title }}</strong>
                        </th>
                        <td class="py-4 px-6">
                            @if($quiz->finished_at)
                                {{ $quiz->finished_at }}
                            @else
                                <i class="text-gray-300">{{ __('Bitiş Tarihi Yok!') }}</i>
                            @endif
                        </td>
                        <td class="py-4 px-6">
                            <span
                                class="bg-gray-100 text-gray-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-gray-200 dark:text-gray-900">
                                {{ $quiz->status }}
                                </span>
                        </td>
                        <td class="py-4 px-6">
                            <a href="#"
                               class="bg-green-500 hover:bg-green-600 !text-gray-50 p-2 rounded font-medium text-blue-600 dark:text-blue-500 !hover:underline">
                                <i class="fa fa-pen"></i>
                            </a>&nbsp;
                            <a href="#"
                               class="bg-red-500 hover:bg-red-600 !text-gray-50 p-2 rounded font-medium text-blue-600 dark:text-blue-500 !hover:underline">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>

            {{ $quizzes->links() }}
        </div>

    </div>

</x-app-layout>
