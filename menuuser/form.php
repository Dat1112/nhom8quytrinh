<?php
$style ="<meta property='og:type' content='website'>
    <link href='https://www.coolmate.me/css/style.css?v=TVpkw4FvcQSMjphUB6s1' rel='stylesheet' type='text/css'> 
    <link  rel='stylesheet' href='css/bootstrap.min.css'> 
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css' integrity='sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==' crossorigin='anonymous' referrerpolicy='no-referrer' />
    <link rel='stylesheet' href='css/App.css'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
    <link rel='stylesheet' href='assets/owlcarousel/assets/owl.carousel.min.css'>
    <link rel='stylesheet' href='assets/owlcarousel/assets/owl.theme.default.min.css'>
    <script src='assets/vendors/jquery.min.js'></script>
    <script src='assets/owlcarousel/owl.carousel.js'></script>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' rel='stylesheet'>
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
   
</style>";




 $top=" <div class='site-wrapper has-topbar' id='site-wrapper'>
        <header class='site-header'>
            <div class='topbar'>
            <div>
                <ul class='nav-main'>  </ul>            
            </div>
            <div class='mobile--hidden tablet--hidden' style='width: 550px;'>
                <ul class='nav-main' style='justify-content: flex-end'>
                   
                    <li class='nav-main__item right-item' rel-script='sub-menu' data-menu-id='about'>
                        <a href='/page/trung-tam-dich-vu-khach-hang?itm_source=navbar'
                            ga-tracking-value='topbar1-trung-tam-dich-vu-khach-hang' style='font-weight: normal'>
                            Trung tâm CSKH
                        </a>
                    </li>
                            
                    <li class='nav-main__item ' rel-script='sub-menu' data-menu-id='about'>
                            <a href='../dangnhap/dangnhap.php' ga-tracking-value='topbar1-login'
                                style='font-weight: normal' > <!--data-toggle='modal' data-target='#exampleModal'-->
                                Đăng nhập
                            </a>
                    </li>
                    <li class='nav-main__item ' rel-script='sub-menu' data-menu-id='about'>
                            <a href='../dangnhap/dangky.php' ga-tracking-value='topbar1-register'
                                style='font-weight: normal' >
                                Đăng Ký
                            </a>
                    </li>
                </ul>
            </div>
        </div>       
        <div class='header'>
    <div class='header__inner' style='background: black;'>
        <div class='header__toggle'>
            <div class='mobile--visible tablet--visible'>
                <a href='#' rel-script='search-toggle' class='menu-toggle is-active' ga-tracking-value='mbmenu-search-header' ga-tracking-label='Tìm kiếm header - mobile'>
                    <div class='menu-toggle__search'>
                        <img src='/' alt='Icon Search'>
                    </div>
                </a>
            </div>
        </div>
        <div class='header__logo'>
            <img src='img/anh1.jpg' alt='Logo BestShop'>
        </div>
        <div class='desk--hidden mobile--visible tablet--visible header-search-mobile' rel-script='header-search-content'>
            <form action='/spotlight' method='GET'>
    <div class='header-search__wrapper'>
        <label class='header-search__field'>
            <input id='input-spotlight-mobile' type='text' name='search' rel-script='spotlight-search-control-mobile' placeholder='Tìm kiếm sản phẩm...' class='header-search__control one-whole' autocomplete='off'>
            <button class='header-search__submit'></button>
        </label>
        <a href='#' class='header-search__close' rel-script='spotlight-search-close'></a>
    </div>
</form>
<div class='spotlight-search-content' rel-script='spotlight-search-content'>
    <div class='spotlight-search-content__wrapper'>
            <div class='spotlight-search-content__inner is-active'>
                <div class='spotlight-search-content__topkeyword is-active'>
                    <div class='homepage-search__content one-whole' style='display: block'>
                    </div>
                </div>
            </div>
        <div class='spotlight-header-search'>
            <div class='spotlight-header-search__suggestions'>
                <ul id='search-suggestions-mobile' class='search-suggestions'>
                </ul>
            </div>
            <p class='spotlight-header-search__title' style='font-weight: bold; font-size: 18px; margin-top: 0'>Sản phẩm</p>
            <div class='spotlight-header-search__wrapper grid grid--four-columns large-grid--four-columns tablet-grid--three-columns mobile-grid--two-columns' rel-script='spotlight-header-search-mobile'>
                <img src='https://www.coolmate.me/images/icons/loading.svg' class='loading' alt='loading'>
            </div>
            <div class='spotlight-header-search__viewmore'>
                <a class='btn btn-primary' href=''>Xem tất cả</a>
            </div>
        </div>
    </div>
</div>        </div>
        <div class='mobile--visible tablet--visible'>
                    </div>
        <div class='mobile--hidden tablet--hidden'>
            <ul class='nav__sub nav__sub-active'>
    <li class='nav__sub-item active-menu'  style='background: #ff5605;' >
                    <a href='/collections?itm_source=navbar' style='position: relative; font-weight: 500;' ga-tracking-value='menu-main1'>
                Trang chủ
            </a>          
    </li>
    <li class='nav__sub-item active-menu'  >
        <a href='/collections?itm_source=navbar'   style='position: relative;' >
            Sản phẩm
                    </a>
        <div class='mega-menu mega-menu--product'>
            <div class='mega-menu__wrapper'>
                <div class='mega-menu__inner'>
                    <div class='mega-menu__item flex-col flex-col-2' style='flex: 0 0 100%;'>
                        <div class='grid grid--four-columns'>
                            <div class='grid__column' style='padding-top: 0;'>
                                <h3 class='mega-menu__title' >APPLE</h3>
                                <ul rel-script='mega-menu-active'>
                                    <li><a href='/' >Tất cả các hãng iPhone</a></li>
                                    <li><a href='/' >iPhone 11</a></li>
                                    <li><a href='/' >iPhone 12 </a</li>
                                    <li><a href='/' > iPhone 13</a></li>
                                    <li><a href='/' >iPhone 14</a></li>
                                    <li><a href='/' >iPhone 15</a></li>
                                    <li><a href='/' >iPhone 15 pro max</a></li>
                                </ul>
                            </div>
                            <div class='grid__column' style='padding-top: 0;'>
                                <h3 class='mega-menu__title' >SamSung</h3>
                                <ul rel-script='mega-menu-active' >
                                <li><a href='/' >Tất cả các hãng Samsung</a></li>
                                    <li><a href='/' > Samsung Galaxy S23 Ultra</a></li>
                                    <li><a href='/' > Samsung Galaxy S24 Ultra</a</li>
                                    <li><a href='/' > Samsung Galaxy A Series</a></li>
                                    <li><a href='/' > Samsung Galaxy M Series</a></li>
                                    <li><a href='/' > Samsung Galaxy A54 5G</a></li>
                                    <li><a href='/' > Samsung Galaxy Note Series</a></li>
                                </ul>
                            </div>
                            <div class='grid__column' style='padding-top: 0;'>
                                <h3 class='mega-menu__title' >OPPO</h3>
                                <ul rel-script='mega-menu-active'>
                                    <li><a href='/' >Tất cả các hãng OPPO</a></li>
                                    <li><a href='/' > OPPO Reno8</a></li>
                                    <li><a href='/' > OPPO Reno8 5G</a</li>
                                    <li><a href='/' > OPPO A17</a></li>
                                    <li><a href='/' > OPPO A96</a></li>
                                    <li><a href='/' > OPPO A54</a></li>
                                </ul>
                            </div>
                        </div>
					</div>
                </div>
            </div>
        </div>
</li>
    <li class='nav__sub-item active-menu'>
        <a href='/' ga-tracking-value='menu-main4' style='position: relative'>
           Phụ kiện 
        </a>
        <div class='mega-menu mega-menu--product'>
            <div class='mega-menu__wrapper'>
                <div class='mega-menu__inner'>
                    <div class='mega-menu__item flex-col flex-col-1' style='flex: 0 0 110%'>
                        <h3 class='mega-menu__title' >Theo sản phẩm</h3>
                        <div class='grid grid--two-columns'>
                            <div class='grid__column' style='padding-top: 0px;'>
                                <ul rel-script='mega-menu-active'>
                                    <li><a href='/' >Tai nghe</a></li>
                                    <li><a href='/' >Loa bluetooth </a></li>
                                    <li><a href='/' >Loa mini </a></li>
                                    <li><a href='/' >Dán màn hình </a></li>
                                    <li><a href='/' >Óp lưng</a></li>
                                    <li><a href='/'>Sim</a></li>   
                                </ul>
                            </div>
                            <div class='grid__column' style='padding-top: 0;'>
                                <ul rel-script='mega-menu-active'>
                                    <li><a href='/' >Giá đỡ</a></li>
                                    <li><a href='/' >thẻ nhớ</a></li>
                                    <li><a href='/' >Cáp sạc</a></li>
                                    <li><a href='/' >Pin dự phòng</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <li class='nav__sub-item active-menu'>
        <a href='/'  style='position: relative'> Khuyến mãi</a>
        <div class='mega-menu mega-menu--product'>
            <div class='mega-menu__wrapper'>
                <div class='mega-menu__inner'>
                    <div class='mega-menu__item flex-col flex-col-1' style='flex: 0 0 110%'>
                        <h3 class='mega-menu__title' >Theo sản phẩm</h3>
                        <div class='grid grid--two-columns'>
                            <div class='grid__column' style='padding-top: 0px;'>
                                <ul rel-script='mega-menu-active'>
                                    <li><a href='/'>  </a></li>
                                    <li><a href='/'>  </a></li>
                                    <li><a href='/'>  </a></li>
                                    <li><a href='/'>  </a></li>
                                    <li><a href='/'> </a></li>
                                    <li><a href='/'>  </a></li>
                                    <li><a href='/'></a></li>
                                    <li><a href='/'></a></li>
                                </ul>
                            </div>
                            <div class='grid__column' style='padding-top: 0;'>
                                <ul rel-script='mega-menu-active'>
                                <li><a href='/'> Tất cả </a></li>
                                    <li><a href='/'>  </a></li>
                                    <li><a href='/'></a></li>
                                    <li><a href='/'> </a></li>
                                    <li><a href='/'></a></li>
                                    <li><a href='/'></a></li>
                                    <li><a href='/'></a></li>
                                    <li><a href='/'></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <li class='nav__sub-item active-menu'>
        <a href='/cm24?itm_source=navbar' ga-tracking-value='menu-main6' style='width: 50 px;'> Tin tức</a>
        <div class='mega-menu mega-menu--product'>
            <div class='mega-menu__wrapper'>
                <div class='mega-menu__inner'>
                    <div class='mega-menu__item flex-col flex-col-1' style='flex: 0 0 110%'>
                        <h3 class='mega-menu__title' >Theo sản phẩm</h3>
                        <div class='grid grid--two-columns'>
                            <div class='grid__column' style='padding-top: 0px;'>
                                <ul rel-script='mega-menu-active'>
                                    <li><a href='/'>  </a></li>
                                    <li><a href='/'> </a></li>
                                    <li><a href='/'>  </a></li>
                                    <li><a href='/'>  </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <li class='nav__sub-item active-menu' style='padding: 30px 0px;'>
        <div class='mega-menu mega-menu--product'>     
            <div class='mega-menu__wrapper'>
                <div class='mega-menu__inner'>
                    <div class='mega-menu__item flex-col flex-col-1' style='flex: 0 0 18%;'>
                        <h3 class='mega-menu__title' >Theo sản phẩm</h3>
                        <div class='grid grid--two-columns'>
                            <div class='grid__column' style='padding-top: 0px;'>
                                <ul rel-script='mega-menu-active'>
                                    <li><a href='/'> Tất cả </a></li>
                                    <li><a href='/'>  </a></li>
                                    <li><a href='/' > </a></li>
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
        <div class='header__actions'>
            <div class='header-actions-search__box mobile--hidden tablet--hidden'>
                <label class='header-actions-search__field'>
                    <input id='search-input' type='text' name='search' rel-script='search-input' placeholder='Tìm kiếm sản phẩm...' autocomplete='off' class='header-actions-search__control one-whole'>
                    <a href='#' class='header-actions-search__button' rel-script='header-search' ga-tracking-value='menu-search-header' ga-tracking-label='Tìm kiếm header - desktop'>
                        <img src='https://www.coolmate.me/images/header/icon-search-white-new.svg?v=1' alt='Icon Search' >
                    </a>
                </label>
            </div>
                    <header-user-icon></header-user-icon>
                <a href='/' > <i class='fa-solid fa-user' style='hight: 50px;'></i></a>
                        <div class='header-actions__button'>
                <a href='giohang(nam).php'> <i class='fa-solid fa-cart-shopping'></i></a>
                <span class='counts site-header__cartcount'>
						<?php
                                \$cart = [];
                                if (isset(\$_SESSION['cart'])){
                                \$cart = \$_SESSION['cart'];
                                }
                                \$count = 0;
                                foreach (\$cart as \$item){
                                \$count += \$item['qty'];
                                }
							    echo \$count;
                            ?>
						</span>

                <div class='header-actions__menu'>
                    <div class='header-actions__inner'>
                        <mini-cart></mini-cart>
                    </div>
                </div>
            </div>
        </div>
                    <div class='header-search mobile--hidden' rel-script='header-search-content'>
                <form action='/spotlight' method='GET'>
                    <div class='header-search__wrapper'>
                        <label class='header-search__field'>
                            <input id='input-spotlight' type='text' name='search' rel-script='spotlight-search-control' placeholder='Tìm kiếm sản phẩm...' autocomplete='off' class='header-search__control one-whole'>
                            <button class='homepage-search__submit' style='top: 13px; right: 30px; width:unset; height:unset; z-index:10'>
                            </button>
                    </div>
                </form>
        </div>
    </div>
</div>
</header>";
 $bot="<footer class='site-footer mobile--hidden'>
    <div class='container'>
        <div class='site-footer__inner'>
            <div class='site-footer__sidebar'>
                <div>
                    <h4 class='site-footer__title'>
                        BestShop lắng nghe bạn!
                    </h4>
                    <p class='site-footer__description' style='margin-bottom: 30px'>
                        Chúng tôi luôn trân trọng và mong đợi nhận được mọi ý kiến đóng góp từ
                        khách hàng để có thể nâng cấp trải nghiệm dịch vụ và sản phẩm tốt hơn nữa.
                    </p>
                    <a href='/' class='site-footer__btn' target='_blank'>
                        Đóng góp ý kiến
                    </a>
                </div>
            </div>
            <div class='site-footer__menu'>
                <div class='footer-menu'>
                    <div class='footer-menu__item'>
                        <h4 class='footer-menu__title'>Chính sách</h4>
                        <ul>
                            <li><a href='/'>Chính sách đổi trả 60 ngày</a></li>
                            <li><a href='/'>Chính sách khuyến mãi</a></li>
                            <li><a href='/'>Chính sách bảo mật</a></li>
                            <li><a href='/'>Chính sách giao hàng</a></li>
                        </ul>   
                    </div>
                    <div class='footer-menu__item'>
                        <h4 class='footer-menu__title'>Chăm sóc khách hàng</h4>
                        <ul>
                            <li><a href='/'>Trải nghiệm mua sắm 100% hài lòng</a></li>
                            <li><a href='/'>Hỏi đáp - FAQs</a></li>
                        </ul>
                    </div>
                    <div class='footer-menu__item'>
                        <h4 class='footer-menu__title'>Về BestShop</h4>
                        <ul>
                            <li><a href='/'>DVKH xuất sắc</a></li>
                            <li><a href='/'> Câu chuyện về Coolmate</a></li>
                            <li><a href='/'>Nhà máy</a></li>
                            <li><a href='/'>Care & Share</a></li>
                        </ul>
                    </div>
                    <div class='footer-menu__item'>
                        <h4 class='footer-menu__title'>Địa chỉ liên hệ</h4>
                        <p class='footer-menu__desciption'><u> HN: </u> TP Hà Nội</p>
                    </div>
                </div>
            </div>
        </div>     
    </div>
</footer>
</div>
</div>
<div class='voucher-bottom-backdrop'></div>
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
			
    
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>
";





?>