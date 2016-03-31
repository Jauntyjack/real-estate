<?php $this->load->view('templates/header');?>
<?php $this->load->view('templates/sidenav');?>
<main>
 <div class="section no-pad-bot">
 <?php $this->load->view('templates/topbar');?>
  <div class="row">
      <nav class="grey darken-4" >
        <div class="nav-wrapper">
          <div class="col s12">
            <font size="5" class="hide-on-med-and-down">Simulasi KPR</font>
            <div style="float: right;">
              <a href="<?php echo site_url() ?>home" class="breadcrumb">Beranda</a>
              <a href="<?php echo site_url() ?>properti" class="breadcrumb">Properti</a>
              <a href="<?php echo site_url() ?>properti/kpr" class="breadcrumb">KPR</a>
            </div>
          </div>
        </div>
      </nav>
  </div>


<div class="row">
    <div class="col s12">
      <div class="input-field col s6 l6">
      <?php echo form_label('Nilai Pinjaman','nilai_pinjaman');
      $data = array(
        'class'=>'validate',
        'id'=>'nilai_pinjaman',
        'name'=>'nilai_pinjaman',
        );
      echo form_input($data);?>
        
      </div>

      <div class="input-field col s6 l6">
      <?php echo form_label('Bunga','bunga'); 
      $data = array(
        'class'=>'validate',
        'id'=>'bunga',
        'name'=>'bunga',
        );
      echo form_input($data);?>
      </div>
        

        <div class="col s12 l6">
          <div id="pinjaman_err" class="red-text"></div>
        </div>

        <div class="col s12 l6">
          <div id="bunga_err" class="red-text"></div>
        </div>

    </div>

    <div class="col s12 l4">

      <table class="highlight centered">
        <thead>
          <tr>
            <th>Lama KPR (Tahun)</th>
            <th>Angsuran</th>
          </tr>
        </thead>
        <tr>
          <td>15</td>
          <td id="b15"></td>
        </tr>
        <tr>
          <td>14</td>
          <td id="b14"></td>
        </tr>
        <tr>
          <td>13</td>
          <td id="b13"></td>
        </tr>
        <tr>
          <td>12</td>
          <td id="b12"></td>
        </tr>
        <tr>
          <td>11</td>
          <td id="b11"></td>
        </tr>
        <tr>
          <td>10</td>
          <td id="b10"></td>
        </tr>
      </table>
    </div>
    <div class="col s12 l4">
      <table class="highlight centered">
        <thead>
          <tr>
            <th>Lama KPR (Tahun)</th>
            <th>Angsuran</th>
          </tr>
        </thead>
        <tr>
          <td>9</td>
          <td id="b9"></td>
        </tr>
        <tr>
          <td>8</td>
          <td id="b8"></td>
        </tr>
        <tr>
          <td>7</td>
          <td id="b7"></td>
        </tr>
        <tr>
          <td>6</td>
          <td id="b6"></td>
        </tr>
        <tr>
          <td>5</td>
          <td id="b5"></td>
        </tr>

      </table>
    </div>


  </div>
</main>    

  

<?php $this->load->view('templates/footer');?>
    <script type="text/javascript">

  function PMT(ir, np, pv, fv, type) {
    var pmt, pvif;
    fv || (fv = 0);
    type || (type = 0);
    if (ir === 0)
        return -(pv + fv)/np;
    pvif = Math.pow(1 + ir, np);
    pmt = - ir * pv * (pvif + fv) / (pvif - 1);
    if (type === 1)
        pmt /= (1 + ir);
    return pmt;
  }

  $("#nilai_pinjaman,#bunga").keyup(function() {

  var nilaip = $('#nilai_pinjaman').val();
  var bungathn = $('#bunga').val();

  if(isNaN(nilaip)){
    $('#pinjaman_err').html('Nilai Pinjaman harus dalam format angka');
  } else if(isNaN(bungathn)){
    $('#bunga_err').html('Bunga harus dalam format angka');
  } else {
    $('#pinjaman_err').html('');
    $('#bunga_err').html('');

    var bungabln = bungathn/12;
    var i;
    for(i=15;i>=5;i--){
      var angs = Math.round(Math.abs(PMT(bungabln/100,i*12,nilaip)));
            var td = "#b";
            td = td + i.toString();
            angs = angs.toLocaleString();
            $(td).empty().append(angs); 
    }

  }
    });

      $('#nilai_pinjaman').change();
  </script>