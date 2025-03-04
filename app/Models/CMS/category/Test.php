<?php

namespace App\Models\CMS\category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use App\Models\CMS\CategoryType;
use App\Models\CMS\item\ItemTest;

class Test extends Model
{
    use HasFactory;
    protected $table = 'cms_categories';
    protected $guarded = [];
    const PARENT_ID = 3;

    public function categoryType()
    {
        return CategoryType::find(self::PARENT_ID);
    }

    public function items()
    {
        return ItemTest::get();
    }

    // const BREAKPOINT = true;
}
