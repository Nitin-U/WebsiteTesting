<?php include "crud/connection.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style type="text/css">
		#headings-padding-manageTrad{
			margin-top: 40px;
			margin-bottom: 40px;
		}

		hr.head1 {
			border-top: 4px solid #343A40;
			width: 20%;
			border-radius: 2px;
		}

		#tradTable{
			margin-bottom: 150px;
		}

		/*span.status{
			color: #7CC355;
			}*/

			i.fa-check,.fa-ban{
				color: #F48037;
				transition: .4s;
			}
			a.disabled i.fa-check{
				color: grey;
				transition: .4s;
			}
			i.fa-check:hover,.fa-ban:hover{
				color: #1F2130;
			}

			th,td{
				font-size: 18px;
			}

			@media screen and (max-width: 768px) {
				th,td{
					font-size: 14px;
				}

				@media screen and (max-width: 450px) {
					th,td{
						font-size: 11px;
					}

				</style>

			</head>
<body>
<?php include "header.php"; ?>

<div class="container" id="headings-padding-manageTrad">
<div class="row">
	<div class="col-12 text-center">
		<h1>Trader Management</h1>
		<hr class="head1">
	</div>


</div>
</div>

<div class="container" id="tradTable">
<table class="table">
	<thead class="thead-dark">
		<tr>
			<th scope="col">#</th>
			<th scope="col">Traders</th>
			<th scope="col">Role</th>
			<th scope="col">Status</th>
			<th scope="col">Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$display_Trad = "Select * from user_master where ROLE = 'trader' order by STATUS,NAME ASC";
		$display_Result = oci_parse($conn, $display_Trad);
		oci_execute($display_Result);
		$i = 1;

		while($fetch_trader = oci_fetch_assoc($display_Result)) { 

			?>
			<tr>
				<th scope="row"><?php echo $i; $i++; ?></th>
				<td><?php echo $fetch_trader['NAME']; ?></td>
				<td><?php echo ucfirst($fetch_trader['ROLE']); ?></td>
				<td><?php
				if($fetch_trader['STATUS']=='Verified')
					{ ?>
						<span class="status mr-2" style="color: #7CC355;">&bull;</span>
					<?php }
					else
						{ ?>
							<span class="status mr-2" style="color: red;">&bull;</span>
						<?php }


						?></i><?php echo $fetch_trader['STATUS']; ?></td>
						<form>
							<td>
								<a href="amendTrader.php?tradID=<?php echo $fetch_trader['USER_ID'] ?>" class="btn	<?php if($fetch_trader['STATUS']=="Verified") echo "disabled"?>" onclick="return confirm('Are you sure you want to accept this trader?')"><i class="fa-solid fa-check col-5"></i></a> 

								<a href="declineTrader.php?trad_decl=<?php echo $fetch_trader['USER_ID'] ?>" onclick="return confirm('Are you sure you want to decline this trader?')"><i class="fas fa-ban"></i></a>

								<!-- <a href="amendTrader.php?trad_deac_ID=<?php echo $fetch_trader['USER_ID'] ?>" onclick="return confirm('Are you sure you want to deactivate this trader?')"><i class="fas fa-ban"></i></a> -->
							</td>
						</form>
					</tr>
				<?php } ?>
			</tbody>
		</table>	
	</div>



	<?php include "footer.php"; 
	clearMsg();
	?>

</body>
</html>