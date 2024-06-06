<?php

namespace Pensoft\Cardprofiles\Components;

use \Cms\Classes\ComponentBase;
use Pensoft\Cardprofiles\Models\Category;
class Items extends ComponentBase
{

    // $this->property();

    public function componentDetails()
    {
        return [
            'name'          => 'Profile records',
            'description'   => ''
        ];
    }

    public function defineProperties()
    {
        return [
            'show-category-title' => [
                'title' => 'Show title',
                'type' => 'checkbox',
                'default' => false,
            ],
            'category' => [
                'title' => 'Select category',
                'required' => true,
                'type' => 'dropdown',
                'description' => 'Select category',
            ],
            'maxItems' => [
                'title' => 'Max items',
                'description' => 'Max items allowed',
                'default' => 10,
            ],
            'templates' => [
				'title' => 'Select templates',
				'type' => 'dropdown',
				'default' => 'template1'
			],
        ];
    }

	public function getTemplatesOptions()
	{
		return [
			'template1' => 'Template 1',
			'template2' => 'Template 2',
		];
	}

    public function getCategoryOptions()
    {
        return Category::all()->lists('name', 'id');
    }

    public function getCategory()
    {
        return Category::find($this->property('category'));
    }
}
