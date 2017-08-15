<?php
/**
 * Created by PhpStorm.
 * User: fabio
 * Date: 29/07/2017
 * Time: 22:26
 */

namespace FGNunesFlix\Http\Controllers\Admin;


use FGNunesFlix\Forms\CategoryForm;
use FGNunesFlix\Http\Controllers\Controller;
use FGNunesFlix\Models\Category;
use FGNunesFlix\Repositories\CategoryRepository;
//use FGNunesFlix\Models\old;
//use FGNunesFlix\Repositories\old;
use Illuminate\Http\Request;
//use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\Facades\FormBuilder;

class CategoriesController extends Controller
{
    private $repository;

    /**
     * CategoriesController constructor.
     * @param CategoryRepository $repository
     */
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = $this->repository->paginate();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $form = FormBuilder::create(CategoryForm::class, [
           'url' => route('admin.categories.store'),
            'method' => 'POST'
        ]);

        return view('admin.categories.create', compact('form'));
    }

    public function store(Request $request)
    {
        $form = FormBuilder::create(CategoryForm::class);

        if(!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        $this->repository->create($data);
        $request->session()->flash('message', 'Categoria Criada com Sucesso');
        return redirect()->route('admin.categories.index');
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        $form = FormBuilder::create(CategoryForm::class, [
            'url' => route('admin.categories.update', ['category' => $category->id]),
            'method' => 'PUT',
            'model' => $category
        ]);

        return view('admin.categories.edit', compact('form'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $form = \FormBuilder::create(CategoryForm::class);

        if(!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        $this->repository->update($data, $id);
        $request->session()->flash('message', 'Categoria Alterada com Sucesso');
        return redirect()->route('admin.categories.index');
    }

    public function destroy(Request $request, $id)
    {
        $this->repository->delete($id);
        $request->session()->flash('message', 'Categoria excluida com Sucesso');
        return redirect()->route('admin.categories.index');
    }

}