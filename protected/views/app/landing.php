<div class="wrapper landing" style="background-image: url('uploads/originals/<?php echo $back; ?>');">
	<div class="container-fluid">
		<div id="copy" class="copy"><?php echo $model_landing->copy; ?></div>
		<div class="items">
			<a>
				<div class="arrow-left"></div>
			</a>
			
			<div class="inner-container">
				<div class="elements-wrapper">
					
					<?php if(true===false){ //for($i=0; $i<count($model_collections); $i++){ ?>
					<a class="ajax-landing" href="<?php echo $this->createUrl('app/collection', array('id' => $model_collections[$i]->id_collection)); ?>">
						<div class="item">
							<div class="glow"><img src="images/glow_col1.png"/></div>
							<div class="img"><img src="uploads/originals/<?php echo $model_collections[$i]->image_collection; ?>"/></div>
							<div class="callup1 callup"><img src="images/col_callups-03.png"/></div>
						</div>
					</a>
					<?php } ?>
					<!-- <a href="#" class="collectionSeparator"><div class="item"></div></a>-->					
					<a class="ajax-landing" href="<?php echo $this->createUrl('app/collection', array('id' => $model_collections[3]->id_collection)); ?>">
						<div class="item">
							<div class="glow"><img src="images/glow_col4.png"/></div>
							<div class="img"><img src="uploads/originals/<?php echo $model_collections[3]->image_collection; ?>"/></div>
							<div class="callup1 callup"><img src="images/col_callups-04.png"/></div>
						</div>
					</a>
					<a class="ajax-landing" href="<?php echo $this->createUrl('app/collection', array('id' => $model_collections[4]->id_collection)); ?>">
						<div class="item">
							<div class="glow"><img src="images/glow_col5.png"/></div>
							<div class="img"><img src="uploads/originals/<?php echo $model_collections[4]->image_collection; ?>"/></div>
							<div class="callup1 callup"><img src="images/col_callups-05.png"/></div>
						</div>
					</a>
					<a class="ajax-landing" href="<?php echo $this->createUrl('app/collection', array('id' => $model_collections[0]->id_collection)); ?>">
						<div class="item">
							<div class="glow"><img src="images/glow_col1.png"/></div>
							<div class="img"><img src="uploads/originals/<?php echo $model_collections[0]->image_collection; ?>"/></div>
							<div class="callup1 callup"><img src="images/col_callups-03.png"/></div>
						</div>
					</a>
					<a class="ajax-landing" href="<?php echo $this->createUrl('app/collection', array('id' => $model_collections[2]->id_collection)); ?>">
						<div class="item">
							<div class="glow"><img src="images/glow_col3.png"/></div>
							<div class="img"><img src="uploads/originals/<?php echo $model_collections[2]->image_collection; ?>"/></div>
							<div class="callup3 callup"><img src="images/col_callups-02.png"/></div>
						</div>
					</a>
					<a class="ajax-landing" href="<?php echo $this->createUrl('app/collection', array('id' => $model_collections[1]->id_collection)); ?>">
						<div class="item">
							<div class="glow"><img src="images/glow_col2.png"/></div>
							<div class="img"><img src="uploads/originals/<?php echo $model_collections[1]->image_collection; ?>"/></div>
							<div class="callup2 callup"><img src="images/col_callups.png"/></div>
						</div>
					</a>

				</div>
			</div>
			
			<a>
				<div class="arrow-right"></div>
			</a>
		</div>
	</div>
	
	<a class="policyPrivacy" href="http://www.unileverprivacypolicy.com/spanish/policy.aspx" target="_blank">Política de Privacidad</a>
</div>