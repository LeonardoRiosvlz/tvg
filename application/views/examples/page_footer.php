<script src="<?php echo base_url('js/jquery-3.3.1.js');?>"></script>
<script src="<?php echo base_url('js/bootstrap.min.js');?>"></script>

     <?php if(isset($js)):
            foreach ($js as $value): ?>
                <script src="<?= base_url();?>js/<?php echo $value;?>.js" /></script>
            <?php endforeach;
    endif;?>
  <!-- Menu Toggle Script -->
 <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
 </script>

</body>
  <!-- Footer -->
<footer class="page-footer dark pt-4 titulares">
    <div class="container">

      <!-- Social buttons -->
      <ul class="list-unstyled list-inline text-center">
        <li class="list-inline-item">
          <a class="btn-floating btn-fb mx-1">
            <i class="fa fa-facebook-f"> </i>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="btn-floating btn-tw mx-1">
            <i class="fa fa-twitter"> </i>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="btn-floating btn-gplus mx-1">
            <i class="fa fa-youtube"> </i>
          </a>
        </li>
      </ul>
      <!-- Social buttons -->

    </div>
    <!-- Footer Elements -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2019 Copyright:
      <a href="https://mdbootstrap.com/education/bootstrap/">gazzettasportnews.com</a>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->
</html>

<?php

/* End of file page_footer.php */
/* Location: /community_auth/views/examples/page_footer.php */