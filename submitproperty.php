<?php
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
session_start();
include("config.php");
if (!isset($_SESSION['uemail'])) {
	header("location:login.php");
}

//// code insert
//// add code
$file_type_allow = array('png','jpg','gif','jpeg');

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
		echo '<script language="javascript">alert("????ng tin th??nh c??ng"); window.location="property.php";</script>';
	} else {
		$error = "<p class='alert alert-warning'>C?? v???n ????? khi ????ng tin, vui l??ng th??? l???i!</p>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Meta Tags -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="images/favicon.ico">

	<!--	Fonts
	========================================================-->
	<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

	<!--	Css Link
	========================================================-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="css/layerslider.css">
	<link rel="stylesheet" type="text/css" href="css/color.css">
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">

	<!--	Title
	=========================================================-->
	<title>iHome | Giao d???ch, cho thu?? nh?? ?????t uy t??n h??ng ?????u</title>
</head>

<body>

	<!--	Page Loader
=============================================================
<div class="page-loader position-fixed z-index-9999 w-100 bg-white vh-100">
	<div class="d-flex justify-content-center y-middle position-relative">
	  <div class="spinner-border" role="status">
		<span class="sr-only">Loading...</span>
	  </div>
	</div>
</div>
-->


	<div id="page-wrapper">
		<div class="row">
			<!--	Header start  -->
			<?php include("include/header.php"); ?>
			<!--	Header end  -->

			<!--	Banner   --->
			<div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>????ng tin</b></h2>
						</div>
					</div>
				</div>
			</div>
			<!--	Banner   --->


			<!--	Submit property   -->
			<div class="full-row">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<h2 class="text-secondary double-down-line text-center">Th??ng tin c??n h???</h2>
						</div>
					</div>
					<div class="row p-5 bg-white">
						<form method="post" enctype="multipart/form-data">
							<div class="description">
								<?php echo $error; ?>
								<?php echo $msg; ?>

								<div class="row">
									<div class="col-xl-12">
										<div class="form-group row">
											<label class="col-lg-2 col-form-label">Ti??u ?????</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" value="<?php if(!empty($title)) echo $title?>" name="title" required placeholder="Nh???p ti??u ?????">
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
													<option <?php if(!empty($ptype)&& $ptype=='Nh?? ph???') echo "selected ='selected" ?>value="Nh?? ph???">Nh?? ph???</option>
													<option <?php if(!empty($ptype)&& $ptype=='Chung c??') echo "selected ='selected" ?>value="Chung c??">Chung c??</option>
													<option <?php if(!empty($ptype)&& $ptype=='Penhouse') echo "selected ='selected" ?>value="Penhouse">Penhouse</option>
													<option <?php if(!empty($ptype)&& $ptype=='Villa') echo "selected ='selected" ?>value="Villa">Villa</option>
													<option <?php if(!empty($ptype)&& $ptype=='V??n ph??ng') echo "selected ='selected" ?>value="V??n ph??ng">V??n ph??ng</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">T??nh tr???ng</label>
											<div class="col-lg-9">
												<select class="form-control" required name="stype">
													<option value="">Ch???n</option>
													<option <?php if(!empty($stype)&& $stype=='Thu??') echo "selected ='selected" ?> value="Thu??">Thu??</option>
													<option <?php if(!empty($stype)&& $stype=='B??n') echo "selected ='selected" ?> value="B??n">B??n</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Ph??ng t???m</label>
											<div class="col-lg-9">
												<input type="number" class="form-control" name="bath" value="<?php if(!empty($bath)) echo $bath?>" required placeholder="Nh???p s??? ph??ng">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">B???p</label>
											<div class="col-lg-9">
												<input type="number" class="form-control" name="kitc" value="<?php if(!empty($kitc)) echo $kitc?>" required placeholder="Nh???p s??? ph??ng">
											</div>
										</div>

									</div>
									<div class="col-xl-6">
										<div class="form-group row mb-3">
											<label class="col-lg-3 col-form-label">H??? b??i</label>
											<div class="col-lg-9">
												<select class="form-control" required name="pool">
													<option  value="">Ch???n</option>
													<option <?php if(!empty($pool)&& $pool=='C??') echo "selected ='selected" ?> value="C??">C??</option>
													<option <?php if(!empty($pool)&& $pool=='Kh??ng') echo "selected ='selected" ?> value="Kh??ng">Kh??ng</option>
												</select>
											</div>
										</div>
										<div class="form-group row mb-3">
											<label class="col-lg-3 col-form-label">B??i ?????u xe</label>
											<div class="col-lg-9">
												<select class="form-control" required name="parkinglot">
													<option value="">Ch???n</option>
													<option <?php if(!empty($parkinglot)&& $parkinglot=='C??') echo "selected ='selected" ?> value="C??">C??</option>
													<option <?php if(!empty($parkinglot)&& $parkinglot=='Kh??ng') echo "selected ='selected" ?> value="Kh??ng">Kh??ng</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Ph??ng ng???</label>
											<div class="col-lg-9">
												<input type="number" class="form-control" name="bed" value="<?php if(!empty($bed)) echo $bed?>" required placeholder="Nh???p s??? ph??ng">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">H?????ng</label>
											<div class="col-lg-9">
												<select class="form-control" required name="direction">
													<option value="">Ch???n</option>
													<option <?php if(!empty($direction)&& $direction=='????ng') echo "selected ='selected" ?> value="????ng">????ng</option>
													<option <?php if(!empty($direction)&& $direction=='T??y') echo "selected ='selected" ?> value="T??y">T??y</option>
													<option <?php if(!empty($direction)&& $direction=='Nam') echo "selected ='selected" ?> value="Nam">Nam</option>
													<option <?php if(!empty($direction)&& $direction=='B???c') echo "selected ='selected" ?>value="B???c">B???c</option>
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
												<input type="number" class="form-control" name="floor" value="<?php if(!empty($floor)) echo $floor?>" required placeholder="Nh???p s??? t???ng">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Gi??</label>
											<div class="col-lg-9">
												<input type="number" class="form-control" name="price" value="<?php if(!empty($price)) echo $price?>" required placeholder="Nh???p gi??">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Th??nh ph???</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="city" value="<?php if(!empty($city)) echo $city?>" required placeholder="Nh???p t??n th??nh ph???">
											</div>
										</div>
									</div>
									<div class="col-xl-6">
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">An ninh</label>
											<div class="col-lg-9">
												<select class="form-control" required name="security">
													<option value="">Ch???n</option>
													<option <?php if(!empty($security)&& $security=='C??') echo "selected ='selected" ?> value="C??">C??</option>
													<option <?php if(!empty($security)&& $security=='Kh??ng') echo "selected ='selected" ?> value="Kh??ng">Kh??ng</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Di???n t??ch</label>
											<div class="col-lg-9">
												<input type="number" class="form-control" name="asize" value="<?php if(!empty($asize)) echo $asize?>" required placeholder="Nh???p di???n t??ch">
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
													<option value="Kh??? d???ng">Kh??? d???ng</option>
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
								<input type="submit" value="????ng b??i" class="btn btn-primary" name="add" style="margin-left:142px;">
							</div>
						</form>
					</div>
				</div>
			</div>
			<!--	Submit property   -->


			<!--	Footer   start-->
			<?php include("include/footer.php"); ?>
			<!--	Footer   start-->

			<!-- Scroll to top -->
			<a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a>
			<!-- End Scroll To top -->
		</div>
	</div>
	<!-- Wrapper End -->

	<!--	Js Link
============================================================-->
	<script src="js/jquery.min.js"></script>
	<script src="js/tinymce/tinymce.min.js"></script>
	<script src="js/tinymce/init-tinymce.min.js"></script>
	<!--jQuery Layer Slider -->
	<script src="js/greensock.js"></script>
	<script src="js/layerslider.transitions.js"></script>
	<script src="js/layerslider.kreaturamedia.jquery.js"></script>
	<!--jQuery Layer Slider -->
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/tmpl.js"></script>
	<script src="js/jquery.dependClass-0.1.js"></script>
	<script src="js/draggable-0.1.js"></script>
	<script src="js/jquery.slider.js"></script>
	<script src="js/wow.js"></script>
	<script src="js/custom.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js" integrity="sha512-WFN04846sdKMIP5LKNphMaWzU7YpMyCU245etK3g/2ARYbPK9Ub18eG+ljU96qKRCWh+quCY7yefSmlkQw1ANQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js" integrity="sha512-0qU9M9jfqPw6FKkPafM3gy2CBAvUWnYVOfNPDYKVuRTel1PrciTj+a9P3loJB+j0QmN2Y0JYQmkBBS8W+mbezg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script>
		const addressInput = document.getElementById("address")

		const addressList = document.getElementById("address-list")
		const addressLong = document.getElementById("address-long")
		const addressLat = document.getElementById("address-lat")

		const search = _.debounce(async (value) => {
			const res = await axios.post('http://localhost/testcapstone1/search-map.php', {
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