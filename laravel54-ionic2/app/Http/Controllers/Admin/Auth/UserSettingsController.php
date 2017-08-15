<?php
/**
 * Created by PhpStorm.
 * User: fabio
 * Date: 29/07/2017
 * Time: 22:06
 */

namespace FGNunesFlix\Http\Controllers\Admin\Auth;


use FGNunesFlix\Forms\UserSettingsForm;
use FGNunesFlix\Http\Controllers\Controller;
use FGNunesFlix\Repositories\UserRepository;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\Facades\FormBuilder;

class UserSettingsController extends Controller
{
    /**
     * @var UserRepository
     */
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function edit()
    {
        $form = FormBuilder::create(UserSettingsForm::class, [
            'url' => route('admin.user_settings.update'),
            'method' => 'PUT'
        ]);
        return view('admin.auth.setting', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \FGNunesFlix\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $form = FormBuilder::create(UserSettingsForm::class);

        if(!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }
        $data = $form->getFieldValues();
        $this->repository->update($data, \Auth::user()->id);
        $request->session()->flash('message', 'Senha alterado com sucesso.');
        return redirect()->route('admin.user_settings.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \FGNunesFlix\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->repository->delete($id);
        $request->session()->flash('message', 'Usuário excluido com sucesso.');
        return redirect()->route('admin.users.index');
    }
}