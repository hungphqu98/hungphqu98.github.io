<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
/**
 * 
 */
class Order extends Model
{
	use Sortable;
	public $timestamps = false;
	protected $table = 'orders';

	protected $fillable = ['name','address','city','phone','email','note','total'];
	public $sortable = ['id','status','created_at'];
}

?>