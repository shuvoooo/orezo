<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'referred_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeHasPermission($value)
    {

    }

    public function scopeByRole($query, $role)
    {
        return $query->where('role', $role);
    }

    public function permissions()
    {
        return $this->hasOne(RolePermission::class, 'user_id');
    }

    public function address()
    {
        return $this->hasOne(Address::class, 'user_id');
    }

    public function personalInformation()
    {
        return $this->hasMany(PersonalInformation::class);
    }

    public function spouseInformation()
    {
        return $this->hasOne(SpouseInformation::class, 'user_id');
    }

    public function bank()
    {
        return $this->hasOne(Bank::class);
    }

    public function expense()
    {
        return $this->hasOne(Expense::class, 'user_id');
    }

    // tax

    public function assets()
    {
        return $this->hasOne(Asset::class, 'user_id');
    }

    public function miscellaneous()
    {
        return $this->hasOne(Miscellaneous::class, 'user_id');
    }

    public function document()
    {
        return $this->hasOne(Document::class, 'user_id');
    }

    protected function userPermissions()
    {
        return [
            'manage_page' => 'Manage Pages',
            'manage_client' => 'Manage Clients',
            'manage_invoice' => 'Manage Invoices',
            'manage_status' => 'Manage Status',
            'manage_referal' => 'Manage Referal',
            'view_total_invoice' => 'View Total Invoices',
            'view_paid_invoice' => 'View Paid Invoices',
            'view_unpaid_invoice' => 'View UnPaid Invoices',
            'view_total_revenue' => 'View Total Revenue',
            'view_agv_revenue' => 'View Average Revenue',
        ];
    }

    // public function addedBy()
    // {
    //     // return belongsToMany();
    //     $this->belongsToMany(User::class, 'customer', 'customer_id');
    // }

    // public function addedBy() {
    //     return $this->belongsToMany('App\User', 'file_status', 'added_by', 'user_id');
    // }
}
