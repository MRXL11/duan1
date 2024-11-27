<?php include_once 'layout/header.php'; ?>
<style>
    /* Đảm bảo rằng các cột trong .row có chiều rộng cố định và có khoảng cách giữa các ô */
    /* Đảm bảo rằng các cột trong .row có chiều rộng cố định và có khoảng cách giữa các ô */
    /* Đảm bảo rằng các cột trong .row có chiều rộng cố định và có khoảng cách giữa các ô */
</style>
<main id="tg-main" class="tg-main tg-haslayout">
    <div class="tg-sectionspace tg-haslayout">
        <div class="container">
            <div class="row">
                <div id="tg-twocolumns" class="tg-twocolumns">
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
                        <div id="tg-content" class="tg-content">
                            <div class="tg-newsgrid">
                                <div class="tg-sectionhead">
                                    <h2><span>Sách là cội nguồn</span>Một số đầu sách tham khảo</h2>
                                </div>
                                <div class="row">
                                    <?php foreach ($listBook as $key => $book): ?>
                                        <div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">

                                            <div class="tg-postbook">

                                                <figure class="tg-featureimg">
                                                    <div class="tg-bookimg">
                                                        <div class="tg-frontcover"><img src="<?= BASE_URL . $book['hinh_anh'] ?>" style="width: 100%; height: 100%; object-fit: cover;" alt=""
                                                                onerror="this.onerror=null;
                                                             this.src='https://khothietke.net/wp-content/uploads/2021/05/PNGkhothietke.net-02705.png'"></div>
                                                        <div class="tg-backcover"><img src="<?= BASE_URL . $book['hinh_anh'] ?>" style="width: 100%; height: 100%; object-fit: cover;" alt=""
                                                                onerror="this.onerror=null; 
                                                            this.src='https://khothietke.net/wp-content/uploads/2021/05/PNGkhothietke.net-02705.png'"></div>
                                                    </div>

                                                </figure>
                                                <div class="tg-postbookcontent">
                                                    <ul class="tg-bookscategories">
                                                        <li><a href="javascript:void(0);">Danh mục :<?= $book['ten_danh_muc'] ?></a></li>

                                                    </ul>
                                                    <div class="tg-themetagbox"><span class="tg-themetag">sale</span></div>
                                                    <div class="tg-booktitle">
                                                        <h3><a href="javascript:void(0);"><?= $book['ten'] ?></a></h3>
                                                    </div>
                                                    <span class="tg-bookwriter">Tác giả: <?= $book['tac_gia'] ?></a></span>
                                                    <span class="tg-bookwriter"><?= $book['trang_thai'] == 1 ? 'Còn hàng' : 'Hết hàng' ?></a></span>
                                                    <span class="tg-stars"><span></span></span>
                                                    <span class="tg-bookprice">
                                                        <ins>Giá: <?= $book['gia'] ?></ins>
                                                        <del>$27.20</del>
                                                    </span>
                                                    <a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
                                                        <i class="fa fa-shopping-basket"></i>
                                                        <em>Thêm vào giỏ hàng</em>
                                                    </a>
                                                </div>

                                            </div>

                                        </div>
                                        <!-- ----- --> <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 pull-left">
                        <aside id="tg-sidebar" class="tg-sidebar">
                            <div class="tg-widget tg-widgetsearch">
                                <form class="tg-formtheme tg-formsearch" method="GET">
                                    <div class="form-group">
                                        <button type="submit"><i class="icon-magnifier"></i></button>
                                        <input type="search" name="search" class="form-group" placeholder="Search Here">
                                    </div>
                                </form>
                            </div>
                            <div class="tg-widget tg-catagories">
                                <div class="tg-widgettitle">
                                    <h3>Danh mục</h3>
                                </div>
                              
                                    <div class="tg-widgetcontent">
                                    <?php foreach ($listCategory as $key => $category): ?>
                                        <ul>
                                            <li><a href="?category_id=<?= $category['id'] ?>"><?= $category['ten_danh_muc'] ?></a></li>
                                        </ul>
                                        <?php endforeach; ?>
                                    </div>
                                   
                                    <li><a href="?">Tất cả</a></li>
                                    
                            </div>

                            <div class="tg-widget tg-widgettrending">
                                <div class="tg-widgettitle">
                                    <h3>Trending Posts</h3>
                                </div>
                                <div class="tg-widgetcontent">
                                    <ul>
                                        <li>
                                            <article class="tg-post">
                                                <figure><a href="javascript:void(0);"><img src="uploads/products/img-04.jpg" alt="image description"></a></figure>
                                                <div class="tg-postcontent">
                                                    <div class="tg-posttitle">
                                                        <h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
                                                    </div>
                                                    <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                                                </div>
                                            </article>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="tg-widget tg-widgetinstagram">
                                <div class="tg-widgettitle">
                                    <h3>Instagram</h3>
                                </div>
                                <div class="tg-widgetcontent">
                                    <ul>
                                        <li>
                                            <figure>
                                                <img src="uploads/instagram/img-01.jpg" alt="image description">
                                                <figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a></figcaption>
                                            </figure>
                                        </li>
                                        <li>
                                            <figure>
                                                <img src="uploads/instagram/img-02.jpg" alt="image description">
                                                <figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a></figcaption>
                                            </figure>
                                        </li>
                                        <li>
                                            <figure>
                                                <img src="uploads/instagram/img-03.jpg" alt="image description">
                                                <figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a></figcaption>
                                            </figure>
                                        </li>
                                        <li>
                                            <figure>
                                                <img src="uploads/instagram/img-04.jpg" alt="image description">
                                                <figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a></figcaption>
                                            </figure>
                                        </li>
                                        <li>
                                            <figure>
                                                <img src="uploads/instagram/img-05.jpg" alt="image description">
                                                <figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a></figcaption>
                                            </figure>
                                        </li>
                                        <li>
                                            <figure>
                                                <img src="uploads/instagram/img-06.jpg" alt="image description">
                                                <figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a></figcaption>
                                            </figure>
                                        </li>
                                        <li>
                                            <figure>
                                                <img src="uploads/instagram/img-07.jpg" alt="image description">
                                                <figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a></figcaption>
                                            </figure>
                                        </li>
                                        <li>
                                            <figure>
                                                <img src="uploads/instagram/img-08.jpg" alt="image description">
                                                <figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a></figcaption>
                                            </figure>
                                        </li>
                                        <li>
                                            <figure>
                                                <img src="uploads/instagram/img-09.jpg" alt="image description">
                                                <figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a></figcaption>
                                            </figure>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tg-widget tg-widgetblogers">
                                <div class="tg-widgettitle">
                                    <h3>Top Bloogers</h3>
                                </div>
                                <div class="tg-widgetcontent">
                                    <ul>
                                        <li>
                                            <div class="tg-author">
                                                <figure><a href="javascript:void(0);"><img src="uploads/author/imag-03.jpg" alt="image description"></a></figure>
                                                <div class="tg-authorcontent">
                                                    <h2><a href="javascript:void(0);">Jude Morphew</a></h2>
                                                    <span>21,658 Published Books</span>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php include_once 'layout/newRelease.php'; ?>
    <?php include_once 'layout/pickedByAuthor.php'; ?>
    <?php include_once 'layout/newLatest.php'; ?>

</main>

<?php include_once 'layout/footer.php'; ?>