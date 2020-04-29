<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\UserAccount;
use Kyslik\ColumnSortable\Sortable;
  
class Comment extends Model
{
    use Sortable;
    protected $table = 'comment';
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','user_email', 'product_id', 'content', 'rating'];
    public $sortable = ['id','rating'];
    /**
     * The belongs to Relationship
     *
     * @var array
     */
    
}

