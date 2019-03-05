<fieldset>
    <legend>
        Form Komentar
    </legend>
    <?php
        echo validation_errors();
    ?>
    <?php
        echo form_open(
            'articles/send/comment/' . $article_id,
            array(
                'method' => 'POST'
            ),
            array(
                'article_id' => $article_id
            )
        );
    ?>
        <table>
            <tbody>
                <tr>
                    <td>
                        <label for="commentator-picture">
                            Foto :
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button class="to" type="button" data-ng-click="previous()">&lt;</button><!--
                        --><img src="http://localhost/borneo-dream-space-laboratory/media/pictures/web-components/commentator-pictures/1.png" alt="Your Image" id="your-image"
                            width="100" height="100" /><!--
                        --><button class="to" type="button" data-ng-click="next()">&gt;</button><!--
                        --><input type="text" name="commentator_picture" id="commentator-picture" data-ng-model="commentatorPicture"
                            value="http://localhost/borneo-dream-space-laboratory/media/pictures/web-components/commentator-pictures/1.png" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="name">
                            Nama :
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" id="name" name="name" data-ng-model="name" placeholder="Example: Atallabela Yosua" required="true" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="eMail">
                            E-mail :
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="email" id="eMail" name="e_mail" data-ng-model="eMail" placeholder="Example: dayakarcher@hotmail.com" required="true" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="comment">
                            Komentar :
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <textarea id="comment" row="10" column="50" name="comment" data-ng-model="comment" placeholder="Example: Hello, World!" autocomplete="off" required="true"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Submit" name="submit" /><!--
                        --><button type="button" class="action" data-ng-click="reset();">Reset</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</fieldset>
