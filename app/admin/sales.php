<?php include 'inc/header.php'; ?>
<div class="container-fluid">
	<div class="row mt-3">
		<div class="col-md-6">
			<form class="form-inline" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
			  <label>Start Date:</label>
			  <input type="date" class="form-control ml-3 mr-4" name="start">
			  <label>End Date:</label>
			  <input type="date" class="form-control ml-3 mr-1" name="end">
			  <button type="submit" name="filter" class="btn btn-primary">Filter</button>
			</form>
		</div>
		<div class="col">
			<a class="btn btn-info" href="#" onclick="PrintElem('print-area')"><i class="fa fa-print"></i> Print</a>
		</div>
	</div>
	<ol class="breadcrumb mt-3">
		<li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Trang chủ</a></li>
		<li class="breadcrumb-item active">Tổng đơn</li>
	</ol>
	<div id="print-area">
		<table class="table table-bordered table-sm mt-3">
			<thead>
				<tr>
					<th>ID</th>
					<th>Tên khách hàng </th>
					<th>SĐT</th>
					<th>Tên sách</th>
					<th>Số lượng</th>
					<th>Tiền </th>
					<th class="text-center">ID đơn hàng</th>
					<th class="text-center">Ngày đặt</th>
				</tr>
			</thead>
			<tbody>
		
				
				<?php 
					if (isset($_POST['filter'])) {
						$start = $_POST['start'];
						$end = $_POST['end'];

						$sales = mysqli_query($conn, "SELECT * FROM sales s, orders o, customers c, products p WHERE s.order_id = o.id AND o.cust_id = c.id AND s.book_id = p.id AND DATE(s_date) BETWEEN '$start' AND '$end'");
					}else{
						$sales = mysqli_query($conn, "SELECT * FROM sales s, orders o, customers c, products p WHERE s.order_id = o.id AND o.cust_id = c.id AND s.book_id = p.id");
					}

				?>

				<!-- Display Sales -->
				<?php $total = 0; ?>
				<?php if ($sales): ?>
					<?php $sn = 1; ?>
					<?php foreach ($sales as $row): ?>
						<?php $cust = fetch_row('customers', 'id', $row['cust_id']); ?>
						<tr>
							<td><?php echo $sn; ?></td>
							<td><?php echo $cust['fname']." ".$cust['lname']; ?></td>
							<td><?php echo $row['phone_number']; ?></td>
							<td><?php echo $row['title']; ?></td>
							<td><?php echo $row['qty']; ?></td>
							<td><?php echo number_format($row['price'] * $row['qty'], 2); ?></td>
							<td class="text-center"><?= sprintf("%05d",$row['id']) ?></td>
							<td class="text-center"><?= split_time($row['s_date']); ?></td>
						</tr>
						<?php $sn += 1; ?>
						<?php $total += ($row['price'] * $row['qty']) ?>
					<?php endforeach ?>
				<?php endif ?>
			</tbody>
		</table>
		<p align="right">Total Income is: <?= number_format($total, 2) ?></p>
	</div>
</div>
<?php include 'inc/modals.php'; ?>
<?php include 'inc/footer.php'; ?>
<script>
	function PrintElem(elem){

          var mywindow = window.open('', 'PRINT', 'height=500,width=1200,left=100');
          mywindow.document.write("<style>table, td, th {border: 1px solid black} table {border-collapse:collapse; width: 100%;}</style>")
          mywindow.document.write('<h1 style="text-align: center">' + document.title  + '</h1>');
          mywindow.document.write(document.getElementById(elem).innerHTML);
         
          mywindow.document.close(); // necessary for IE >= 10
          mywindow.focus(); // necessary for IE >= 10*/

          mywindow.print();
          mywindow.close();

          return true;
      }
</script>