<div class="col-12 col-md-4">
					<div class="card">
							<div class="card-header">Ajout</div>
							<div class="card-body">
									<form action="index.php" method="post">
											<div class="form-group">
													<label for="name">Nom</label>
													<input type="text" class="form-control" name="name" id="name" placeholder="">
											</div>
											<div class="form-group">
													<label for="editor">&Eacute;diteur</label>
													<input type="text" class="form-control" name="editor" id="editor" placeholder="">
											</div>
											<div class="form-group">
													<label for="release_date">Date de sortie</label>
													<input type="text" class="form-control" name="release_date" id="release_date" placeholder="">
											</div>
											<div class="form-group">
													<label for="platform">Console / Support</label>
													<select class="custom-select" id="platform" name="platform">
															<option>-</option>

															<option value=""></option>

													</select>
											</div>
											<button type="submit" class="btn btn-success btn-block">Ajouter</button>
									</form>
							</div>
					</div>
			</div>
	</div>
    <p> Retour à <a href="<?= route("nom_de_route_home") ?>"> l'accueil </a>
</main>
