@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            @component('admin.videos.tabs-conponent')
                <div class="col-md-12">
                    <h4>Novo Vídeo</h4>
                    <?php $icon = Icon::create('floppy-disk');?>
                    {!!
                        form($form->add('salvar', 'submit', [
                            'attr' => ['class' => 'btn btn-primary btn-block'],
                            'label' => $icon
                        ]))
                    !!}
                </div>
            @endcomponent
        </div>
    </div>
@endsection
