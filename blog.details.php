<!DOCTYPE html>
<?php include './php/connectdb.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Post Title</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="./Assets/css/nav.css">
    <link rel="icon" href="./Assets/images/logo.png">
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translate3d(0, 50px, 0);
            }
            to {
                opacity: 1;
                transform: none;
            }
        }
        .animate-fade-in {
            animation: fadeIn 1.5s ease-out;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans leading-normal tracking-normal">
<header class="header  navbar shadow-sm ">
        <nav class="nav p-1  ">
            <div class="nav__data p-4">
                <a href="./index.html" class="nav__logo">
                   <img src="./Assets/images/logof.png" class="w-28" alt="logo">
                </a>

                <div class="nav__toggle" id="nav-toggle">
                    <i class="ri-menu-line nav__toggle-menu"></i>
                    <i class="ri-close-line nav__toggle-close"></i>
                </div>
            </div>

            
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li>
                        <a href="/index.html" class="nav__link">Home</a>
                    </li>

                
                    <li class="dropdown__item">                      
                        <div class="nav__link dropdown__button">
                            Services <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                        </div>

                        <div class="dropdown__container">
                            <div class="dropdown__content">
                                <div class="dropdown__group">
                                    <div class="dropdown__icon">
                                        <i class="ri-flashlight-line"></i>
                                    </div>

                                    <span class="dropdown__title">Marketing</span>

                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="./Marketing.html" class="dropdown__link"> Digital Marketing</a>
                                        </li>
                                        <li>
                                            <a href="./Marketing.html" class="dropdown__link">Digital Strategy</a>
                                        </li>
                                        <li>
                                            <a href="./Marketing.html" class="dropdown__link">Event Marketing</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="dropdown__group">
                                    <div class="dropdown__icon">
                                        <i class="ri-heart-3-line"></i>
                                    </div>

                                    <span class="dropdown__title">Web Development</span>

                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="./Web.html" class="dropdown__link"> Full-stack-Development </a>
                                        </li>
                                        <li>
                                            <a href="./Web.html" class="dropdown__link">Web Security</a>
                                        </li>
                                        <li>
                                            <a href="./Web.html" class="dropdown__link">Web Servers</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="dropdown__group">
                                    <div class="dropdown__icon">
                                        <i class="ri-book-mark-line"></i>
                                    </div>

                                    <span class="dropdown__title">Design</span>

                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="./Design.html" class="dropdown__link">Graphic Design</a>
                                        </li>
                                        <li>
                                            <a href="./Design.html" class="dropdown__link">Decoration and Forniture</a>
                                        </li>
                                        <li>
                                            <a href="./Design.html" class="dropdown__link">Urbain Design</a>
                                        </li>
                                        <li>
                                            <a href="./Design.html" class="dropdown__link">Interior Architecture</a>
                                        </li>
                                    </ul>
                                </div>

                               
                            </div>
                        </div>
                    </li>

                  
                  

                    <li>
                        <a href="./Projects.php" class="nav__link">Projects</a>
                    </li>

                  
                    <li class="dropdown__item">                        
                        <div class="nav__link dropdown__button">
                            Company <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                        </div>

                        <div class="dropdown__container">
                            <div class="dropdown__content">
                                <div class="dropdown__group">
                                    <div class="dropdown__icon">
                                        <i class="ri-community-line"></i>
                                    </div>

                                    <span class="dropdown__title">About us</span>

                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="./Agence.html" class="dropdown__link">Digital Xtra Design</a>
                                        </li>
                                     
                                </div>

                                <div class="dropdown__group">
                                    <div class="dropdown__icon">
                                        <i class="ri-shield-line"></i>
                                    </div>

                                    <span class="dropdown__title">Page</span>

                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="./Blog.php" class="dropdown__link">Blog</a>
                                        </li>
                                        <li>
                                            <a href="./blog.details.php" class="dropdown__link">Blog details</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
   
    
    
    <div class="container mx-auto flex flex-wrap py-6">

    
        <section class="w-full md:w-2/3 flex flex-col items-center px-3">

            <article class="flex flex-col shadow my-4">
        
                <a href="#" class="hover:opacity-75">
                    <img src="./Assets/images/blog.jpeg" alt="">
                </a>
                <div class="bg-white flex flex-col justify-start p-6">
                    <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">Technology</a>
                    <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">Innovative Solutions for Modern Problems</a>
                    <p class="text-sm pb-3">
                        By <a href="#" class="font-semibold hover:text-gray-800">Author Name</a>, Published on April 25th, 2024
                    </p>
                    <a href="#" class="pb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vel dui et lorem consequat lobortis in id orci. Nunc consectetur, erat eget ullamcorper ullamcorper, erat quam aliquet nisi, at molestie nulla metus eu nunc. Vivamus eget placerat ante Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rerum debitis aspernatur voluptas voluptatem deserunt, suscipit dolores provident, architecto sit autem repellat ullam? Suscipit maiores esse reiciendis dolorum reprehenderit quisquam Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas iste accusantium libero, magnam et laudantium laborum odit mollitia, similique, quasi illo velit. Explicabo soluta officia sunt esse placeat in Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, mollitia placeat. Dignissimos placeat, nisi laudantium sed iusto minus, ipsam unde nihil aliquid eos harum expedita aliquam eius vel possimus esse?Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto enim corporis, ex esse debitis quo. Dicta ipsum veritatis porro ratione aspernatur consequuntur laudantium non assumenda facere, impedit vitae adipisci voluptates Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum recusandae perferendis, laudantium vero, iure reiciendis veniam reprehenderit labore cupiditate corporis quas odio in beatae eius totam? Expedita accusantium doloribus perspiciatis?</a>
                   
                </div>
            </article>

        
            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">Comments</p>
                <?php
                    $sql = "SELECT * FROM `Comments`;";
                    $res = mysqli_query($conn,$sql);
                    $num = mysqli_num_rows($res);
                   
                   if($num>0){
                    while( $row = mysqli_fetch_array($res)){
                
                ?>
                <div class="flex items-center space-x-2 pb-4">
                    <img class="w-10 h-10 rounded-full" src="./Assets/images/cloud.png" alt="Avatar of Commenter">
                    <div class="flex flex-col">
                        <p class="font-semibold text-gray-900"><?php echo $row['username']; ?></p>
                        <p class="text-gray-700"><?php echo $row['message']; ?></p>
                    </div>
                </div>
                <?php }}else{ ?>
                    <div>
                        there is no comments
                    </div>

                    <?php } ?>
              
            </div>

        </section>

        
        <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

            <div class="w-full bg-white shadow flex flex-col my-4 p-6 animate-fade-in">
                <p class="text-xl font-semibold pb-5">About Me</p>
                <img class="w-20 h-20 rounded-full mx-auto" src="./Assets/images/web.png" alt="Profile photo">
                <div class="text-center mt-5">
                    <p class="text-gray-900 leading-tight">Hi! I'm <strong>Author Name</strong>. Passionate about technology and innovation, I love to share my insights and discoveries with the world through my blog.</p>
                </div>
            </div>

            <div class="p-8 bg-white rounded-lg shadow-lg mx-auto my-12 max-w-4xl">
                <h3 class="text-2xl font-bold mb-6 text-gray-800">Leave a Comment</h3>
                <form action="./php/submit-comment.php" method="post" class="space-y-6">
                    <div>
                        <label for="name" class="block font-medium text-gray-700">Name</label>
                        <input type="text" id="name" name="name" class="mt-1 block w-full rounded-lg border-0 bg-gray-50 shadow-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition duration-300 ease-in-out" placeholder="Your Name">
                    </div>
                    <div>
                        <label for="email" class="block font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" class="mt-1 block w-full rounded-lg border-0 bg-gray-50 shadow-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition duration-300 ease-in-out" placeholder="you@example.com">
                    </div>
                    <div>
                        <label for="message" class="block font-medium text-gray-700">Message</label>
                        <textarea id="message" name="message" rows="4" class="mt-1 block w-full rounded-lg border-0 bg-gray-50 shadow-sm focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition duration-300 ease-in-out" placeholder="Your engaging comment..."></textarea>
                    </div>
                    <button type="submit" class="w-full text-white bg-red-600  hover:bg-pink-600 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-lg px-5 py-3 text-center transition duration-300 ease-in-out shadow-lg hover:shadow-pink-500/50">Submit Comment</button>
                </form>
            </div>
            

        </aside>

    </div>

   
    

<footer class="bg-white text-gray-800 pt-8 pb-6 px-4">
    <div class="max-w-6xl mx-auto">
      <div class="flex flex-wrap justify-between gap-6">
        <div class="w-full lg:w-1/4 mb-4 lg:mb-0">
          <img src="./Assets/images/logof.png" alt="Logo" class="h-16 w-auto mb-3"> 
          <p class="text-sm">Innovating marketing solutions for tomorrow's needs.</p>
          <div class="mt-3 flex space-x-3"> 
            <a href="#" class="hover:text-red-500 transition duration-300 ease-in-out"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="hover:text-red-500 transition duration-300 ease-in-out"><i class="fab fa-instagram"></i></a>
            <a href="#" class="hover:text-red-500 transition duration-300 ease-in-out"><i class="fab fa-linkedin-in"></i></a>
          </div>
        </div>
  
        <div class="w-full lg:w-1/4 mb-4 lg:mb-0">
          <h3 class="text-lg font-semibold mb-3 hover:underline hover:text-red-500 transition duration-300 ease-in-out">Explore</h3>
          <ul class="space-y-2">
            <li class="hover:text-red-500 transition duration-300 ease-in-out"><a href="#" class="flex items-center"><i class="fas fa-info-circle mr-2"></i>About Us</a></li>
            <li class="hover:text-red-500 transition duration-300 ease-in-out"><a href="./Blog.php" class="flex items-center"><i class="fas fa-blog mr-2"></i>Blog</a></li>
          
          </ul>
        </div>
  
        <div class="w-full lg:w-1/4 mb-4 lg:mb-0">
          <h3 class="text-lg font-semibold mb-3 hover:underline hover:text-red-500 transition duration-300 ease-in-out">Services</h3>
          <ul class="space-y-2">
            <li class="hover:text-red-500 transition duration-300 ease-in-out"><a href="./Web.html" class="flex items-center"><i class="fas fa-code mr-2"></i>Web Development</a></li>
            <li class="hover:text-red-500 transition duration-300 ease-in-out"><a href="./Marketing.html" class="flex items-center"><i class="fas fa-bullhorn mr-2"></i>Marketing</a></li>
            <li class="hover:text-red-500 transition duration-300 ease-in-out"><a href="./Design.html" class="flex items-center"><i class="fas fa-paint-brush mr-2"></i>Design</a></li>
          </ul>
        </div>
  
        <div class="w-full lg:w-1/4 mb-4 lg:mb-0">
          <h3 class="text-lg font-semibold mb-3 hover:underline hover:text-red-500 transition duration-300 ease-in-out">Stay Updated</h3>
          <p class="text-sm mb-2">Subscribe to our newsletter to get the latest updates directly to your inbox.</p>
          <form class="flex flex-col sm:flex-row gap-2">
            <input type="email" placeholder="Your Email" class="w-full sm:w-auto px-4 py-2 rounded-l-full text-black focus:outline-none" required>
            <button type="submit" class="bg-red-500 px-4 py-2 rounded-r-full text-white hover:bg-red-600 transition duration-300 ease-in-out">Subscribe</button>
          </form>
        </div>
      </div>
  
      <div class="flex justify-end mt-4">
        <a href="./recrut.php" target="_blank" class="bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 h-10 inline-flex items-center justify-center px-6 py-2 border-0 rounded-full text-sm font-medium text-white shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-300 ease-in-out">
          Join Our Team
        </a>
      </div>
  
      <div class="border-t border-gray-300 mt-4 pt-4 text-gray-600 text-center text-sm">
        © 2024 Digital Xtra Design. All rights reserved.
      </div>
    </div>
  </footer>
    
  <script >
    /*=============== SHOW MENU ===============*/
const showMenu = (toggleId, navId) =>{
    const toggle = document.getElementById(toggleId),
          nav = document.getElementById(navId)
 
    toggle.addEventListener('click', () =>{
        
        nav.classList.toggle('show-menu')
        
        toggle.classList.toggle('show-icon')
    })
 }
 
 showMenu('nav-toggle','nav-menu')
 
 
 const dropdownItems = document.querySelectorAll('.dropdown__item')
 
 
 dropdownItems.forEach((item) =>{
     const dropdownButton = item.querySelector('.dropdown__button') 
 
     
     dropdownButton.addEventListener('click', () =>{
         
         const showDropdown = document.querySelector('.show-dropdown')
         
         
         toggleItem(item)
 
         
         if(showDropdown && showDropdown!== item){
             toggleItem(showDropdown)
         }
     })
 })
 
 
 const toggleItem = (item) =>{
    
     const dropdownContainer = item.querySelector('.dropdown__container')
 
     
     if(item.classList.contains('show-dropdown')){
         dropdownContainer.removeAttribute('style')
         item.classList.remove('show-dropdown')
     } else{
         
         dropdownContainer.style.height = dropdownContainer.scrollHeight + 'px'
         item.classList.add('show-dropdown')
     }
 }
 
 
 const mediaQuery = matchMedia('(min-width: 1118px)'),
       dropdownContainer = document.querySelectorAll('.dropdown__container')
 
 
 const removeStyle = () =>{
     
     if(mediaQuery.matches){
         
         dropdownContainer.forEach((e) =>{
             e.removeAttribute('style')
         })
 
         
         dropdownItems.forEach((e) =>{
             e.classList.remove('show-dropdown')
         })
     }
 }
 
 addEventListener('resize', removeStyle)
 
  </script>

</body>
</html>
