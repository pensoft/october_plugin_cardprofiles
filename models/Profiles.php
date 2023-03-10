<?php namespace Pensoft\Cardprofiles\Models;

use Model;
use BackendAuth;

/**
 * Model
 */
class Profiles extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    // For Revisionable namespace
    use \October\Rain\Database\Traits\Revisionable;

    public $timestamps = false;

    // Add  for revisions limit
    public $revisionableLimit = 200;

    // Add for revisions on particular field
    protected $revisionable = ["id","names","content", "category_id", "position", "slug", "department", "email"];
    /**
     * @var string The database table used by the model.
     */
    public $table = 'pensoft_cardprofiles_items';

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
}
