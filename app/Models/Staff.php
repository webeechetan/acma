<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Filesystem\Filesystem;
use PHPThumb\GD;
class Staff extends Model {
   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
 
  protected $fillable = [    
        'name', 'email','company', 'region','userid', 'password'
      ];    
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
   protected $table = 'staff';


}