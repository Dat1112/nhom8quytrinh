<?php session_start();
require_once '../config/config.php';
?>
<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <title>WEB bán điện thoại </title>
    <meta property="og:type" content="website">
    <link href="https://www.coolmate.me/css/style.css?v=TVpkw4FvcQSMjphUB6s1" rel="stylesheet" type="text/css"> 
    <link  rel="stylesheet" href="css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/App.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/owlcarousel/assets/owl.theme.default.min.css">
    <script src="assets/vendors/jquery.min.js"></script>
    <script src="assets/owlcarousel/owl.carousel.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    a{
        text-decoration: none;
    }
    /* Chuyển màu chữ của các liên kết */
    .nav-main__item a {
        color: black; /* Thay your-desired-color bằng mã màu bạn muốn */
    }
	.red-text {
            color: red;
        }
   
</style>

</head>

<body >
        <div class="site-wrapper has-topbar" id="site-wrapper">
        <header class="site-header">
            <div class="topbar">
            <div>
                <ul class="nav-main">  </ul>            
            </div>
            <div class="mobile--hidden tablet--hidden" style="width: 550px;">
                <ul class="nav-main" style="justify-content: flex-end">
					<?php
					if (!isset($_SESSION['user'])) {?>
					<li class="nav-main__item right-item" rel-script="sub-menu" data-menu-id="about">
                        <a href="/page/trung-tam-dich-vu-khach-hang?itm_source=navbar"
                            ga-tracking-value="topbar1-trung-tam-dich-vu-khach-hang" style="font-weight: normal">
                            Trung tâm CSKH
                        </a>
                    </li>
                            
                    <li class="nav-main__item " rel-script="sub-menu" data-menu-id="about">
                            <a href="../dangnhap/dangnhap.php" ga-tracking-value="topbar1-login"
                                style="font-weight: normal" > <!--data-toggle="modal" data-target="#exampleModal"-->
                                Đăng nhập
                            </a>
                    </li>
					<li class="nav-main__item " rel-script="sub-menu" data-menu-id="about">
                            <a href="../dangnhap/dangky.php" ga-tracking-value="topbar1-register"
                                style="font-weight: normal" >
                                Đăng Ký
                            </a>
                    </li>
					<?php } else {?>
					<li class="nav-main__item right-item" rel-script="sub-menu" data-menu-id="about">
                        <a href="/page/trung-tam-dich-vu-khach-hang?itm_source=navbar"
                            ga-tracking-value="topbar1-trung-tam-dich-vu-khach-hang" style="font-weight: normal">
                            Trung tâm CSKH
                        </a>
                    </li>
					<li class="nav-main__item " rel-script="sub-menu" data-menu-id="about">
                            <a href="../dangnhap/logout.php" ga-tracking-value="topbar1-login"
                                style="font-weight: normal" > <!--data-toggle="modal" data-target="#exampleModal"-->
                                Đăng xuất
                            </a>
                    </li>
					
					
					
					
					<?php $user = $_SESSION['user']; }

					?>
                
                </ul>
            </div>
        </div>       
        <div class="header">
    <div class="header__inner" style="background: black;">
        <div class="header__toggle">
            <div class="mobile--visible tablet--visible">
                <a href="#" rel-script="search-toggle" class="menu-toggle is-active" ga-tracking-value="mbmenu-search-header" ga-tracking-label="Tìm kiếm header - mobile">
                    <div class="menu-toggle__search">
                        <img src="/" alt="Icon Search">
                    </div>
                </a>
            </div>
        </div>
        <div class="header__logo">
            <img src="img/anh1.jpg" alt="Logo BestShop">
        </div>
        <div class="desk--hidden mobile--visible tablet--visible header-search-mobile" rel-script="header-search-content">
            <form action="/spotlight" method="GET">
    <div class="header-search__wrapper">
        <label class="header-search__field">
            <input id="input-spotlight-mobile" type="text" name="search" rel-script="spotlight-search-control-mobile" placeholder="Tìm kiếm sản phẩm..." class="header-search__control one-whole" autocomplete="off">
            <button class="header-search__submit"></button>
        </label>
        <a href="#" class="header-search__close" rel-script="spotlight-search-close"></a>
    </div>
</form>
<div class="spotlight-search-content" rel-script="spotlight-search-content">
    <div class="spotlight-search-content__wrapper">
            <div class="spotlight-search-content__inner is-active">
                <div class="spotlight-search-content__topkeyword is-active">
                    <div class="homepage-search__content one-whole" style="display: block">
                    </div>
                </div>
            </div>
        <div class="spotlight-header-search">
            <div class="spotlight-header-search__suggestions">
                <ul id="search-suggestions-mobile" class="search-suggestions">
                </ul>
            </div>
            <p class="spotlight-header-search__title" style="font-weight: bold; font-size: 18px; margin-top: 0">Sản phẩm</p>
            <div class="spotlight-header-search__wrapper grid grid--four-columns large-grid--four-columns tablet-grid--three-columns mobile-grid--two-columns" rel-script="spotlight-header-search-mobile">
                <img src="https://www.coolmate.me/images/icons/loading.svg" class="loading" alt="loading">
            </div>
            <div class="spotlight-header-search__viewmore">
                <a class="btn btn-primary" href="">Xem tất cả</a>
            </div>
        </div>
    </div>
</div>        </div>
        <div class="mobile--visible tablet--visible">
                    </div>
        <div class="mobile--hidden tablet--hidden">
            <ul class="nav__sub nav__sub-active">
    <li class="nav__sub-item active-menu"  style="background: #ff5605;" >
                    <a href="index1.php" style="position: relative; font-weight: 500;" ga-tracking-value="menu-main1">
                Trang chủ
            </a>          
    </li>
    <li class="nav__sub-item active-menu"  >
        <a href="/collections?itm_source=navbar"   style="position: relative;" >
            Sản phẩm
                    </a>
        <div class="mega-menu mega-menu--product">
            <div class="mega-menu__wrapper">
                <div class="mega-menu__inner">
                    <div class="mega-menu__item flex-col flex-col-2" style="flex: 0 0 100%;">
                        <div class="grid grid--four-columns">
                            <div class="grid__column" style="padding-top: 0;">
                                <h3 class="mega-menu__title" >APPLE</h3>
                                <ul rel-script="mega-menu-active">
                                    <li><a href="?op=iphone" >Tất cả các hãng iPhone</a></li>
                                    <?php $danhmuc="SELECT * FROM danhmuc WHERE ten LIKE '%iphone%'";
									$iphone=mysqli_query($conn,$danhmuc);
									while($r0=mysqli_fetch_assoc($iphone)){
									?>
                                    <li><a href="?op=<?php echo $r0['ten'];?>" ><?php echo $r0['ten'];?></a></li><?php }?> 
                                </ul>
                            </div>
                            <div class="grid__column" style="padding-top: 0;">
                                <h3 class="mega-menu__title" >SamSung</h3>
                                <ul rel-script="mega-menu-active" >
                                <li><a href="?op=samsung" >Tất cả các hãng SamSung</a></li>
                                    <?php $danhmuc="SELECT * FROM danhmuc WHERE ten LIKE '%samsung%'";
									$iphone=mysqli_query($conn,$danhmuc);
									while($r0=mysqli_fetch_assoc($iphone)){
									?>
                                    <li><a href="?op=<?php echo $r0['ten'];?>" ><?php echo $r0['ten'];?></a></li><?php }?>
                            </div>
                            <div class="grid__column" style="padding-top: 0;">
                                <h3 class="mega-menu__title" >OPPO</h3>
                                <ul rel-script="mega-menu-active">
                                    <li><a href="?op=oppo" >Tất cả các hãng OPPO</a></li>
                                    <?php $danhmuc="SELECT * FROM danhmuc WHERE ten LIKE '%oppo%'";
									$iphone=mysqli_query($conn,$danhmuc);
									while($r0=mysqli_fetch_assoc($iphone)){
									?>
                                    <li><a href="?op=<?php echo $r0['ten'];?>" ><?php echo $r0['ten'];?></a></li><?php }?>
                                </ul>
                            </div>
                        </div>
					</div>
                </div>
            </div>
        </div>
</li>
    <li class="nav__sub-item active-menu">
        <a href="/" ga-tracking-value="menu-main4" style="position: relative">
           Phụ kiện 
        </a>
        <div class="mega-menu mega-menu--product">
            <div class="mega-menu__wrapper">
                <div class="mega-menu__inner">
                    <div class="mega-menu__item flex-col flex-col-1" style="flex: 0 0 110%">
                        <h3 class="mega-menu__title" >Theo sản phẩm</h3>
                        <div class="grid grid--two-columns">
                            <div class="grid__column" style="padding-top: 0px;">
                                <ul rel-script="mega-menu-active">
                                    <li><a href="?op=tainghe" >Tai nghe</a></li>
                                    <li><a href="?op=loabluetooth" >Loa bluetooth </a></li>
                                    <li><a href="?op=loamini" >Loa mini </a></li>
                                    <li><a href="?op=danmanhinh" >Dán màn hình </a></li>
                                    <li><a href="?op=oplung" >Óp lưng</a></li>
                                    <li><a href="?op=sim">Sim</a></li>   
                                </ul>
                            </div>
                            <div class="grid__column" style="padding-top: 0;">
                                <ul rel-script="mega-menu-active">
                                    <li><a href="?op=giado" >Giá đỡ</a></li>
                                    <li><a href="?op=thenho" >thẻ nhớ</a></li>
                                    <li><a href="?op=capsac" >Cáp sạc</a></li>
                                    <li><a href="?op=pinduphong" >Pin dự phòng</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <li class="nav__sub-item active-menu">
        <a href="/"  style="position: relative"> Khuyến mãi</a>
        <div class="mega-menu mega-menu--product">
            <div class="mega-menu__wrapper">
                <div class="mega-menu__inner">
                    <div class="mega-menu__item flex-col flex-col-1" style="flex: 0 0 110%">
                        <h3 class="mega-menu__title" >Theo sản phẩm</h3>
                        <div class="grid grid--two-columns">
                            <div class="grid__column" style="padding-top: 0px;">
                                <ul rel-script="mega-menu-active">
                                    <li><a href="/">  </a></li>
                                    <li><a href="/">  </a></li>
                                    <li><a href="/">  </a></li>
                                    <li><a href="/">  </a></li>
                                    <li><a href="/"> </a></li>
                                    <li><a href="/">  </a></li>
                                    <li><a href="/"></a></li>
                                    <li><a href="/"></a></li>
                                </ul>
                            </div>
                            <div class="grid__column" style="padding-top: 0;">
                                <ul rel-script="mega-menu-active">
                                <li><a href="/"> Tất cả </a></li>
                                    <li><a href="/">  </a></li>
                                    <li><a href="/"></a></li>
                                    <li><a href="/"> </a></li>
                                    <li><a href="/"></a></li>
                                    <li><a href="/"></a></li>
                                    <li><a href="/"></a></li>
                                    <li><a href="/"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <li class="nav__sub-item active-menu">
        <a href="tintuc.php" ga-tracking-value="menu-main6" style="width: 50 px;"> Tin tức</a>
        <div class="mega-menu mega-menu--product">
            <div class="mega-menu__wrapper">
                <div class="mega-menu__inner">
                    <div class="mega-menu__item flex-col flex-col-1" style="flex: 0 0 110%">
                        <h3 class="mega-menu__title" >Theo sản phẩm</h3>
                        <div class="grid grid--two-columns">
                            <div class="grid__column" style="padding-top: 0px;">
                                <ul rel-script="mega-menu-active">
                                    <li><a href="/">  </a></li>
                                    <li><a href="/"> </a></li>
                                    <li><a href="/">  </a></li>
                                    <li><a href="/">  </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <li class="nav__sub-item active-menu" style="padding: 30px 0px;">
        <div class="mega-menu mega-menu--product">     
            <div class="mega-menu__wrapper">
                <div class="mega-menu__inner">
                    <div class="mega-menu__item flex-col flex-col-1" style="flex: 0 0 18%;">
                        <h3 class="mega-menu__title" >Theo sản phẩm</h3>
                        <div class="grid grid--two-columns">
                            <div class="grid__column" style="padding-top: 0px;">
                                <ul rel-script="mega-menu-active">
                                    <li><a href="/"> Tất cả </a></li>
                                    <li><a href="/">  </a></li>
                                    <li><a href="/" > </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </li>
</ul>                    
</div>
        <div class="header__actions">
            <div class="header-actions-search__box mobile--hidden tablet--hidden">
                <label class="header-actions-search__field">
					
					<form action="<?php if(isset($_GET['search-input'])) echo "index1.php?tim=".$_GET['search-input'];?>" method="GET" class="d-flex">
   					 <input id="search-input" type="text" name="search" rel-script="search-input" placeholder="Tìm kiếm sản phẩm..." autocomplete="off" class="form-control mr-2">
    				<button type="submit" class="btn btn-primary mr-5">
        			<img src="https://www.coolmate.me/images/header/icon-search-white-new.svg?v=1" alt="Icon Search">
    			</button>
					</form>
					
					

                </label>
            </div>
                    <header-user-icon></header-user-icon>
                <a href="TrangCNND.php" > <i class="fa-solid fa-user" style="hight: 50px;"></i></a>
                        <div class="header-actions__button">
                <a href="giohang(nam).php"> <i class="fa-solid fa-cart-shopping"></i></a>
                <span
                        class="counts site-header__cartcount">
							 <?php
                                $cart = [];
                                if (isset($_SESSION['cart'])){
                                $cart = $_SESSION['cart'];
                                }
                                $count = 0;
								
                                foreach ($cart as $item){
                                $count += $item['qty'];
								
                                }
							    echo $count;
                            ?>
							
							
							</span>
							</div>
                <div class="header-actions__menu">
                    <div class="header-actions__inner">
                        <mini-cart></mini-cart>
                    </div>
                </div>
            </div>
        </div>
                    <div class="header-search mobile--hidden" rel-script="header-search-content">
                <form action="/spotlight" method="GET">
                    <div class="header-search__wrapper">
                        <label class="header-search__field">
                            <input id="input-spotlight" type="text" name="search" rel-script="spotlight-search-control" placeholder="Tìm kiếm sản phẩm..." autocomplete="off" class="header-search__control one-whole">
                            <button class="homepage-search__submit" style="top: 13px; right: 30px; width:unset; height:unset; z-index:10">
                            </button>
                    </div>
                </form>
        </div>
    </div>
</div>
</header>
    <section class="mymaincontent">
        <div class="container">		
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="Img/anhbn1.PNG" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="Img/anhbn2.PNG" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="Img/anhbn.PNG" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
            <div class="cate list">
                <div class="row">
                <div class="large-12 columns">
          <div class="owl-carousel owl-theme">
			  <?php $hang= "SELECT * FROM hangsanpham";
			  $lenhhang=mysqli_query($conn,$hang);
			  
			  while($dshang=mysqli_fetch_assoc($lenhhang)){
			  ?>
            <div class="item">
              <div class="category-icon"> 
				  
                <a href="index1.php?hang=<?php echo $dshang['tenhang'];?>" class="btn btn-outline-dark mt-3"><?php echo $dshang['tenhang'];?></a>
              </div>
            </div>
            <?php }?>
          </div>
        </div>
            </div>
        </div> 
	
    
   
   			<div class="product-list mb-3 mt-5">
				<form class="form-inline" method="GET" action="">
					<?php
//					if (isset($_GET['search'])) {
//    				$op = trim($_GET['search']);					
//					}
//                else if (isset($_GET['op'])) {
//                    $op = trim($_GET['op']);                   
//                } 
//				else if (isset($_GET['hang'])) {
//                    $op = trim($_GET['hang']);                 
//                }
					?>
    <div class="form-group mr-2" >
        <h5>Chọn tiêu chí sắp xếp</h5>
        <select class="form-control" id="sortOptions" name="sort">
            <option value="gia_asc<?php echo isset($op) ? "?hang=".$op : "" ?>">Giá từ thấp đến cao</option>
            <option value="gia_desc">Giá từ cao đến thấp</option>
            <option value="ngay_dang_desc">Ngày đăng mới nhất</option>
            <option value="ngay_dang_asc">Ngày đăng cũ nhất</option>
            <option value="luong_mua_desc">Lượng mua từ cao đến thấp</option>
            <option value="luong_mua_asc">Lượng mua từ thấp đến cao</option>
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-outline-dark">Lọc</button>
    </div>
</form>
				

    <div class="product_title border-bottom">
        <strong class="bg-white text-black">
            <h1>
                <?php 
	
				if(isset($_POST['page'])){
					$page = $_POST['trang'];
				}else { $page = '';}
					
				if($page==''|| $page ==1){
					$begin = 0;
				}else {$begin = ($page * 4)-4;}
                $sql = "SELECT * FROM sanpham WHERE soluong > 0";
					if (isset($_GET['search'])) {
    				$op = trim($_GET['search']);
					$sqlpage = $sql." AND ten LIKE '%" . $op . "%'";
					$sql .= " AND ten LIKE '%" . $op . "%'LIMIT $begin,4";
					
					echo "Kết quả cho: " . $op;
					}

                else if (isset($_GET['op'])) {
                    $op = trim($_GET['op']);
					$sqlpage = $sql." AND danhmuc LIKE '%" . $op . "%'";
                    $sql .= " AND danhmuc LIKE '%" . $op . "%'LIMIT $begin,4";
                    echo "Kết quả cho : " . $op;
                } 
				else if (isset($_GET['hang'])) {
                    $op = trim($_GET['hang']);
					$sqlpage = $sql." AND hang LIKE '%" . $op . "%'";
                    $sql .= " AND hang LIKE '%" . $op . "%'LIMIT $begin,4";
                    echo "Hãng sản xuất : " . $op;
                }
				else {
					$sqlpage = $sql;
					$sql .= " LIMIT $begin,4";
                    echo "Danh sách sản phẩm";
                }
                ?>
            </h1>
        </strong> 
    </div>
    <div class="product_list-s py-3">
        <div class="row">
            <?php
            $check = mysqli_query($conn, $sql);
            $max = 0;
            while ($r = mysqli_fetch_assoc($check)) {
                if ($max >= 12) {
                    break;
                }
                $max++;
            ?>
                <div class="col-md-3">
                    <a href="KH-TTCHITIETSP.php?spid=<?php echo $r['id']; ?>">
                        <img src="../image/<?php echo $r['anh']; ?>" width="150" alt="Image">
                    </a>
                    <h6><?php echo $r['ten']; ?></h6>
                    <h5 class="red-text">
                        <?php echo number_format($r['giaban'], 0, ',', '.') . " VNĐ"; ?>
                    </h5>
                </div>
            <?php 
            } 
            ?>
        </div>
		<?php $sqltrang = mysqli_query($conn,$sqlpage);
			$rowcount = mysqli_num_rows($sqltrang);		
			$trang = ceil($rowcount/4);
		?>
		<ul class="pagination justify-content-center" >
			<?php for($i=1;$i<=$trang;$i++){?>
			<form method="post">
				<input type="hidden" name="trang" value="<?php echo $i?>">
					<li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
						<button class="page-link" type="submit" name="page" value="<?php echo $i; ?>">
							<?php echo $i; ?>
						</button>
					</li>


				</form>
    <?php }?>
</ul>

    </div>
</div>

		
			<div class="product-list mb-3 mt-5">
        <div class="product_title border-bottom">
            <strong class ="bg-white text-back"><h1>Iphone</h1></strong>
         </div>
         <div class="product_list-s py-3">
            <div class="row">
				<?php
				if(isset($_POST['page1'])){
					$page1 = $_POST['trang1'];
				}else { $page1 = '';}
					
				if($page1==''|| $page1 ==1){
					$begin1 = 0;
				}else {$begin1 = ($page1 * 4)-4;}
				
				
            $sql = "SELECT * FROM sanpham WHERE ten LIKE '%iphone%' AND soluong > 0 LIMIT $begin1,4";
			$sqlpage = "SELECT * FROM sanpham WHERE ten LIKE '%iphone%' AND soluong > 0";
            $check = mysqli_query($conn, $sql);
			$max=0;
            while ($r = mysqli_fetch_assoc($check) ) {
				if ($max >= 12) {
						break;
					}
					$max++;
            ?>
                <div class="col-md-3">
                    <a href="KH-TTCHITIETSP.php?spid=<?php echo $r['id'];?>"><img src="../image/<?php echo $r['anh']; ?>" width="150" alt="Image"></a>
                        <h6 ><?php echo $r['ten'];?></h6>
                        <h5 class="red-text"><?php echo number_format($r['giaban'], 0, ',', '.') . " VNĐ";?></h5>
				</div>
				<?php } ?>
            </div>
			 <?php $sqltrang = mysqli_query($conn,$sqlpage);
			$rowcount = mysqli_num_rows($sqltrang);		
			$trang = ceil($rowcount/4);
		?>
		<ul class="pagination justify-content-center" >
			<?php for($i=1;$i<=$trang;$i++){?>
			<form method="post">
				<input type="hidden" name="trang1" value="<?php echo $i?>">
					<li class="page-item <?php echo ($i == $page1) ? 'active' : ''; ?>">
						<button class="page-link" type="submit" name="page1" value="<?php echo $i; ?>">
							<?php echo $i; ?>
						</button>
					</li>


				</form>
    <?php }?>
         </div>
			 
   </div>
			
			<div class="product-list mb-3 mt-5">
        <div class="product_title border-bottom">
            <strong class ="bg-white text-back"><h1>Oppo</h1></strong>
         </div>
         <div class="product_list-s py-3">
            <div class="row">
				<?php
				if(isset($_POST['page2'])){
					$page2 = $_POST['trang2'];
				}else { $page2 = '';}
					
				if($page2==''|| $page2 ==1){
					$begin2 = 0;
				}else {$begin2 = ($page2 * 4)-4;}
            $sqlpage = "SELECT * FROM sanpham WHERE ten LIKE '%oppo%' AND soluong > 0";
			$sql = "SELECT * FROM sanpham WHERE ten LIKE '%oppo%' AND soluong > 0 LIMIT $begin2,4";
            $check = mysqli_query($conn, $sql);
			$max=0;
            while ($r = mysqli_fetch_assoc($check) ) {
				if ($max >= 12) {
						break;
					}
					$max++;
            ?>
                <div class="col-md-3">
                    <a href="KH-TTCHITIETSP.php?spid=<?php echo $r['id'];?>"><img src="../image/<?php echo $r['anh']; ?>" width="150" alt="Image"></a>
                        <h6 ><?php echo $r['ten'];?></h6>
                        <h5 class="red-text"><?php echo number_format($r['giaban'], 0, ',', '.') . " VNĐ";?></h5>
				</div>
				<?php } ?>
            </div>
			  <?php $sqltrang = mysqli_query($conn,$sqlpage);
			$rowcount = mysqli_num_rows($sqltrang);		
			$trang = ceil($rowcount/4);
		?>
		<ul class="pagination justify-content-center" >
			<?php for($i=1;$i<=$trang;$i++){?>
			<form method="post">
				<input type="hidden" name="trang2" value="<?php echo $i?>">
					<li class="page-item <?php echo ($i == $page2) ? 'active' : ''; ?>">
						<button class="page-link" type="submit" name="page2" value="<?php echo $i; ?>">
							<?php echo $i; ?>
						</button>
					</li>


				</form>
    <?php }?>
         </div>
   </div>
		
    
   
   
		
			

    </section>
    <footer class="site-footer mobile--hidden">
    <div class="container">
        <div class="site-footer__inner">
            <div class="site-footer__sidebar">
                <div>
                    <h4 class="site-footer__title">
                        BestShop lắng nghe bạn!
                    </h4>
                    <p class="site-footer__description" style="margin-bottom: 30px">
                        Chúng tôi luôn trân trọng và mong đợi nhận được mọi ý kiến đóng góp từ
                        khách hàng để có thể nâng cấp trải nghiệm dịch vụ và sản phẩm tốt hơn nữa.
                    </p>
                    <a href="/" class="site-footer__btn" target="_blank">
                        Đóng góp ý kiến
                    </a>
                </div>
            </div>
            <div class="site-footer__menu">
                <div class="footer-menu">
                    <div class="footer-menu__item">
                        <h4 class="footer-menu__title mb-3">Chính sách</h4>
                        <ul>
                            <li><a href="/">Chính sách đổi trả 60 ngày</a></li>
                            <li><a href="/">Chính sách khuyến mãi</a></li>
                            <li><a href="/">Chính sách bảo mật</a></li>
                            <li><a href="/">Chính sách giao hàng</a></li>
                        </ul>   
                    </div>
                    <div class="footer-menu__item">
                        <h4 class="footer-menu__title">Chăm sóc khách hàng</h4>
                        <ul>
                            <li><a href="/">Trải nghiệm mua sắm 100% hài lòng</a></li>
                            <li><a href="/">Hỏi đáp - FAQs</a></li>
                        </ul>
                    </div>
                    <div class="footer-menu__item">
                        <h4 class="footer-menu__title">Về BestShop</h4>
                        <ul>
                            <li><a href="/">DVKH xuất sắc</a></li>
                            <li><a href="/"> Câu chuyện về BestShop</a></li>
                            <li><a href="/">Nhà máy</a></li>
                            <li><a href="/">Care & Share</a></li>
                        </ul>
                    </div>
                    <div class="footer-menu__item">
                        <h4 class="footer-menu__title">Địa chỉ liên hệ</h4>
                        <p class="footer-menu__desciption"><u> HN: </u> TP Hà Nội</p>
                    </div>
                </div>
            </div>
        </div>     
    </div>
</footer>
</div>
</div>
<div class="voucher-bottom-backdrop"></div>
			<!-- Modal -->

<script>
            $(document).ready(function() {
              $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav : false,
                dots: false,
                responsiveClass: true,
                responsive: {
                  0: {
                    items: 4,
                    nav: true
                  },
                  600: {
                    items: 6,
                  },
                  1000: {
                    items: 8,
                    loop: false,
                    margin: 20
                  }
                }
              })
            })
          </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>
