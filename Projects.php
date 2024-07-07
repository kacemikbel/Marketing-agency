<?php 
include('./php/connectdb.php');

$limit = 3; 
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;


$sql = "SELECT * FROM projects ORDER BY id DESC LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);

$total_sql = "SELECT COUNT(*) FROM projects";
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
    <title>Old Projects - Marketing Agency</title>
    
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="icon" href="./Assets/images/logo.png">
    <link rel="stylesheet" href="./Assets/css/nav.css">
</head>
<body class="bg-gray-300"> 
<header class="header  navbar shadow-sm ">
        <nav class="nav p-1  ">
            <div class="nav__data p-4">
                <a href="./index.html" class="nav__logo">
                    <i class="ri-code-s-slash-line"></i> Digital xtra design
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

                
                    <li class="dropdown__item ">                      
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
   
<script src="https://unpkg.com/tailwindcss-jit-cdn"></script>
<div class="  space-y-20 mt-12">
<?php while($row = $result->fetch_assoc()) { ?>
<section class="flex flex-col  justify-center antialiased  text-gray-900 "> 
    <div class="max-w-6xl mt-12 sm:px-6 h-full">
        
        <article class="max-w-sm   md:max-w-none grid md:grid-cols-2 gap-6 md:gap-8 lg:gap-12 xl:gap-16 items-center">
            <a class="relative m-4 block group" href="#0">
                <div class="absolute inset-0 bg-gray-800 hidden md:block transform md:translate-y-2 md:translate-x-4 xl:translate-y-4 xl:translate-x-8 group-hover:translate-x-0 group-hover:translate-y-0 transition duration-700 ease-out pointer-events-none" aria-hidden="true"></div>
                <figure class="relative  h-0 pb-[75%] md:pb-[75%] lg:pb-[56.25%] overflow-hidden transform md:-translate-y-2 xl:-translate-y-4 group-hover:translate-x-0 group-hover:translate-y-0 transition duration-700 ease-out">
                    <img class="absolute inset-0 w-full h-full object-cover transform hover:scale-105 transition duration-700 ease-out" src="<?= $row['image_url']; ?>" width="540" height="303" alt="Blog post">
                </figure>
            </a>
            <div>
                <section>
                <div class="mb-3 ">
    <ul class="flex flex-wrap gap-3 text-sm ml-12 font-medium">
        <li>
            <a class=" inline-block text-center text-white py-1 px-3 rounded-full bg-purple-600 hover:bg-purple-700 transition duration-150 ease-in-out" href="#0"><?php echo $row['category1']; ?></a>
        </li>
        <li>
            <a class=" inline-block text-center text-white py-1 px-3 rounded-full bg-blue-500 hover:bg-blue-600 transition duration-150 ease-in-out" href="#0"><?php echo $row['category2']; ?></a>
        </li>
    </ul>
</div> 

                    <h3 class="text-2xl lg:text-3xl font-bold leading-tight mb-2 ml-12">
                        <a class="hover:text-gray-100 transition duration-150 ease-in-out" href="#0"><?php echo $row['title']; ?></a>
                    </h3>
                </section>
                <p class="text-lg ml-12 text-gray-600 flex-grow"><?php echo $row['description']; ?></p> 
            </div>
        </article>    
    </div>
</section>
<?php } ?>

<div class="flex justify-center mt-6">
    <?php if($page > 1): ?>
        <a href="?page=<?php echo $page-1; ?>" class="bg-gray-800 text-white px-4 py-2 rounded-md mx-1">Previous</a>
    <?php endif; ?>
    <?php for($i = 1; $i <= $total_pages; $i++): ?>
        <a href="?page=<?php echo $i; ?>" class="bg-gray-800 text-white px-4 py-2 rounded-md mx-1 <?php if($i == $page) echo 'bg-red-500'; ?>"><?php echo $i; ?></a>
    <?php endfor; ?>
    <?php if($page < $total_pages): ?>
        <a href="?page=<?php echo $page+1; ?>" class="bg-gray-800 text-white px-4 py-2 rounded-md mx-1">Next</a>
    <?php endif; ?>
</div>

</div>

<footer class="bg-white text-gray-800 pt-8 pb-6 px-4">
    <div class="max-w-6xl mx-auto">
      <div class="flex flex-wrap justify-between gap-6">
        <div class="w-full lg:w-1/4 mb-4 lg:mb-0">
          <img src="./Assets/images/logo.png" alt="Logo" class="h-16 w-auto mb-3"> 
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
            <input type="email" class="w-full py-2 px-4 rounded-full border border-gray-300 text-gray-800 focus:border-red-500 focus:outline-none transition duration-300 ease-in-out" placeholder="Enter your email">
            <button type="submit" class="bg-red-500 px-4 py-2 rounded-full text-white hover:bg-red-600 transition duration-300 ease-in-out">Subscribe</button>
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
