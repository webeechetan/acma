<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class AcmaEventSummit extends Model {
   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
 
  protected $fillable = [    
        'id', 'billing_name','designation','billing_tel','company_name'];    
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
   protected $table = 'acma_technolozy_summit_2020';

   public function AchmaEventMembers()
   {
       return $this->hasMany('App\Models\AchmaEventMembers','acma_id', 'id');
   }

   public function insertUser($data)
   {
       
            $this->data = $data;
          
            $this->billing_name = $this->data['billing_name'];
            $this->designation = $this->data['designation'];
            $this->billing_email = $this->data['billing_email'];
            $this->billing_tel = $this->data['billing_tel'];
            $this->company_name = $this->data['company_name'];
            $this->eligibility = $this->data['eligibility'];
            $this->number_of_member = $this->data['number_of_member'];
            $this->save();
            return $this->id;
    }

    public function getUser($limit = 10)
    {
        $_SESSION['SEARCH'] = array();

        $this->q = $this->with('AchmaEventMembers');

        /*if (isset($_REQUEST['date-range']) && !empty($_REQUEST['date-range'])) {
            $range = explode('-', $_REQUEST['date-range']);
            $startdate = explode('/', $range[0]);
            $start = trim($startdate[2]) . '-' . trim($startdate[0]) . '-' . trim($startdate[1]);
            $enddate = explode('/', $range[1]);
            $end = trim($enddate[2]) . '-' . trim($enddate[0]) . '-' . trim($enddate[1]);
            $_SESSION['SEARCH']['start'] = $start . ' 00:00:00';
            $_SESSION['SEARCH']['end'] = $end . ' 23:59:59';
            $this->q = $this->q->whereBetween('created_at', [$start . ' 00:00:00', $end . ' 23:59:59']);
        }*/

        $this->totalCount = $this->q->count();
        $this->setLimit();
        $this->recordOrderBy();
        $this->q = $this->q->get();
        $res[] = $this->q->toArray();
        $result = $res[0];
        //$result['pagination'] = $this->getPagination();

        $data['total']= $this->totalCount;
        $data['rows']=  $result;
        return $data;
    }
    private function recordOrderBy()
    {
        $this->q->orderBy('id', 'DESC');
    }

    
    private function setLimit()
    {
        $start = 0;
        if (isset($_REQUEST['offset']) && !empty($_REQUEST['limit'])) {
            $start = $_REQUEST['offset'] ;
            $limit =  $_REQUEST['limit'];
        } else {
            $start = 0;
        }

        $this->q->skip($start)->take($limit);
    }

   
    public function getLeadsCSV()
    {
        $this->q = $this->with('AchmaEventMembers');
       // $this->setSearch();
        $this->q = $this->q->get();
        $res[] = $this->q->toArray();
        $result = $res[0];
        return $result;
    }

    
    public function getUserData()
    {
        $this->q = $this->with('AchmaEventMembers');
        //$this->setSearch();
        $this->q = $this->q->get();
        $res[] = $this->q->toArray();
        $result = $res[0];
        return $result;
    }


}