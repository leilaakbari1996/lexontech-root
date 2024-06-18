<?php

namespace Lexontech\Root\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Service extends Model
{
    use HasFactory,SoftDeletes;

    public const Expertise = 'expertise';
    public const Services  = 'services';

    protected $fillable = [
        'Title'      ,
        'Type'       ,
        'LogoURL'    ,
        'Link'       ,
        'Text'       ,
        'Status'     ,
        'Order'      ,
    ];

    public const RequiredColumns = [
        'Title'      ,
        'Type'       ,
        'filepond'   ,
        'Link'       ,
    ];

    protected $table = 'root_services';

    //scope functions

    public function scopeOfID($q,$type)
    {
        return $q->where('id',$type);
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

    public function scopeOfLink($q,$type)
    {
        return $q->where('Link',$type);
    }


    //static functions

    public static function GetServices($filters,$selected=null)
    {
        $query = self::Search($filters)->orderByDesc('Order');
        if(!is_null($selected)) $query = $query->select($selected);
        return $query->paginate(8);
    }

    public static function Services($filters,$selected=null)
    {
        $query = self::Search($filters)->orderByDesc('Order');
        if(!is_null($selected)) $query = $query->select($selected);
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

        if(isset($filters['id']) && !is_null($filters['id']))
        {
            $query = $query->ofID($filters['id']);
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

        if(isset($filters['Link']) && !is_null($filters['Link']))
        {
            $query = $query->ofLink($filters['Link']);
        }

        return $query;
    }
}
