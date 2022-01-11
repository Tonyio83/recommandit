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
    <label for="author" class="col-form-label col-lg-2">Auteur(s)</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" name="author" id="author" >
        <span class="text-danger"><?= ($errors['author']) ?? '' ?></span>
    </div>
</div>
<div class="form-group row">
    <label for="editor" class="col-form-label col-lg-2">Editeur</label>
    <div class="col-lg-6">
        <input type="text" class="form-control" name="editor" id="editor">
        <span class="text-danger"><?= ($errors['editor']) ?? '' ?></span>
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
        <input class="form-check-input" type="checkbox" name="genre[]" id="novel" value="54">
        <label class="form-check-label" for="novel">
            Roman
        </label>
    </div>
    <div class="form-check col-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="frenchComics" value="55">
        <label class="form-check-label" for="frenchComics">
            Franco-Belge
        </label>
    </div>
    <div class="form-check col-5 ml-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="manga" value="56">
        <label class="form-check-label" for="manga">
            Manga
        </label>
    </div>
    <div class="form-check col-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="comics" value="57">
        <label class="form-check-label" for="comics">
            Comics
        </label>
    </div>
    <div class="form-check col-5 ml-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="graphicNovel" value="58">
        <label class="form-check-label" for="graphicNovel">
            Roman Graphique
        </label>
    </div>
    <div class="form-check col-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="blackNovel" value="59">
        <label class="form-check-label" for="blackNovel">
            Roman Noir
        </label>
    </div>
    <div class="form-check col-5 ml-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="thriller" value="7">
        <label class="form-check-label" for="thriller">
            Thriller
        </label>
    </div>
    <div class="form-check col-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="loveNovel" value="60">
        <label class="form-check-label" for="loveNovel">
            Roman d'amour
        </label>
    </div>
    <div class="form-check col-5 ml-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="cyberpunk" value="15">
        <label class="form-check-label" for="cyberpunk">
            Cyberpunk
        </label>
    </div>
    <div class="form-check col-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="steampunk" value="61">
        <label class="form-check-label" for="steampunk">
            Steampunk
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

