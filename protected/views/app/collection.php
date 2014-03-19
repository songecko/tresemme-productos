<div class="wrapper collection <?php echo $col; ?>" style="background-image: url('uploads/originals/<?php echo $back; ?>');">
	<div class="container-fluid">
		<a class="home-link" href="<?php echo $this->createUrl('app/index'); ?>"></a>
		<a class="home-flecha" href="<?php echo $this->createUrl('app/index'); ?>">
			<img src="images/flechita.png">
		</a>
		<div id="header" class="header"><?php echo $model_collection->header; ?></div>
		<div id="copy" class="copy"><?php echo $model_collection->copy; ?></div>
		<div class="items">
			<a>
				<div class="arrow-left"></div>
			</a>

			<div class="inner-container">
				<div class="elements-wrapper">
					
					<?php for($i=0; $i<count($model_products); $i++){ ?>
					<a class="ajax-product slide" href="<?php echo $this->createUrl('app/product', array('id' => $model_products[$i]->id_product)); ?>">
						<div class="item">
							<div class="glow"><img src="images/<?php echo $glow; ?>"/></div>
							<div class="img"><img src="uploads/originals/<?php echo $model_products[$i]->image1; ?>"/></div>
						</div>
					</a>
					<?php } ?>

				</div>
			</div>

			<a>
				<div class="arrow-right"></div>
			</a>
		</div>
	</div>
</div>