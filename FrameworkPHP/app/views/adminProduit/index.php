<?php include(VIEW_PATH.'default/navAdmin.php'); ?>
<div class="row">
  <h1>Gestion des produits</h1>
</div>
<div class="row main">
  <div class="col-md-4 md-4">
    <div class="card" style="width: 18rem;">
      <div class="card-header">Tomate</div>
      <img class="card-img-top product_panel" src="/asset/img/tomate.png" alt="Tomate">
      <div class="card-body">
          <div><p class="card-text">La tomate est un fruit.</p></div>
      </div>
      <div class="card-footer text-right">
        <form action="" method="post" class="">
          <a href="/admin/utilisateur/1/edit"><button type="button" class="btn btn-warning"><i class="fas fa-wrench"></i></button></a>
          <button type="submit" value="lock" class="btn btn-danger">
            <!-- Si l'utilisateur n'est pas verrouiller afficher -->
            <i class="fa fa-lock"></i>
            <!-- Si l'utilisateur est verrouiller afficher -->
            <!--<i class="fa fa-unlock"></i>-->
          </button>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-4 md-4">
    <div class="card" style="width: 18rem;">
      <div class="card-header">Haricot vert</div>
      <img class="card-img-top product_panel" src="/asset/img/haricot_vert.jpg" alt="Haricot vert">
      <div class="card-body">
          <div><p class="card-text">Le haricot vert est un légume disponible toute l’année.</p></div>
      </div>
      <div class="card-footer text-right">
        <form action="" method="post" class="">
          <a href="/admin/utilisateur/1/edit"><button type="button" class="btn btn-warning"><i class="fas fa-wrench"></i></button></a>
          <button type="submit" value="lock" class="btn btn-danger">
            <!-- Si l'utilisateur n'est pas verrouiller afficher -->
            <i class="fa fa-lock"></i>
            <!-- Si l'utilisateur est verrouiller afficher -->
            <!--<i class="fa fa-unlock"></i>-->
          </button>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-4 md-4">
    <div class="card" style="width: 18rem;">
      <div class="card-header">Radis</div>
      <img class="card-img-top product_panel" src="/asset/img/radis.jpg" alt="Haricot vert">
      <div class="card-footer text-right">
        <form action="" method="post" class="">
          <a href="/admin/utilisateur/1/edit"><button type="button" class="btn btn-warning"><i class="fas fa-wrench"></i></button></a>
          <button type="submit" value="lock" class="btn btn-danger">
            <!-- Si l'utilisateur n'est pas verrouiller afficher -->
            <i class="fa fa-lock"></i>
            <!-- Si l'utilisateur est verrouiller afficher -->
            <!--<i class="fa fa-unlock"></i>-->
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include(VIEW_PATH . 'default/footer.php'); ?>