<?php include_once 'layout/header.php';

?>

<div class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div>
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 ">
                    <div id="tg-content" class="tg-content">

                        <div class="tg-productdetail">
                            <div class="row">
                                <div class="col-xs-12 col-sm-8 col-md-12 col-lg-4">
                                    <div class="tg-postbook">
                                        <figure class="tg-featureimg">
                                            <img src="<?= htmlspecialchars($book['hinh_anh']) ?>" alt="<?= htmlspecialchars($book['ten']) ?>" class="img-fluid">
                                        </figure>
                                        <!-- Nội dung sản phẩm -->
                                        <div class="tg-postbookcontent">
                                            <span class="tg-bookprice">
                                                <ins>$<?= htmlspecialchars(number_format($book['gia'], 2)); ?></ins>
                                            </span>
                                            <!-- Trạng thái -->
                                            <ul class="tg-delevrystock list-unstyled">
                                                <li>
                                                    <i class="icon-store"></i>
                                                    <span>Trạng thái:
                                                        <em class="<?= $book['trang_thai'] == 1 ? 'text-success' : 'text-danger'; ?>">
                                                            <?= $book['trang_thai'] == 1 ? 'Còn hàng' : 'Hết hàng'; ?>
                                                        </em>
                                                    </span>
                                                </li>
                                            </ul>
                                            <div class="tg-quantityholder">
                                                <h3>Sách có bán dưới dạng:</h3>
                                                <ul>
                                                    <li><span>CD-Audio $18.30</span></li>
                                                    <li><span>Paperback $20.10</span></li>
                                                    <li><span>E-Book $11.30</span></li>
                                                </ul>
                                            </div>
                                            <!-- Thêm vào giỏ hàng -->

                                            <!-- <a class="tg-btn tg-active tg-btn-lg btn btn-primary w-100 mt-3" href="javascript:void(0);">Thêm vào giỏ hàng </a> -->
                                        </div>
                                        <form action="?act=add-to-cart" method="POST">
                                            <input type="hidden" name="san_pham_id" value="<?= $book['id']; ?>">
                                            <input type="hidden" name="don_gia" value="<?= $book['gia']; ?>">
                                            <input type="hidden" name="ten" value="<?= $book['ten']; ?>">
                                            <input type="hidden" name="hinh_anh" value="<?= $book['hinh_anh']; ?>">
                                            <input type="number" name="so_luong" value="1" min="1">
                                            <button type="submit" class="btn btn-primary" name="addtocart" value="1">Thêm vào giỏ hàng</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                    <div class="tg-productcontent">
                                        <ul class="tg-bookscategories">
                                            <li><a href="javascript:void(0);">
                                                    <?= htmlspecialchars($book['ten_danh_muc'] ?? 'Không có danh mục') ?>
                                                </a></li>
                                        </ul>
                                        <div class="tg-themetagbox"><span class="tg-themetag">sale</span></div>
                                        <div class="tg-booktitle">
                                            <h3 class="fw-bold"><?= htmlspecialchars($book['ten']); ?></h3>
                                        </div>
                                        <span class="tg-bookwriter">By: <a href="javascript:void(0);"><?= htmlspecialchars($book['tac_gia']); ?></a></span>
                                        <span class="tg-stars"><span></span></span>
                                        <span class="tg-addreviews"><a href="javascript:void(0);">Thêm nhận xét</a></span>
                                        <div class="tg-share">
                                            <span>Share:</span>
                                            <ul class="tg-socialicons">
                                                <li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                                                <li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                                                <li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                                                <li class="tg-googleplus"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
                                                <li class="tg-rss"><a href="javascript:void(0);"><i class="fa fa-rss"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="tg-description">
                                            <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore etdoloreat magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laborisi nisi ut aliquip ex ea commodo consequat aute.</p>
                                            <p>Arure dolor in reprehenderit in voluptate velit esse cillum dolore fugiat nulla aetur excepteur sint occaecat cupidatat non proident, sunt in culpa quistan officia serunt mollit anim id est laborum sed ut perspiciatis unde omnis iste natus</p>
                                        </div>
                                        <div class="tg-sectionhead">
                                            <h2>Thông tin sản phẩm</h2>
                                        </div>
                                        <ul class="tg-productinfo">
                                            <li><span>Tên sách:</span><span><?= htmlspecialchars($book['ten']) ?></span></li>
                                            <li><span>Tác giả:</span><span><?= htmlspecialchars($book['tac_gia']); ?></span></li>
                                            <li><span>Danh mục:</span><span><?= htmlspecialchars($book['ten_danh_muc'] ?? 'Không có danh mục') ?></span></li>
                                            <li><span>Giá:</span><span>$<?= htmlspecialchars(number_format($book['gia'], 2)); ?></span></li>
                                            <li><span>Trạng thái:</span><span>
                                                    <em class="<?= $book['trang_thai'] == 1 ? 'text-success' : 'text-danger'; ?>">
                                                        <?= $book['trang_thai'] == 1 ? 'Còn hàng' : 'Hết hàng'; ?>
                                                    </em>
                                                </span></li>
                                            <li><span>Mô tả:</span><span><?= htmlspecialchars($book['mo_ta']); ?></span></li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 pull-left">
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'layout/footer.php'; ?>