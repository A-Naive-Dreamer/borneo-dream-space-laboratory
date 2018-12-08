                <?php
                    echo validation_errors();
                ?>
                <?php
                    echo form_open(
                        'pages/section/log_in',
                        array(
                            'method' => 'POST'
                        )
                    );
                ?>
                    <div id="people">
                        <img src="http://localhost/borneo-dream-space-laboratory/media/pictures/web-components/admin-pictures/1.png" height="150" width="150" />
                    </div>
                    <div class="form-group">
                        <label for="username">Username: </label>
                        <input type="text"  pattern="^[a-z]+(-?[a-z]+)*$" class="form-control" id="username" name="username" maxlength="50" placeholder="a-naive-dreamer" pattern="^[a-z]+(-?[a-z]+)*$" required="required" />
                    </div>
                    <div class="form-group">
                        <label for="email">Email: </label>
                        <input type="text" class="form-control" id="email" name="e_mail" maxlength="50" placeholder="anaivedreamer@gmail.com" required="required" />
                    </div>
                    <div class="form-group">
                        <label for="Password">Password: </label>
                        <input type="password" class="form-control" id="password" name="password" maxlength="50" placeholder="Password" required="required" />
                    </div>
                    <div class="alert-info">
	    	    	    Harap periksa kembali form apabila tidak ada respon setelah Anda menekan tombol login
                    </div>
                    <input type="submit" value="Log in" name="log_in" />
                </form>
