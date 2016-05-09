@if (isset($item))
    {!! Form::model($item, ['method' => 'PUT', 'url' => mconsole_url(sprintf('filearchives/%s', $item->id))]) !!}
@else
    {!! Form::open(['method' => 'POST', 'url' => mconsole_url('filearchives')]) !!}
@endif
<div class="row">
	<div class="col-lg-7 col-md-6">
        <div class="portlet light">
            @include('mconsole::partials.portlet-title', [
                'back' => mconsole_url('filearchives'),
                'title' => trans('mconsole::filearchives.form.main'),
                'fullscreen' => true,
            ])
            <div class="portlet-body form">
                
    			<div class="form-body">
    				@include('mconsole::forms.text', [
    					'label' => trans('mconsole::filearchives.form.slug'),
    					'name' => 'slug',
    				])
    				@include('mconsole::forms.text', [
    					'label' => trans('mconsole::filearchives.form.title'),
    					'name' => 'title',
    				])
    				@include('mconsole::forms.textarea', [
    					'label' => trans('mconsole::filearchives.form.description'),
    					'name' => 'description',
                        'size' => '50x4',
    				])
    			</div>
                <div class="form-actions">
                    @include('mconsole::forms.submit')
                </div>
            </div>
        </div>
	</div>
    <div class="col-lg-5 col-md-6">
        
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-blue sbold uppercase">{{ trans('mconsole::filearchives.form.upload') }}</span>
                </div>
            </div>
            <div class="portlet-body form">
                @include('mconsole::forms.upload', [
                    'type' => MX_UPLOAD_TYPE_DOCUMENT,
                    'multiple' => true,
                    'group' => 'archive',
                    'selector' => true,
                    'id' => isset($item) ? $item->id : null,
                    'model' => 'Milax\Mconsole\FileArchive\Models\FileArchive',
                ])
            </div>
        </div>
        
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-blue sbold uppercase">{{ trans('mconsole::filearchives.form.additional') }}</span>
                </div>
            </div>
            <div class="portlet-body form">
                @include('mconsole::forms.state')
            </div>
        </div>
    </div>
</div>

{!! Form::close() !!}