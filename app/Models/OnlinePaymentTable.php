<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class OnlinePaymentTable extends Model {
   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
 
  protected $fillable = [   
      'id','billing_name','designation','billing_email','billing_tel','company_name','event_name','gstno','billing_address','amount','tds_amount','currency','payment_type','payment_option','agree','order_id','status','tid'];  
     // 
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
   protected $table = 'online_payment';

}