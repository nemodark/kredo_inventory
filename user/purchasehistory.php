<?php
include 'header.php';
include_once '../classes/Purchase.php';
?>

<div class="container">
	<div class="card mt-5">
		<div class="card-header">
			<h3>Purchase History</h3>
		</div>
		<div class="card-body">
			<table class="table">
				<thead>
					<th>Purchase ID</th>
					<th>Item Name</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Total</th>
					<th>Status</th>
				</thead>
				<tbody>
					<?php
						$purchase = new Purchase;
						$result = $purchase->get_purchase_history($user_id);

						if($result){
							foreach($result as $row){
							echo "<tr>";
							echo "<td>".$row['purchase_id']."</td>";
							echo "<td>".$row['item_name']."</td>";
							echo "<td>".$row['quantity']."</td>";
							echo "<td>".$row['item_price']."</td>";
							echo "<td>".$row['subtotal']."</td>";
							switch($row['purchase_status']){
								case 'pending':
								echo "<td><span class='badge badge-warning text-white'>pending</span></td>";
								break;
								case 'delivered':
								echo "<td><span class='badge badge-success text-white'>delivered</span></td>";
								break;

							}
							echo "</tr>";
						}
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>	