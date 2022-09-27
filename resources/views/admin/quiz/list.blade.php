<x-app-layout>
    <x-slot name="header">Quizler</x-slot>


    <div
        class="block p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <a href="{{ route('quizzes.create') }}"
           class="float-right text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            <i class="fa fa-plus"></i> Quiz Oluştur
        </a>

        <form method="GET" action="" class="grid md:grid-cols-5 md:gap-2 inline-block">
            <div>
                <input type="text" name="title" value="{{ request('title') }}" placeholder="Lütfen quiz adı giriniz..."
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2">
            </div>
            <div>
                <select name="status" onchange="this.form.submit();"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="0" selected disabled>&minus;&minus;&minus; Durum Seçiniz &minus;&minus;&minus;
                    </option>
                    <option value="publish" @selected(request('status') == 'publish') >Yayında</option>
                    <option value="draft" @selected(request('status') == 'draft') >Taslak</option>
                    <option value="passive" @selected(request('status') == 'passive') >Pasif</option>
                </select>
            </div>
            @if(request('title')|| request('status'))
                <div class="mt-[9px]">
                    <a href="{{ route('quizzes.index') }}"
                       class="bg-gray-500 hover:bg-gray-600 text-gray-50 p-2 rounded-lg !hover:underline">
                        <i class="fa fa-retweet"></i> Sıfırla
                    </a>&nbsp;
                </div>
            @endif
        </form>

        <div class="overflow-x-auto relative mt-5">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mb-3">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6"><i class="fa fa-calendar"></i> Bitiş Tarihi</th>
                    <th scope="col" class="py-3 px-6"><i class="fa fa-question-circle"></i> Quiz</th>
                    <th scope="col" class="py-3 px-6"><i class="fa fa-question-circle"></i> Soru Sayısı</th>
                    <th scope="col" class="py-3 px-6"><i class="fa fa-toggle-on"></i> Durum</th>
                    <th scope="col" class="py-3 px-6 float-right"><i class="fa fa-puzzle-piece"></i> İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @foreach($quizzes as $quiz)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="py-4 px-6">
                            @if($quiz->finished_at)
                                <span title="{{ $quiz->finished_at }}">{{ $quiz->finished_at->diffForHumans() }}</span>
                            @else
                                <i class="text-gray-300">{{ __('Bitiş Tarihi Yok!') }}</i>
                            @endif
                        </td>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <strong>{{ Str::limit($quiz->title, 70) }}?</strong>
                        </th>
                        <td class="py-4 px-6">
                            <strong>{{ $quiz->questions_count }}</strong>
                        </td>
                        <td class="py-4 px-6 text-xs font-bold">
                            @if($quiz->status == 'publish')
                                @if(!$quiz->finished_at || $quiz->finished_at > now())
                                    <span class="px-2.5 py-0.5 rounded bg-green-100 text-green-800">Yayında</span>
                                @else
                                    <span class="px-2.5 py-0.5 rounded bg-gray-100 text-gray-800">Süresi Bitti</span>
                                @endif
                            @elseif($quiz->status == 'draft')
                                <span class="px-2.5 py-0.5 rounded bg-yellow-100 text-yellow-800">Taslak</span>
                            @elseif($quiz->status == 'passive')
                                <span class="px-2.5 py-0.5 rounded bg-red-100 text-red-800">Pasif</span>
                            @endif
                        </td>
                        <td class="py-4 px-6 float-right">
                            <a href="{{ route('quizzes.details', $quiz->id) }}" title="Analizler"
                               class="bg-fuchsia-500 hover:bg-fuchsia-600 text-gray-50 p-2 rounded !hover:underline">
                                <i class="fa fa-info"></i>
                            </a>&nbsp;
                            <a href="{{ route('questions.index', $quiz->id) }}" title="Sorular"
                               class="bg-yellow-500 hover:bg-yellow-600 text-gray-50 p-2 rounded !hover:underline">
                                <i class="fa fa-question"></i>
                            </a>&nbsp;
                            <a href="{{ route('quizzes.edit', $quiz->id) }}" title="Düzenle"
                               class="bg-green-500 hover:bg-green-600 text-gray-50 p-2 rounded !hover:underline">
                                <i class="fa fa-pen"></i>
                            </a>&nbsp;
                            <a href="{{ route('quizzes.destroy', $quiz->id) }}" title="Sil"
                               onclick="return confirm( 'Silme işlemine devam etmek istediğinize emin misiniz?\n' +
                                'Eğer silme işlemine devam ederseniz, bu quize ait olan ' +
                                '{{ $quiz->questions_count }} soruyu da beraberinde silmiş olursunuz. ');"
                               class="bg-red-500 hover:bg-red-600 text-gray-50 p-2 rounded !hover:underline">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $quizzes->withQueryString()->links() }}
        </div>

    </div>

</x-app-layout>
