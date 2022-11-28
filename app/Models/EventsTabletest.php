<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class EventsTabletest extends Model {
   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
 
  protected $fillable = [    
        'id','title','about','location','howto','eventdate','url','status'];    
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
   protected $table = 'events1';

}