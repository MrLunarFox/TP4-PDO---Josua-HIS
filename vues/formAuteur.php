<div class="container mt-5">
<h2 class='pt-3 text-center'><?php echo $mode ?> un auteur</h2>
    <form action="index.php?uc=auteurs&action=validForm" method="post" class="col-md-6 offset-md-3 border border-primary p-3 rounded">
            <div class="form-group">
                <label for='nom' > Nom </label>
                <input type="text" class='form-control' id='nom' placehoder='Saisir le libellé' name='nom' value="<?php if($mode == "Modifier") {echo $auteur->getNom3() ;} ?>">
                <label for='nom' > Prénom </label>
                <input type="text" class='form-control' id='prenom' placehoder='Saisir le libellé' name='prenom' value="<?php if($mode == "Modifier") {echo $auteur->getPrenom3() ;} ?>">
            </div>
            <input type="hidden" id="num" name="num" value="<?php if($mode == "Modifier") {echo $auteur->getNum3();} ?>">
            <div class="row">
                <div class="col"> <a href="index.php?uc=auteurs&action=list" class='btn btn-warning btn-block'>Revenir à la liste</a> </div>
                <div class="col"><button type='submit' class='btn btn-success btn-block'> <?php echo $mode ?> </button> </div>
            </div>
    </form>
</div>