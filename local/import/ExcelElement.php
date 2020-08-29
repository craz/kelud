<?php
/**
 * Created by PhpStorm.
 * User: aleksejdrobcak
 * Date: 02.08.2018
 * Time: 11:42
 */

class ExcelElement
{
    /**
     * @var Id в системе битрикса.
     */
    public $BitrixElement;
    /**
     * @var Id в системе битрикса.
     */
    public $BitrixID;
    /**
     * @var Разделы.
     */
    public $Section;
    /**
     * @var ID разделов.
     */
    public $SectionID;
    /**
     * @var Артикул.
     */
    public $Article;
    /**
     * @var Название.
     */
    public $Name;
    /**
     * @var Название файлов фотографий.
     */
    public $Photos;
    /**
     * @var Длина.
     */
    public $Width;
    /**
     * @var Ширина.
     */
    public $Height;
    /**
     * @var Толщина.
     */
    public $Thickness;
    /**
     * @var Вес.
     */
    public $Weight;

    /**
     * @var Варианты подстолья.
     */
    public $ArticleUnder;
    /**
     * @var Варианты подстолья ID.
     */
    public $ArticleUnderID;
    /**
     * @var Цвет.
     */
    public $Color;
    /**
     * @var Обработка края
     */
    public $Edge;
    /**
     * @var ID Обработка края
     */
    public $EdgeID;
    /**
     * @var Цена.
     */
    public $Price;
    /**
     * @var $InStock
     * В налиии
     */
    public $InStock;
    /**
     * @var Артикулы сопутсвующих товаров.
     */
    public $ArticleAdditional;
    /**
     * @var Артикулы сопутсвующих товаров ID.
     */
    public $ArticleAdditionalID;
    /**
     * @var Форма.
     */
    public $Form;
    /**
     * @var ID Формы.
     */
    public $FormID;

    /**
     * @var Это подстолье.
     */
    public $IsUnder = false;
}