<section class="tg-sectionspace tg-haslayout">
	<div class="container">
		<div class="row">
			<div class="tg-newrelease">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="tg-sectionhead">
						<h2><span>Sách bán chạy</span>Mua ngay thôi</h2>
					</div>
					<div class="tg-description">
						<p>Consectetur adipisicing elit idunt labore toloregna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamcoiars nisiuip commodo consequat aute irure dolor in aprehenderit aveli esseati cillum dolor fugiat nulla pariatur cepteur sint occaecat cupidatat.</p>
					</div>
					<div class="tg-btns">
						<a class="tg-btn tg-active" href="javascript:void(0);">View All</a>
						<a class="tg-btn" href="javascript:void(0);">Read More</a>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="row">
						<div class="tg-newreleasebooks">
							<?php foreach ($top3Books as $book): ?>
								<div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
									<div class="tg-postbook">
										<figure class="tg-featureimg">
											<div class="tg-bookimg">
												<div class="tg-frontcover"><img src="<?= BASE_URL . $book['hinh_anh'] ?>" alt="<?= $book['ten'] ?>"></div>
												<div class="tg-backcover"><img src="<?= BASE_URL . $book['hinh_anh'] ?>" alt="<?= $book['ten'] ?>"></div>
											</div>
											<a class="tg-btnaddtowishlist" href="javascript:void(0);">
												<i class="fa fa-shopping-basket"></i>
												<span>Thêm vào giỏ hàng</span>
											</a>
										</figure>
										<div class="tg-postbookcontent">
											<ul class="tg-bookscategories">
												<li><a href="javascript:void(0);"><?= $book['ten_danh_muc'] ?></a></li>
											</ul>
											<div class="tg-booktitle">
												<h3><a href="javascript:void(0);"><?= $book['ten'] ?></a></h3>
											</div>
											<span class="tg-bookprice">
												<ins><?= $book['gia'] ?> VND</ins>
											</span>
											<span class="tg-bookwriter">By: <a href="javascript:void(0);"><?= $book['tac_gia'] ?></a></span>
											<span class="tg-stars"><span></span></span>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>