<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@5/dark.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <title>Document</title>
</head>


<body class="bg-gray-200 font-sans text-gray-700">
    <div class="container mx-auto p-8 flex">
        <div class="max-w-md w-full mx-auto mt-[80px] max-[400px]:mt-[30px]">
            <div class="container flex flex-col justify-center items-center">
                <span class="bg-gradient-to-tr text-transparent from-[#00bCF2] to-[#BAD80A] bg-clip-text">
                    <h1 class="text-[50px] text-center font-bold max-[400px]:text-[30px] ">FORUM WARGA</h1>
                </span>
                <h1 class="text-xl text-center mb-12 font-bold max-[400px]:text-[15px] ">RW 03 | Desa Sukagiri</h1>
            </div>

            <div class="bg-[#00bCF2] rounded-lg overflow-hidden shadow-2xl">
                <div class="p-8">
                    <form method="POST" action="../utils/auth.php">
                        <div class="mb-5">
                            <input placeholder="Username" type="text" name="username" class="block w-full p-3 rounded bg-gray-200 border border-transparent focus:outline-none">
                        </div>

                        <div class="mb-5">
                            <input placeholder="*********" type="password" name="password" class="block w-full p-3 rounded bg-gray-200 border border-transparent focus:outline-none">
                        </div>

                        <button type="submit" name="login" class="w-full p-3 mt-4 bg-[#BAD80A] text-white rounded shadow hover:bg-[#a5c105]">Masuk</button>
                    </form>
                </div>

                <?php
                if (isset($_GET['notification'])) {
                    echo $_GET['notification'];
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>