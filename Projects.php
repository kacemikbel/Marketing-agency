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
</head>
<body class="bg-gray-300"> 

<script src="https://unpkg.com/tailwindcss-jit-cdn"></script>
<div class="  space-y-20 p-5">
<?php while($row = $result->fetch_assoc()) { ?>
<section class="flex flex-col  justify-center antialiased mt-4 text-gray-900 "> 
    <div class="max-w-6xl m p-4 sm:px-6 h-full">
        
        <article class="max-w-sm mx-auto md:max-w-none grid md:grid-cols-2 gap-6 md:gap-8 lg:gap-12 xl:gap-16 items-center">
            <a class="relative block group" href="#0">
                <div class="absolute inset-0 bg-gray-800 hidden md:block transform md:translate-y-2 md:translate-x-4 xl:translate-y-4 xl:translate-x-8 group-hover:translate-x-0 group-hover:translate-y-0 transition duration-700 ease-out pointer-events-none" aria-hidden="true"></div>
                <figure class="relative h-0 pb-[56.25%] md:pb-[75%] lg:pb-[56.25%] overflow-hidden transform md:-translate-y-2 xl:-translate-y-4 group-hover:translate-x-0 group-hover:translate-y-0 transition duration-700 ease-out">
                    <img class="absolute inset-0 w-full h-full object-cover transform hover:scale-105 transition duration-700 ease-out" src="<?= $row['image_url']; ?>" width="540" height="303" alt="Blog post">
                </figure>
            </a>
            <div>
                <header>
                <div class="mb-3">
    <ul class="flex flex-wrap gap-3 text-sm font-medium">
        <li>
            <a class=" inline-block text-center text-white py-1 px-3 rounded-full bg-purple-600 hover:bg-purple-700 transition duration-150 ease-in-out" href="#0"><?php echo $row['category1']; ?></a>
        </li>
        <li>
            <a class=" inline-block text-center text-white py-1 px-3 rounded-full bg-blue-500 hover:bg-blue-600 transition duration-150 ease-in-out" href="#0"><?php echo $row['category2']; ?></a>
        </li>
    </ul>
</div> 

                    <h3 class="text-2xl lg:text-3xl font-bold leading-tight mb-2">
                        <a class="hover:text-gray-100 transition duration-150 ease-in-out" href="#0"><?php echo $row['title']; ?></a>
                    </h3>
                </header>
                <p class="text-lg text-gray-600 flex-grow"><?php echo $row['description']; ?></p> 
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
            <li class="hover:text-red-500 transition duration-300 ease-in-out"><a href="#ServicesOfUs" class="flex items-center"><i class="fas fa-concierge-bell mr-2"></i>Services</a></li>
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
            <button type="submit" class="bg-red-500 py-2 rounded-full text-white hover:bg-red-600 transition duration-300 ease-in-out">Subscribe</button>
          </form>
        </div>
      </div>
  
      <div class="flex justify-end mt-4">
        <a href="./recrut.html" target="_blank" class="bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 h-10 inline-flex items-center justify-center px-6 py-2 border-0 rounded-full text-sm font-medium text-white shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-300 ease-in-out">
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