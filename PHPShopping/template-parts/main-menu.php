<div class="box-cate">
	  <?php $showCat = $cat ->show_category();
                      if ($showCat){
                        $i=0;
                        while ( $result = $showCat ->fetch_assoc()) {
                          # code...
                          $i++;
                      ?>
	<ul>
		<li class="menu-item"><a href="product.php?cat=<?php echo $result['catId']  ?>"" title="#" value ="<?php echo $result['catId']  ?>"><?php echo $result['catName']  ?></a></li>
	</ul>
	<?php 
		}
	}
	?>
</div>