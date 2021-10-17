<?php 

session_start();
require_once '../../config/header.php';

checkAuth('users','../index.php');

$sql = "SELECT * FROM clients";
$get = mysqli_query($connect,$sql);
?>

<?php require_once '../../config/headerIn.php'; ?>
					<!-- ============================================================== -->
					<!-- Code -->
					<!-- ============================================================== -->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="card">
							<h5 class="card-header">Clients List</h5>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-striped table-bordered first">
										<thead>
											<tr>
												<th>ID</th>
												<th>Name</th>
												<th>Email</th>
												<th>Doctor</th>
												<th>Control</th>
											</tr>
										</thead>
										<tbody>
											<?php while($client = mysqli_fetch_assoc($get)){ ?>

												<tr>
													<td><?php echo $client['unID']; ?></td>
													<td><?php echo $client['name']; ?></td>
													<td><?php echo $client['email']; ?></td>
													<td><?php echo !empty($client['doctor'])?$client['doctor']:'Not yet'; ?></td>
														
													<td>
														<a href="show.php?id=<?php echo $client['unID']; ?>"><li class="fas fa-user"></li></a>||
														<a href="delete.php?id=<?php echo $client['unID']; ?>"><li class="fas fa-window-close"></li></a>
													</td>
												</tr>

											<?php } ?>
											</tbody>

										</table>
									</div>
								</div>
							</div>
						</div>
						<!-- ============================================================== -->
						<!-- End Code -->
						<!-- ============================================================== --> 


<?php require_once '../../config/footerIn.php'; ?>