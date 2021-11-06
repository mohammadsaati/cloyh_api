<?php

 namespace App\Services;

 use App\Models\Section;
 use App\Services\Service;

 class SectionService extends Service
{
    private static $self_paginate;

    public function __construct()
    {
        parent::__construct();
        $this->pagination = self::$self_paginate;
    }

     public function model()
	{
        $this->model = Section::class;
	}

     public static function getItemsWithPagination($section , $filters)
     {
         return $section->items()->filter($filters)->paginate(self::$self_paginate);
     }

 }
