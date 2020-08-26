<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <!-- Menu Toggle Script -->
  <script>
  function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
      document.getElementById("mySidenav2").style.width = "0";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }
  </script>
  <script>
  function openNav2() {
    document.getElementById("mySidenav2").style.width = "250px";
      document.getElementById("mySidenav").style.width = "0";
  }

  function closeNav2() {
    document.getElementById("mySidenav2").style.width = "0";
  }
  </script>
      <script>
      // Add the following code if you want the name of the file appear on select
      $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
      });
      </script>
</body>

  <!-- Footer -->
</html>
