<!DOCTYPE html>
<html>
  <head>
    <title>Title of the document</title>
  </head>
  <body>
    <p>There is a hidden message for you. Click to see it.</p>
    <button onclick="myFunction()">Click me!</button>
    <p id="demo"></p>
    <script>
      function myFunction() {
        document.getElementById("demo").innerHTML = "Hello Dear Visitor!</br> We are happy that you've chosen our website to learn programming languages. We're sure you'll become one of the best programmers in your country. Good luck to you!";
      }
    </script>
  </body>
</html>