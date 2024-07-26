<?php

namespace App\Models\CMS\Init;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;

class InitModel extends InitBase
{
    use HasFactory;
    public static function init($title = 'Product Or News', $isChild = false)
    {
        $modelName = parent::model($title, $isChild);
        $pathMakeMode = 'CMS/' . ($isChild ? 'item/' : 'category/') . $modelName;
        Artisan::call('make:model ' . $pathMakeMode);
        return $pathMakeMode;
    }
    public static function initRelationship($title = 'Product Or Post', $parentId = 0, $isChild = false){
        $content = '';
        $model = parent::model($title, $isChild);
        $table = parent::table($title, $isChild);
        $modelChild = parent::model($title, true);

        $fullPathSample = $isChild ? pathModelItemSample() : pathModelCategorySample();
        $fullPathSave = ($isChild ? pathModelItemSave() : pathModelCategorySave()) . $model . '.php';

        if($isChild){
            $content = getContentFileAndReplaceArray($fullPathSample, ['SampleModel' => $model, 'SampleTable' => $table, 'SampleParentId' => $parentId]);
        }else{
            $content = getContentFileAndReplaceArray($fullPathSample, ['SampleModelItem' => $modelChild, 'SampleUseModelItem' => $modelChild, 'SampleParentId' => $parentId, 'SampleModel' => $model]);
        }
        return emptyAndWriteFile($fullPathSave, $content);
    }
}
