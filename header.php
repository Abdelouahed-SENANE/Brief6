    
    <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Links Tailwind CSS -->
  <link href="./dist/output.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            gray_dark: '#4f5b67',
          }
        }
      }
    }
  </script>
</head>
    
    
    <!-- ============= header ================ -->
    <header class="bg-slate-100 w-full relative">
        <nav class="flex items-center justify-between w-[80%] mx-auto p-5 relative">
            <div>
                <h1  class="text-2xl font-semibold ">
                    <a href="index.php">Banque X</a>
                </h1>
            </div>
            <ul class="flex items-center">
                <li class="mx-4 text-xl font-semibold">
                    <a href="costumers.php">Clients</a>
                </li>
                <li class="mx-4 text-xl font-semibold">
                    <a href="accounts.php">Accounts</a>
                </li>
                <li class="mx-4 text-xl font-semibold">
                    <a href="transactions.php">Transaction</a>
                </li>
            </ul>
        </nav>
    </header>
    <!-- ============= header ================ -->