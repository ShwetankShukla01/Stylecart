<?php
require_once __DIR__.'/includes/functions.php'; $page_title='Shop all styles';
$q=trim((string)($_GET['q']??'')); $cat=trim((string)($_GET['category']??'')); $sort=(string)($_GET['sort']??'featured');
$sql="SELECT * FROM products WHERE active=1"; $args=[];
if($q!==''){$sql.=" AND (name LIKE ? OR description LIKE ? OR category LIKE ?)";$args[]="%$q%";$args[]="%$q%";$args[]="%$q%";}
if(in_array($cat,['Women','Men','Accessories'],true)){$sql.=" AND category=?";$args[]=$cat;}
$sql.=" ORDER BY ".(['price_low'=>'COALESCE(NULLIF(sale_price,0),price) ASC','price_high'=>'COALESCE(NULLIF(sale_price,0),price) DESC','newest'=>'id DESC','featured'=>'featured DESC,id DESC'][$sort]??'featured DESC,id DESC');
$stmt=db()->prepare($sql);$stmt->execute($args);$products=$stmt->fetchAll(); include __DIR__.'/includes/header.php'; ?>
<div class="page-head"><div class="container"><span class="eyebrow">The Style Edit</span><h1 class="section-title mt-2"><?= $cat?e($cat):'Find your next favourite' ?></h1><p class="muted mb-0"><?= count($products) ?> styles, made for your everyday.</p></div></div>
<div class="container py-4"><form class="row g-2 align-items-center mb-4"><input type="hidden" name="q" value="<?= e($q) ?>"><input type="hidden" name="category" value="<?= e($cat) ?>"><div class="col-auto ms-auto"><select class="form-select" name="sort" onchange="this.form.submit()"><option value="featured" <?= $sort==='featured'?'selected':'' ?>>Featured</option><option value="newest" <?= $sort==='newest'?'selected':'' ?>>Newest</option><option value="price_low" <?= $sort==='price_low'?'selected':'' ?>>Price: low to high</option><option value="price_high" <?= $sort==='price_high'?'selected':'' ?>>Price: high to low</option></select></div></form>
<div class="row g-4"><?php foreach($products as $p): ?><div class="col-6 col-lg-3"><?php include __DIR__.'/includes/product_card.php'; ?></div><?php endforeach; ?><?php if(!$products): ?><div class="col-12 py-5 text-center"><h3>No styles found</h3><p class="muted">Try another search or category.</p><a class="btn btn-dark" href="<?= e(url('products.php')) ?>">Shop all</a></div><?php endif; ?></div></div>
<?php include __DIR__.'/includes/footer.php'; ?>
