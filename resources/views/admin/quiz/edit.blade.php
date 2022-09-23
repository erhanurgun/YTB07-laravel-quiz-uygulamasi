<x-app-layout>
    <x-slot name="header">Quiz Güncelle</x-slot>

    <div
        class="block p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

        <form method="POST" action="{{ route('quizzes.update', $quiz->id) }}">
            @method('PUT')
            @csrf
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Başlık <span class="text-red-500">*</span>
                </label>
                <input type="text" name="title" value="{{ old('title') ?? $quiz->title }}"
                       placeholder="Lütfen başlık giriniz..."
                       class="@error('title') {{ '!border-rose-600' }} @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2">
            </div>
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Açıklama ( isteğe bağlı )
                </label>
                <textarea name="description" cols="30" rows="5" placeholder="Lütfen varsa açıklama giriniz..."
                          class="@error('description') {{ '!border-rose-600' }} @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('description') ?? $quiz->description }}</textarea>
            </div>
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                    Quiz Durumu <span class="text-red-500">*</span>
                </label>
                <select name="status"
                        class="@error('status ') {{ '!border-rose-600' }} @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="0" selected disabled>&minus;&minus;&minus; İşlem Seçiniz &minus;&minus;&minus;
                    </option>
                    <option value="publish"
                            @if($quiz->questions_count < 4) disabled @endif @selected($quiz->status == 'publish')>
                        Yayında
                    </option>
                    <option value="draft" @selected($quiz->status == 'draft') >Taslak</option>
                    <option value="passive" @selected($quiz->status == 'passive') >Pasif</option>
                </select>
                @if($quiz->questions_count < 4)
                    <span class="mt-2 text-red-500 block">
                        <b>UYARI:</b> Quiz durumunu <b>yayında</b> yapabilmeniz için en az 4 soru eklemiş olmanız gerekmektedir!
                    </span>
                @endif
            </div>
            <div class="flex items-start mb-6">
                <div class="flex items-center h-5">
                    <input id="isFinished" type="checkbox" name="has_finished"
                           @checked(old('has_finished') ?? $quiz->finished_at)
                           class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                </div>
                <label for="isFinished"
                       class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Bitiş tarihi seçilsin mi ?
                </label>
            </div>
            <div class="mb-6" id="finishedAt" style="display: none;">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Bitiş Tarihi</label>
                <input type="datetime-local" name="finished_at"
                       value="{{ old('finished_at') ?? $quiz->finished_at }}"
                       class="@error('finished_at') {{ '!border-rose-600' }} @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <button type="submit"
                    class="!w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Quizi Güncelle
            </button>
        </form>

    </div>

    <x-slot name="js">
        <script>
            let date = '#finishedAt';
            $('#isFinished').change(function () {
                if ($(this).is(':checked')) {
                    $(date).show()
                } else {
                    $(date).hide();
                    $('[name="finished_at"]').val('');
                }
            }).is(':checked') ? $(date).show() : null;
        </script>
    </x-slot>

</x-app-layout>
