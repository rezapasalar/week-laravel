export default (lozad) => {

    let firstLoad = false;

    window.addEventListener('scroll:to:products', () => {

        lozad().observe();

        let myProducts = document.querySelector('.my-products');

        if (!myProducts) return;
    
        if (!firstLoad) return firstLoad = true;
        
        window.scrollTo({top: myProducts.offsetTop < 200 ? 0 : myProducts.offsetTop, behavior: 'smooth'})
        
    });
}