<!DOCTYPE html>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
  <style>
    .rounded-full {
      border-radius: 9999px;
    }
  </style>
</head>
<body>
  <div class="w-full bg-gray-200 rounded-full">
    <div class="h-4 bg-green-500 rounded-full transition-all duration-500" style="width: <?php echo $progress ?>%;"></div>
  </div>

  <?php
  // Your PHP code to retrieve progress value from the database
  $progress = 75; // Assuming the progress value is retrieved from the database
  ?>

  <script>
    const progress = <?php echo $progress ?>; // Get the progress value from PHP

    const progressBar = document.querySelector('.bg-green-500');
    progressBar.style.width = progress + '%';
  </script>
</body>
</html>
