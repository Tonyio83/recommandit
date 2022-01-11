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
    <label for="cast" class="col-form-label col-lg-2">Acteurs</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" name="cast" id="cast" >
        <span class="text-danger"><?= ($errors['cast']) ?? '' ?></span>
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
    <label for="director" class="col-form-label col-lg-2">Réalisateur</label>
    <div class="col-lg-6">
        <input type="text" class="form-control" name="director" id="director">
        <span class="text-danger"><?= ($errors['director']) ?? '' ?></span>
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
        <input class="form-check-input" type="checkbox" name="genre[]" id="action" value="1">
        <label class="form-check-label" for="action">
            Action
        </label>
    </div>
    <div class="form-check col-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="adventure" value="2">
        <label class="form-check-label" for="adventure">
            Aventure
        </label>
    </div>
    <div class="form-check col-5 ml-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="horror" value="3">
        <label class="form-check-label" for="horror">
            Horreur
        </label>
    </div>
    <div class="form-check col-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="drama" value="4">
        <label class="form-check-label" for="drama">
            Drame
        </label>
    </div>
    <div class="form-check col-5 ml-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="fantastic" value="5">
        <label class="form-check-label" for="fantastic">
            Fantastique
        </label>
    </div>
    <div class="form-check col-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="comedy" value="6">
        <label class="form-check-label" for="comedy">
            Comédie
        </label>
    </div>
    <div class="form-check col-5 ml-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="thriller" value="7">
        <label class="form-check-label" for="thriller">
            Thriller
        </label>
    </div>
    <div class="form-check col-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="animation" value="8">
        <label class="form-check-label" for="animation">
            Animation
        </label>
    </div>
    <div class="form-check col-5 ml-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="sciencefiction" value="9">
        <label class="form-check-label" for="sciencefiction">
            Science-Fiction
        </label>
    </div>
    <div class="form-check col-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="romantic" value="10">
        <label class="form-check-label" for="romantic">
            Comédie Romantique
        </label>
    </div>
    <div class="form-check col-5 ml-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="anticipation" value="11">
        <label class="form-check-label" for="anticipation">
            Anticipation
        </label>
    </div>
    <div class="form-check col-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="western" value="12">
        <label class="form-check-label" for="western">
            Western
        </label>
    </div>
    <div class="form-check col-5 ml-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="history" value="13">
        <label class="form-check-label" for="history">
            Histoire
        </label>
    </div>
    <div class="form-check col-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="fantasy" value="14">
        <label class="form-check-label" for="fantasy">
            Fantasy
        </label>
    </div>
    <span class="text-danger"><?= ($errors['genre']) ?? '' ?></span>
</fieldset>
<div class="d-flex justify-content-center">
    <button type="submit" class="btn btn-danger">Envoyer</button>
</div>
