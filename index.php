<?php
require_once __DIR__.'/includes/functions.php';
$page_title='Fashion for every day';
$featured=db()->query("SELECT * FROM products WHERE active=1 ORDER BY featured DESC,id DESC LIMIT 8")->fetchAll();
include __DIR__.'/includes/header.php';
?>
<section class="hero">
 <div class="hero-copy"><span class="eyebrow">The everyday edit · New collection</span><h1>Wear what<br>feels like you.</h1><p>Easy layers, thoughtful details, and pieces that make getting dressed the best part of your day.</p><div class="mt-3"><a class="btn btn-dark" href="<?= e(url('products.php')) ?>">Shop the collection <i class="bi bi-arrow-up-right ms-2"></i></a></div><div class="mt-4 small muted">Free shipping over ₹1,499 · Easy 7-day returns*</div></div>
 <img class="hero-img" src="https://images.unsplash.com/photo-1483985988355-763728e1935b?auto=format&fit=crop&w=1300&q=85" alt="Fashion models in a city street">
</section>
<section class="container py-5"><div class="d-flex justify-content-between align-items-end mb-4"><div><span class="eyebrow">Picked for you</span><h2 class="section-title mt-2">The new favourites</h2></div><a class="text-decoration-underline" href="<?= e(url('products.php')) ?>">View all</a></div>
<div class="row g-4"><?php foreach($featured as $p): ?><div class="col-6 col-lg-3"><?php include __DIR__.'/includes/product_card.php'; ?></div><?php endforeach; ?></div></section>
<section class="container pb-5"><div class="row g-4"><div class="col-md-4"><a class="category-tile d-block" href="<?= e(url('products.php?category=Women')) ?>"><img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?auto=format&fit=crop&w=800&q=80" alt="Women's fashion"><span class="category-label">Shop Women ↗</span></a></div><div class="col-md-4"><a class="category-tile d-block" href="<?= e(url('products.php?category=Men')) ?>"><img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?auto=format&fit=crop&w=800&q=80" alt="Modern style"><span class="category-label">Shop Men ↗</span></a></div><div class="col-md-4"><a class="category-tile d-block" href="<?= e(url('products.php?category=Accessories')) ?>"><img src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?auto=format&fit=crop&w=800&q=80" alt="Accessories and outfits"><span class="category-label">Finishing touches ↗</span></a></div></div></section>
<section class="container pb-5"><div class="text-center p-5" style="background:var(--sage)"><span class="eyebrow">A little something for you</span><h2 class="section-title my-3">Your first order, 10% off.</h2><p>Use code <strong>WELCOME10</strong> at checkout on orders over ₹499.</p><a class="btn btn-dark" href="<?= e(url('products.php')) ?>">Find your fit</a></div></section>
<?php include __DIR__.'/includes/footer.php'; ?>
