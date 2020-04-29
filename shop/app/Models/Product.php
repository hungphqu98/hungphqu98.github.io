<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
/**
 * 
 */
class Product extends Model
{
	use Sortable;
	public $timestamps = false;
	protected $table = 'product';

	protected $fillable = ['name','slug','shortdes','description','price','sale_price','image','image_2','image_3','image_4','status'];
	public $sortable = ['id', 'name','price','product_rating', 'created_at', 'updated_at'];
}

?>