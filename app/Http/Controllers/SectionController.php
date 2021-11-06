<?php

namespace App\Http\Controllers;

use App\Filters\ItemFilter;
use App\Http\Resources\Item\ItemCollection;
use App\Http\Resources\Section\SectionResource;
use App\Models\Section;
use App\Services\SectionService;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    private $service;

    public function __construct(SectionService $service)
    {
        $this->service = $service;
    }

    public function show(Section $section , ItemFilter $filter)
    {
        return new SectionResource($section , $filter);
    }
}
