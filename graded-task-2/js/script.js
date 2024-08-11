document.addEventListener('DOMContentLoaded', function() { 
    AOS.init({ 
        duration: 1000, // Duration of animation in milliseconds 
        easing: 'ease-in-out', // Easing function for the animations 
        once: true, // Animation happens only once 
        mirror: false, // Whether elements should animate out while scrolling past them 
    }); 
});

// start of nav
document.querySelector('.navbar-toggler-btn').onclick = function() {
    document.querySelector('.collapsed-navbar-custom').style.display = 'block';
    this.style.display = 'none';
}

document.querySelector('.navbar-exit-custom').onclick = function() {
    document.querySelector('.collapsed-navbar-custom').style.display = 'none';
    document.querySelector('.navbar-toggler-btn').style.display = 'block';
}
let isScrolled = false;
window.onscroll = function() {
    /*start nav bar*/
    if(window.scrollY == 0 && isScrolled == true){
        isScrolled = false;
        document.querySelector('nav.navbar').classList.remove('colored-navbar');
        document.querySelector('nav.navbar').classList.add('transparent-navbar');
    }else if(window.scrollY > 1 && isScrolled == false){
        isScrolled = true;
        document.querySelector('nav.navbar').classList.remove('transparent-navbar');
        document.querySelector('nav.navbar').classList.add('colored-navbar');
    }
    /*end nav bar*/

    /* start scroll to top */
    if(window.scrollY > 100){
        document.querySelector('.top-btn').style.display = 'block';
    }else{
        document.querySelector('.top-btn').style.display = 'none';
    }
    /* end scroll to top */
}


// end of nav

// start of scroll to top
document.querySelector('.top-btn').onclick = function() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}
// end of scroll to top

// start of portfoilio
let itemsCount = 3;
function createPortfolioImg(num, type, desc) {
    const div = document.createElement('div')
    div.classList = `col-12 col-md-6 col-lg-4 ${type}-filter p-1 `;
    div.setAttribute('data-aos', 'flip-up');
    const img = document.createElement('img');
    img.src = `assets/portfolio-imgs/${type}-${num}.jpg`;
    img.classList = "img-fluid w-100";
    img.alt = "";
    img.srcset = "";
    div.appendChild(img);
    const backdrop = document.createElement('div');
    backdrop.classList = "backdrop";
    div.appendChild(backdrop);
    const title = document.createElement('p');
    title.classList = "title";
    title.textContent = `${type} ${num}`;
    backdrop.appendChild(title);
    const btns = document.createElement('div');
    btns.classList = "btns";
    backdrop.appendChild(btns);
    const zoom = document.createElement('i');
    zoom.classList = "ri-zoom-in-line";
    btns.appendChild(zoom);
    const link = document.createElement('i');
    link.classList = "ri-link";
    btns.appendChild(link);
    const p = document.createElement('p');
    p.textContent = desc;
    backdrop.appendChild(p);
    return div;
}

document.querySelectorAll('.portfolio-types button.type').forEach((btn) => {
    let type = btn.getAttribute('name');
    for(let i = 0; i< itemsCount; i++){
        document.querySelector('.portfolio-imgs').appendChild(createPortfolioImg(i + 1, type, 'Lorem ipsum dolor sit amet consectetur adipisicing elit.'))
    }
})


document.querySelectorAll('.portfolio-types button').forEach((btn) => {
    btn.onclick = function() {
        document.querySelector('.portfolio-types button.active').classList.remove('active');
        this.classList.add('active');
        let type = this.getAttribute('name');
        if (type == 'all'){
            document.querySelectorAll('.portfolio-imgs > div').forEach((div) => {
                div.classList.remove('d-none');
            })
        }else{
            document.querySelectorAll('.portfolio-imgs > div').forEach((div) => {
                div.classList.add('d-none');
            })
            document.querySelectorAll(`.${type}-filter`).forEach((div) => {
                div.classList.remove('d-none');
            })
        }
    }
})


// end of portfoilio

/*start color theme*/
document.querySelector('.theme input').onclick = function() {
    if(this.checked){
        let link = document.createElement('link');
        link.rel = 'stylesheet';
        link.href = 'css/dark.css';
        document.querySelector('head').append(link);
    }else{
        document.querySelector('head').lastElementChild.remove();
    }
}
/*end color theme */
