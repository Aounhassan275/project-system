<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Helpers\ImageHelper;
use Carbon\Carbon;
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
    public function getVillagesName()
    {
        $user_villages = UserVillage::query()->select('villages.name as name')
                        ->join('villages','user_villages.village_id','villages.id')
                        ->where('user_villages.user_id',$this->id)->get()->pluck('name')->toArray();
        return implode(',', $user_villages);
    }
    public function getFisheringFarmer($gp_id,$userIds)
    {
        
        $users = User::query()
            ->join('user_gram_panchyats', 'users.id', '=', 'user_gram_panchyats.user_id')
            ->whereIn('users.id', $userIds)
            ->where('user_gram_panchyats.gram_panchyat_id', $gp_id)
            ->select('users.id as id')
            ->get()->pluck('id')->toArray();
        $nurseryFarmers =   FarmingProfile::whereIn('user_id', $users)
                                ->where('involvement_in_fishery','=' ,'Nursery Farmer')->count();
        $growerFarmers =   FarmingProfile::whereIn('user_id', $users)
                                ->where('involvement_in_fishery','=' ,'Grower')->count();
        $bothFarmers =   FarmingProfile::whereIn('user_id', $users)
                                ->where('involvement_in_fishery','=' ,'Both')->count();
        $totalWaterBody =   FarmingProfile::whereIn('user_id', $users)->sum('total_water_body');
        $total_annual_income =   FarmingProfile::whereIn('user_id', $users)->sum('total_annual_income');
        $total_annual_income_from_fishery =   FarmingProfile::whereIn('user_id', $users)->sum('total_annual_income_from_fishery');
        return [
            'nurseryFarmers' => $nurseryFarmers,
            'growerFarmers' => $growerFarmers,
            'bothFarmers' => $bothFarmers,
            'totalWaterBody' => $totalWaterBody,
            'total_annual_income' => $total_annual_income,
            'total_annual_income_from_fishery' => $total_annual_income_from_fishery,
        ];
    }
    public function getFarmingDetailByMonth($month,$users)
    {
        $m = Carbon::parse($month)->format('M');
        
        $users = [];
        // if($this->role_id == 3)
        // {
        //  $users = User::query()
        //                 ->join('user_gram_panchyats', 'users.id', '=', 'user_gram_panchyats.user_id')
        //                 ->where('users.executive_id', $this->id)
        //                 ->select('users.id as id')
        //                 ->get()->pluck('id')->toArray();
        // }
        $currentMonthFarmingProfiles = FarmingProfile::whereIn('user_id', $users)
                                ->whereMonth('created_at',$m)->count();
        $currentMonthFarmingReports = MonthlyFarmingReport::whereIn('user_id', $users)
                                ->whereMonth('created_at',$m)->count();

        return [
            'currentMonthFarmingProfiles' => $currentMonthFarmingProfiles,
            'currentMonthFarmingReports' => $currentMonthFarmingReports,
        ];
    }
    public function getTrainingDetailByMonth($month,$users)
    {
        $m = Carbon::parse($month)->format('M');
        // $users = [];
        // if($this->role_id == 3)
        // {
        //     $users = User::query()
        //             ->join('user_gram_panchyats', 'users.id', '=', 'user_gram_panchyats.user_id')
        //             ->where('users.executive_id', $this->id)
        //             ->select('users.id as id')
        //             ->get()->pluck('id')->toArray();
        // }
        $currentMonthTraingReport = TrainingReport::whereIn('user_id', $users)
                                ->whereMonth('created_at',$m)->count();
        $number_of_participants = TrainingReport::whereIn('user_id', $users)
                                ->whereMonth('created_at',$m)->sum('number_of_participants');

        return [
            'number_of_participants' => $number_of_participants,
            'currentMonthTraingReport' => $currentMonthTraingReport,
        ];
    }
}
