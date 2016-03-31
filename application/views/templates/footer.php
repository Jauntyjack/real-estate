  <script src="<?php echo base_url() ?>assets/js/jquery-2.1.4.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/prism.js"></script>
	<script src="<?php echo base_url() ?>assets/js/materialize.js"></script>
	<script src="<?php echo base_url() ?>assets/js/init.js"></script>
  <script src="<?php echo base_url() ?>assets/js/validate.js"></script>
  <script src="<?php echo base_url() ?>assets/js/nouislider.js"></script>
  <script src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>

<script>
  $(document).ready(function(){
    $('.scrollspy').scrollSpy();
  });
</script>

    <script type="text/javascript">
        $(document).ready(function(){
        
        $('#insert_form').validate({
          errorElement: "span",
          highlight: function(element, errorClass) {
            $('span').addClass("red-text")
          },

          rules: {
            alamat_properti: "required",
            kode_pos: {
              required: true,
              digits: true
            },
            kelurahan: "required",
            kecamatan: "required",
            luas_tanah:{
              required: true,
              digits: true      
            },
            luas_bangunan:{
              required: true,
              digits: true      
            },
            orientasi: "required",
            tingkat: "required",
            kamar_tidur:{
              required: true,
              digits: true      
            },
            kamar_mandi:{
              required: true,
              digits: true      
            },
            listrik:{
              required: true,
              digits: true      
            },
            telepon:{
              required: true,
              digits: true      
            },
            ac:{
              required: true,
              digits: true      
            },
            air: "required",
            nama_penjual: "required",
            alamat_penjual: "required",
            email_penjual: "required",
            notelp:{
              required: true,
              digits: true      
            },
            no_hp:{
              required: true,
              digits: true      
            },
            nama_disertif: "required",
            hub_disertif: "required",
            harga_permintaan:{
              required: true,
              digits: true      
            },
            harga_min:{
              required: true,
              digits: true      
            },
            tawar_akhir:{
              required: true,
              digits: true      
            },
            namawakil: "required",
            namamarketing: "required",
            namamanager: "required",
          }
        ,
        messages:{

        }
        });
    
        });
    </script>
</body>
</html>