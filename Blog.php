<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DXD blog Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="./Assets/css/nav.css">
    <link rel="icon" href="./Assets/images/logo.png">
    
</head>
<body class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-400 font-sans leading-normal tracking-normal">

<header class="header  navbar shadow-sm ">

        <nav class="nav p-1  ">
            <div class="nav__data p-4">
                <a href="./index.html" class="nav__logo w-28">
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
                        <a href="./index.html" class="nav__link">Home</a>
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
   

  <?php 
  include('./php/connectdb.php');
    
  $limit = 3; 
  $page = isset($_GET['page']) ? $_GET['page'] : 1;
  $offset = ($page - 1) * $limit;
  
  
  $sql = "SELECT * FROM blog_posts ORDER BY date DESC LIMIT $limit OFFSET $offset";
  $result = $conn->query($sql);
  
  
  $total_sql = "SELECT COUNT(*) FROM blog_posts";
  $total_result = $conn->query($total_sql);
  $total_rows = $total_result->fetch_row()[0];
  $total_pages = ceil($total_rows / $limit);
  
  $conn->close();
  ?>
  
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
      .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;  
        overflow: hidden;
      }
    </style>
  </head>
  <body>
    <section class="bg-gradient-to-r from-blue-50 via-purple-50 to-pink-50 py-20 mt-8">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
          <h2 class="text-5xl font-extrabold text-gray-900">Latest Blog Posts</h2>
          <p class="mt-4 text-xl text-gray-700">Stay updated with our latest news and articles</p>
        </div>
        <div class="grid gap-8 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
          <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
              <div class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:scale-105 hover:shadow-2xl transition-all duration-300">
                <div class="overflow-hidden">
                  <img class="w-full h-56 object-cover transform hover:scale-110 transition-transform duration-300" src="<?php echo $row['image_url']; ?>" alt="Blog Post">
                </div>
                <div class="p-6">
                  <h3 class="text-2xl font-bold text-gray-900"><?php echo $row['title']; ?></h3>
                  <p class="text-sm text-gray-500 mt-2"><?php echo date('F d, Y', strtotime($row['date'])); ?></p>
                  <p class="mt-4 text-gray-600 line-clamp-3" id="post-<?php echo $row['id']; ?>-desc"><?php echo $row['excerpt']; ?></p>
                  <button onclick="toggleReadMore('post-<?php echo $row['id']; ?>-desc')" class="mt-6 inline-block text-indigo-600 font-semibold hover:text-indigo-800 transition-colors duration-300">Read More &rarr;</button>
                </div>
              </div>
            <?php endwhile; ?>
          <?php else: ?>
            <p>No blog posts found.</p>
          <?php endif; ?>
        </div>
        <div class="mt-12">
          <nav class="block">
            <ul class="flex justify-center">
              <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <li>
                  <a href="?page=<?php echo $i; ?>" class="mx-1 px-3 py-2 rounded-lg bg-white border border-gray-300 text-gray-700 <?php if ($page == $i) echo 'bg-indigo-600 text-white'; ?>">
                    <?php echo $i; ?>
                  </a>
                </li>
              <?php endfor; ?>
            </ul>
          </nav>
        </div>
      </div>
    </section>
  
    <script>
      function toggleReadMore(id) {
        const element = document.getElementById(id);
        element.classList.toggle('line-clamp-3');
      }
    </script>
    

    
  
    <script >
    
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
                <li class="hover:text-red-500 transition duration-300 ease-in-out"><a href="./Agence.html" class="flex items-center"><i class="fas fa-info-circle mr-2"></i>About Us</a></li>
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
      

</body>
</html>
