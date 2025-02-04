<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>FB Clone</title>



  <!-- Include Vite CSS -->
  @vite('resources/css/app.css')

    </head>

    <body class="
    px-4 lg:px-24 xl:px-52 flex items-center justify-center h-screen lg:bg-gray-50 xl:bg-gray-50 ">

    <div class="grid  grid-cols-1 lg:grid-cols-2 items-center lg:gap-[16rem]  xl:gap-[16rem] gap-[4rem]">
        <div class="flex justify-center lg:justify-end px-[24px]  lg:pb-[12rem]">
           <div>
             <h1 class="text-blue-500 font-semibold text-[70px] lg:block xl:block hidden dark">facebook</h1>

            <p class="text-[23px] lg:block xl:block hidden">Connect with friends and the world <br> around you on Facebook.</p>
           </div>
           <img class="h-[60px] lg:hidden xl:hidden block" src="{{ asset('images/icons/fb.png') }}" alt="">
</div>


       <div class="">
       <div class="flex justify-center lg:flex-col">
            <div class=" lg:p-[24px] xl:p-[24px] bg-white w-[440px] rounded-lg lg:border xl:border lg:shadow-lg xl:shadow-lg">



  <div class="mb-2">

     <input type="text" class="border p-4 w-full focus:outline-none focus:border-gray-500 rounded-md focus:ring-blue-500 placeholder:font-bold "  placeholder="Email or phone number">
  </div>

  <div class="">

     <input type="text" class="border p-4 mt-1 w-full focus:outline-none focus:border-gray-500 placeholder:font-bold rounded-md" placeholder="Password">
  </div>

  <button class="bg-blue-600 w-full mt-5 p-3 text-[20px] lg:rounded-md xl:rounded-md rounded-full font-bold text-white">Log In</button>
    <p class="text-center mt-4 lg:text-blue-500 text-gray-700 xl:text-blue-500">Forgot password?</p>

    <div class="lg:border xl:border w-full mt-4"></div>
    <div class="flex justify-center mb-5">
    <button class="lg:bg-[#42b72a] xl:bg-[#42b72a] lg:w-2/3 xl:w-2/3 w-full mt-5 p-3 lg:rounded-md xl:rounded-md rounded-full font-bold lg:text-white xl:text-white text-blue-500 lg:border xl:border border border-blue-500" onclick="changeColor()"> Create new Account</button>


    </div>


    </div>


 </div>
 <p class="py-[24px] lg:block xl:block hidden text-center bg-dark text-dark">Create a Page for a celebrity, brand or business.</p>
       </div>



       </div>
    </body>
    <script>
    let test = localStorage.getItem("mode") === "true";

    function changeColor() {
        test = !test; // Toggle value
        localStorage.setItem("mode", test);
        document.querySelectorAll('.bg-dark').forEach(el => {
        el.style.backgroundColor = el.style.backgroundColor === "black" ? "white" : "black";

    });
    document.querySelectorAll('.text-dark').forEach(el => {

        el.style.color = el.style.color === "white" ? "black" : "white"; // Text color for contrast
    });

    }


</script>
</html>
