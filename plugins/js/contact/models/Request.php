<?php
namespace JS\Contact\Models;

use October\Rain\Database\Model;
use October\Rain\Database\Traits\SoftDelete;
use October\Rain\Database\Traits\Validation;

class Request extends Model
{
    use Validation, SoftDelete;

    /**
     * @inheritDoc
     */
    protected $dates = [
        'deleted_at'
    ];

    /**
     * @inheritDoc
     */
    public $table = 'js_contact_requests';

    /**
     * @inheritDoc
     */
    public $rules = [
        'name' => 'string|required|max:255',
        'email' => 'email|required|max:255',
        'msg' => 'required|max:65535',
    ];

    /**
     * @inheritDoc
     */
    public $fillable = [
        'name',
        'email',
        'msg'
    ];
}
