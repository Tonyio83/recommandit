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
    <label for="editor" class="col-form-label col-lg-2">Editeur</label>
    <div class="col-lg-6">
        <input type="text" class="form-control" name="editor" id="editor">
        <span class="text-danger"><?= ($errors['editor']) ?? '' ?></span>
    </div>
</div>
<div class="form-group row">
    <label for="developer" class="col-form-label col-lg-2">Développeur</label>
    <div class="col-lg-6">
        <input type="text" class="form-control" name="developer" id="developper">
        <span class="text-danger"><?= ($errors['developer']) ?? '' ?></span>
    </div>
</div>
<div class="form-group row">
    <label for="support" class="col-form-label col-lg-2">Support(s)</label>
    <div class="col-lg-6">
        <input type="text" class="form-control" name="support" id="support">
        <span class="text-danger"><?= ($errors['support']) ?? '' ?></span>
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
        <label class="form-check-label" for="serie">
            Aventure
        </label>
    </div>
    <div class="form-check col-5 ml-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="survivalHorror" value="38">
        <label class="form-check-label" for="survivalHorror">
            Survival-Horror
        </label>
    </div>
    <div class="form-check col-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="fighting" value="39">
        <label class="form-check-label" for="fighting">
            Combat
        </label>
    </div>
    <div class="form-check col-5 ml-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="fps" value="40">
        <label class="form-check-label" for="fps">
            FPS
        </label>
    </div>
    <div class="form-check col-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="moba" value="41">
        <label class="form-check-label" for="moba">
            MOBA
        </label>
    </div>
    <div class="form-check col-5 ml-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="mmo" value="42">
        <label class="form-check-label" for="mmo">
           MMO
        </label>
    </div>
    <div class="form-check col-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="rpg" value="43">
        <label class="form-check-label" for="rpg">
            RPG
        </label>
    </div>
    <div class="form-check col-5 ml-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="platform" value="44">
        <label class="form-check-label" for="platform">
           Plateforme
        </label>
    </div>
    <div class="form-check col-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="cardsGame" value="45">
        <label class="form-check-label" for="cardsGame">
            Cartes
        </label>
    </div>
    <div class="form-check col-5 ml-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="strategy" value="46">
        <label class="form-check-label" for="strategy">
            Stratégie
        </label>
    </div>
    <div class="form-check col-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="sport" value="47">
        <label class="form-check-label" for="sport">
            Sport
        </label>
    </div>
    <div class="form-check col-5 ml-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="racingGames" value="48">
        <label class="form-check-label" for="racingGames">
            Courses
        </label>
    </div>
    <div class="form-check col-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="simulation" value="49">
        <label class="form-check-label" for="simulation">
            Simulation
        </label>
    </div>
    <div class="form-check col-5 ml-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="hacknslash" value="50">
        <label class="form-check-label" for="hacknslash">
            Hack'n'Slash
        </label>
    </div>
    <div class="form-check col-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="multiplayer" value="51">
        <label class="form-check-label" for="multiplayer">
            Multijoueur
        </label>
    </div>
    <div class="form-check col-5 ml-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="indy" value="52">
        <label class="form-check-label" for="indy">
           Indé
        </label>
    </div>
    <div class="form-check col-5">
        <input class="form-check-input" type="checkbox" name="genre[]" id="mobile" value="53">
        <label class="form-check-label" for="TPS">
            TPS
        </label>
    </div>
    <span class="text-danger"><?= ($errors['genre']) ?? '' ?></span>
</fieldset>
<div class="d-flex justify-content-center">
    <button type="submit" class="btn btn-danger">Envoyer</button>
</div>