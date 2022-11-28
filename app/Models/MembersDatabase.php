<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class MembersDatabase extends Model {
   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
 
  protected $fillable = [    
        'id', 'companyname', 'address1', 'address2', 'address3', 'city', 'pin', 'state', 'phone', 'fax', 'email', 'website', 'productmanufactured', 'product2', 'product3', 'product4'];    
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
   protected $table = 'members_databse';

}