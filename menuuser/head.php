<div class="site-wrapper has-topbar" id="site-wrapper">
    <header class="site-header">
        <div class="topbar">
            <div>
                <ul class="nav-main"> </ul>
            </div>
            <div class="mobile--hidden tablet--hidden" style="width: 550px;">
                <ul class="nav-main" style="justify-content: flex-end">
                    <li class="nav-main__item right-item" rel-script="sub-menu" data-menu-id="about">
                        <a href="/page/trung-tam-dich-vu-khach-hang?itm_source=navbar"
                            ga-tracking-value="topbar1-trung-tam-dich-vu-khach-hang" style="font-weight: normal">
                            Trung tâm CSKH
                        </a>
                    </li>
					<?php
						if (!isset($_SESSION['user'])) {?>
    					    <li class="nav-main__item " rel-script="sub-menu" data-menu-id="about">
                        <a href="../dangnhap/dangnhap.php" ga-tracking-value="topbar1-login"
                            style="font-weight: normal">
                            Đăng nhập
                        </a>
                    </li>
                    <li class="nav-main__item " rel-script="sub-menu" data-menu-id="about">
                        <a href="../dangnhap/dangky.php" ga-tracking-value="topbar1-register"
                            style="font-weight: normal">
                            Đăng Ký
                        </a>
                    </li>
				<?php
						
						}else { ?>
							<li class="nav-main__item " rel-script="sub-menu" data-menu-id="about">
                            <a href="../dangnhap/logout.php" ga-tracking-value="topbar1-login"
                                style="font-weight: normal" > <!--data-toggle="modal" data-target="#exampleModal"-->
                                Đăng xuất
                            </a>
                    </li>
					<?php
							$user = $_SESSION['user'];
						}
	?>
                    
                </ul>
            </div>
        </div>
        <div class="header">
            <div class="header__inner" style="background: black;">
                <div class="header__toggle">
                    <div class="mobile--visible tablet--visible">
                        <a href="#" rel-script="search-toggle" class="menu-toggle is-active"
                            ga-tracking-value="mbmenu-search-header" ga-tracking-label="Tìm kiếm header - mobile">
                            <div class="menu-toggle__search">
                                <img src="/" alt="Icon Search">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="header__logo">
                    <img src="img/anh1.jpg" alt="Logo BestShop">
                </div>
                <div class="desk--hidden mobile--visible tablet--visible header-search-mobile"
                    rel-script="header-search-content">
                    <form action="/spotlight" method="GET">
                        <div class="header-search__wrapper">
                            <label class="header-search__field">
                                <input id="input-spotlight-mobile" type="text" name="search"
                                    rel-script="spotlight-search-control-mobile" placeholder="Tìm kiếm sản phẩm..."
                                    class="header-search__control one-whole" autocomplete="off">
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
                                <p class="spotlight-header-search__title"
                                    style="font-weight: bold; font-size: 18px; margin-top: 0">Sản phẩm</p>
                                <div class="spotlight-header-search__wrapper grid grid--four-columns large-grid--four-columns tablet-grid--three-columns mobile-grid--two-columns"
                                    rel-script="spotlight-header-search-mobile">
                                    <img src="https://www.coolmate.me/images/icons/loading.svg"
                                        class="loading" alt="loading">
                                </div>
                                <div class="spotlight-header-search__viewmore">
                                    <a class="btn btn-primary" href="">Xem tất cả</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mobile--visible tablet--visible">
                </div>
                <div class="mobile--hidden tablet--hidden">
                    <ul class="nav__sub nav__sub-active">
                        <li class="nav__sub-item active-menu" style="background: #ff5605;">
                            <a href="index1.php"
                                style="position: relative; font-weight: 500;" ga-tracking-value="menu-main1">
                                Trang chủ
                            </a>
                        </li>
                        <li class="nav__sub-item active-menu">
                            <a href="/collections?itm_source=navbar" style="position: relative;"
                                ga-tracking-value="menu-main1">
                                Sản phẩm
                            </a>
                            <div class="mega-menu mega-menu--product">
                                <div class="mega-menu__wrapper">
                                    <div class="mega-menu__inner">
                                        <div class="mega-menu__item flex-col flex-col-2"
                                            style="flex: 0 0 100%;">
                                            <div class="grid grid--four-columns">
                                                <div class="grid__column" style="padding-top: 0;">
                                                    <h3 class="mega-menu__title">APPLE</h3>
                                                    <ul rel-script="mega-menu-active">
                                                        <li><a href="index1.php?op=iphone" >Tất cả các hãng iPhone</a></li>
                                    					<?php $danhmuc="SELECT * FROM danhmuc WHERE ten LIKE '%iphone%'";
														$iphone=mysqli_query($conn,$danhmuc);
														while($r0=mysqli_fetch_assoc($iphone)){
														?>
                                    					<li><a href="index1.php?op=<?php echo $r0['ten'];?>" ><?php echo $r0['ten'];?></a></li><?php }?>
                                                    </ul>
                                                </div>
                                                <div class="grid__column" style="padding-top: 0;">
                                                    <h3 class="mega-menu__title">SamSung</h3>
                                                    <ul rel-script="mega-menu-active">
                                                        <li><a href="index1.php?op=samsung" >Tất cả các hãng SamSung</a></li>
                                    <?php $danhmuc="SELECT * FROM danhmuc WHERE ten LIKE '%samsung%'";
									$iphone=mysqli_query($conn,$danhmuc);
									while($r0=mysqli_fetch_assoc($iphone)){
									?>
                                    <li><a href="index1.php?op=<?php echo $r0['ten'];?>" ><?php echo $r0['ten'];?></a></li><?php }?>
                                                    </ul>
                                                </div>
                                                <div class="grid__column" style="padding-top: 0;">
                                                    <h3 class="mega-menu__title">OPPO</h3>
                                                    <ul rel-script="mega-menu-active">
                                                        <li><a href="index1.php?op=oppo" >Tất cả các hãng OPPO</a></li>
                                    <?php $danhmuc="SELECT * FROM danhmuc WHERE ten LIKE '%oppo%'";
									$iphone=mysqli_query($conn,$danhmuc);
									while($r0=mysqli_fetch_assoc($iphone)){
									?>
                                    <li><a href="index1.php?op=<?php echo $r0['ten'];?>" ><?php echo $r0['ten'];?></a></li><?php }?>
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
                                        <div class="mega-menu__item flex-col flex-col-1"
                                            style="flex: 0 0 110%">
                                            <h3 class="mega-menu__title">Theo sản phẩm</h3>
                                            <div class="grid grid--two-columns">
                                                <div class="grid__column" style="padding-top: 0px;">
                                                    <ul rel-script="mega-menu-active">
                                                        <li><a href="?op=tainghe" >Tai nghe</a></li>
                                    <li><a href="index1.php?op=loabluetooth" >Loa bluetooth </a></li>
                                    <li><a href="index1.php?op=loamini" >Loa mini </a></li>
                                    <li><a href="index1.php?op=danmanhinh" >Dán màn hình </a></li>
                                    <li><a href="index1.php?op=oplung" >Óp lưng</a></li>
                                    <li><a href="index1.php?op=sim">Sim</a></li>
                                                    </ul>
                                                </div>
                                                <div class="grid__column" style="padding-top: 0;">
                                                    <ul rel-script="mega-menu-active">
                                                        <li><a href="?op=giado" >Giá đỡ</a></li>
                                    <li><a href="index1.php?op=thenho" >thẻ nhớ</a></li>
                                    <li><a href="index1.php?op=capsac" >Cáp sạc</a></li>
                                    <li><a href="index1.php?op=pinduphong" >Pin dự phòng</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav__sub-item active-menu">
                            <a href="/" style="position: relative"> Khuyến mãi</a>
                            <div class="mega-menu mega-menu--product">
                                <div class="mega-menu__wrapper">
                                    <div class="mega-menu__inner">
                                        <div class="mega-menu__item flex-col flex-col-1"
                                            style="flex: 0 0 110%">
                                            <h3 class="mega-menu__title">Theo sản phẩm</h3>
                                            <div class="grid grid--two-columns">
                                                <div class="grid__column" style="padding-top: 0px;">
                                                    <ul rel-script="mega-menu-active">
                                                        <li><a href="/"> </a></li>
                                                        <li><a href="/"> </a></li>
                                                        <li><a href="/"> </a></li>
                                                        <li><a href="/"> </a></li>
                                                        <li><a href="/"> </a></li>
                                                        <li><a href="/"> </a></li>
                                                        <li><a href="/"></a></li>
                                                        <li><a href="/"></a></li>
                                                    </ul>
                                                </div>
                                                <div class="grid__column" style="padding-top: 0;">
                                                    <ul rel-script="mega-menu-active">
                                                        <li><a href="/">Tất cả</a></li>
                                                        <li><a href="/"> </a></li>
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
                            <a href="/cm24?itm_source=navbar" ga-tracking-value="menu-main6"
                                style="width: 50 px;"> Tin tức</a>
                            <div class="mega-menu mega-menu--product">
                                <div class="mega-menu__wrapper">
                                    <div class="mega-menu__inner">
                                        <div class="mega-menu__item flex-col flex-col-1"
                                            style="flex: 0 0 110%">
                                            <h3 class="mega-menu__title">Theo sản phẩm</h3>
                                            <div class="grid grid--two-columns">
                                                <div class="grid__column" style="padding-top: 0px;">
                                                    <ul rel-script="mega-menu-active">
                                                        <li><a href="/"> </a></li>
                                                        <li><a href="/"> </a></li>
                                                        <li><a href="/"> </a></li>
                                                        <li><a href="/"> </a></li>
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
                                        <div class="mega-menu__item flex-col flex-col-1"
                                            style="flex: 0 0 18%;">
                                            <h3 class="mega-menu__title">Theo sản phẩm</h3>
                                            <div class="grid grid--two-columns">
                                                <div class="grid__column" style="padding-top: 0px;">
                                                    <ul rel-script="mega-menu-active">
                                                        <li><a href="/">Tất cả</a></li>
                                                        <li><a href="/"> </a></li>
                                                        <li><a href="/"> </a></li>
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
                    <a href="TrangCNND.php"> <i class="fa-solid fa-user" style="hight: 50px;"></i></a>
                    <div class="header-actions__button">
                        <a href="giohang(nam).php"> <i class="fa-solid fa-cart-shopping"></i></a>
                        <span class="counts site-header__cartcount">
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
                                <input id="input-spotlight" type="text" name="search" rel-script="spotlight-search-control"
                                    placeholder="Tìm kiếm sản phẩm..." autocomplete="off"
                                    class="header-search__control one-whole">
                                <button class="homepage-search__submit" style="top: 13px; right: 30px; width:unset; height:unset; z-index:10">
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
</div>
