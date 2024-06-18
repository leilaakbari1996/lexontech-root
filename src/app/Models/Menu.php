<?php

namespace Lexontech\Root\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'root_menus';

    protected $fillable = [
        'Title'        ,
        'Link'         ,
        'parent_id'    ,
        'IconURL'      ,
        'Type'         ,
        'Status'       ,
        'Order'        ,
    ];

    public const RequiredColumns = [
        'Title'      ,
        'Type'       ,
        'Link'       ,
    ];

    public const Header   = 'header';
    public const Footer   = 'footer';

    //relations
    public function Children()
    {
        return $this->hasMany(self::class,'parent_id','id');
    }

    public function Parent()
    {
        return $this->belongsTo(self::class,'id','parent_id');
    }

    //scope functions

    public function scopeOfID($q,$type)
    {
        return $q->where('id',$type);
    }

    public function scopeOfParent($q,$type)
    {
        return $q->where('parent_id',$type);
    }

    public function scopeOfNotParent($q,$type)
    {
        return $q->whereNotIn('parent_id',$type);
    }
    public function scopeOfNotID($q,$type)
    {
        return $q->whereNot('id',$type);
    }

    public function scopeOfStatus($q,$type)
    {
        return $q->where('Status',$type);
    }

    public function scopeOfTitle($q,$type)
    {
        return $q->whereLike('Title',$type);
    }

    public function scopeOfType($q,$type)
    {
        return $q->where('Type',$type);
    }

    public function scopeOfOrder($q,$type)
    {
        return $q->where('Order',$type);
    }

    //static functions

    public static function GetMenus($filters,$selected=null)
    {
        $query = self::Search($filters)->orderByDesc('Order');
        if(!is_null($selected)) $query = $query->select($selected);
        return $query->get();
    }

    public static function GetMenusWithChildren($filters,$selected=null)
    {
        $query = self::Search($filters)->orderByDesc('Order');
        if(!is_null($selected)) $query = $query->select($selected);
        $query = $query->with([
            'Children' => function ($q) {
                $q->where('Status',true);
            }
        ]);
        return $query->get();
    }

    public static function Check($filters)
    {
        $query = self::Search($filters)->exists();
        return $query;
    }

    // private functions

    private static function Search($filters,$query=null)
    {

        $query = self::query();

        if(isset($filters['Status']) && !is_null($filters['Status']))
        {
            $query = $query->ofStatus($filters['Status']);
        }

        if(isset($filters['not_parent_id']) && !is_null($filters['not_parent_id']))
        {
            $query = $query->ofNotParent($filters['not_parent_id']);
        }

        if(isset($filters['id']) && !is_null($filters['id']))
        {
            $query = $query->ofID($filters['id']);
        }

        if (isset($filters['parent_id']) && $filters['parent_id'] == 'null')
        {
            $query = $query->whereNull('parent_id');
        }

        if(isset($filters['parent_id']) && $filters['parent_id'] != 'null' && !is_null($filters['parent_id']))
        {
            $query = $query->ofParent($filters['parent_id']);
        }

        if(isset($filters['not_id']) && !is_null($filters['not_id']))
        {
            $query = $query->ofNotID($filters['not_id']);
        }

        if(isset($filters['Title']) && !is_null($filters['Title']))
        {
            $query = $query->ofTitle($filters['Title']);
        }

        if(isset($filters['Type']) && !is_null($filters['Type']))
        {
            $query = $query->ofType($filters['Type']);
        }

        return $query;
    }
}
