<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\QuestionCreateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Quiz;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $quiz = Quiz::whereId($id)->with('questions')->first() ?? abort(404, 'Quiz Bulunamadı');
        return view('admin.question.list', compact('quiz'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $quiz = Quiz::findOrFail($id);
        return view('admin.question.create', compact('quiz'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionCreateRequest $request, $id)
    {
        if ($request->hasFile('image')) {
            $filaName = Str::slug($request->question) . '.' . $request->image->extension();
            $fileNameWithUpload = 'uploads/' . $filaName;
            $request->image->move(public_path('uploads'), $filaName);
            $request->image = $fileNameWithUpload;
            $request->merge(['image' => $fileNameWithUpload]);
        }
        Quiz::findOrFail($id)->questions()->create($request->post());

        return redirect()->route('questions.index', $id)->withSuccess(
            'Yeni soru ekleme işlemi başarılı bir şekilde gerçekleştirildi'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($quiz_id, $id)
    {
        return 'show fonksiyonu';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'edit fonksiyonu';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return 'update fonksiyonu';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return 'destroy fonksiyonu';
    }
}