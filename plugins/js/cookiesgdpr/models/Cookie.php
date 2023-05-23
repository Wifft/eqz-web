<?php namespace JS\CookiesGdpr\Models;

use Model;

/**
 * Cookie Model
 */
class Cookie extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'js_gdpr_cookies';


    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];


    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];

    public $translatable = [
        'name',
        'description',
        'duration'
    ];


    public $belongsTo = [
        'type' => [
            'JS\CookiesGdpr\Models\CookieType',
            'key' => 'type_id',
            'otherKey' => 'id'
        ]
    ];

     /**
     * @var array Validation rules
     */
     public $rules = [
        'name' => 'required'
     ];

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

     public static function translateParams($params, $oldLocale, $newLocale) {
        $newParams = $params;
        foreach ($params as $paramName => $paramValue) {
            $records = self::transWhere($paramName, $paramValue, $oldLocale)->first();
            if ($records) {
                $records->translateContext($newLocale);
                $newParams[$paramName] = $records->$paramName;
            }
        }
        return $newParams;
    }

}
