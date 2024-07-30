<?php

namespace App\Models\CMS\item;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CMS\Category;

class ItemPost extends Model
{
    use HasFactory;
    protected $table = 'cms_item_posts';
    protected $guarded = [];
    const PARENT_ID = 4;
    protected $casts = [
        'data' => 'array', // Định nghĩa cột data là dạng mảng (array)
    ];
    public function category()
    {
        return Category::with('categoryType')->find(self::PARENT_ID);
    }

    public function getAll($cond, $paginate = true, $paramsPaginate) 
    {
        $query = $this::query();
        // Nếu có điều kiện title được truyền vào từ bên ngoài
        if (isset($cond['title'])) {
            $query->where('title', 'like', '%' . $cond['title'] . '%');
        }
        // Kiểm tra nếu cần phân trang
        if (isset($paginate)) {
            return $query->paginate($paramsPaginate['itemPerPage'], $paramsPaginate['columns'], 'page', $paramsPaginate['page']);
        } else {
            return $query->get();
        }
    }

    // const BREAKPOINT = true;
}
