(function($){
	
	
  const dataLocal = localStorage.getItem('whislist')
		$.ajax({
			url : dcms_vars.ajaxurl,
			type: 'post',
			data: {
				action : 'dcms_ajax_readmore',
				id_posts: dataLocal
			},
			beforeSend: function(){
        $('body').html('cargando')
				// $(body).html('Cargando ...');
			},
			success: function(resultado){
        if(resultado) {
          $('.whislist-content').html(resultado)
          $('.whislist-remove').click(function() {
            const productData = this.dataset.product
            if(dataLocal) {
              const formatDataStorage = JSON.parse(dataLocal)
              if(formatDataStorage.includes(productData)){ 
                const parentElement = this.closest('.whislist-item')
                $(parentElement).remove()
                localStorage.setItem('whislist', JSON.stringify(formatDataStorage.filter(item => item !== productData)))
              }
            }
          })

        } else {
          $('.whislist-empty').html(`<div class="whislist-content-empty">
          <div class="whislist-content-empty__left">
            <img src="https://tukutravel.com/wp-content/themes/tuku/assets/img/whislist.png" alt="whislist">
          </div>
          <div class="whislist-content-empty__right">
            <div class="whislist-empty__title">
              Todavía no tienes ítems en tu lista de deseos
            </div>
            <div class="whislist-empty__desc">
              Encuentra el tour que tanto buscas en nuestro catalogo y pulsa el corazón para guardarlo.
            </div>
            <div class="whislist-empty__action">
              <a href="" class="btn">Comenzar a explorar</a>
            </div>
          </div>
        </div>`)
        }

			}

		});


})(jQuery);
