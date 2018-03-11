<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserEmailAddress extends Model {
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'email_address', 'is_default',
    ];
    
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
        
   
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_email_addresses';
    
    public function user(){
        $this->belongsTo('Users');
    }

}
