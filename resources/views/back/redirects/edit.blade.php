@component('back._layouts.master', [
    'pageTitle' => fragment('back.redirects.title'),
    'breadcrumbs' => Html::backToIndex('Back\RedirectsController@index'),
])

    <section>
        <div class="grid">
            <h1>
                {{ $model->old_url ?: fragment('back.redirects.new') }}
            </h1>

            {!! Form::openDraftable([
                'method'=>'PATCH',
                'action'=> ['Back\RedirectsController@update', $model->id],
                'class' => '-stacked'
            ], $model) !!}

            @if($model->technical_name && view()->exists("back.redirects._partials.{$model->technical_name}Form"))
                @include("back.redirects._partials.{$model->technical_name}Form")
            @else
                @include('back.redirects._partials.form')
            @endif

            {!! Form::close() !!}

        </div>
    </section>

@endcomponent
