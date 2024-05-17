// code for english and french toggle jwo bhy
document.getElementById('language-toggle').addEventListener('click', function () {
    document.getElementById('language-toggle').classList.add('hidden')
    document.getElementById('french-toggle').classList.remove('hidden')
  })
  
  document.getElementById('french-toggle').addEventListener('click', function () {
    document.getElementById('french-toggle').classList.add('hidden')
    document.getElementById('language-toggle').classList.remove('hidden')
  })
  // code foe services dropdown jwo bhy
  document.addEventListener('DOMContentLoaded', function() {
    const servicesLink = document.querySelector('#serviceToggle');
    const servicesDropdown = document.getElementById('services-dropdown');

    servicesLink.addEventListener('mouseenter', function() {
        servicesDropdown.classList.remove('hidden');
    });

    servicesLink.addEventListener('mouseleave', function(event) {
        
        if (!servicesDropdown.contains(event.relatedTarget)) {
            servicesDropdown.classList.add('hidden');
        }
    });

    servicesDropdown.addEventListener('mouseenter', function() {
        this.classList.remove('hidden');
    });

    servicesDropdown.addEventListener('mouseleave', function() {
        this.classList.add('hidden');
    });
});

// code for services dropdown jwo bhy
document.addEventListener('DOMContentLoaded', function() {
    
    const servicesLink = document.querySelector('li.relative > a.nav-link');
    const servicesDropdown = document.getElementById('services-dropdown');

    servicesLink.addEventListener('mouseenter', function() {
        servicesDropdown.classList.remove('hidden');
    });

    servicesLink.addEventListener('mouseleave', function(event) {
        if (!servicesDropdown.contains(event.relatedTarget)) {
            servicesDropdown.classList.add('hidden');
        }
    });

    servicesDropdown.addEventListener('mouseenter', function() {
        this.classList.remove('hidden');
    });

    servicesDropdown.addEventListener('mouseleave', function() {
        this.classList.add('hidden');
    });

    // Code for Marketing dropdown jwo bhy

    const marketingLink = document.querySelector('#services-dropdown > li.relative > a.nav-link');
    const marketingDropdown = marketingLink.nextElementSibling;

    marketingLink.addEventListener('mouseenter', function() {
        marketingDropdown.classList.remove('hidden');
    });

    marketingLink.addEventListener('mouseleave', function(event) {
        if (!marketingDropdown.contains(event.relatedTarget)) {
            marketingDropdown.classList.add('hidden');
        }
    });

    marketingDropdown.addEventListener('mouseenter', function() {
        this.classList.remove('hidden');
    });

    marketingDropdown.addEventListener('mouseleave', function() {
        this.classList.add('hidden');
    });
});
//  code for design drop down  jwo bhy
document.addEventListener('DOMContentLoaded', function() {
const designLink = document.querySelector('#services-dropdown > li.relative:nth-child(2) > a.nav-link');
    const designDropdown = designLink.nextElementSibling;

    designLink.addEventListener('mouseenter', function() {
        designDropdown.classList.remove('hidden');
    });

    designLink.addEventListener('mouseleave', function(event) {
        if (!designDropdown.contains(event.relatedTarget)) {
            designDropdown.classList.add('hidden');
        }
    });

    designDropdown.addEventListener('mouseenter', function() {
        this.classList.remove('hidden');
    });

    designDropdown.addEventListener('mouseleave', function() {
        this.classList.add('hidden');
    });
});

   // Code for Web Development dropdown jwo bhy
document.addEventListener('DOMContentLoaded', function() {
    

    
    const webDevLink = document.querySelector('#services-dropdown > li.relative:nth-child(3) > a.nav-link');
    const webDevDropdown = webDevLink.nextElementSibling;

    webDevLink.addEventListener('mouseenter', function() {
        webDevDropdown.classList.remove('hidden');
    });

    webDevLink.addEventListener('mouseleave', function(event) {
        if (!webDevDropdown.contains(event.relatedTarget)) {
            webDevDropdown.classList.add('hidden');
        }
    });

    webDevDropdown.addEventListener('mouseenter', function() {
        this.classList.remove('hidden');
    });

    webDevDropdown.addEventListener('mouseleave', function() {
        this.classList.add('hidden');
    });
});
// code for page dropdown menu jwo bhy

    
document.addEventListener('DOMContentLoaded', function() {
    const pageLink = document.querySelector('#pageToggle');
    const pageDropdown = document.getElementById('page-dropdown');

    pageLink.addEventListener('mouseenter', function() {
        console.log("ttt")
        pageDropdown.classList.remove('hidden');
    });

    pageLink.addEventListener('mouseleave', function(event) {
        
        if (!pageDropdown.contains(event.relatedTarget)) {
            pageDropdown.classList.add('hidden');
        }
    });

    pageDropdown.addEventListener('mouseenter', function() {
        this.classList.remove('hidden');
    });

    pageDropdown.addEventListener('mouseleave', function() {
        this.classList.add('hidden');
    });
});
document.addEventListener('DOMContentLoaded', function () {
    // Select the toggle button
    const toggleButton = document.querySelector('[data-collapse-toggle="navbar-language"]');
    // Select the menu
    const navMenu = document.getElementById('navbar-language');

    // Listen for a click event on the toggle button
    toggleButton.addEventListener('click', function () {
        // Toggle the 'hidden' class on the menu
        navMenu.classList.toggle('hidden');
    });
});
// the swiper of sponsors
var swiper = new Swiper('.swiper-container', {
    effect: 'coverflow',
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: 'auto',
    coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
    },
    pagination: {
        el: '.swiper-pagination',
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    loop: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
});



