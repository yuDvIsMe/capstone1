<?php
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
session_start();
require("config.php");
////code

if (!isset($_SESSION['auser'])) {
	header("location:index.php");
}

//// code insert
//// add code
$error = "";
$msg = "";
if (isset($_POST['add'])) {

	$title = $_POST['title'];
	$content = $_POST['content'];
	$ptype = $_POST['ptype'];
	$pool = $_POST['pool'];
	$bed = $_POST['bed'];
	$direction = $_POST['direction'];
	$parkinglot = $_POST['parkinglot'];
	$stype = $_POST['stype'];
	$bath = $_POST['bath'];
	$kitc = $_POST['kitc'];
	$floor = $_POST['floor'];
	$price = $_POST['price'];
	$city = $_POST['city'];
	$asize = $_POST['asize'];
	$loc = $_POST['loc'];
	$status = $_POST['status'];
	$uid = $_SESSION['uid'];

	$security = $_POST['security'];
	$lat = $_POST['lat'];
	$long = $_POST['long'];


	$aimage = $_FILES['aimage']['name'];
	$aimage1 = $_FILES['aimage1']['name'];
	$aimage2 = $_FILES['aimage2']['name'];
	$aimage3 = $_FILES['aimage3']['name'];
	$aimage4 = $_FILES['aimage4']['name'];

	$fimage = $_FILES['fimage']['name'];

	$temp_name  = $_FILES['aimage']['tmp_name'];
	$temp_name1 = $_FILES['aimage1']['tmp_name'];
	$temp_name2 = $_FILES['aimage2']['tmp_name'];
	$temp_name3 = $_FILES['aimage3']['tmp_name'];
	$temp_name4 = $_FILES['aimage4']['tmp_name'];

	$temp_name5 = $_FILES['fimage']['tmp_name'];

	move_uploaded_file($temp_name, "admin/property/$aimage");
	move_uploaded_file($temp_name1, "admin/property/$aimage1");
	move_uploaded_file($temp_name2, "admin/property/$aimage2");
	move_uploaded_file($temp_name3, "admin/property/$aimage3");
	move_uploaded_file($temp_name4, "admin/property/$aimage4");

	move_uploaded_file($temp_name5, "admin/property/$fimage");


	$sql = "insert into property (title,pcontent,type,pool,stype,bedroom,bathroom,direction,kitchen,parkinglot,floor,size,price,location,city,pimage,pimage1,pimage2,pimage3,pimage4,uid,status,mapimage,security,lat,`long`) 
	values('$title','$content','$ptype','$pool','$stype','$bed','$bath','$direction','$kitc','$parkinglot','$floor','$asize','$price',
	'$loc','$city','$aimage','$aimage1','$aimage2','$aimage3','$aimage4','$uid','$status','$fimage','$security','$lat','$long')";
	$result = mysqli_query($con, $sql);
	if ($result) {
		$msg = "<p class='alert alert-success'>Th??nh c??ng</p>";
	} else {
		$error = "<p class='alert alert-warning'>C?? v???n ????? khi ????ng tin, vui l??ng th??? l???i!</p>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>iHome | Th??m m???i</title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Feathericon CSS -->
	<link rel="stylesheet" href="assets/css/feathericon.min.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/style.css">

	<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body>


	<!-- Header -->
	<?php include("header.php"); ?>
	<!-- /Sidebar -->

	<!-- Page Wrapper -->
	<div class="page-wrapper">
		<div class="content container-fluid">

			<!-- Page Header -->
			<div class="page-header">
				<div class="row">
					<div class="col">
						<h3 class="page-title">Qu???n l?? c??n h???</h3>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
							<li class="breadcrumb-item active">C??n h???</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /Page Header -->

			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Th??m c??n h??? m???i</h4>
						</div>
						<form method="post" enctype="multipart/form-data">
							<div class="card-body">
								<h5 class="card-title">Chi ti???t c??n h???</h5>
								<?php echo $error; ?>
								<?php echo $msg; ?>

								<div class="row">
									<div class="col-xl-12">
										<div class="form-group row">
											<label class="col-lg-2 col-form-label">Ti??u ?????</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="title" required placeholder="Nh???p ti??u ?????">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-2 col-form-label">M?? t???</label>
											<div class="col-lg-9">
												<textarea class="tinymce form-control" name="content" rows="10" cols="30"></textarea>
											</div>
										</div>

									</div>
									<div class="col-xl-6">
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Lo???i nh?? ???</label>
											<div class="col-lg-9">
												<select class="form-control" required name="ptype">
													<option value="">Lo???i</option>
													<option value="Nh?? ph???">Nh?? ph???</option>
													<option value="Chung c??">Chung c??</option>
													<option value="Penhouse">Penhouse</option>
													<option value="Villa">Villa</option>
													<option value="V??n ph??ng">V??n ph??ng</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">T??nh tr???ng</label>
											<div class="col-lg-9">
												<select class="form-control" required name="stype">
													<option value="">Ch???n</option>
													<option value="Thu??">Thu??</option>
													<option value="B??n">B??n</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Ph??ng t???m</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="bath" required placeholder="Nh???p s??? ph??ng">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">B???p</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="kitc" required placeholder="Nh???p s??? ph??ng">
											</div>
										</div>

									</div>
									<div class="col-xl-6">
										<div class="form-group row mb-3">
											<label class="col-lg-3 col-form-label">H??? b??i</label>
											<div class="col-lg-9">
												<select class="form-control" required name="pool">
													<option value="">Ch???n</option>
													<option value="C??">C??</option>
													<option value="Kh??ng">Kh??ng</option>
												</select>
											</div>
										</div>
										<div class="form-group row mb-3">
											<label class="col-lg-3 col-form-label">B??i ?????u xe</label>
											<div class="col-lg-9">
												<select class="form-control" required name="parkinglot">
													<option value="">Ch???n</option>
													<option value="C??">C??</option>
													<option value="Kh??ng">Kh??ng</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Ph??ng ng???</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="bed" required placeholder="Nh???p s??? ph??ng">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">H?????ng</label>
											<div class="col-lg-9">
												<select class="form-control" required name="direction">
													<option value="">Ch???n</option>
													<option value="????ng">????ng</option>
													<option value="T??y">T??y</option>
													<option value="Nam">Nam</option>
													<option value="B???c">B???c</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<h5 class="text-secondary">?????a ??i???m v?? gi?? c???</h5>
								<hr>
								<div class="row">
									<div class="col-xl-6">
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">S??? t???ng</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="floor" required placeholder="Nh???p s??? t???ng">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Gi??</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="price" required placeholder="Nh???p gi??">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Th??nh ph???</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="city" required placeholder="Nh???p t??n th??nh ph???">
											</div>
										</div>
									</div>
									<div class="col-xl-6">
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">An ninh</label>
											<div class="col-lg-9">
												<select class="form-control" required name="security">
													<option value="">Ch???n</option>
													<option value="C??">C??</option>
													<option value="Kh??ng">Kh??ng</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Di???n t??ch</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="asize" required placeholder="Nh???p di???n t??ch">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">?????a ch???</label>
											<div class="col-lg-9 position-relative">
												<input type="hidden" class="form-control" id="address-long" name="long" required placeholder="Enter Address">
												<input type="hidden" class="form-control" id="address-lat" name="lat" required placeholder="Enter Address">
												<input type="text" class="form-control" id="address" name="loc" required placeholder="Enter Address">
												<div id="address-list" class="dropdown-menu">
												</div>
											</div>
										</div>

									</div>
								</div>

								<h5 class="text-secondary">H??nh ???nh</h5>
								<hr>
								<div class="row">
									<div class="col-xl-6">

										<div class="form-group row">
											<label class="col-lg-3 col-form-label">H??nh ???nh</label>
											<div class="col-lg-9">
												<input class="form-control" name="aimage" type="file">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">H??nh ???nh</label>
											<div class="col-lg-9">
												<input class="form-control" name="aimage2" type="file">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">H??nh ???nh</label>
											<div class="col-lg-9">
												<input class="form-control" name="aimage4" type="file">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Tr???ng th??i</label>
											<div class="col-lg-9">
												<select class="form-control" required name="status">
													<option value="">Ch???n</option>
													<option value="Kh??? d???ng">Kh??? d???ng</option>
													<option value="??ang giao d???ch">??ang giao d???ch</option>
													<option value="???? b??n">???? b??n</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-xl-6">

										<div class="form-group row">
											<label class="col-lg-3 col-form-label">H??nh ???nh</label>
											<div class="col-lg-9">
												<input class="form-control" name="aimage1" type="file">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">H??nh ???nh</label>
											<div class="col-lg-9">
												<input class="form-control" name="aimage3" type="file">
											</div>
										</div>

										<div class="form-group row">
											<label class="col-lg-3 col-form-label">???nh c???t</label>
											<div class="col-lg-9">
												<input class="form-control" name="fimage" type="file">
											</div>
										</div>
									</div>
								</div>
								<input type="submit" value="????ng b??i" class="btn btn-primary" name="add" style="margin-left:150px;">
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- /Main Wrapper -->


	<!-- jQuery -->
	<script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/plugins/tinymce/tinymce.min.js"></script>
	<script src="assets/plugins/tinymce/init-tinymce.min.js"></script>
	<!-- Bootstrap Core JS -->
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

	<!-- Slimscroll JS -->
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/script.js"></script>
	<script>
		const addressInput = document.getElementById("address")

		const addressList = document.getElementById("address-list")
		const addressLong = document.getElementById("address-long")
		const addressLat = document.getElementById("address-lat")

		const search = _.debounce(async (value) => {
			const res = await axios.post('http://localhost/testcapstone1/admin/search-map.php', {
				query: value
			})

			const resources = _.get(res, 'data.resourceSets.0.resources', []);

			if (!_.isEmpty(resources)) {
				addressList.classList.add("shown");

				addressList.innerHTML = ""

				const els = _.map(resources, (resource) => {
					const a = document.createElement("a")

					a.addEventListener("click", () => completeResult(resource));

					a.innerText = resource.name

					a.classList.add('dropdown-item')

					a.href = '#'

					addressList.appendChild(a)
				});

			} else {
				addressList.classList.remove("shown");
			}
		}, 500)

		const completeResult = (resource) => {
			event.preventDefault();
			addressInput.value = resource.name;
			addressLat.value = resource.geocodePoints[0].coordinates[0];
			addressLong.value = resource.geocodePoints[0].coordinates[1];
			addressList.innerHTML = ""
			addressList.classList.remove("shown");
		}

		addressInput.addEventListener("keyup", async (event) => {
			const value = event.target.value;

			await search(value)
		})
	</script>

</body>

</html>