<?php
require 'connect.php';
class Shopping_Cart {
	var $cart_name;       // The name of the cart/session variable
	var $items = array(); // The array for storing items in the cart

	function __construct($name) {
		$this->cart_name = $name;
		@	$this->items = $_SESSION[$this->cart_name];
	}
	
	/**
	 * setItemQuantity() - Set the quantity of an item.
	 *
	 * @param string $order_code The order code of the item.
	 * @param int $quantity The quantity.
	 */
	function setItemQuantity($order_code, $quantity) {
		if ($quantity == 0){
		$this->items[$order_code] = $quantity;
		}else{
		$this->items[$order_code] += $quantity;
		}
	}
	
	function getItemName($order_code) {
		$query = "SELECT * FROM `description` 
		WHERE `description`.`order_code` = '$order_code'";
		
		if ($query_run = mysql_query($query)){
			while($query_row = mysql_fetch_assoc($query_run)) {
			//for ($i = 1; $i <= $max && $query_row = mysql_fetch_assoc($query_run); $i++) {
				$prod = $query_row ['names'];
				return $prod;
				//return $prod .' (' . $order_code . ')';
			}
		}
	}
	
	function getItems() {
		return $this->items;
	}

	function hasItems() {
		return (bool) $this->items;
	}
	
	/**
	 * getItemQuantity() - Get the quantity of an item in the cart.
	 *
	 * @param string $order_code The order code.
	 * @return int The quantity.
	 */
	function getItemQuantity($order_code) {
		return (int) $this->items[$order_code];
	}
	
	/**
	 * clean() - Cleanup the cart contents. If any items have a
	 *           quantity less than one, remove them.
	 */
	function clean() {
		foreach ( $this->items as $order_code=>$quantity ) {
			if ( $quantity < 1 )
				unset($this->items[$order_code]);
		}
	}
	
	/**
	 * save() - Saves the cart to a session variable.
	 */
	function save() {
		$this->clean();
		$_SESSION[$this->cart_name] = $this->items;
	}
}

?>