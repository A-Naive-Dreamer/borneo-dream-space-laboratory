<?php
    echo validation_errors();
?>
<?php
    echo form_open_multipart(
        'articles/update_2/' .  $article['id'],
        array(),
        array(
            'article_id' => $article['id']
        )
    );
?>
    <br/>
    <br/>
    <h1 style="color: #00f00; font-size: 2em; text-align: center;">UPDATE ARTIKEL</h1>
    <div class="form-group">
        <label for="title">judul: </label>
        <input type="text" class="form-control" name="title" value="<?php echo $article['title']; ?>" maxlength="100" style="display: block; font-size: 1.25em; height: 10px; margin: 0 auto; padding: 10px; width: 400px" placeholder="Kenapa Ada Orang Kaya dan Orang Miskin?" required="required" />
    </div>
    <br/>
    <br/>
    <label for="preview">Preview: </label>
    <input type="file" accept="image/*" class="form-control" id="preview" name="preview"  style="width: 400px;" value="Preview" required="required" />
    <label for="Content">Konten: </label>
    <br/>
    <br/>
    <div class="form-group">
            <textarea class="form-control" id="content" name="content" style="display: block; margin: 0 auto;" placeholder="Isi" required="required"><?php echo $article['content']; ?></textarea>
    </div>
    <br/>
    <br/>
    <div class="alert-info">
	    Harap periksa kembali form apabila tidak ada respon setelah Anda menekan tombol login
    </div>
    <input type="submit" value="Post" name="post" />
?>
