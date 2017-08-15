<?php

namespace FGNunesFlix\Http\Controllers\Admin;

use FGNunesFlix\Forms\VideoRelationForm;
use FGNunesFlix\Models\Video;
use FGNunesFlix\Repositories\VideoRepository;
use Illuminate\Http\Request;
use FGNunesFlix\Http\Controllers\Controller;

class VideoRelationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param VideoRepository $repository
     */
    private $repository;

    public function __construct(VideoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(Video $video)
    {
        $form = \FormBuilder::create(VideoRelationForm::class, [
           'url' => route('admin.videos.relations.store', ['video' => $video->id]),
           'method' => 'POST',
           'model' => $video
        ]);
        return view('admin.videos.relation', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $form = \FormBuilder::create(VideoRelationForm::class);

        if(!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        $this->repository->update($data, $id); //L5-repository
        $request->session()->flash('message', 'Vídeo alterado com sucesso.');
        return redirect()->route('admin.videos.relations.create', ['video' => $id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \FGNunesFlix\Models\Video  $video
     * @return \Illuminate\Http\Response
     */

}
