document.addEventListener('DOMContentLoaded', function () {
  const cards = document.querySelectorAll('.card-product')

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

  if(cards) {
    Array.from(cards).map(item => {
      item.querySelector('.card-product__heart').addEventListener('click', function (e) {
        e.preventDefault()
        e.stopPropagation()
        const parentElement = this.closest('.card-product')
        const productData = parentElement.dataset.product
        const localDataStorage = localStorage.getItem('whislist')
        if(localDataStorage) {
          const formatDataStorage = JSON.parse(localDataStorage)
          if(formatDataStorage.includes(productData)){ 
            this.classList.remove('active')
            localStorage.setItem('whislist', JSON.stringify(formatDataStorage.filter(item => item !== productData)))
          } else {
            formatDataStorage.push(productData)
            localStorage.setItem('whislist', JSON.stringify(formatDataStorage))
            this.classList.add('active')
          }
        } else {
          
          localStorage.setItem('whislist', JSON.stringify([productData]))
          this.classList.add('active')
        }
      })
      item.addEventListener('click', function(e) {
        e.stopPropagation()
      })
    
    })
    
  }
  
  const scrollDown = document.querySelectorAll('.movedownScroll')
  
  Array.from(scrollDown).map(item => {
    item.addEventListener('click', function(e) {
      const elementHeight = this.parentNode.clientHeight
      window.scroll({
        top: elementHeight,
        behavior: 'smooth'  // 👈 
      });
    })
  })
  
  const convertImages = (query, callback) => {
    const images = document.querySelectorAll(query);
  
    images.forEach(image => {
      fetch(image.src)
      .then(res => res.text())
      .then(data => {
        const parser = new DOMParser();
        const svg = parser.parseFromString(data, 'image/svg+xml').querySelector('svg');
        if(svg) {
          if (image.id) svg.id = image.id;
          if (image.className) svg.classList = image.classList;
    
          image.parentNode.replaceChild(svg, image);
        }
  
      })
      .then(callback)
      .catch(error => console.error(error))
    });
  }
  
  convertImages('.svg-convert')
  LoadWhislist()
})