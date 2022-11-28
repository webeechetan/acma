<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class DoccoronaTable extends Model {
   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
 
  protected $fillable = [    
        'id','title','doc','updatedate','cat','section'];    
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
   protected $table = 'doccorona_manager';

}