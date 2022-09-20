<x-app-layout>
    <x-slot name="header">Quiz Oluştur</x-slot>

    <div style="width: 100%; margin: auto;"
         class="block p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

        <form method="POST" action="{{ route('quizzes.store') }}">
            @csrf
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Başlık</label>
                <input type="text" name="title" value="{{ old('title') }}" placeholder="Lütfen başlık giriniz..."
                       required
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Açıklama</label>
                <textarea name="description" cols="30" rows="5" placeholder="Lütfen varsa açıklama giriniz..."
                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('description') }}</textarea>
            </div>
            <div class="flex items-start mb-6">
                <div class="flex items-center h-5">
                    <input id="isFinished" type="checkbox"
                           class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                </div>
                <label for="isFinished" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Bitiş tarihi seçilsin mi ?
                </label>
            </div>
            <div class="mb-6" id="finishedAt" style="display: none;">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Bitiş Tarihi</label>
                <input type="datetime-local" name="finished_at" value="{{ old('finished_at') }}"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <button type="submit"
                    class="!w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Yeni Quiz Oluştur
            </button>
        </form>

    </div>

    <x-slot name="js">
        <script>
            $('#isFinished').change(function () {
                if ($(this).is(':checked')) {
                    $('#finishedAt').show();
                } else {
                    $('#finishedAt').hide();
                }
            });
        </script>
    </x-slot>

</x-app-layout>
