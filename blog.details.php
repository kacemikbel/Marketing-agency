<!DOCTYPE html>
<?php include './php/connectdb.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Post Title</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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

    
    <section class=" h-96 flex items-center justify-center bg-gradient-to-br from-purple-500 to-pink-500">
        <div class="text-center text-white fade-in-up">
            <h1 class="text-6xl font-extrabold mb-4">Discover Our Insights</h1>
            <p class="text-xl mb-8">Engage with our thoughtfully crafted articles.</p>
        </div>
    </section>

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
                    <a href="#" class="uppercase text-gray-800 hover:text-black">Continue Reading <i class="fas fa-arrow-right"></i></a>
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
                    <button type="submit" class="w-full text-white bg-pink-500 hover:bg-pink-600 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-lg px-5 py-3 text-center transition duration-300 ease-in-out shadow-lg hover:shadow-pink-500/50">Submit Comment</button>
                </form>
            </div>
            

        </aside>

    </div>

   
    

</body>
</html>
