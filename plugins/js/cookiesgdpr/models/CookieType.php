<?php namespace JS\CookiesGdpr\Models;

use Model;

/**
 * CookieType Model
 */
class CookieType extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'js_gdpr_cookie_types';

    public $timestamps = false;

    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];

    public $translatable = [
        'name',
        'description'
    ];

    /**
    * @var array Validation rules
    */
    public $rules = [
        'name' => 'required'
    ];


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
