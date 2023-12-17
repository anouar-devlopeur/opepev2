<div class="button-add-student">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Add Plante</button>
    
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Plante</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form method="POST" action="./traitement/addplante.php" enctype="multipart/form-data">
                                
                                  <div class="">
                                    <label for="recipient-name" class="col-form-label">Nom Plante:</label>
                                    <input type="text" class="form-control" id="recipient-name" name="Name">
                                  </div>
                                  <div class="">
                                    <label for="recipient-name" class="col-form-label">Image:</label>
                                    <input type="file" class="form-control" id="recipient-name" accept=".jpg,.png,.jpeg" name="img">
                                  </div>
                                  <div class="">
                                    <label for="recipient-name" class="col-form-label">Description:</label>
                                    <input type="text" class="form-control" id="recipient-name" name="Description" >
                                  </div>
                                  <div class="">
                                    <label for="recipient-name" class="col-form-label">Prix:</label>
                                    <input type="text" class="form-control" id="recipient-name" name="Prix" >
                                  </div>
                                  <div class="">
                                    <label for="recipient-name" class="col-form-label">Ctegorie:</label>
                                    <select name="cate" id=""  class="form-select" aria-label="Default select example>
                                 <?php
                                  $cat=new Categorie();
                                  $res=$cat->GetCat();
                                  foreach($res as $row){
                                   ?>
                                 
                                        <option value="<?php echo $row['idCategorie'] ?>" ><?php echo $row['nomCategorie'] ?></option>
                                        <?php } ?>
                                    </select>

                                  </div>
                                
                                  <div class="modal-footer">
                                <button type="submit" name="addplant" class="btn btn-primary">Ajouter Plante</button>
                              </div>
                                </form>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
