<?php namespace Pensoft\Cardprofiles\Models;

use Model;
use BackendAuth;
use Validator;

/**
 * Model
 */
class Profiles extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'pensoft_cardprofiles_items';

    /**
     * @var array Translatable fields
     */
    public $translatable = [
        'names',
        'slug',
        'body',
        'content',
        'position',
        'department',
        'address',
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
        'category' => [Category::class, 'key' => 'category_id', 'otherKey' => 'id'],
		'country' => ['RainLab\Location\Models\Country', 'scope' => 'isEnabled'],
		'partner' => ['Pensoft\Partners\Models\Partners', 'key' => 'partner_id'],
    ];

    public $attachOne = [
        'avatar' => 'System\Models\File'
    ];

    public function beforeValidate()
    {
        if (empty($this->sort_order)) {
            $this->sort_order = static::max('sort_order') + 1;
        }
    }

    public function getResizedAvatarAttribute()
    {
        if (!$this->avatar) {
            return;
        }

        $imageCropper = new \Zakir\ImageCropper\Plugin($this->app);
        $image = $imageCropper->crop_image($this->avatar);

        $resizer = new \ABWebDevelopers\ImageResize\Classes\Resizer($image, false);


        return $resizer->resize(290, 290, [
            'mode' => 'crop'
        ]);
    }

    public function getThumbAvatarAttribute()
    {
        if (!$this->avatar) {
            return;
        }

        $imageCropper = new \Zakir\ImageCropper\Plugin($this->app);
        $image = $imageCropper->crop_image($this->avatar);

        $resizer = new \ABWebDevelopers\ImageResize\Classes\Resizer($image, false);


        return $resizer->resize(100, 100, [
            'mode' => 'crop'
        ]);
    }

    // Add  below relationship with Revision model
    public $morphMany = [
        'revision_history' => ['System\Models\Revision', 'name' => 'revisionable']
    ];

    // Add below function use for get current user details
    public function diff(){
        $history = $this->revision_history;
    }
    public function getRevisionableUser()
    {
        return BackendAuth::getUser()->id;
    }

    /**
     * Add translation support to this model, if available.
     *
     * @return void
     */
    public static function boot()
    {
        Validator::extend(
            'json',
            function ($attribute, $value, $parameters) {
                json_decode($value);

                return json_last_error() == JSON_ERROR_NONE;
            }
        );

        // Call default functionality (required)
        parent::boot();

        // Check the translate plugin is installed
        if (!class_exists('RainLab\Translate\Behaviors\TranslatableModel')) {
            return;
        }

        // Extend the constructor of the model
        self::extend(
            function ($model) {
                // Implement the translatable behavior
                $model->implement[] = 'RainLab.Translate.Behaviors.TranslatableModel';
            }
        );
    }

}
