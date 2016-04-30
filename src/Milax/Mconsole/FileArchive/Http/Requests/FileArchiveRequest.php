<?php 

namespace Milax\Mconsole\FileArchive\Http\Requests;

use App\Http\Requests\Request;
use Milax\Mconsole\FileArchive\Models\FileArchive;

class FileArchiveRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $fileArchive = FileArchive::find($this->filearchives);
        
        switch ($this->method) {
            case 'PUT':
            case 'UPDATE':
                return [
                    'slug' => 'max:255|unique:file_archives,slug,' . $fileArchive->id,
                    'title' => 'required|max:255',
                ];
                break;
            
            default:
                return [
                    'slug' => 'max:255|unique:file_archives',
                    'title' => 'required|max:255',
                ];
        }
    }
    
    /**
     * Set custom validator attribute names
     *
     * @return Validator
     */
    protected function getValidatorInstance()
    {
        $validator = parent::getValidatorInstance();
        $validator->setAttributeNames(trans('mconsole::filearchives.form'));
        
        return $validator;
    }
}