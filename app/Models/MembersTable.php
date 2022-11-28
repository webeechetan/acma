<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class MembersTable extends Model {
   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
 
  /*protected $fillable = [    
        'id', 'name', 'email', 'adress1', 'city', 'state', 'country', 'pin', 'company', 'relegion', 'phone', 'fax', 'website', 'products', 'register_day', 'register_month', 'register_year', 'username', 'password', 'access_allowed', 'access_to_forum', 'access_to_ec_forum', 'create_profile', 'acma_member', 'acma_ipo_member', 'acma_staff'];  */
    protected $fillable = [    
        'id', 'name', 'email', 'company', 'region', 'userid', 'password'];     
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;    
    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'memberlogin';

}