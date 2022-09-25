<x-app-layout>
    <x-slot name="header">Düzenle - {{ Str::limit($question->question, 245) }}?</x-slot>

    <div
        class="block p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

        <form method="POST" action="{{ route('questions.update', [$question->quiz_id, $question->id]) }}"
              enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-6">
                <a href="{{ asset($question->image) }}" target="_blank">
                    <img class="w-[500px] h-[250px] mb-3 border shadow rounded"
                         src="{{ asset($question->image ?? 'https://via.placeholder.com/500') }}"
                         alt="{{ $question->question }}">
                </a>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Resim ( isteğe bağlı )
                </label>
                <input type="file" name="image" value="{{ old('image') }}" style="padding: 7px;"
                       class="@error('image') {{ '!border-rose-600' }} @enderror block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">
                    <strong>Format:</strong> SVG, PNG, JPG ya da GIF (maks. 800px x 400px) olmalıdır!
                </p>
            </div>
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    Soru <span class="text-red-500">*</span>
                </label>
                <textarea name="question" rows="4" placeholder="Lütfen soru metnini yazınız..."
                          class="@error('question') {{ '!border-rose-600' }} @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('question') ?? $question->question }}</textarea>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        1. Cevap <span class="text-red-500">*</span>
                    </label>
                    <textarea name="answer1" rows="2" placeholder="Lütfen 1. cevabı yazınız..."
                              class="@error('answer1') {{ '!border-rose-600' }} @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('answer1') ?? $question->answer1 }}</textarea>
                </div>
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        2. Cevap <span class="text-red-500">*</span>
                    </label>
                    <textarea name="answer2" rows="2" placeholder="Lütfen 2. cevabı yazınız..."
                              class="@error('answer2') {{ '!border-rose-600' }} @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('answer2') ?? $question->answer2 }}</textarea>
                </div>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        3. Cevap <span class="text-red-500">*</span>
                    </label>
                    <textarea name="answer3" rows="2" placeholder="Lütfen 3. cevabı yazınız..."
                              class="@error('answer3') {{ '!border-rose-600' }} @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('answer3') ?? $question->answer3 }}</textarea>
                </div>
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        4. Cevap <span class="text-red-500">*</span>
                    </label>
                    <textarea name="answer4" rows="2" placeholder="Lütfen 4. cevabı yazınız..."
                              class="@error('answer4') {{ '!border-rose-600' }} @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('answer4') ?? $question->answer4 }}</textarea>
                </div>
            </div>
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                    Doğru Cevap <span class="text-red-500">*</span>
                </label>
                <select name="correct_answer"
                        class="@error('correct_answer') {{ '!border-rose-600' }} @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="0" selected disabled>&minus;&minus;&minus; İşlem Seçiniz &minus;&minus;&minus;
                    </option>
                    <option value="answer1" @selected($question->correct_answer == 'answer1') >1. Cevap</option>
                    <option value="answer2" @selected($question->correct_answer == 'answer2') >2. Cevap</option>
                    <option value="answer3" @selected($question->correct_answer == 'answer3') >3. Cevap</option>
                    <option value="answer4" @selected($question->correct_answer == 'answer4') >4. Cevap</option>
                </select>
            </div>
            <button type="submit"
                    class="!w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Soruyu Güncelle
            </button>
        </form>

    </div>
</x-app-layout>
