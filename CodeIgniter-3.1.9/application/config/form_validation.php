<?php
    $config = array(
        'comment' => array(
            'commentator_picture' => array(
                'field' => 'commentator_picture',
                'label' => 'Gambar Anda',
                'rules' => array(
                    'required',
                    'valid_url'
                ),
                'errors' => array(
                    'required' => 'Harap pilih %s terlebih dahulu!',
                    'valid_url' => 'Alamat %s tidak valid!'
                )
            ),
            'name' => array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => array(
                    'required',
                    'regex_match[/^[a-Z0-9]+([\s_-]+[a-Z0-9]+)*$/]',
                    'max_length[50]'
                ),
                'errors' => array(
                    'required' => 'Harap isi kolom %s terlebih dahulu!',
                    'regex_match' => '%s hanya boleh terdiri atas huruf, angka, spasi, underscore dan dash!',
                    'max_length' => 'Panjang karakter pada kolom %s tidak boleh melebihi dari 50 karakter!'
                )
            ),
            'e_mail' => array(
                'field' => 'e_mail',
                'label' => 'E-Mail',
                'rules' => array(
                    'required',
                    'valid_email',
                    'max_length[50]'
                ),
                'errors' => array(
                    'required' => 'Harap isi kolom %s terlebih dahulu!',
                    'valid_email' => '%s tidak valid!',
                    'max_length[50]' => 'Panjang karakter pada kolom %s tidak boleh melebihi dari 50 karakter!'
                )
            ),
            'comment' => array(
                'field' => 'comment',
                'label' => 'Komentar',
                'rules' => array(
                    'required'
                ),
                'errors' => array(
                    'required' => 'Harap isi kolom %s terlebih dahulu!'
                )
            ),
            'article_id' => array(
                'field' => 'article_id',
                'label' => 'ID Artikel',
                'rules' => array(
                    'required',
                    'is_natural'
                ),
                'errors' =>array(
                    'required' => 'Harap isi kolom %s terlebih dahulu!',
                    'is_natural' => '%s hanya dapat berupa bilangan asli!'
                )
            )
        ),
        'log_in' => array(
            'username' => array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => array(
                    'required',
                    'regex_match[/^[a-Z0-9]+([_-]+[a-Z0-9]+)*$/]',
                    'max_length[50]'
                ),
                'errors' => array(
                    'required' => 'Harap isi kolom %s terlebih dahulu!',
                    'regex_match[/^[a-Z0-9]+([_-]+[a-Z0-9]+)*$/]' => '%s hanya boleh terdiri atas huruf, angka, underscore dan dash!',
                    'max_length[50]' => 'Panjang karakter pada kolom %s tidak boleh melebihi dari 50 karakter!'
                )
            ),
            'e_mail' => array(
                'field' => 'e_mail',
                'label' => 'E-Mail',
                'rules' => array(
                    'required',
                    'valid_email',
                    'max_length[50]'
                ),
                'errors' => array(
                    'required' => 'Harap isi kolom %s terlebih dahulu!',
                    'valid_email' => '%s tidak valid!',
                    'max_length[50]' => 'Panjang karakter pada kolom %s tidak boleh melebihi dari 50 karakter!'
                )
            ),
            'password' => array(
                'field' => 'password',
                'name' => 'Password',
                'rules' => array(
                    'required',
                    'max_length[50]'
                ),
                'errors' => array(
                    'required' => 'Harap isi kolom %s terlebih dahulu!',
                    'max_length[50]' => 'Panjang karakter pada kolom %s tidak boleh melebihi dari 50 karakter!'
                )
            )
        ),
        'create_article' => array(
            'title' => array(
                'field' => 'title',
                'label' => 'Judul',
                'rules' => array(
                    'required',
                    'max_length[100]'
                ),
                'errors' => array(
                    'required' => 'Harap isi kolom %s terlebih dahulu!',
                    'max_length[100]' => 'Panjang karakter pada kolom %s tidak boleh melebihi dari 50 karakter!'
                )
            ),
            'preview' => array(
                'field' => 'preview',
                'label' => 'Preview',
                'rules' => array(
                    'required'
                ),
                'errors' => array(
                    'required' => 'Harap isi kolom %s terlebih dahulu!'
                )
            ),
            'content' => array(
                'field' => 'content',
                'name' => 'Isi',
                'rules' => array(
                    'required'
                ),
                'errors' => array(
                    'required' => 'Harap isi kolom %s terlebih dahulu!'
                )
            )
        )
    );
