<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class IsoDocTable extends Model {
   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
 
  protected $fillable = [    
        'id','title','filename'];    
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
   protected $table = 'isodoc';

}