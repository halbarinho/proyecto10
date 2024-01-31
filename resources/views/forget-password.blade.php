<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Reset Password</title>
</head>

<body class="font-mono bg-gray-400">
    <!-- Container -->
    <div class="container mx-auto">
        <div class="flex justify-center px-6 my-12">
            <!-- Row -->
            <div class="flex w-full xl:w-3/4 lg:w-11/12">
                <!-- Col -->
                <div class="hidden w-full h-auto bg-gray-400 bg-cover rounded-l-lg lg:block lg:w-5/12"
                    style="background-image: url('https://source.unsplash.com/Mv9hjnEUHR4/600x800')"></div>
                <!-- Col -->
                <div class="w-full p-5 bg-white rounded-lg lg:w-7/12 lg:rounded-l-none">
                    <h3 class="pt-4 text-2xl text-center">Recuperemos Password!</h3>
                    <form action="{{ route('forgetPasswordPost') }}" method="post"
                        class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
                        @csrf

                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                                Email
                            </label>
                            <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                name="email" id="email" type="email" placeholder="Email" />
                        </div>
                        <div class="mb-6 text-center">
                            <input type="submit" name="submit"
                                class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                                value="Enviar Mail">
                        </div>
                        <hr class="mb-6 border-t" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>


</html>


<!-- component -->
