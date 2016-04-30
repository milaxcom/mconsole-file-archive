<?php

namespace Milax\Mconsole\FileArchive\Http\Controllers;

use App\Http\Controllers\Controller;
use Milax\Mconsole\API\Presets;
use Milax\Mconsole\FileArchive\Http\Requests\FileArchiveRequest;
use Milax\Mconsole\FileArchive\Models\FileArchive;
use Milax\Mconsole\Models\MconsoleUploadPreset;
use Milax\Mconsole\Models\Language;
use Milax\Mconsole\Contracts\ListRenderer;
use Milax\Mconsole\Contracts\FormRenderer;
use Milax\Mconsole\Contracts\Repository;

/**
 * Files module controller file
 */
class FileArchivesController extends Controller
{
    use \HasRedirects, \DoesNotHaveShow;
    
    protected $redirectTo = '/mconsole/filearchives';
    protected $model = '\Milax\Mconsole\FileArchive\Models\FileArchive';
    
    /**
     * Create new class instance
     */
    public function __construct(ListRenderer $list, FormRenderer $form, Repository $repository)
    {
        $this->list = $list;
        $this->form = $form;
        $this->repository = $repository;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->list->setText(trans('mconsole::filearchives.form.name'), 'name')
            ->setText(trans('mconsole::filearchives.form.slug]'), 'slug')
            ->setSelect(trans('mconsole::settings.options.enabled'), 'enabled', [
                '1' => trans('mconsole::settings.options.on'),
                '0' => trans('mconsole::settings.options.off'),
            ], true);
            
        return $this->list->setQuery($this->repository->index())->setAddAction('filearchives/create')->render(function ($item) {
            return [
                '#' => $item->id,
                trans('mconsole::filearchives.table.updated') => $item->updated_at->format('m.d.Y'),
                trans('mconsole::filearchives.table.slug') => $item->slug,
                trans('mconsole::filearchives.table.title') => $item->title,
                trans('mconsole::tables.state.name') => view('mconsole::indicators.state', $item),
            ];
        });
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->form->render('mconsole::filearchives.form', [
            'presets' => MconsoleUploadPreset::all(),
            'languages' => Language::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FileArchiveRequest $request)
    {
        $fileArchive = $this->repository->create($request->all());
        
        $this->handleUploads($fileArchive);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->form->render('mconsole::filearchives.form', [
            'item' => $this->repository->find($id),
            'presets' => MconsoleUploadPreset::all(),
            'languages' => Language::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FileArchiveRequest $request, $id)
    {
        $fileArchive = $this->repository->find($id);
        
        $this->handleUploads($fileArchive);
        
        $fileArchive->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->destroy($id);
    }
    
    /**
     * Handle files upload
     *
     * @param Milax\Mconsole\News\Models\News $news [News object]
     * @return void
     */
    protected function handleUploads($object)
    {
        // Images processing
        app('API')->uploads->handle(function ($uploads) use (&$object) {
            app('API')->uploads->attach([
                'group' => 'archive',
                'uploads' => $uploads,
                'related' => $object,
            ]);
        });
    }
}
