<?php

namespace Lexontech\Root\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RootAttributes extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'Name',
        'Status'
    ];

    public function scopeStatus($q,$type)
    {
        return $q->where('Status',$type);
    }

    public function scopeNameLike($q,$type)
    {
        return $q->whereLike('Name',$type);
    }

    public function scopeName($q,$type)
    {
        return $q->where('Name',$type);
    }

    public static function GettingAttributes(array $filter,array $select)
    {
        $query = self::query();
        $query = self::Search($query,$filter);
        if(!is_null($select)) $query = $query->select($select);

        return $query->get();
    }

    public static function Check(array $filter)
    {
        $query = self::query();
        $query = self::Search($query,$filter);

        return $query->exists();
    }

    private static function Search($query,array $filter)
    {
        if(isset($filter['Status']))
        {
            if(!is_null($filter['Status']))
            {
                $query = $query->status($filter['Status']);
            }
        }

        if(isset($filter['NameReally']))
        {
            if(!is_null($filter['NameReally']))
            {
                $query = $query->name($filter['NameReally']);
            }
        }

        if(isset($filter['Name']))
        {
            if(!is_null($filter['Name']))
            {
                $query = $query->nameLike($filter['name']);
            }
        }

        return $query;
    }

}
