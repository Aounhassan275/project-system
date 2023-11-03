<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'image',
        'is_verified',
        'is_active',
        'user_id',
        'state_id',
        'district_id',
        'block_id',
        'employee_code',
        'phone',
        'field_staff_id',
        'executive_id',
        'project_manager_id'
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function role()
    {
        return $this->belongsTo(Role::class,'role_id');
    }
    public function field_staff()
    {
        return $this->belongsTo(User::class,'field_staff_id');
    }
    public function executive()
    {
        return $this->belongsTo(User::class,'executive_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function district()
    {
        return $this->belongsTo(District::class,'district_id');
    }
    public function project_manager()
    {
        return $this->belongsTo(User::class,'project_manager_id');
    }
    public function projects()
    {
        return $this->hasMany(ProjectUser::class);
    }
    public function trainingReports()
    {
        return $this->hasMany(TrainingReport::class);
    }
    public function respondentMasters()
    {
        return $this->hasMany(RespondentMaster::class);
    }
    public function monthlyFarmingReports()
    {
        return $this->hasMany(MonthlyFarmingReport::class);
    }
    public function farmingProfiles()
    {
        return $this->hasMany(FarmingProfile::class);
    }
    public function getRole()
    {
        return $this->role->name ?? null;
    }
    
    public function setPasswordAttribute($value){
        if (!empty($value)){
            $this->attributes['password'] = Hash::make($value);
        }
    }
    public function setImageAttribute($value){
        $this->attributes['image'] = ImageHelper::saveImage($value,'/uploaded_images/profiles/');
    }
}
