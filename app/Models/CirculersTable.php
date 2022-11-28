<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class CirculersTable extends Model {
   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
 
  protected $fillable = [    
        'id', 'circuler_no','title','region','daycirculer','monthcirculer','yearcirculer','keyword','attachement','type'];    
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
   protected $table = 'circulers';

}