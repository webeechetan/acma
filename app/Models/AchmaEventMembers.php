<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class AchmaEventMembers extends Model {
   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
 
  protected $fillable = [    
        'id', 'acma_id','member_name','member_email','member_mobile_no'];    
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
   protected $table = 'acma_technolozy_summit_member_2020';

   

   public function insertUser($data)
   {
            #$this->data = $data;
            #echo '<pre>';  print_R( $data); echo '</pre>';
            $this->acma_id = $data['acma_id'];
            $this->member_name = $data['member_name'];
            $this->member_email = $data['member_email'];
            $this->member_mobile_no = $data['member_mobile_no'];
            $this->member_designation = $data['member_designation'];
          
            $this->save();
            return $this->id;
    }


}