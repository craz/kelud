<?

/**
 * @var $arResult
 * @var $arParams
 */

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

?>
<div class="content__block" id="partner">
    <header class="c-header">
        <h2 class="c-header__title">Индивидуальное предложение</h2>
    </header>
    <?= $arResult["HEADER"] ?>
    <? foreach ($arResult['QUESTIONS'] as $question): ?>
        <? if ($question['ACTIVE'] = 'Y'): ?>
            <? if ($question['COMMENTS'] == 'phone'): ?>
                <label class="form__item">
                    <span class="form__label"><?= $question['TITLE'] ?></span>
                    <input type="tel" class="form__input input" name="<?= $question['VARNAME'] ?>"
                           value=""<? if ($question['REQUIRED'] == 'Y') {
                        echo ' required';
                    } ?>>
                </label>
                <?
                continue; endif; ?>
            <?
            switch ($question["TYPE_F"]) {
                case "text":
                    {
                        ?>
                        <label class="form__item">
                            <span class="form__label"><?= $question['TITLE'] ?></span>
                            <input type="text" class="form__input input" name="<?= $question['VARNAME'] ?>"
                                   value=""<? if ($question['REQUIRED'] == 'Y') {
                                echo ' required';
                            } ?>>
                        </label>
                        <?
                        break;
                    }
                case "email":
                    {
                        ?>
                        <label class="form__item">
                            <span class="form__label"><?= $question['TITLE'] ?></span>
                            <input type="email" class="form__input input" name="<?= $question['VARNAME'] ?>"
                                   value=""<? if ($question['REQUIRED'] == 'Y') {
                                echo ' required';
                            } ?>>
                        </label>
                        <?
                        break;
                    }
                case "textarea":
                    {
                        ?>
                        <label class="form__item form__item_textarea">
                            <span class="form__label"><?= $question['TITLE'] ?></span>
                            <textarea class="form__input input input_textarea" <?
                            if ($question['COMMENTS'] != ""){
                            ?>placeholder="<?= $question['COMMENTS'] ?>"<?
                            } ?> name="<?= $question['VARNAME'] ?>"
                                      value=""<? if ($question['REQUIRED'] == 'Y') {
                                echo ' required';
                            } ?>></textarea>
                        </label>
                        <?
                        break;
                    }
            }
            
            ?>
        <? endif; ?>
    <? endforeach; ?>


    <div class="form__item">
        <div class="form__submit">
            <button class="button button_gold">Отправить</button>
            <div class="form__legal">
                Нажимая кнопку &laquo;Отправить&raquo;, вы&nbsp;соглашаетесь с&nbsp;<a target="_blank"
                        href="<?= $arParams['POLICY_LINK'] ?>" class="link">политикой
                    обработки персональных данных</a>
            </div>
        </div>
    </div>
    </form>
</div>