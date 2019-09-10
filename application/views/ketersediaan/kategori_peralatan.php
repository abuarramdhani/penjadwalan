<?php foreach ($kategori_view as $kategori_item) { ?>
  <div class="col-md-2 col-xs-4">
    <div class="small-box bg-blue">
      <div class="inner">
        <h3><?php echo $kategori_item['jumlah'] ?><sup style="font-size: 20px">unit</sup></h3>
        <p><?php echo $kategori_item['kategori'] ?></p>
      </div>
    </div>
  </div>
<?php } ?>
