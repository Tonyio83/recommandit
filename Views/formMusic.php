<div class="form-group row">
    <label for="title" class="col-form-label col-lg-2">Titre</label>
    <div class="col-lg-8">
        <input type="text" class="form-control " name="title" id="title">
        <span class="text-danger"><?= ($errors['title']) ?? '' ?></span>
    </div>
</div>
<div class="form-group row">
    <label for="synopsis" class="col-form-label col-lg-2">Synopsis</label>
    <div class="col-lg-8">
        <textarea class="form-control" name="synopsis" id="synopsis"></textarea>
        <span class="text-danger"><?= ($errors['synopsis']) ?? '' ?></span>
    </div>
</div>
<div class="form-group row">
    <label for="dateReleased" class="col-form-label col-lg-2">Date de sortie</label>
    <div class="col-lg-6">
        <input type="date" class="form-control" name="dateReleased" id="dateReleased">
        <span class="text-danger"><?= ($errors['dateReleased']) ?? '' ?></span>
    </div>
</div>
<div class="form-group row">
    <label for="artist" class="col-form-label col-lg-2">Artiste</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" name="artist" id="artist" >
        <span class="text-danger"><?= ($errors['artist']) ?? '' ?></span>
    </div>
</div>
<div class="form-group row">
    <label for="nationality" class="col-form-label col-lg-2">Nationalité</label>
    <div class="col-lg-6">
        <input type="text" class="form-control" name="nationality" id="nationality">
        <span class="text-danger"><?= ($errors['nationality']) ?? '' ?></span>
    </div>
</div>
<div class="form-group row">
    <label for="copyright" class="col-form-label col-lg-2">Droits d'auteur</label>
    <div class="col-lg-6">
        <input type="text" class="form-control" name="copyright" id="copyright">
        <span class="text-danger"><?= ($errors['copyright']) ?? '' ?></span>
    </div>
</div>
<div class="form-group row">
    <label for="poster" class="col-form-label col-lg-2">Image</label>
    <div class="col-lg-8">
        <input type="file" class="form-control-file" id="poster" name="poster">
        <span class="text-danger"><?= ($errors['poster']) ?? '' ?></span>
    </div>
</div>
<fieldset class="form-group row ml-lg-5">
    <legend class="col-form-label">Genres</legend>
    <div class="form-check col-5 ml-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="variety" value="20">
        <label class="form-check-label" for="variety">
            Variété Française
        </label>
    </div>
    <div class="form-check col-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="rock" value="21">
        <label class="form-check-label" for="rock">
            Rock
        </label>
    </div>
    <div class="form-check col-5 ml-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="rap" value="22">
        <label class="form-check-label" for="rap">
            Rap
        </label>
    </div>
    <div class="form-check col-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="electro" value="23">
        <label class="form-check-label" for="electro">
            Electro
        </label>
    </div>
    <div class="form-check col-5 ml-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="pop" value="24">
        <label class="form-check-label" for="pop">
            Pop
        </label>
    </div>
    <div class="form-check col-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="reggae" value="25">
        <label class="form-check-label" for="reggae">
            Reggae
        </label>
    </div>
    <div class="form-check col-5 ml-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="soul" value="26">
        <label class="form-check-label" for="soul">
            Soul
        </label>
    </div>
    <div class="form-check col-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="classic" value="27">
        <label class="form-check-label" for="classic">
            Classique
        </label>
    </div>
    <div class="form-check col-5 ml-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="rnb" value="28">
        <label class="form-check-label" for="rnb">
            R'n'B
        </label>
    </div>
    <div class="form-check col-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="latino" value="29">
        <label class="form-check-label" for="latino">
            Latine
        </label>
    </div>
    <div class="form-check col-5 ml-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="metal" value="30">
        <label class="form-check-label" for="metal">
            Metal
        </label>
    </div>
    <div class="form-check col-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="funk" value="31">
        <label class="form-check-label" for="funk">
            Funk
        </label>
    </div>
    <div class="form-check col-5 ml-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="disco" value="32">
        <label class="form-check-label" for="disco">
            Disco
        </label>
    </div>
    <div class="form-check col-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="blues" value="33">
        <label class="form-check-label" for="blues">
            Blues
        </label>
    </div>
    <div class="form-check col-5 ml-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="country" value="34">
        <label class="form-check-label" for="country">
            Country
        </label>
    </div>
    <div class="form-check col-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="k-pop" value="35">
        <label class="form-check-label" for="k-pop">
            K-pop
        </label>
    </div>
    <div class="form-check col-5 ml-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="raï" value="36">
        <label class="form-check-label" for="raï">
            Raï
        </label>
    </div>
    <div class="form-check col-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="musical" value="37">
        <label class="form-check-label" for="musical">
            Comédie Musicale
        </label>
    </div>
    <span class="text-danger"><?= ($errors['genre']) ?? '' ?></span>
</fieldset>
<div class="d-flex justify-content-center">
    <button type="submit" class="btn btn-danger">Envoyer</button>
</div>
