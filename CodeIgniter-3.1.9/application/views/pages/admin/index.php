<?php
    $x = 1;
?>
    <table class="hip-table hip-table-chess">
        <thead>
            <tr>
                <th>
                    No.
                </th>
                <th>
                    Title
                </th>
                <th>
                    Nama Author
                </th>
                <th>
                    Tanggal Pembuatan
                </th>
                <th>
                    Waktu Pembuatan
                </th>
            </tr>
            </thead>
            <tbody>
<?php
    foreach($articles as $article) {
        echo '<tr>' .
                '<td>' .
                    $x .
                '</td>' .
                '<td>' .
                    $article['title'] .
                '</td>' .
                '<td>' .
                    $article['author_name'] .
                '</td>' .
                '<td>' .
                    $article['created_date'] .
                '</td>' .
                '<td>' .
                    $article['created_time'] .
                '</td>' .
            '</tr>';

            ++$x;
    }

    echo '</tbody>' .
        '</table>';
?>
    <?php
        echo validation_errors();
    ?>
    <?php
        echo form_open_multipart(
            'articles/create',
            array(
                'style' => 'margin-top: 50px'
            )
        );
    ?>
        <br/>
        <br/>
        <h1 style="color: #00f00; font-size: 2em; text-align: center;">
            TAMBAH ARTIKEL
        </h1>
        <div class="form-group">
            <label for="title">
                judul:&nbsp;
            </label>
            <input type="text" class="form-control" name="title" maxlength="100"
                style="display: block; font-size: 1.25em; height: 10px; margin: 0 auto; padding: 10px; width: 400px" placeholder="Kenapa Ada Orang Kaya dan Orang Miskin?"
                required="required" />
        </div>
        <br/>
        <br/>
        <label for="preview">
            Preview:&nbsp;
        </label>
        <input type="file" accept="image/*" class="form-control" id="preview" name="preview"  style="width: 400px;" value="Preview" required="required" />
        <label for="Content">
            Konten:&nbsp;
        </label>
        <br/>
        <br/>
        <div class="form-group">
                <textarea class="form-control" id="content" name="content" style="display: block; margin: 0 auto;" placeholder="Isi" required="required"></textarea>
        </div>
        <br/>
        <br/>
        <div class="alert-info">
	        Harap periksa kembali form apabila tidak ada respon setelah Anda menekan tombol login
        </div>
        <input type="submit" value="Post" name="post" />
    </form>
