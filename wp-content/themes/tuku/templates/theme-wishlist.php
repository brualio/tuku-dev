<?php /* Template Name: Theme - Wishtlist */ ?>
<?php get_header(); ?>

<div class="whislist">
  <div class="container">
		<div class="whislist-title">
			<?php _e('Mi lista de deseos','tuku') ?>
		</div>
		<div class="whislist-subtitle">
			<?php _e('Encuentra el tour que tanto buscas en nuestro catalogo y pulsa el corazón para guardarlo.','tuku') ?>
		</div>
		<div class="whislist-content">

		</div>
		<div class="whislist-empty"></div>
	</div>
</div>

<?php get_footer(); ?>

<script type="text/javascript"> 
	jQuery(document).ready(function() { 
		  // whislist 
			const LoadWhislist = () => {
    const localDataStorage = localStorage.getItem('whislist')
      if(localDataStorage) {
        const formatDataStorage = JSON.parse(localDataStorage)
        if(cards) {
          Array.from(cards).map(item => {
            // item.dataset.product
            if(formatDataStorage.includes(item.dataset.product)) {
              item.querySelector('.card-product__heart').classList.add('active')
            }
          })
        }
        
      }
  	}
	}); 
</script>