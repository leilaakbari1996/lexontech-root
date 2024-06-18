<?php

namespace Lexontech\Root\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RootSidebar extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'Name'       ,
        'Url'        ,
        'parent_id'  ,
        'PermissionToSeeAuthor'
    ];

    protected $table = 'root_sidebars';

    public function Children()
    {
        return $this->hasMany(self::class,'parent_id','id');
    }

    public function Parent()
    {
        return $this->belongsTo(self::class,'id','parent_id');
    }

    public static function GettingSidebarsWithChildren()
    {
        return self::query()
            ->whereNull('parent_id')
            ->with([
                'Children'
            ])
            ->get();
    }
}
