<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}?</x-slot>

    <div
        class="inline-block w-[60%] float-right text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        <div class="pt-3 px-5 border-b bg-gray-200">
            <h3 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Quiz Hakkında</h3>
        </div>
        <div class="py-2 px-4 w-full border-b border-gray-200">
            <p>{{ $quiz->description }}</p>
        </div>
    </div>

    <div class="mt-2 inline-block w-[60%] float-right border-b border-gray-200 overflow-x-auto rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">#</th>
                <th scope="col" class="py-3 px-6"><i class="fa fa-user"></i> Ad Soyad</th>
                <th scope="col" class="py-3 px-6"><i class="fa fa-flag"></i> Puan</th>
                <th scope="col" class="py-3 px-6"><i class="fa fa-check"></i> Doğru</th>
                <th scope="col" class="py-3 px-6"><i class="fa fa-close"></i> Yanlış</th>
            </tr>
            </thead>
            <tbody>
            @foreach($quiz->results as $result)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="py-4 px-6">{{ $loop->iteration < 10 ? '0' . $loop->iteration : $loop->iteration }}</td>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <strong>{{ $result->user->name }}</strong>
                    </th>
                    <td class="py-4 px-6">
                        <strong>{{ $result->point }}</strong>
                    </td>
                    <td class="py-4 px-6">
                        <strong>{{ $result->correct }}</strong>
                    </td>
                    <td class="py-4 px-6">
                        <strong>{{ $result->wrong }}</strong>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-2 inline-block w-[60%] float-right ">
        <a href="{{ route('quizzes.index') }}"
           class="inline-block float-right text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-orange-600 dark:hover:bg-orange-700 focus:outline-none dark:focus:ring-orange-800">
            <i class="fa fa-repeat"></i> Geri Dön
        </a>
    </div>

    <div
        class="inline-block w-[38%] text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        <div class="pt-3 px-5 border-b bg-gray-200">
            <h3 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Quiz Detayları</h3>
        </div>
        <ul class="text-sm font-medium text-gray-900 bg-white rounded border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
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

    @if(count($quiz->topTen) > 0)
        <div
            class="mt-2 inline-block w-[38%] text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            <div class="pt-3 px-5 border-b bg-gray-200">
                <h3 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">İlk 10</h3>
            </div>
            <ul class="text-sm font-medium text-gray-900 bg-white rounded border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                @foreach($quiz->topTen as $result)
                    <li class="py-3 px-4 border-b border-gray-200 grid grid-cols-4">
                        <h4 class="mb-[-30px] text-lg mt-1">{{ $loop->iteration }}.</h4>
                        <img class="ml-9 col-start-1 w-[35px] h-[35px] rounded-full border border-gray-300"
                             src="{{ asset($result->user->profile_photo_url) }}" alt="{{ $result->user->name }}">
                        <span
                            class="col-span-2 leading-10 {{ $result->user_id == auth()->user()->id ? 'text-current font-bold' : '' }}">
                            {{ $result->user->name }}</span>
                        <span
                            class="col-end-6 w-[50px] h-6 mt-2 text-center rounded-full py-[2.7px] px-3 text-gray-50 bg-green-500">{{ $result->point }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

</x-app-layout>
