<?php 
namespace App\Helper;

class Cart {
    public $items;
    public $total_quantity;
    public $total_price;
    public function __construct() {
        $this->items = session('cart') ? session('cart') : [];
        $this->total_quantity = $this->total_qtt();
        $this->total_price = $this->total_price();
    }
    public function add($pro,$qtt) {
        if (isset($this->items[$pro->id])){
            $this->items[$pro->id]['quantity'] += $qtt;
        } else {
            $cart = [
            'id' => $pro->id,
            'name' => $pro->name,
            'image' => $pro->image,
            'price' => $pro->sale_price > 0 ? $pro->sale_price : $pro->price,
            'quantity' => $qtt
        ];

        $this->items[$pro->id] = $cart;
    }
        session(['cart'=> $this->items]);
	}
	public function update($id,$qtt) {
		if(isset($this->items[$id])){
            $this->items[$id]['quantity'] = $qtt;
            session(['cart'=> $this->items]);
        }
	}
	public function delete($id) {
		if(isset($this->items[$id])){
            unset($this->items[$id]);

            session(['cart'=> $this->items]);
        }
	}
	private function total_price() {
        $total = 0;
        foreach ($this->items as $key => $item) {
            $total += $item['price']*$item['quantity'];
        }
        return $total;
    }
    private function total_qtt() {
        $total = 0;
        foreach ($this->items as $key => $item) {
            $total += $item['quantity'];
        }
        return $total;
	}

}




?>