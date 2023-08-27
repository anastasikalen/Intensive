<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
//echo '<pre>';
//print_r($arResult);
?>
<?
$infoblock = 1; // Инфоблок с ID ХХХ (необходимо установить ID нужного инфоблока)
$rs_Section = CIBlockSection::GetList(array('left_margin' => 'asc'), array('IBLOCK_ID' => $infoblock));
while ( $ar_Section = $rs_Section->Fetch() ) {
    $ar_Resu[] = array(  // собираем массив того, что нам нужно
        'ID' => $ar_Section['ID'], // id раздела
        'NAME' => $ar_Section['NAME'], // имя раздела (что нас, собственно, интересует)
        'IBLOCK_SECTION_ID' => $ar_Section['IBLOCK_SECTION_ID'],
        'LEFT_MARGIN' => $ar_Section['LEFT_MARGIN'],
        'RIGHT_MARGIN' => $ar_Section['RIGHT_MARGIN'],
        'DEPTH_LEVEL' => $ar_Section['DEPTH_LEVEL'],
    );
   // print_r($ar_Resu);
}

?>



<h2>Продукция</h2>

<?php if (!empty($arResult['ITEMS'])): ?>
    <div class="accordion" id="accordionGeneral">

        <?php
        $lastSectionId = null;

        foreach ($arResult['ITEMS'] as $arItem):
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

            if ($lastSectionId !== $arItem['IBLOCK_SECTION_ID']) {
                $lastSectionId = $arItem['IBLOCK_SECTION_ID'];
                $currentSectionName = '';

                foreach ($ar_Resu as $section) {
                    if ($section['ID'] === $lastSectionId) {
                        $currentSectionName = $section['NAME'];
                        break;
                    }
                }

                if (!empty($currentSectionName)) {
                    echo '<h3>' . $currentSectionName . '</h3>';
                }
            }
            ?>
            <div class="accordion-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <h2 class="accordion-header" id="heading<?=$arItem['CODE']?>">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionGeneral<?=$arItem['CODE']?>" aria-expanded="true" aria-controls="accordionGeneral<?=$arItem['CODE']?>">
                        <?=$arItem['NAME'] ?>
                    </button>
                </h2>
            </div>

            <div id="accordionGeneral<?=$arItem['CODE']?>" class="accordion-collapse collapse" aria-labelledby="heading<?=$arItem['CODE']?>" data-bs-parent="#accordionGeneral">

                <div class="accordion-body">
                    <b><span>Вес:</span></b>
                    <?=$arItem['PROPERTIES']['WEIGHT']['VALUE']?>
                    <br>
                    <b><span>Единица измерения:</span></b>
                    <?=$arItem['PROPERTIES']['UNIT']['VALUE']?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
