<?php

namespace Lexontech\Root\app\Models\AuthenticationSystem;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class User extends Authenticatable
{
    use HasFactory, Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';

    protected $fillable = [
        'lex_PhoneNumber'     ,
        'password'            ,
        'FullName'            ,
        'ProfileURL'          ,
        'Status'              ,
        'Type'                ,
    ];

    public const Admin  = 'admin';
    public const Member = 'member';

    public const RequiredColumns = [
        'lex_PhoneNumber'     ,
        'Status'              ,
        'Type'                ,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

//    protected static function boot()
//    {
//        parent::boot();
//
//        static::creating(function($model){
//            $model->email = Str::random(8).time().'@gmail.com';
//        });
//    }

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

    public function scopeOfFullName($q,$type)
    {
        return $q->whereLike('FullName',$type);
    }

    public function scopeOfPhoneNumber($q,$type)
    {
        return $q->where('lex_PhoneNumber',$type);
    }


    //static functions

    public static function updateOrCreateByPhone($phone)
    {
        return self::updateOrCreate([
            'lex_PhoneNumber' => $phone
        ],[
            'password'    => Hash::make('123456')
        ]);
    }


    public static function Check($filters)
    {
        $query = self::Search($filters)->exists();
        return $query;
    }

    public static function GetUsers($filters,$select=null)
    {
        $query = self::Search($filters);
        if(!is_null($select)) $query = $query->select($select);
        return $query->get();
    }
    public static function GetUsersWithPagination($filters,$select=null,$page = 1)
    {
        $query = self::Search($filters);
        if(!is_null($select)) $query = $query->select($select);
        return $query->paginate(8,$page);
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

        if(isset($filters['FullName']) && !is_null($filters['FullName']))
        {
            $query = $query->ofFullName($filters['FullName']);
        }

        if(isset($filters['PhoneNumber']) && !is_null($filters['PhoneNumber']))
        {
            $query = $query->ofPhoneNumber($filters['PhoneNumber']);
        }

        return $query;
    }
}
