<?php namespace App\Configs;

use App\Configs\Contracts\PersonRegistrationInterface;

class PersonRegistration implements PersonRegistrationInterface{

    protected $categories=[
        'health_care_worker'=>'Health Care Worker',
        'senior_citizen'=>'Senior Citizen',
        'indigent'=>'Indigent',
        'uniformed_personnel'=>'Uniformed Personnel',
        'essential_worker'=>'Essential Worker',
        'other'=>'Other'
    ];
    protected $categoryIds=[
        'prc'=>'PRC Number',
        'osca'=>'OSCA Number',
        'facility_id'=>'Facility ID Number',
        'other_id'=>'Other ID',
    ];

    public function categories()
    {
        return $this->categories;
    }
    public function categoryIds()
    {
        return $this->categoryIds;
    }
    
}